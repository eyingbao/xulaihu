<?php
namespace Home\Controller;
use Common\Controller\CommonController;

class ManagerController extends CommonController {
	
	protected $index;
	protected $csvDir = NULL ;
   
   public function _initialize(){
		//$this->csvDir = str_replace('Application\Home\Controller','',dirname(__FILE__)).'csv\\';
		parent::_initialize();
		
		if($this->mcc['id']  != C('ROOT_MCC')){
			echo json_msg(false,'not have access');
			exit;
		}
		
	}
   
   
   public function index(){
	  // echo 3;
		//$this->assign('mcc',$mccer);
	  //	
	  
	  //$list  =  M('manager')->select();
	  
	  $sql = "SELECT ama.id , ama.nickname , ama.mcc, ama.create_time, ama.account, ama.status, amc.name FROM ads_manager AS ama  INNER JOIN  ads_mcc AS amc ON ama.mcc = amc.customerId";
	// echo $sql;
	 // exit;
	  $list = M()->query($sql);
	  $this->assign('list',$list);
	  
	  $this->display();
		
		
   }
   
   public function add(){
	   if(IS_POST){
		   $data = $_POST;
	  		if(   strlen($data['account']) < 5  ||   strlen($data['account']) > 30  ){
				
				json_msg(false,'登录账号在5-30位之间');
			
			}elseif(    strlen($data['pwd']) < 6  ||       strlen($data['pwd']) > 10   ){
			   
			   json_msg(false,'密码长度在6-10位之间');
			   
			}else{
				 $c = M('mcc')->where("customerId = '{$data[mcc]}' AND canManageClients = 1")->count();
				  if(!$c){
					  json_msg(false,'请填写合法的mccID');
				  }
				  
				//$d['pwd'] =$data['pwd'];
				$d['account'] = $data['account'];
				$d['password'] = md5($data['pwd']);
		  	   	$d['nickname'] = $data['nickname'];
			   	$d['status'] = intval($data['status']);
			   	$d['mcc'] = $data['mcc'];
				$d['email'] = $data['email'];
			   	$d['tel'] = $data['tel'];
				
				$d['create_time'] = $d['login_time'] = time();
				
				$rs = M('manager')->data($d)->add();
		  		$rs?json_msg(true,'添加成功'):json_msg(false,'添加失败')  ;
			}
	   }
   }
   
   public function pwd(){
		if(IS_POST){
			
			$data = $_POST;
			 if(!intval($data['id'])){
		    		
					json_msg(false,'非法参数');
			
			 }else if(strlen($data['pwd']) < 6  ||       strlen($data['pwd']) > 10){
					json_msg(false,'密码长度在6-10位之间');
			
			}else{
				
				$d['password'] = md5($data['pwd']);
				if(M('manager')->where('id ='.$data['id'])->count()){
					M('manager')->where('id ='.$data['id'])->data($d)->save();
		  			json_msg(true,'修改成功');
				}else{
					json_msg(false,'该账户不存在');
				}
				
				
			}
		}else{
			json_msg(false,'非法参数');	
		}
	}
	
