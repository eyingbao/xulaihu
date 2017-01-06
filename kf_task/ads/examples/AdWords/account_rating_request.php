<?php
require_once 'header_status.php';
define('URL2',DOMAIN_TASK.'/kf_task/ads/examples/AdWords/reports.php?cid=');
$list2 = array();
if(is_array($list) && !empty($list)){
	foreach($list as $v){
		array_push($list2,URL2.$v[0]);
	}
}
$ar = page($list2,50);
$final = array();
if(is_array($ar) && !empty($ar)){
	foreach($ar as $k=>$v){
		$arr = async_get_url($v);
		foreach($arr as $v2){
			array_push($final,json_decode($v2,true));
		}
	}
	insertData($final,$con,$db);
}

function insertData($data,&$con,&$db){
	$time = time();
	$dates = date('Y-m-d H:i:s',$time);
	$sql = "INSERT INTO `ads_account_rating_data` (`id`, `kw_point`, `kw_search_all`, `convers`, `campaign_ctr`, `account_cost_err`, `account_cost_d7`, `account_cost_14`, `mcc`, `account_id`, `time`, `dates`) VALUES";
	foreach($data as $v){
		if(is_array($v) && !empty($v)){
			$sql.="(NULL, '{$v['kw_point']}', '{$v['kw_search_all']}', '{$v['convers']}', '{$v['campaign_ctr']}', '{$v['account_cost_err']}', '{$v['account_cost_d7']}', '{$v['account_cost_14']}', '{$v['mcc']}', '{$v['account_id']}','{$time}','{$dates}'),";
		}
	}
	$sql =  rtrim($sql,',');
	mysqli_query($con['115'],'TRUNCATE ads_account_rating_data');
	mysqli_query($con['115'],$sql);
}
?>