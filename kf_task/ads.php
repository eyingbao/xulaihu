<?php
require_once 'config.php';
$con['115'] = mysqli_connect($db['115']['host'],$db['115']['user'],$db['115']['pwd'],$db['115']['db']);
if (!$con['115'])
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_query($con['115'],"SET NAMES utf-8");
$result = mysqli_query($con['115'],"SELECT `account_id` FROM `ads_mcc` WHERE `canManageClients` = 0 AND status = 1");
$list = array();
$dirs = TASK_JAVA_DIR."accountids.txt";
if(file_exists($dirs)){
	unlink($dirs);
}
$myfile = fopen($dirs, "w") or die("Unable to open file!");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
  $txt = $row['account_id']."\r\n";
  fwrite($myfile, $txt);
}
fclose($myfile);
?>