	 public function pwd2(){
		if(IS_POST){
			
			$data = $_POST;
			// if(!intval($data['id'])){
		    		
					//json_msg(false,'非法参数');
			
			if(strlen($data['pwd']) < 6  ||       strlen($data['pwd']) > 10){
					json_msg(false,'密码长度在6-10位之间');
			
			}else{
				
				$d['password'] = md5($data['pwd']);
				//if(M('manager')->where('id ='.session('uid'))->count()){
				M('manager')->where('id ='.session('uid'))->data($d)->save();
		  		json_msg(true,'修改成功');
				//}else{
					//json_msg(false,'该账户不存在');
			//	}
				
				
			}
		}else{
			json_msg(false,'非法参数');	
		}
	}
	
	
	
   
   public function edit(){
	   if(IS_POST){
		   $data = $_POST;
		   
		   if(!intval($data['id'])){
		    	json_msg(false,'非法参数');
		   
		   //}elseif(    strlen($data['pwd']) < 6  ||       strlen($data['pwd']) > 10   ){
			   
			 //  json_msg(false,'密码长度在6-10位之间');

		   
		   }else{
			   $c = M('mcc')->where("customerId = '{$data[mcc]}' AND canManageClients = 1")->count();
			   if(!$c){
				   json_msg(false,'请填写合法的mccID');
			   }
			   
			 //  $d['pwd'] =$data['pwd'];
			   //$d['password'] = md5($data['pwd']);
		  	   $d['nickname'] = $data['nickname'];
			   $d['status'] = intval($data['status']);
			   $d['mcc'] = $data['mcc'];
			   $d['email'] = $data['email'];
			   $d['tel'] = $data['tel'];
			   
			   	M('manager')->where('id ='.$data['id'])->data($d)->save();
		  		json_msg(true,'修改成功');
				//print_r($d);
		   }
		   
		  // 
		   
	   }else{
		   
		   $rs = M('manager')->where('id = '.$_GET['id'])->find();
		   
		   
		   if($rs['id']){
			   echo json_msg(true,$rs);
		   }else{
			   echo json_msg(false,'该记录不存在');
		   }
		   
		   
	   }
   }
   
   
   
   
   //更新mcc
   public function updateMcc(){
	  if(IS_POST){
			$url = C('DOMAIN_TASK').'/ads/examples/AdWords/'.C('VER').'/AccountManagement/index.php';
			$datetimes = date('Y-m-d H:i:s',time());
			$info = post_curl($url,$data);
			$list = $lt = json_decode($info,true);
			
			//pr(array($list));
			
			
			if(is_array($list) && !empty($list)){
				$i = 0;
				$arr = array();
				foreach($list['list'] as $k=>$v){
					$cid[0] = substr($v['customerId'],0,3);
						$cid[1] = substr($v['customerId'],3,3);
						$cid[2] = substr($v['customerId'],6,4);
						$v['customerId'] = $cid[0].'-'.$cid[1].'-'.$cid[2];
					if($i == 0){
						$this->index[$v['level']]['pid'] = 0; 
						$this->index[$v['level']]['customerId'] = $v['customerId']; 
						array_push($arr,$v);
					}else{
						$this->index[$v['level']]['pid'] = $this->index[$v['level']-1]['customerId'];
						$this->index[$v['level']]['customerId'] = $v['customerId'];
						$v['pid'] =	$this->index[$v['level']]['pid'];
						array_push($arr,$v);
					}
					$lt = $arr;
					$i++;
				}
			}
			$str='';
			$labelsAccount = array();
			$labelsAccounts = array();
			$labelsMcc = array(); //普通账户数组
			$aa = array();
			foreach($arr as $v){
				$cid =  str_replace('-','',$v['customerId']);
				$labels = 0; //默认不标记
				$status = 0; //默认不显示
				if($v['canManageClients'] == 1){
					$labels = 1; 
					$status = 1; 
					//array_push($aa,$cid);
				}else{
				//过去30天有消耗的 & 没有标记的  =  status  = 1
				
					//检测到有标记
					if(is_array($v['accountLabels']) && !empty($v['accountLabels'])){
						foreach($v['accountLabels'] as $v2){
							if($v2['name'] == 'active'){
								$labels = 1; 
								$status = 1; //不显示
								
								//array_push($aa,$cid); //所有有标记的cid
								
								//if($v['canManageClients'] == 1){ //被标记的管理员不显示
									//array_push($labelsMcc,$cid);
								//}else{		//被标记的普通账户
									//array_push($labelsMcc,$cid);
									
								//}
								break;
								
							}
						}
					}
				}
				
				
				$v['canManageClients'] = intval($v['canManageClients']);
				//if($v['canManageClients'] == 1){
					//$status = 1;
				//}
				
				
				$str.='(';
				$str.="'{$v[customerId]}',";
				$str.="'{$cid}',";
				$str.="'{$v[name]}',";
				$str.="'{$v[companyName]}',";
				$str.="'{$v[pid]}',";
				$str.="'{$v[currencyCode]}',";
				$str.="'{$v[testAccount]}',";
				$str.="'{$labels}',";
				$str.="'{$v[canManageClients]}',";
				$str.="'{$v[level]}',";
				$str.="'{$status}',";
				$str.="0,";
				$str.="'{$datetimes}'";
				$str.='),';
			}
			$str =  rtrim($str,',');     
			//$sql = "INSERT INTO `ads_mcc`(`customerId`,`account_id`,`name`,`companyName`,`pid`, `currencyCode`, `testAccount`,`accountLabels`,
			//`canManageClients`,`level`,`status`,`listorder`) VALUES".$str;
			$sql = "INSERT INTO `ads_mcc` (`customerId`, `account_id`, `name`, `companyName`, `pid`, `currencyCode`, `testAccount`, `accountLabels`, `canManageClients`, `level`, `status`, `listorder`,`datetimes`) VALUES".$str;
			
			
			//echo $sql;
		//exit;
			
			//pr(array($labelsAccount,$labelsAccounts));
			M()->execute('TRUNCATE ads_mcc');
			M()->execute($sql);
			
			//exit;
			
			//$d = date('Ymd',strtotime('-30 day'));
			//$nowSql = "SELECT  ACCOUNT_ID  FROM (SELECT SUM(COST) AS COST , ACCOUNT_ID  FROM `aw_reportaccount` WHERE DAY > '$d' GROUP BY ACCOUNT_ID) as NEW WHERE NEW.COST > 0";
				
			//pr(array($labelsMcc));
			
			//$final = array();
			//$now = M('',NULL,$this->connectReports)->query($nowSql,true); //过去30天有消耗
			
			
			
			/*if(is_array($now) && !empty($now)){
				foreach($now as $v){
					array_push($final,$v['account_id']);	
				}
				
				
				
				$fs = array_values(array_diff($final,$labelsMcc));
				//pr(array($fs));
				
				$aids = implode(',',$fs);
				$datas['status'] = 1;
				M('mcc')->where("account_id IN({$aids})")->data($datas)->save();
			}*/
			
			
		/*$urls = 'http://ga.qdetong.net/ads.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urls);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch);
		curl_close($ch);*/
		
		
			//pr(array($final,$labelsAccount,array_diff($final,$labelsAccount)));
			
			
			//pr(array($fs));
			//pr(array($final,$labelsAccount));
	  }else{
		  
		  $this->display();
		  
	  }
 }
   
   
   public function upload(){
	 //  echo $this->csvDir;
	   	
		$tempFile = $_FILES['Filedata']['tmp_name'];
	   	$fileTypes = array('csv'); // File extensions
		$fileParts = pathinfo($_FILES['Filedata']['name']);
		$targetFile = $this->csvDir . 'account' .'.'.$fileParts['extension'];
		if(file_exists($targetFile)){
					unlink($targetFile);	
				}
		//echo $targetFile;
		//exit;
		
		//echo $targetFile;
		//exit; 
		//move_uploaded_file($tempFile,$targetFile);
		
		
		
		if (in_array($fileParts['extension'],$fileTypes)) {
			
			if(move_uploaded_file($tempFile,$targetFile)){
				M()->execute('TRUNCATE ads_mcc');
		
				
				$arr = csv_get_lines($targetFile ,20000,0);
			//	print_r($arr);
			//	exit;
				$list = array();
				foreach($arr as $v){
					if(is_mcc($v[0])){
						array_push($list,'"'.$v[0].'"');
					}
					//	unlink($targetFile);
					//json_msg(false,'数据格式出错');	
					//}
					//echo $v[0].'\n';
					//var_dump(is_mcc($v[0]));
				}
				
				
			}
			$ids = implode(',',$list);
			
			
			
			//print_r($list);
			//echo $ids;
				//exit;
			$accounts= $this->downloadMcc();
			
			$mccDB = M('mcc');
		
		//$arrs[] = $arr[0];
		
		//print_r($accounts);
		//echo '<pre>';
		
		//print_r($this->index);
		
		$accounts = array_slice($accounts,0,20000);
		foreach($accounts as $v){
			$mccDB->data($v)->add();
			//print_r($v);
		}
		
		
		
		
		
		$sql = "UPDATE ads_mcc SET status = 1 WHERE customerId IN ({$ids}) AND canManageClients =0";
			
		//	echo $sql.'\n';
			
			
			M()->execute($sql);
			
			M('mcc')->where('canManageClients =1')->data(array('status'=>1))->save();
			
			
			//print_r($a);
			json_msg(true,'同步成功');	
			//echo 'alert(1)';
		}else{
			json_msg(false,'请选择 csv 格式的文件进行导入');	
		}
	   //echo $tempFile;
   }
   
   
   //下载所有mcc
    public function downloadMcc(){
        //$data = $_POST;
		$url = URL.'api/examples/AdWords/v201506/AccountManagement/index.php';
		
		$info = post_curl($url,$data);
		//$json = '';
		$list = $lt = json_decode($info,true);
		//print_r($list);
		//exit;
		if(is_array($list) && !empty($list)){
			$i = 0;
			//print_r($list);
			$arr = array();
			foreach($list['list'] as $k=>$v){
				$cid[0] = substr($v['customerId'],0,3);
					$cid[1] = substr($v['customerId'],3,3);
					$cid[2] = substr($v['customerId'],6,4);
					$v['customerId'] = $cid[0].'-'.$cid[1].'-'.$cid[2];
				
				
				
				if($i == 0){
					$this->index[$v['level']]['pid'] = 0; 
					$this->index[$v['level']]['customerId'] = $v['customerId']; 
					//$['customerId'] = substr
					array_push($arr,$v);
				}else{
				//	echo $v['level'] - $list['list'][$k-1]['level'].'<br />';
				
					$this->index[$v['level']]['pid'] = $this->index[$v['level']-1]['customerId'];
					$this->index[$v['level']]['customerId'] = $v['customerId'];
					
					$v['pid'] =	$this->index[$v['level']]['pid'];
					
					/*switch($v['level'] - $lt[$i-1]['level']){
						case 0:
							$v['pid'] =	 $lt[$i-1]['pid'];
						
						break;
						
						case 1:
							$v['pid'] =	 $lt[$i-1]['customerId'];
						
						break;
						
						case -1:
							$v['pid'] =	 $lt[$i-2]['pid'];
						
						break;
						
						case -2:
							$v['pid'] =	 $lt[$i-3]['pid'];
						
						break;
						
						case -3:
							$v['pid'] =	 $lt[$i-4]['pid'];
						
						break;
						
						case -4:
							$v['pid'] =	 $lt[$i-5]['pid'];
						
						break;
						
						case -5:
							$v['pid'] =	 $lt[$i-6]['pid'];
						
						break;
						
					}*/
					
				//	if(empty($v) || isset($v))
					
					//echo $v['level'] - $list[$k-1]['level'].'<br />';
					array_push($arr,$v);
				}
				
				$lt = $arr;
				
				$i++;
				
			}
			
		}
		
		return $arr;
		//print_r($arr);
		
		//$mccDB = M('mcc');
		
		//$arrs[] = $arr[0];
		
		//print_r($mccDB);
		//echo '<pre>';
		
		//print_r($this->index);
		//foreach($arr as $v){
			//$mccDB->data($v)->add();
			//print_r($v);
		//}
		//print_r($arr);
	//	echo '</pre>';
		//print_r($arr);
		//exit;
    }
   
