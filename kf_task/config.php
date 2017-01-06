<?php
	define('VER','v201607'); //PHP语言adwordsapi版本号，目前最新v201607 
	define('phpAdsGa_CLIENT_ID',''); //phpAdsGa项目ID
	define('phpAdsGa_CLIENT_SECRET','');  //phpAdsGa项目秘钥	
	define('phpAdsGa_REFRESH_TOKEN',''); //phpAdsGa项目 refresh_token
	define('DOMAIN_TASK','http://localhost/kf_task');  //系统php执行的域名访问路径
	define('DOMAIN_PC','http://localhost/kfpc');  //系统后台管理域名访问路径
	define('TASK_JAVA_DIR','D:\clone\aw-reporting\\'); //aw-reporting文件夹所在的硬盘路径
	define('TASK_PHP_DIR','D:\wamp\www\kf_task\\'); //kf_task文件夹所在硬盘路径
	//aw-reporting数据配置信息
	$db['51'] = array(
		'host'=>'',
		'user'=>'',
		'pwd'=>'',
		'db'=>''
	);
	
	//pc后台数据库配置信息
	$db['115'] = array(
		'host'=>'',
		'user'=>'',
		'pwd'=>'',
		'db'=>''
	);
?>