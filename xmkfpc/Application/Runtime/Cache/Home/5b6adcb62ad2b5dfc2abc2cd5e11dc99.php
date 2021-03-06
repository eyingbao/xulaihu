<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="signup no-js" lang="" >

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <!-- /meta -->

    <title>Google AdWords API 广告管理系统</title>

    <!-- page level plugin styles -->
    <!-- /page level plugin styles -->

    <!-- core styles -->
    <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/font-awesome.css">
    <link rel="stylesheet" href="/Public/css/themify-icons.css">
    <link rel="stylesheet" href="/Public/css/animate.min.css">
    <!-- /core styles -->

    <!-- template styles -->
    <link rel="stylesheet" href="/Public/css/skins/palette.css">
    <link rel="stylesheet" href="/Public/css/fonts/font.css">
    <link rel="stylesheet" href="/Public/css/main.css">
    <!-- template styles -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- load modernizer -->
    <script src="/Public/plugins/modernizr.js"></script>
    <script src="/Public/plugins/jquery-1.11.1.min.js"></script>
</head>

<body class="bg-info" style="overflow-x:hidden;"> 
    <div class="center-wrapper">
        <div class="center-content">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div style="font-size:15px; text-align:center; font-family:'微软雅黑'; margin-bottom:10px;">Google AdWords API 广告管理系统</div>
                    <section class="panel bg-white no-b">
                        <!--<ul class="switcher-dash-action">
                            <li><a href="signin.html" class="selected">Sign in</a></li>
                            <li class="active"><a href="#" class="">New account</a></li>
                        </ul>-->
                        
                        <div class="p15">  
                            <!--<form role="form" action="signin.html">-->
                                <input type="text" class="form-control input-lg mb25" placeholder="账户" autofocus>
                                
                                <input type="password" class="form-control input-lg mb25" placeholder="密码">
                                
                                <div class="show">
                                    <label class="checkbox">
                                        <input type="checkbox" value="remember-me" id="checked" checked>记住
                                    </label>
                                </div>
                                
                                <button class="btn btn-primary btn-lg btn-block" type="submit" id="submit" onClick="login(this)">登录</button>
                            <!--</form>-->
                        </div>
                    </section>
                    <p class="text-center">
                        版权所有 &copy;
                        <span id="year" class="mr5"></span>
                        <span>易营宝信息科技（北京）有限公司</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
       /* var el = document.getElementById("year"),
            year = (new Date().getFullYear());
        el.innerHTML = year;*/
		
		var isLogin = false;
		
		function emailCheck(val) {  
    
			//var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;  
			
			//var pattern =/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			//var pattern =/^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z-]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]|net|NET|asia|ASIA|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT|cn|CN|cc|CC)$/;
			//if (!pattern.test(val)) {  
			   
			   
				//return false;  
			//}  
			//return true;  
		}  
		
		
		
		function login(obj){
			if(!isLogin){
				var email = $('[type = text]').val();
				var pwd = $('[type= password]').val();
				var checked = document.getElementById('checked').checked?1:0;
				
				//console.log(email,pwd,checked);
				
				if(email.length < 5 || email.length>30){
					
					alert('登录账号在5-30位之间');
					
				}else{
					if(pwd.length <6 || pwd.length>10){
						
						alert('密码在6-10位之间');	
					}else{
						isLogin = true;
						$(obj).attr('disabled',true).html('Loging...');
						$.ajax({
							type: "POST",
							url: "/Login",
							data: {"email":email,"pwd":pwd,"remember":checked},
							dataType: "json",
							success: function(data){
							  if(data.suc){
									window.location.href='/';				
								}else{
									isLogin = false;
									$(obj).attr('disabled',false).html('登录');
									alert(data.msg);	
								}
							}
						});
						
							//console.log(name,pwd);
					}
				
				}
			}else{
				alert('正在登录，请稍后...');	
			}
		}
		
		
	document.onkeydown=keyDownSearch;  
      
    function keyDownSearch(e) {    
        // 兼容FF和IE和Opera    
        var theEvent = e || window.event;    
        var code = theEvent.keyCode || theEvent.which || theEvent.charCode;    
        if (code == 13) {    
			//if(!isLogin){
            	login(document.getElementById('submit'));//具体处理函数 
		//	}
            return false;    
        }    
        return true;    
    }
		
    </script>
</body>

</html>