   public function getName(){
		$cid = $_POST['cid'];
		   echo M('mcc')->where("customerId = '{$cid}'")->getField('name');
   }
   
   
   public function iptcustomer(){
		if(IS_GET){
			
			//echo $this->csvDir;
			//exit;
			$this->display();
		}else{
			
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath= $this->csvDir.'/';
			$upload->savePath=$_POST['cid'].'/';
			$upload->saveName = 'test'; 
			//$upload->exts= $this->api->config['img']['list'];
			//$upload->maxSize   =     $this->api->config['img']['size'] ;// 设置附件上传大小
			$info2   =   $upload->upload();
			
			//
			//exit;
			//
			
			//////////////////////////////////////////////////////////////////////////////	
			$handle = fopen($this->csvDir.$_POST['cid'].'/test.csv','r'); 
			
			// $handle  = fopen( $file_target, 'r');
			 while ($data = fgetcsv($handle, 1000, ",")) {
				 
			 	$data =  eval('return '.iconv('gbk','utf-8',var_export($data,true)).';');
			  	$num = count($data);
			  //echo "<p> $num fields in line $row: <br>n";
			  $row++;
			  for ($c=0; $c < $num; $c++) {
			   //	echo $data[$c];
				$b[$row][] = $data[$c];
			  	}
				$b[$row][] = $_POST['cid'];
			 }
			 
			fclose($handle);
				
			array_shift($b);
			if(count($b)){
				$sql="INSERT INTO `n_accountinfo` (`id`, `customer_Id`, `loginName`, `loginPassword`, `tel`, `address`, `compaign`, `mcc`) VALUES ";
				foreach($b as $v){
					$sql.="(NULL, '{$v[4]}', NULL, NULL, '{$v[1]}', '{$v[3]}', '{$v[2]}', '{$v[5]}'),";
					
				}
				
				$sql =  rtrim($sql,',');
				
				M()->execute($sql);
			}
			//pr(array($b));
			//////////////////////////////////////////////////////////////////////////////
		}
		
		   
	   
   }
  
}