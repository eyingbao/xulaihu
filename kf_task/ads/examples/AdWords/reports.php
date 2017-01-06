<?php
require_once  '../../../config.php';
require_once  'public.php';
require_once ADWORDS_UTIL_PATH . '/'.VER.'/ReportUtils.php';
$customerId = $_GET['cid'];
//$customerId = '971-996-6574';

//echo $customerId;
//exit;

if(strtoupper(substr(PHP_OS,0,3)) == 'LIN'){
	$fPath = str_replace('api/examples/AdWords/'.VER.'/Reporting','csv/test/',dirname(__FILE__));
}else{
	$fPath = str_replace('api\examples\AdWords\\'.VER.'\Reporting','csv\test\\',dirname(__FILE__));
}


$mpath = $fPath.='/csv/'.$customerId.'/';
if(!file_exists($mpath)){
mkdir($fPath);
}
//exit;

//$q2 = "SELECT  CampaignId   FROM  CAMPAIGN_PERFORMANCE_REPORT  DURING 20161012,20161012";

try {
		$user = new AdWordsUser();
		$user->SetClientCustomerId($customerId); 
		$user->LogAll();
		
		
		//$BudgetOrderService = $user->GetService('BudgetOrderService', ADWORDS_VERSION);
	//print_r($user);
	//print_r($BudgetOrderService->getBillingAccounts());
	//exit;
	
	 //$selector = new Selector();
  	// $selector->fields = array();
 	// $graph = $BudgetService->get(168075441);
	
	
	
	
		
		
		//$kw_point = kw_point($user,$customerId,$fPath);
		//$convers = convers($user,$customerId,$fPath);
		//$campaign_ctr = campaign_ctr($user,$customerId,$fPath);
		//echo '<pre>';
		$kw = kw_point($user,$customerId,$fPath);
		$arr["kw_point"] =  $kw[0];
		$arr["kw_search_all"] = $kw[1];
		$arr["convers"] = convers($user,$customerId,$fPath);
		$arr["campaign_ctr"] = campaign_ctr($user,$customerId,$fPath);
		$account_cost_err = account_cost_err($user,$customerId,$fPath);
		$arr["account_cost_err"] =$account_cost_err[0]; 
		$arr["account_cost_d7"] = $account_cost_err[1];
		$arr["account_cost_14"] = $account_cost_err[2];
		//$arr["budget_errs"] = budgetErr($user,$customerId,$fPath);
		$arr["mcc"] =  $customerId;
		$arr["account_id"] =  str_replace('-','',$customerId);
		
		echo json_encode($arr);
		//echo '<pre>';
		//print_r($budgetErr);
		//print_r($convers);
		//print_r($account_cost_err);
		//echo '</pre>';
		//echo 3;
		//unlink($mpath);
		
		//echo $fPath;
	} catch (Exception $e) {
		echo 3;
}


function bdd($user,$customerId,$fPath,$bdd){
	$reportFormat = 'CSV';
	$filePath1 =$fPath.$customerId.'-'.$bdd.'-bdd.csv';
	$q1 = "SELECT  Amount FROM BUDGET_PERFORMANCE_REPORT WHERE   BudgetId = {$bdd}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	if(is_numeric($arr1[0][0])){
		return $arr1[0][0]/1000000;
	}else{
		return 0;
	}
}

function all_cost($user,$customerId,$fPath){
	$reportFormat = 'CSV';
	$d1 = date("Ymd",strtotime("-7 day"));
	$d2 = date("Ymd",strtotime("-1 day"));
	$filePath1 =$fPath.$customerId.'-all_cost.csv';
	$q1 = "SELECT  Cost FROM CAMPAIGN_PERFORMANCE_REPORT WHERE   CampaignStatus = ENABLED  AND Cost > 0   DURING {$d1},{$d2}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	if(is_array($arr1) && !empty($arr1)){
		foreach($arr1 as $v1){
			array_push($f1,$v1[0]/1000000);
		}
		
		$f1 = array_sum($f1);
		//$f1  =floor($f1 / 7); 
	}else{
		$f1 = 0;	
	}
	
	return $f1;
}

