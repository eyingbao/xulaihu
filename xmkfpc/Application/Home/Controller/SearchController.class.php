<?php
namespace Home\Controller;
use Think\Controller;

//查询控制器
class SearchController extends Controller {
	protected  $children= array();
	
	public function index(){
	
		if(isset($_SESSION['mcc']['id'])){
		
			$mccList = M('mcc')->where('status = 1')->select(); //所有活跃账户
			findChildren($mccList,$_SESSION['mcc']['id'],$this->children); //获取当前登录账户下的所有子活跃账户
	
			//print_r($this->children);
		//	exit;
			
			if(is_mcc($_POST['mcc'])){ //合法mcc账户
				
				if($_POST['mcc'] == $_SESSION['mcc']['id']){//查看自己
			
					$nickname = M('mcc')->where("customerId = '{$_POST[mcc]}'")->getField('name');
					
					if($nickname){
						json_msg(true,$nickname);
					}else{
						
						json_msg(false,'查询异常');	
					}
				}else{ //验证要查看的账户和当前登录账户直接的关系
					
					$arr = index_array2($this->children,'customerid');
					$ids = implode(',',$arr);
				//	var_dump($mccList);
				//print_r($this->children);
					//print_r($ids);
					//exit;
					
					if(in_array($_POST['mcc'],$this->children)){ //是自己的子活跃账户

						$nickname = M('mcc')->where("customerId = '{$_POST[mcc]}'")->getField('name');
						
						if($nickname){
							json_msg(true,$nickname);
						}else{
							
							json_msg(false,'查询异常');	
						}
					
					}else{
						json_msg(false,'没有权限');	
					}
				}
			}else{
				
				json_msg(false,'不是有效的mcc');	
			}
			
		}else{
			json_msg(0,'登录超时');	
		}

	}

}