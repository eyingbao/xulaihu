<?php
	require_once 'header.php';
	$time = time();
	$datetime = date('Y-m-d H:i:s',$time);
	$list2 = array();
	if(is_array($list) && !empty($list)){
		foreach($list as $v){
			array_push($list2,URL.'conversions_server.php?cid='.$v[0]);
		}
	}
	$str='';
	$ar = page($list2,5);
	$f = array();
	for($i = 0 ; $i < count($ar); $i++){
		//if($i < 2){
			$a = async_get_url($ar[$i]);
			$temp = array_values($a);
			$f = array_merge($f,$temp);
	}
	foreach($f as $v){
		$b = json_decode($v,true);
		$aid = str_replace('-','',$b[0]);
		$str.='(';
		$str.="'{$b[0]}',";
		$str.="'{$aid}',";
		$str.="'{$b[1]}',";
		$str.="'{$b[2]}',";
		$str.=$time.',';
		$str.="'{$datetime}'";
		$str.='),';
	}
	mysqli_query($con['115'],"SET NAMES utf8");
	$str = rtrim($str,',');
	mysqli_query($con['115'],'TRUNCATE ads_conversions');
	$sql = 'INSERT INTO ads_conversions(mcc, account,name,status,time,datetime) VALUES'.$str;
	mysqli_query($con['115'],$sql);
	mysqli_close($con['115']);
	mysqli_close($con['51']);
?>