function budgetErr($user,$customerId,$fPath){
	//return 0;	
	$reportFormat = 'CSV';
	$d1 = date("Ymd",strtotime("-7 day"));
	$d2 = date("Ymd",strtotime("-1 day"));
	
	$filePath1 =$fPath.$customerId.'-budgetErr1.csv';
	$q1 = "SELECT  Cost,BudgetId FROM CAMPAIGN_PERFORMANCE_REPORT WHERE   CampaignStatus = ENABLED  DURING {$d1},{$d2}";
	
	
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	$amount =  array();
	if(is_array($arr1) && !empty($arr1)){
		foreach($arr1 as $v){
			//$at = bdd($user,$customerId,$fPath,$v[1]);
			array_push($amount,$v[1]);
		}
		$all_cost = all_cost($user,$customerId,$fPath);
		/*$all_cost = all_cost($user,$customerId,$fPath);
		
		if($all_cost > 0){
			return sprintf("%.2f",($all_cost/7/array_sum($amount))) * 100;
		}else{
			return 0;	
		}*/
		
		return array(implode(',',$amount),$all_cost);	
	}else{
		return 0;	
	}
	
	//return 0;	
	//return $arr1;
	
}

function account_cost_err($user,$customerId,$fPath){
	$reportFormat = 'CSV';
	$d1 = date("Ymd",strtotime("-7 day"));
	$d2 = date("Ymd",strtotime("-1 day"));
	$filePath1 =$fPath.$customerId.'-account_cost_err1.csv';
	$q1 = "SELECT  Cost FROM CAMPAIGN_PERFORMANCE_REPORT WHERE   CampaignStatus = ENABLED  AND AdNetworkType1 = SEARCH  AND Cost > 0   DURING {$d1},{$d2}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	if(is_array($arr1) && !empty($arr1)){
		foreach($arr1 as $v1){
			array_push($f1,$v1[0]/1000000);
		}
		
		$f1 = array_sum($f1);
		$f1  =floor($f1 / 7); 
	}else{
		$f1 = 0;	
	}
	$d3 = date("Ymd",strtotime("-14 day"));
	$d4 = date("Ymd",strtotime("-8 day"));
	
	$filePath2 =$fPath.$customerId.'-account_cost_err2.csv';
	$q2 = "SELECT  Cost FROM CAMPAIGN_PERFORMANCE_REPORT  WHERE    CampaignStatus = ENABLED  AND AdNetworkType1 = SEARCH    AND Cost > 0 DURING {$d3},{$d4}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath2, $reportFormat,$q2);
	$arr2 = csv_get_lines($filePath2,2000,0);
	unlink($filePath2);
	$f2 = array();
	array_shift($arr2);
	array_pop($arr2);
	array_pop($arr2);
	if(is_array($arr2) && !empty($arr2)){
		foreach($arr2 as $v2){
			array_push($f2,$v2[0]/1000000);
		}
		
		$f2 = array_sum($f2);
		$f2  =floor($f2 / 7); 
	}else{
		$f2 = 0;	
	}
	
	return array($f1-$f2,$f1,$f2);
	//return array($arr1);
}

function campaign_ctr($user,$customerId,$fPath){
	$reportFormat = 'CSV';
	$d2 = date("Ymd",strtotime("-1 day"));
	$d1 = date("Ymd",strtotime("-7 day"));
	$filePath1 =$fPath.$customerId.'-campaign_ctr.csv';
	$q1 = "SELECT  Clicks,Impressions FROM CAMPAIGN_PERFORMANCE_REPORT  WHERE    CampaignStatus = ENABLED  AND AdNetworkType1 = SEARCH AND  Impressions > 0   DURING {$d1},{$d2}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	$f1 = array();
	$f2 = array();
	//return $arr1;
	if(is_array($arr1) && !empty($arr1)){
		foreach($arr1 as $v1){
			array_push($f1,$v1[0]);
			array_push($f2,$v1[1]);
		}
		
		$f1 = array_sum($f1);
		
		$f2 = array_sum($f2);
		
		return sprintf("%.4f",($f1 / $f2)) * 100;
	}
}


function convers($user,$customerId,$fPath){
	$reportFormat = 'CSV';
	$d30a1 = date("Ymd",strtotime("-30 day"));
	$d30a2 = date("Ymd",strtotime("-1 day"));
	$filePath1 =$fPath.$customerId.'-convers1.csv';
	$q1 = "SELECT  AllConversions FROM CAMPAIGN_PERFORMANCE_REPORT  WHERE    CampaignStatus = ENABLED     DURING {$d30a1},{$d30a2}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
	$arr1 = csv_get_lines($filePath1,2000,0);
	unlink($filePath1);
	$f1 = array();
	array_shift($arr1);
	array_pop($arr1);
	array_pop($arr1);
	if(is_array($arr1) && !empty($arr1)){
		foreach($arr1 as $v1){
			array_push($f1,$v1[0]);
		}
	}
	$f1 = array_sum($f1);
	
	//上上30天
	$d30b1 = date("Ymd",strtotime("-60 day"));
	$d30b2 = date("Ymd",strtotime("-31 day")); 
	$filePath2 =$fPath.$customerId.'-convers2.csv';
	$q2 = "SELECT  AllConversions FROM CAMPAIGN_PERFORMANCE_REPORT  WHERE   CampaignStatus = ENABLED     DURING {$d30b1},{$d30b2}";
	DownloadCriteriaReportWithAwqlExample($user, $filePath2, $reportFormat,$q2);
	$arr2 = csv_get_lines($filePath2,2000,0);
	unlink($filePath2);
	$f2 = array();
	array_shift($arr2);
	array_pop($arr2);
	array_pop($arr2);
	if(is_array($arr2) && !empty($arr2)){
		foreach($arr2 as $v2){
			array_push($f2,$v2[0]);
		}
	}
	$f2 = array_sum($f2);
	
	return intval($f1) - intval($f2);
	//return array($f1,$f2);
}


