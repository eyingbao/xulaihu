<?php
namespace Common\Controller;
use Think\Controller;
class CommonController extends Controller {
	protected $cc;
	protected $cc1;
	protected $columnList = array(); //栏目列表
	protected $mcc = array();	 	//登录账户的账户名称
	protected $gmcc = array(); 	//当前选择的账户名称
	protected $dates = NULL;
	protected $children = array();  //登录账户下的所有子账户
	protected $selChildren = array(); //选择账户下的所有子账户
	
	protected $manageMcc = array(); //所以管理员账号
	
	protected $accountTrees = array(); //账户树列表
	protected $gmccId = NULL;
	protected $curl = NULL;
	
	protected $mccLists = array();
	protected $connectReports;
	protected $connectReports2;
	protected $csvDir = NULL;
	protected function updateLogin($user){}
	public function _initialize(){
		$this->connectReports = 'mysql://'.C('DB_USER_JAVA').':'.C('DB_PWD_JAVA').'@'.C('DB_HOST_JAVA').'/'.C('DB_NAME_JAVA').'#utf8';
		$this->connectReports2 = 'mysql://'.C('DB_USER_JAVA').':'.C('DB_PWD_JAVA').'@'.C('DB_HOST_JAVA').'/'.C('DB_NAME_JAVA').'#utf8';
		if(OS == 'LIN'){
			$this->csvDir = str_replace('Application/Common/Controller','',dirname(__FILE__)).'csv/';
		}else{
			$this->csvDir = str_replace('Application\Common\Controller','',dirname(__FILE__)).'csv\\';
		}
		$manageMcc = M('mcc')->where("canManageClients = 1")->field('customerId')->select();
		if(is_array($manageMcc) && !empty($manageMcc)){
			foreach($manageMcc as $v){
				array_push($this->manageMcc,$v['customerid']);
			}
		}
		$cUuid = cookie('uuid');
		$cUname = cookie('uname');
		$cPwd = cookie('upwd');
		$sUuid = session('uid');
		if(	($cUuid && $cUname)   &&  ($sUuid && $_SESSION['mcc']) ){ //同时检测到cookie 和 session
		}else if( ($cUuid && $cUname)   &&  !($sUuid && $_SESSION['mcc'])){//只检测到cookie,第一次进来的时候
			$rs = M('manager')->where("account = '{$cUname}' AND password = '{$cPwd}'")->find();
			if($rs['id'] == $cUuid){
				if($rs['status'] == 1){
					session('uid',$rs['id']);
					if($rs['id'] ==1 && ($rs['mcc'] =='' || $rs['mcc'] ==NULL)){
						$rs['mcc'] = C('ROOT_MCC');	
						M('manager')->where('id=1')->data(array('mcc'=>$rs['mcc']))->save();
					}
					$_SESSION['mcc']['id'] = $rs['mcc'];
					$_SESSION['mcc']['nickname'] = $rs['nickname'];
				}else{
					Headers(C('DOMAIN_PC').'/Login/logout');	
				}
			}else{
				Headers(C('DOMAIN_PC').'/Login/logout');	
			}
		}else if( !($cUuid && $cUname)   &&  ($sUuid && $_SESSION['mcc']) ){
		}else{
			Headers(C('DOMAIN_PC').'/Login/logout');
		}
		
		//////////////////////////////////////////////////////////////////////////////////////
		
		//$this->curl = new \App\Curl('callback'); 
		$dateList = get_date_list();
		/////////////////////////////////////////
		$this->mcc['id'] = $_SESSION['mcc']['id'];
		$this->mcc['nickname'] = $_SESSION['mcc']['nickname'];
		/////////////////////////////////////////
		
		/////////////////////////////////////////
		$this->cc1 = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME; //当前路由
		$this->cc = MODULE_NAME.'/'.CONTROLLER_NAME; //当前路由
		 if($this->cc == 'Home/Index'){ 
			 Headers(C('DOMAIN_PC').'/AdGroup/index?date='.$dateList[3]['value']);
		}
		
		$nav = get_nav($this->cc1);
		
		
		
		
		$this->assign('nav',$nav);
		$this->assign('cc',$this->cc);
		$this->assign('cc1',$this->cc1);
		/////////////////////////////////////////
		
		
		/////////////////////////////////////////
		$mccList = M('mcc')->where('status = 1')->select(); //所有活跃账户
		
		
		$this->mccLists = $mccList;
		findChildren($mccList,$this->mcc['id'],$this->children); //获取当前登录账户下的所有子活跃账户
		
		
		
		
		
		
		
		$gmccId = $_GET['mcc'];
		
		if(is_mcc($gmccId)){ //合法mcc账户
		
			if($gmccId=='000-000-0000'){
				//$this->gmcc = $this->mcc;
			}elseif($gmccId== $this->mcc['id']){//查看自己
				$this->gmcc = $this->mcc;
				$this->selChildren = $this->children;
			}else{ //验证要查看的账户和当前登录账户直接的关系
				$arr = index_array2($this->children,'customerid');
	   			$ids = implode(',',$arr);
				if(in_array($gmccId,$this->children)){ //是自己的子活跃账户
					$mcc['id'] = $gmccId;
					$mcc['nickname'] = M('mcc')->where("customerId = '{$gmccId}'")->getField('name');
					findChildren($mccList,$gmccId,$this->selChildren);
					$this->gmcc = $mcc;
				}else{//不选择
				
				}
			}
		}else{ //不选择
		
		}
		
		$this->assign('gmcc',$this->gmcc);
		$this->assign('selChildren',$this->selChildren);
		/////////////////////////////////////////
		$this->accountTrees[0]['id'] = $_SESSION['mcc']['id'];
		$this->accountTrees[0]['name'] = "└─".M('mcc')->where("customerId = '{$_SESSION['mcc']['id']}'")->getField('name');
		/////////////////////////////////////////
		$accountList = M('mcc')->where('status = 1 AND canManageClients = 1')->order('listorder DESC')->select(); //获取所有活跃管理员账户
		optionTree($accountList,$this->mcc['id'],0,$this->accountTrees);  //获取当前登录账户下的子活跃管理员账户
		$this->assign('accountTrees',$this->accountTrees);
		/////////////////////////////////////////
		$list = M('Column')->where("status = 1")->order("listorder DESC")->select();
		$this->columnList = findColumn2($list,0);
		if($_SESSION['mcc']['id'] != C('ROOT_MCC')){
			array_pop($this->columnList);	
			unset($this->columnList[3]['children'][1]);
		}
		$mccArrs = $this->selChildren;
		$this->selChildren = array();
		foreach($mccArrs as $v){
			if(!in_array($v,$this->manageMcc)){
				array_push($this->selChildren,$v);
			}
		}
		$this->assign('columnList',$this->columnList);
		/////////////////////////////////////////
		/////////////////////////////////////////
		$this->dates = $_GET['date'];
		$this->assign('date',$this->dates);
		$this->assign('dateList',$dateList);
		$this->assign('DOMAIN_PC',C('DOMAIN_PC'));
		$this->assign('cc2',C('DOMAIN_PC').'/'.$this->cc1);
	}
}