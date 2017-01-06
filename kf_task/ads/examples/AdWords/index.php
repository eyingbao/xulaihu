<?php
	require_once 'header_budget.php';
	$list2 = array();
	if(is_array($list) && !empty($list)){
		foreach($list as $v){
			array_push($list2,URL.'blance.php?cid='.$v[0]);
		}
	}
	
	//print_r($list2);
	//exit;
	
	$ar = page($list2,10);
	$final = array();
	if(is_array($ar) && !empty($ar)){
		foreach($ar as $v){
			$arr = async_get_url($v);
			foreach($arr as $v2){
				array_push($final,$v2);
			}
		}
	}
	if(is_array($final) && !empty($final)){
		$str = '';
		$str2 = '';
		foreach($final  as $v){
			$rs = json_decode($v,true);
			if(is_array($rs) && !empty($rs)){
				if($rs[1] == 'e'){
					$str2.="({$rs[0]},".time()."),";	
				}else{
					$str.="({$rs[0]},{$rs[1]},".time().",'".date('Y-m-d H:i:s',time())."','{$rs[2]}','{$rs[3]}','{$rs[4]}'),";	
				}
			}
		}
		$str =  rtrim($str,',');
		$str2 =  rtrim($str2,',');
	}
	mysqli_query($con['115'],'TRUNCATE ads_budget');
	$sql = "INSERT INTO ads_budget(cid,budget,time,datetime,start_date,acost,bce) VALUES ".$str;
	mysqli_query($con['115'],$sql);
	mysqli_close($con['115']);
	mysqli_close($con['51']);
?>