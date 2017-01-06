<?php
require_once 'header_status.php';
define('URL2',DOMAIN_PC.'/Home/Alerted/suggest?cid=');
$list2 = array();
if(is_array($list) && !empty($list)){
	foreach($list as $v){
		array_push($list2,URL2.$v[0]);
	}
}
$ar = page($list2,5);
$final = array();
if(is_array($ar) && !empty($ar)){
	foreach($ar as $k=>$v){
		$arr = async_get_url($v);
		foreach($arr as $v2){
			$b  =json_decode($v2,true);
			if(is_array($b) && !empty($b)){
				array_push($final,$b);
			}
		}
	}
	echo insertData($final,$con,$db);
}
function insertData($data,&$con,&$db){
	$sql = "INSERT INTO `ads_account_rating` (`id`, `costErr`, `renewals`, `budgetErr`, `campaignCtr`, `delivery`, `kwPoint`, `kwCount`, `adCount`, `ref`, `BounceRate`, `Loadtime`, `Dwelltime`, `convers`, `crmServerCount`, `time`, `date`, `point` ,`account_id` ,`cid`) VALUES";
	foreach($data as $v){
		$sql.="(NULL, '{$v['costErr']}', '{$v['renewals']}', '{$v['budgetErr']}', '{$v['campaignCtr']}', '{$v['delivery']}', '{$v['kwPoint']}', '{$v['kwCount']}', '{$v['adCount']}', '{$v['ref']}', '{$v['BounceRate']}', '{$v['Loadtime']}', '{$v['Dwelltime']}', '{$v['convers']}', '{$v['crmServerCount']}', '{$v['time']}', '{$v['date']}', '{$v['point']}' , '{$v['account_id']}', '{$v['cid']}'),";
	}
	$sql =  rtrim($sql,',');
	mysqli_query($con['115'],'TRUNCATE ads_account_rating');
	mysqli_query($con['115'],$sql);
}
?>