<?php
	require_once  '../../../config.php';	
	require_once  'public.php';
	$con = mysqli_connect($db['51']['host'],$db['51']['user'],$db['51']['pwd'],$db['51']['db']);
	$date[0] = date('Ymd',strtotime('-7 day'));
	$date[1] = date('Ymd',time());
	getBlance($_GET['cid'],$date,$con);
	function getBlance($customerId,$date,&$con){
		$yday = date('Y-m-d',strtotime('-1 day'));
		$cid  = str_replace('-','',$customerId);
		try {
			$user = new AdWordsUser();
			$user->SetClientCustomerId($customerId); 
			$user->LogAll();
			$reportFormat = 'CSV';
			$BudgetOrderService = $user->GetService('BudgetOrderService', ADWORDS_VERSION);
			$o = $BudgetOrderService->get($customerId);
			$rs['budget'] = 0;
			$ids = array();
			if(isset($o->entries)){
				if(is_array($o->entries)){
					foreach($o->entries as $v){
						if(isset($v->lastRequest)){
							if($v->lastRequest->status == 'APPROVED'){
								//array_push($ids,intval($v->id));
								$ids[intval($v->id)] = str_replace('Asia/Shanghai','',str_replace(' ','',$v->startDateTime));
							}
						}
					}
				}
				if(count($ids)){
					arsort($ids);
					$ida =  array_keys($ids);
					$id = $ida[0];
					foreach($o->entries as $v){
						if($v->id == $id){
							$rs['bdate'] = substr($v->startDateTime,0,8);
							$rs['budget'] += $v->spendingLimit->microAmount / 1000000;
						}	
					}
					$budget =  sprintf('%01.2f',$rs['budget']);
				}else{
					$budget = 0;
				}
			}else{
				$budget = 0;	
			}
			$bdate = substr($rs['bdate'],0,4).'-'.substr($rs['bdate'],4,2).'-'.substr($rs['bdate'],6,2);
			$cost = get_cost($cid,$bdate,$yday,$con);
			$bce  = $budget - $cost;
			echo "[{$cid},{$budget},\"{$bdate}\",\"{$cost}\",\"{$bce}\"]";
		}catch (Exception $e) {
			echo "[{$cid},\"e\"]";
		}	
	}
	
	function get_cost($cid,$day1,$day2,&$con){
		$sql = "SELECT SUM(COST) AS cost FROM `aw_reportcampaign`  WHERE ACCOUNT_ID = '{$cid}' AND DAY >= '{$day1}'";
		$row = mysqli_query($con,$sql);
		$rs = mysqli_fetch_array($row,MYSQLI_ASSOC);
		return isset($rs['cost'])?$rs['cost']:0;
	}
?>