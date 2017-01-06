<?php
require_once  '../../../config.php';
require_once  'public.php';
$cid = $_GET['cid'];
$user = new AdWordsUser();
$user->SetClientCustomerId($cid); 
$ConversionTrackerService = $user->GetService('ConversionTrackerService', ADWORDS_VERSION);
$selector = new Selector();
$selector->fields = array('Id','Name','ExcludeFromBidding','MostRecentConversionDate','LastReceivedRequestTime','OriginalConversionTypeId','ConversionTypeOwnerCustomerId');
$graph = $ConversionTrackerService->get($selector);
$b = false;
if($graph->totalNumEntries ==0){ //未申请
	echo "[\"{$cid}\",\"\",0]";
}else{
	foreach($graph->entries as $v){
		if($v->status == 'ENABLED'){
			$b = true;
			$obj = $v;
			break;
		}
	}
	if(!$b){
		echo "[\"{$cid}\",\"\",0]";
	}else{
		$graph = $obj;
		$name = $graph->name;
		if(isset($graph->mostRecentConversionDate) || isset($graph->lastReceivedRequestTime)){ //已安装
			echo "[\"{$cid}\",\"{$name}\",2]";
		}else if(!isset($graph->mostRecentConversionDate) && !isset($graph->lastReceivedRequestTime)){  //未验证
			echo "[\"{$cid}\",\"{$name}\",1]";
		}
	}
}
?>

