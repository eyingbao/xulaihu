<?php
//echo 3;
//exit;
require_once  '../init.php';
$GLOBALS['arr'] = array(
	'level'=>0,
	'list'=>array()
);
//$GLOBALS['level'] = 0;

//$arr['id'] = 0;
//$arr['children'] = array();

try {
// Get AdWordsUser from credentials in "../auth.ini"
// relative to the AdWordsUser.php file's directory.
//$user = new AdWordsUser();
$user = new AdWordsUser();
$user->SetClientCustomerId('376-046-0982'); 
$managedCustomerService =
      $user->GetService('ManagedCustomerService', ADWORDS_VERSION);
	
$selector = new Selector();
	
$selector->fields = array('CustomerId', 'Name','CompanyName','CurrencyCode','TestAccount','AccountLabels','CanManageClients');
 
// Make the get request.
$graph = $managedCustomerService->get($selector);

//print_r($graph);
//exit;


// Display serviced account graph.
if (isset($graph->entries)) {
	// Create map from customerId to parent and child links.
	$childLinks = array();
	$parentLinks = array();
	if (isset($graph->links)) {
	  foreach ($graph->links as $link) {
		$childLinks[$link->managerCustomerId][] = $link;
		$parentLinks[$link->clientCustomerId][] = $link;
	  }
	}
	// Create map from customerID to account, and find root account.
	$accounts = array();
	$rootAccount = NULL;
	foreach ($graph->entries as $account) {
	  $accounts[$account->customerId] = $account;
	  if (!array_key_exists($account->customerId, $parentLinks)) {
		$rootAccount = $account;
	  }
	}
	// The root account may not be returned in the sandbox.
	if (!isset($rootAccount)) {
	  $rootAccount = new Account();
	  $rootAccount->customerId = 0;
	}
	// Display account tree.
	//print "(Customer Id, Account Name)\n";
  DisplayAccountTree($rootAccount, NULL, $accounts, $childLinks, 0,0);
	
	//echo '[{"a":3}]';
	echo json_encode($GLOBALS['arr']);
	
	//print_r();

} else {
	print "No serviced accounts were found.\n";
}

	
  
  
} catch (Exception $e) {
  printf("An error has occurred: %s\n", $e->getMessage());
}



function DisplayAccountTree($account, $link, $accounts, $links,$depth,$i){
	 //echo $depth.'<br />';
	
	if($depth > $GLOBALS['arr']['level']){
		$GLOBALS['arr']['level'] = $depth;
	}
	
	$arr['customerId'] = $account->customerId;
	$arr['name'] = $account->name;
	$arr['companyName'] = $account->companyName;
	$arr['currencyCode'] = $account->currencyCode;
	
	$arr['testAccount'] = $account->testAccount;
	$arr['accountLabels'] = $account->accountLabels;
	$arr['canManageClients'] = $account->canManageClients;
	
	
	$arr['level'] = $depth;
	$arr['pid'] = ($depth - $i);
	//switch($depth - $i)
	
	
	array_push($GLOBALS['arr']['list'],$arr);
	
	if (array_key_exists($account->customerId, $links)) {
		//$arr['id'] = $account->customerId;
		
		foreach ($links[$account->customerId] as $childLink) {
		  $childAccount = $accounts[$childLink->clientCustomerId];
		  //$i++;
		 $childAccount = $accounts[$childLink->clientCustomerId];
     	 DisplayAccountTree($childAccount, $childLink, $accounts, $links,
          $depth +1,$depth);
		}

	}
	
	//return $arr;
}

?>