function kw_point($user,$customerId,$fPath){
	
	$d1 = date("Ymd",strtotime("-1 day"));
	
	$reportFormat = 'CSV';
	$filePath1 =$fPath.$customerId.'-kw_point1.csv';
	$filePath2 =$fPath.$customerId.'-kw_point2.csv';
	
	$q1 = "SELECT  Criteria,CampaignId , AdGroupId ,QualityScore  FROM KEYWORDS_PERFORMANCE_REPORT  WHERE    CampaignStatus = ENABLED  AND AdGroupStatus = ENABLED  AND Status = ENABLED   DURING {$d1},{$d1}";
	
	$q2 = "SELECT  CampaignId , CampaignName FROM  CAMPAIGN_PERFORMANCE_REPORT  WHERE  AdNetworkType1 = CONTENT   AND  CampaignStatus = ENABLED    DURING {$d1},{$d1}";
	
	DownloadCriteriaReportWithAwqlExample($user, $filePath2, $reportFormat,$q2);
		$arr2 = csv_get_lines($filePath2,2000,0);
		unlink($filePath2);
		array_shift($arr2);
		array_pop($arr2);
		array_pop($arr2);
		DownloadCriteriaReportWithAwqlExample($user, $filePath1, $reportFormat,$q1);
		
		$arr1 = csv_get_lines($filePath1,2000,0);
		unlink($filePath1);
		array_shift($arr1);
		array_pop($arr1);
		array_pop($arr1);
		$f2 = array();
		if(is_array($arr2) && !empty($arr2)){
			foreach($arr2 as $v2){
				array_push($f2,$v2[0]);
			}
			
		}
		
		$f1 = array();
		$f4 = array();
		$fall =array();
		
		if(is_array($arr1) && !empty($arr1)){
			foreach($arr1 as $v1){
				
				if(!in_array($v1[1],$f2)){
					
					//if($v1[3]!='--'){
						if(intval($v1[3]) < 4 && is_numeric($v1[3])){
							array_push($f4,$v1);
						}
							
					//}
					
					array_push($f1,$v1);
				}
			}
			$aa = count($f1);
			$bb = count($f4);
			
			if($aa != 0){
				$bb = sprintf("%.2f",$bb/$aa)*100;
			}else{
				$aa = 0;	
			}
			
			return array($bb,$aa);
			
		}
		
		return array(0,0);
		
	//	echo '<pre>';
			//print_r($f1a);
		//print_r($f1);
		
		//print_r(count($f1a));
	//	echo '---';
		//print_r(count($f1));
		
		
		
		//echo '</pre>';
		
}
		


function csv_get_lines($csvfile, $lines, $offset = 0) {
   if(!$fp = fopen($csvfile, 'r')) {
     return false;
    }
    $i = $j = 0;
 while (false !== ($line = fgets($fp))) {
  if($i++ < $offset) {
   continue; 
  }
  break;
 }
 $data = array();
 while(($j++ < $lines) && !feof($fp)) {
  $data[] = fgetcsv($fp);
 }
 fclose($fp);
    return $data;
}

function DownloadCriteriaReportWithAwqlExample(AdWordsUser $user, $filePath,
	$reportFormat ,$reportQuery) {
  	$options = array('version' => ADWORDS_VERSION);
	$reportUtils = new ReportUtils();
  // Optional: Set skipReportHeader, skipColumnHeader or skipReportSummary to
  // suppress header or summary rows in the report output.
  // $options['skipReportHeader'] = true;
  // $options['skipColumnHeader'] = true;
  // $options['skipReportSummary'] = true;

  // Download report.
  $reportUtils->DownloadReportWithAwql($reportQuery, $filePath, $user,$reportFormat, $options);
}
