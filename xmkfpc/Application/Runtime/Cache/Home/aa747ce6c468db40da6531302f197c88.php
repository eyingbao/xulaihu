<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js" lang="">
<head>
<!-- meta -->
<meta charset="utf-8">
<meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<!-- /meta -->

<title>Google AdWords API 广告管理系统</title>

<!-- page level plugin styles -->
<link rel="stylesheet" href="/Public/plugins/table-sortable/theme.css">
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

<!-- base.css-->

<link rel="stylesheet" href="/Public/css/base.css">
<!-- base.css-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="/Public/css/jquery-ui.css">

<!-- load modernizer -->
<script src="/Public/plugins/modernizr.js"></script>
<script src="/Public/plugins/jquery-1.11.1.min.js"></script>
<script src="/Public/js/jquery-ui.js"></script>
<script type="text/javascript" src="/Public/js/Chart.js"></script>
<script src="/Public/js/adwords.js?v=22.0"></script>
<script type="text/javascript">
		var ads = new Adwords('<?php echo ($cc2); ?>');
		
		
	
	</script>
<style type="text/css">
/*---滚动条默认显示样式--*/  
::-webkit-scrollbar-thumb{  
   background-color:#666;  
   height:50px;  
   outline-offset:-2px;  
   outline:2px solid #fff;  
   -webkit-border-radius:4px;  
   border: 1px solid #fff;  
}  
 
/*---鼠标点击滚动条显示样式--*/  
::-webkit-scrollbar-thumb:hover{  
   background-color:#FB4446;  
   height:50px;  
   -webkit-border-radius:7px;  
}  
 
/*---滚动条大小--*/  
::-webkit-scrollbar{  
   width:5px;  
   height:8px;  
}  
 
/*---滚动框背景样式--*/  
::-webkit-scrollbar-track-piece{  
   background-color:#fff;  
   -webkit-border-radius:0;  
}

.l1{color:red;}
.l2{color:#F93;}
.l3{color:#0C6;}
.table-striped > tbody > tr:nth-child(even) > td, .table-striped > tbody > tr:nth-child(even) > th{background:none;}

.blsa{
	cursor:pointer;
}
.bls1:after {
	
    content: " ↓";
}

.bls2:after {
    content: " ↑";
}

#mask {
	width: 100%;
	height: 100%;
	position: fixed;
	background: #000;
	z-index: 99999;
	filter: alpha(opacity=70); /*IE滤镜，透明度50%*/
	-moz-opacity: 0.7; /*Firefox私有，透明度50%*/
	opacity: 0.7;/*其他，透明度50%*/
	display: none;
}
#loading {
	position: fixed;
	left: 0;
	top: 0;
	right: 0;
	bottom: 0;
	margin: auto;
	z-index: 999999;
	display: none;
}
.info_tit {
	height: 25px;
	font-size: 13px;
	color: #fff;
	line-height: 25px;
	text-align: center;
	width: 97%;
	margin: 0 auto;
}
#collect .mains {
	position: relative;
overflow:;
	margin: 10px;
	min-height: 45px;
}
#search_cid {
	height: 30px;
	line-height: 2px;
	display: none;
	float: left;
	margin-left: 5px;
}
.bls1:after {
    content: " ↓";
}

.bls2:after {
    content: " ↑";
}

#sugtable td{vertical-align:middle;}

#sugtable{display:none;}
.reds{color:red;}
.greens{color:green;}

.ll3{color:#0C6;}
.ll2{color:#F93;}
.ll1{color: red;}
.lc{color:#ccc;}
</style>
<script type="text/javascript">
$(function() {
	 $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }

                         

            $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
	
	
    $( "#datepicker,#datepicker2").datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
	
	$('[name = dod]').on('click',function(){
		console.log($(this).val());
		 $('#downs').attr('data-src',$(this).val());
	})
	//window.frames['downs'].onload = function(){
//isOnLoad = false;// 加载完成 
		//alert('load success'); 
	//}; 
	
	/*window.frames['downs'].onreadystatechange = function(){ 
if (iframe.readyState == "complete"){ 
alert("Local iframe is now loaded."); 
} 
}; */

//console.log(document.downs.document.readyState);
  });


var timer = null;
function tog(obj){
	var i = $(obj).parent();
	if(i.hasClass('open')){
		window.clearTimeout(timer);
		timer = window.setTimeout(function(){
			$(obj).next().find('button').hide();
			$(obj).next().find('span').hide();
		},1);
		
	}else{
	window.clearTimeout(timer);
		timer = window.setTimeout(function(){
			$(obj).next().find('button').show();
			$(obj).next().find('span').show();
		},140);
	}
}


function btnSearch(obj){
	var input = $(obj).parent().find('input');
	var patt1 = new RegExp(/^([0-9]{3}-[0-9]{3}-[0-9]{4})$/);
	$(obj).attr('disabled',true);
	$(obj).html('loading...');
	if(patt1.test(input.val())){ //cid
		//console.log('cid');
		$.ajax({
			type: "GET",
			url: "/Customer/getList",
			data: {"mcc":input.val()},
			dataType: "json",
			success: function(data){
			  if(data.suc){
					$('#searchModal').modal("show");	
					$('#custom_list').html(data.msg);
					
				}else{
					alert(data.msg);	
				}
			}
    	});
	
	
	}else{ //模糊搜素
		$.ajax({
			type: "GET",
			url: "/Customer/getList",
			data: {"title":input.val()},
			dataType: "json",
			success: function(data){
			  if(data.suc){
				  	$('#custom_list').html(data.msg);
					$('#searchModal').modal("show");			
				}else{
					alert(data.msg);	
				}
			}
    	});
		//input.attr('disabled',true);
		
		//console.log('kw');
	}
	
	
	
	$(obj).attr('disabled',false);
	$(obj).html('确认');
	
	
	//var val = $('[name = head]:checked').val();
	//console.log(val);
	/*if(val==1){
		searchCid(obj)
	}else{
		
		//var str = "Visit W3School";
		var patt1 = new RegExp(/^([0-9]{3}-[0-9]{3}-[0-9]{4})$/);
		//console.log(val);
		
		$.ajax({
			type: "POST",
			url: "/Search",
			data: {"mcc":input.val()},
			dataType: "json",
			complete:function(data){
				$(obj).attr('disabled',false);
		//input.attr('disabled',true);
				$(obj).html('确认');
			},
			success: function(data){
			  if(data.suc){
				  $('#myModal').modal("show");
				   $('#myModalLabel').html('下载报表 -'+data.msg);
				   
				   $('#downs').attr('data-src','/Download');
				   $('#downs').attr('data-name',data.msg);
				   $('#downs').attr('data-cid',input.val());
				   
				   
				//ads.getInfo(input.val(),data.msg);				
			  }else{
				 alert(data.msg);  
			  }
			}
    	});
		
	}*/
	
	
}


function downloads(){
	//window.frames['downs'].src = '/Download';
	
	var src = $('#downs').attr('data-src');
	var name = $('#downs').attr('data-name');
	
	var d1 =  $('#datepicker').val().replace(/-/g,'');
	var d2 = $('#datepicker2').val().replace(/-/g,'');
	
	var cid = $('#downs').attr('data-cid');
	//console.log(cid);
	
		
	

		console.log(src);
	if(src == 'mh'){
		//var url = encodeURIComponent('http://kf.sinoim.com/Home/Reports?cid='+cid);
		var url ='<?php echo ($DOMAIN_PC); ?>/Home/Reports?cid='+cid
		//$("#downs").attr('src','http://crm.sinoim.com/newcrm/pdf?url='+url+'&name=hello'); 
		//console.log('http://crm.eyingbao.com/newcrm/pdf?url='+url+'&name='+cid)
		//window.open('http://crm.eyingbao.com/newcrm/pdf?url='+url+'&name='+cid);  
		window.open(url,"_blank"); 
		   
	}else{
		ads.showLoad(true);
		$("#downs").attr('src',src+'?tit='+name+'&d1='+d1+'&d2='+d2+'&mcc='+cid); 
		window.setTimeout(function(){
			isComplate();
		},500);
	
	}
	
	
	
		
}

function searchCid(obj){
	//var val = $(obj).parent().find('input').val();
	var input = $(obj).parent().find('input');
	//var str = "Visit W3School";
	var patt1 = new RegExp(/^([0-9]{3}-[0-9]{3}-[0-9]{4})$/);

	if(patt1.test(input.val())){
		$(obj).attr('disabled',true);
		//input.attr('disabled',true);
		$(obj).html('loading...');
		
		$.ajax({
			type: "POST",
			url: "/Search",
			data: {"mcc":input.val()},
			dataType: "json",
			complete:function(data){
				$(obj).attr('disabled',false);
		//input.attr('disabled',true);
				$(obj).html('确认');
			},
			success: function(data){
			  if(data.suc){
				ads.getInfo(input.val(),data.msg);				
			  }else{
				 alert(data.msg);  
			  }
			}
    	});
		
		
		
		
	}else{
		alert('请输入正确客户id');	
	}

	//console.log(val.search(/[0-9]{3}-[0-9]{3}-[0-9]{4}/)); 
	//console.log(result);
}

function isComplate(){
	$.ajax({
    	type: "POST",
        url: "/Complate",
        dataType: "json",
        success: function(data){
          if(data.suc){
				ads.showLoad(false);
				//alert(data.msg);			
			}
        }
    });	
}

</script>
</head>

<!-- body -->

<body>
<div class="cssload-container" id="loading">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="mask"></div>



<div class="modal fade" id="iptcustomerModal" tabindex="-1" role="dialog" aria-labelledby="iptcustomerModal" >
  <div class="modal-dialog" role="document" data-width="400px" data-height="500px" style="width:430px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="iptcustomerModalLabel">客户导入</h4>
      </div>
      <div class="modal-body" style="padding-bottom:20px;"> 
       下载此<a href="/Public/csv/template.csv" download="template.csv" style="color:#36F; text-decoration:underline;">客户信息模板</a>按照此格式进行填写，填写完成上传导入即可。
       <br /><br />
       <input type="file" id="csvfile" accept=".csv" />
      </div>
     <div class="modal-footer"> 
         <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
       <button type="button" class="btn btn-primary"  style="width:80px;" data-lock="0" onClick="ads.iptcustomer('post',this)">开始导入</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" >
  <div class="modal-dialog" role="document" data-width="400px" data-height="500px" style="width:430px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="searchModallLabel">选择账户</h4>
      </div>
      <div class="modal-body" style="padding-bottom:20px;"> 
       <select style="height:35px; display:block; margin-bottom:10px; width:100%;" id="methods">
        	<option value="1" >预警查看</option>
            <option value="3" selected>指标优化建议</option>
            <option value="2">下载</option>
        </select>
      	<select style="height:35px;display:block;width:100%;" id="custom_list">
        	<!--<option selected>140801山东海工机械cky</option>-->
        </select>
      </div>
     <div class="modal-footer"> 
         <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
       <button type="button" class="btn btn-primary"  style="width:80px;" onClick="searchSel($('#methods').val(),$('#custom_list').val(),$('#custom_list option:selected').html())">确定</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" data-width="400px" data-height="500px" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">账户管理</h4>
      </div>
      <div class="modal-body"> </div>
      <div class="modal-footer"> 
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
        <button type="button" class="btn btn-primary" id="oks" style="width:80px;" onClick="">确定</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" data-width="700px" data-height="500px" style="width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">下载报表</h4>
      </div>
      <div class="modal-body" style="height:140px;">
        <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;" width="100%">
          <tr height="50">
            <td align="left"><span>起始日期:
              <input type="text" id="datepicker" value="<?php echo date('Y-m-d' , strtotime('-1 day')); ?>">
              </span>&nbsp;&nbsp;至&nbsp;&nbsp;<span>结束日期:
              <input type="text" id="datepicker2" value="<?php echo date('Y-m-d' , strtotime('-1 day')); ?>">
              </span></td>
          </tr>
          <tr height="50">
            <td><table align="center"  width="100%" border="0" cellpadding="0" bordercolor="#eeeeee" cellspacing="0" style="margin:15px 0 0 0; text-align:left; border-collapse:collapse;">
                <tr>
                  
                    
                    
                 <!-- <td><input type="radio" name="dod" id="dod1"  checked  value="/Customer/keywords" />
                    &nbsp;
                    <label for="dod1">关键词报告</label></td>
                  <td><input type="radio" name="dod" id="dod2" value="/Customer/searchKeyword" />
                    &nbsp;
                    <label for="dod2" >搜索字词报告</label></td>
                  <td><input type="radio" name="dod" id="dod3"   value="/Customer/dates"  />
                    &nbsp;
                    <label for="dod3">账户日报</label></td>
                  <td><input type="radio" name="dod" id="dod4"    value="/Customer/geo"  />
                    &nbsp;
                    <label for="dod4" >地理位置报告</label></td>-->
                    
                    <td><input type="radio" name="dod" id="dod5" checked   value="mh" />
                    &nbsp;
                    <label for="dod5">月报下载1</label></td>
                    
                    
                </tr>
              </table></td>
          </tr>
        </table>
        <iframe style="display:none" name="downs" id="downs" data-src="mh" data-name="" data-cid=""></iframe>
      </div>
      <div class="modal-footer"> 
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
        <button type="button" class="btn btn-primary" id="downloads" style="width:80px;" onClick="downloads()">下载</button>
        
        <!-- <a  class="btn btn-primary" id="downloads" href="http://adwords.cn/Download/dates?tit=2015530%E9%9D%92%E5%B7%9E%E5%B8%82%E9%BB%84%E6%A5%BC%E6%B0%B8%E5%88%A9%E7%9F%BF%E7%A0%82%E6%9C%BA%E6%A2%B0%E5%88%B6%E9%80%A0%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&d1=20150921&d2=20150921&cid=426-693-9114" download="预算表.csv" style="width:80px; display:inline-block;" onClick="isComplate()">下载</a>--> 
      </div>
    </div>
  </div>
</div>

<style type="text/css">
.nav-tabs {


    
}
.nav-tabs > li {
   
}

th{border:1px solid #fff;}
</style>

<div class="modal fade" id="suggestModal" tabindex="-1" role="dialog" aria-labelledby="suggestModalLabel" style="display:none;">
	<div class="modal-dialog" role="document" data-width="400px"  style="width:650px;">
		<div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" style="display:none;" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="suggestModalLabel">指标优化建议</h4>
            </div>
            <div class="modal-body" style="height:240px; overflow:;">
            
            <div class="gallery-loader"><div class="loader"></div></div>
            
            
            <ul id="myTab" class="nav nav-tabs" style="display:none">
               <li class="active"  style="width:24.9%; text-align:center;"><a href="#account_tab"  data-toggle="tab">账户端</a></li>
               <li style="width:24.9%; text-align:center;"><a href="#campaign_tab" data-toggle="tab">广告系列</a></li>
               <li style="width:24.9%; text-align:center;"><a href="#adgroup_tab" data-toggle="tab">广告组</a></li>
               <li style="width:24.9%; text-align:center;"><a href="#ga_tab" data-toggle="tab">GA网站数据</a></li>
              <!-- <li style="width:21.9%; text-align:center;"><a href="#pc_tab" data-toggle="tab">CRM库服务记录</a></li>-->
   			</ul>
            
        	<div id="myTabContent" class="tab-content" style="display:none">
           		<div class="tab-pane fade in active" id="account_tab">
                	<table class="table table-bordered table-striped" style="margin-top:10px;">
                    	<tbody>
             				<tr>
                            	<th style="border-top:1px solid #fff; text-align:; width:120px;">指标名称</th>
                                <th style="border-top:1px solid #fff;text-align:center;">指标值</th>
                                <th style="border-top:1px solid #fff;text-align:center;">等级</th>
                                <th style="border-top:1px solid #fff;text-align:center;">账户分值</th>
                            </tr>
                            <tr>
                            	<td>消耗异常</td>
                               	<td style="text-align:center;" class="costErr"></td>
                               	<td style="text-align:center;" class="costErr"></td>
                               <td style="text-align:center;" class="costErr"></td>
                             </tr>
           					 <tr>
                            	<td style=" " >续费提醒</td>
                               	<td style="text-align:center;" class="renewals"></td>
                               	<td style="text-align:center;" class="renewals"></td>
                               	<td style="text-align:center;" class="renewals"></td>
                             </tr>
                             <tr>
                            	<td style="">日预算预警</td>
                               	<td style="text-align:center;" class="budgetErr"></td>
                               	<td style="text-align:center;" class="budgetErr"></td>
                              
                               	<td style="text-align:center;" class="budgetErr"></td>
                             </tr>
            			</tbody>
                    </table>
           
           		</div>
                
                <div class="tab-pane fade" id="campaign_tab">
                	<table class="table table-bordered table-striped" style="margin-top:10px;">
                    	<tbody>
             				<tr>
                            	<th style="border-top:1px solid #fff; text-align:; width:220px;">指标名称</th>
                                <th style="border-top:1px solid #fff;text-align:center;">指标值</th>
                                <th style="border-top:1px solid #fff;text-align:center;">等级</th>
                                <th style="border-top:1px solid #fff;text-align:center;">账户分值</th>
                            </tr>
                            <tr>
                            	<td>转化次数对比</td>
                               	<td style="text-align:center;" class="convers"></td>
                               	<td style="text-align:center;" class="convers"></td>
                               <td style="text-align:center;" class="convers"></td>
                             </tr>
           					 <tr>
                            	<td style=" " >投放渠道</td>
                               	<td style="text-align:center;" class="delivery"></td>
                               	<td style="text-align:center;" class="delivery"></td>
                               	<td style="text-align:center;" class="delivery"></td>
                             </tr>
                             <tr>
                            	<td style="">平均点击率（仅限搜索广告）</td>
                               	<td style="text-align:center;" class="campaignCtr"></td>
                               	<td style="text-align:center;" class="campaignCtr"></td>
                              
                               	<td style="text-align:center;" class="campaignCtr"></td>
                             </tr>
            			</tbody>
                    </table>
                
         
           		</div>
                <div class="tab-pane fade" id="adgroup_tab">
                	<table class="table table-bordered table-striped" style="margin-top:10px;">
                    	<tbody>
             				<tr>
                            	<th style="border-top:1px solid #fff; text-align:; width:220px;">指标名称</th>
                                <th style="border-top:1px solid #fff;text-align:center;">指标值</th>
                                <th style="border-top:1px solid #fff;text-align:center;">等级</th>
                                <th style="border-top:1px solid #fff;text-align:center;">账户分值</th>
                            </tr>
                            <tr>
                            	<td>关键词质量得分</td>
                               	<td style="text-align:center;" class="kwPoint"></td>
                               	<td style="text-align:center;" class="kwPoint"></td>
                               <td style="text-align:center;" class="kwPoint"></td>
                             </tr>
           					 <tr>
                            	<td style=" " >关键词数量（搜索系列）</td>
                               	<td style="text-align:center;" class="kwCount"></td>
                               	<td style="text-align:center;" class="kwCount"></td>
                               	<td style="text-align:center;" class="kwCount"></td>
                             </tr>
                             
                             <tr>
                            	<td style="">广告语状态</td>
                               	<td style="text-align:center;" class="ref"></td>
                               	<td style="text-align:center;" class="ref"></td>
                               	<td style="text-align:center;" class="ref"></td>
                             </tr>
                             
                             <tr>
                            	<td style="">广告语条数</td>
                               	<td style="text-align:center;" class="adCount"></td>
                               	<td style="text-align:center;" class="adCount"></td>
                               	<td style="text-align:center;" class="adCount"></td>
                             </tr>
                             
            			</tbody>
                    </table>
                
         
           		</div>
                <div class="tab-pane fade" id="ga_tab">
                	<table class="table table-bordered table-striped" style="margin-top:10px;">
                    	<tbody>
             				<tr>
                            	<th style="border-top:1px solid #fff; text-align:; width:220px;">指标名称</th>
                                <th style="border-top:1px solid #fff;text-align:center;">指标值</th>
                                <th style="border-top:1px solid #fff;text-align:center;">等级</th>
                                <th style="border-top:1px solid #fff;text-align:center;">账户分值</th>
                            </tr>
                            <tr>
                            	<td>跳出率</td>
                               	<td style="text-align:center;" class="BounceRate"></td>
                               	<td style="text-align:center;" class="BounceRate"></td>
                               <td style="text-align:center;" class="BounceRate"></td>
                             </tr>
           					 <tr>
                            	<td style=" ">加载时间</td>
                               	<td style="text-align:center;" class="Loadtime"></td>
                               	<td style="text-align:center;" class="Loadtime"></td>
                               	<td style="text-align:center;" class="Loadtime"></td>
                             </tr>
                             
                             <tr>
                            	<td style="">停留时间</td>
                               	<td style="text-align:center;" class="Dwelltime"></td>
                               	<td style="text-align:center;" class="Dwelltime"></td>
                               	<td style="text-align:center;" class="Dwelltime"></td>
                             </tr>
                         </tbody>
                    </table>
                
         
           		</div>
                
                <div class="tab-pane fade" id="pc_tab">
         			<table class="table table-bordered table-striped" style="margin-top:10px;">
                    	<tbody>
             				<tr>
                            	<th style="border-top:1px solid #fff; text-align:; width:220px;">指标名称</th>
                                <th style="border-top:1px solid #fff;text-align:center;">指标值</th>
                                <th style="border-top:1px solid #fff;text-align:center;">等级</th>
                                <th style="border-top:1px solid #fff;text-align:center;">账户分值</th>
                            </tr>
                            <tr>
                            	<td>CRM库服务记录</td>
                               	<td style="text-align:center;" class="crmServerCount"></td>
                               	<td style="text-align:center;" class="crmServerCount"></td>
                               <td style="text-align:center;" class="crmServerCount"></td>
                             </tr>
           				</tbody>
                    </table>
           		</div>
                
   			</div>    
            
            
            
            </div>
            <div class="modal-footer" style="border-top:0px; padding:10px;"></div>
		</div>
    </div>
</div>

<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel">
  <div class="modal-dialog" role="document" data-width="400px"  style="width:1100px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newModalLabel"></h4>
       </div>
      <div class="modal-body" style="height:600px;">
      		
      		<div class="msel" style="width:1046px; margin:25px auto 0 auto;">
            	<h4 style="float:left; margin-left:10px; margin-right:10px;">预警查看</h4>
            	<select style=" height:30px;  display:block; float:left; margin-top:3px;" onChange="ysel(this)" id="ysels">
                    <option value="xftx">续费提醒</option>
                    <option value="tfqd">投放渠道</option>
                    <option value="ysb">系列消耗预算比X异常 (X>90% OR X < 60%)</option>
                    <option value="rcz">系列消耗日差值 Y 异常 (Y > 50 OR Y < -50)</option>
                    <option value="groupctr">广告组CTR <1% OR >3%</option>
                    <option value="adcount">广告语数量 X (X<1)</option>
                    <option value="adctr">广告语CTR</option>
                    <option value="kwzl">关键词质量</option>
                    <option value="ggyc">广告异常</option>
                    <option value="kwsl">关键词数量</option>
        		</select>
            </div>
            <div class="gallery-loader hide" id="load2" style="height:250px; top:57%;">
          			<div class="loader" style="top:51%;"></div>
        		</div>
           
            
            <div class="mercontent" style="padding:10px 0 0 0; margin:0  auto; position:; width:1046px; height:310px; overflow:auto;">
            	
                
                <div class="cont" style="width:99%;">
                
                	
                
                </div>
            
            </div>
      
       </div>
      <div class="modal-footer" style="border-top:0px; padding:10px;"> 
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
        <!--<button type="button" class="btn btn-primary" id="as" style="width:80px;" onClick="">确定</button>-->
      </div>
    </div>
  </div>
</div>
<script>


$(function(){
	
})


function ysel(obj){
	var val = obj.value;
	var cid = $('#custom_list').val() || cids;
	$.ajax({
    	type: "POST",
        url: "/Home/Alerted",
        data: {"cid":cid,'val':val},
		dataType:"json",
		complete: function(){
			obj.disabled = false;
		},
		beforeSend: function(){
			obj.disabled = true;
		},
		
		success: function(d){
			//$('#load2').addClass('hide');
			var html = yselhtml(d,val);
			//console.log(html);
			$('.mercontent').find('.cont').html(html);
		}
    });
	
	
	//console.log(val);
}

function yselhtml(data,type){
	var html = '';
	switch(type){
		case 'xftx': //续费提醒
			//html+='<div style="display: block; background: rgb(51, 153, 255);width:100%;" class="info_tit">续费提醒</div>';
			html+='<table class="table table-bordered table-striped no-m" id="budget_info" style=""><thead><tr><th style="text-align:center">近7天日均消耗</th><th style="text-align:center">余额</th><th style="text-align:center">可消耗天数</th></tr></thead><tbody><tr><td style="text-align:center;color:">￥'+data[0]+'</td><td style="text-align:center">￥'+data[1]+'</td><td style="text-align:center;color:">'+data[2]+'</td></tr></tbody></table></div>';
		break;
		
		case 'tfqd': //投放渠道
			//console.log(data,data[0]);
			
			var td = '';
			for(var i = 0 ; i < data.length; i++){
				td+='<td>'+ads.filterStatus(data[i])+'</td>';
			}
			//var tr = ads.filterStatus(data[0]);
		
			html += '<table class="table table-bordered table-striped no-m" id="deliveryChannel_info"><thead><tr><th style="text-align:center">PC搜索</th><th style="text-align:center">PC展示</th><th style="text-align:center">PC再营销</th><th style="text-align:center">移动搜索</th><th style="text-align:center">移动展示</th></tr></thead><tbody><tr align="center">'+td+'</tr></tbody></table>';	
		break;
		
		case 'ysb': //系列消耗预算比X异常 (X>90% OR X < 60%)
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>￥'+data[i]['budget']+'</td><td>￥'+data[i]['cost']+'</td><td>'+data[i]['per']+'%</td></tr>';
				}
				
				html+='<table class="table table-bordered table-striped no-m" id="campaignBudget_info"><thead><tr><th>系列名称</th><th style="text-align:center">预算</th><th style="text-align:center">花费</th><th style="text-align:center">异常比</th></tr></thead><tbody>'+trs+'</tbody></table>';
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';
			}
			
			
		break;
		
		case 'rcz': //系列消耗日差值 Y 异常 (Y > 20)
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i][0]+'</td><td>￥'+data[i][2]+'</td><td>￥'+data[i][1]+'</td><td>￥'+data[i][3]+'</td></tr>';
				}
				
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">前天消耗</th><th style="text-align:center">昨天消耗</th><th style="text-align:center">差值</th></tr></thead><tbody>'+trs+'</tbody></table>';
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';
			}
		
		//console.log(2);
		break;
		case 'groupctr': //广告组CTR <1% OR >3%
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['ctr']+'%</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">CTR</th></thead><tbody>'+trs+'</tbody></table>';
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		
		
		
		break;
		
		case 'adcount': //广告语数量 X (X<1)
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['c']+'</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">广告语数量</th></thead><tbody>'+trs+'</tbody></table>';
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		
		
		break;
		
		case 'adctr': //广告语CTR
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['headline']+'</td><td align="center">'+data[i]['ctr']+'</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">广告语</th><th style="text-align:center">CTR</th></thead><tbody>'+trs+'</tbody></table>';
				
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		
		break;
		
		case 'kwzl':  //关键词质量
			
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['criteria']+'</td><td align="center">'+data[i]['quality_score']+'</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">关键词</th><th style="text-align:center">得分</th></thead><tbody>'+trs+'</tbody></table>';
				
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		
		
		break;
		
		case 'ggyc': //广告异常
			if(data.length){  //HEADLINE
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['headline']+'</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">广告语</th></thead><tbody>'+trs+'</tbody></table>';
				
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		break;
		
		case 'kwsl': //关键词数量
			if(data.length){
				var trs = '';
				for(var i = 0 ; i < data.length; i++){
					trs+='<tr><td>'+data[i]['campaign_name']+'</td><td>'+data[i]['adgroup_name']+'</td><td align="center">'+data[i]['criteria']+'</td><td align="center">'+data[i]['c']+'</td></tr>';
				}
				html+='<table class="table table-bordered table-striped no-m"><thead><tr><th>系列名称</th><th style="text-align:center">组名称</th><th style="text-align:center">关键词</th><th style="text-align:center">数量</th></thead><tbody>'+trs+'</tbody></table>';
				
			}else{
				html+='<img src="/Public/images/success.png" width="40" style="position: absolute; left: 47%;top:70%;">';	
			}
		break;
	}
	
	return html;
}


$(function(){
	
	
})


function searchSela(){
	
	
}

function searchSelb(){
	
}

function searchSel(a,b,c){
	var cid = $('#custom_list').val();
	if(a == 1){ //查询
		/*$('#myModalLabel2').html(c);
		$('#closes2').hide();
		$('#infoModal').modal("show");
		ads.getInfo2(b,c);*/
		waring_view(cid);
		
	}else if(a == 2){ //下载
		$('#downs').attr('data-name',c);
		$('#downs').attr('data-cid',b);
		$('#myModal').modal("show");
	
	}else{ //预警查看
		
		suggest_view(cid);
		
	}
}

var cids;
function waring_view(cid){
	cids = cid;
	$.ajax({
			type: "POST",
			url: "/Home/Alerted/getFinfo",
			dataType:"json",
			data: {"cid":cid},
			success: function(d){
				$('#newModal  #newModalLabel').html(d['cname']);
				$('#newModal').modal({backdrop: 'static', keyboard: false});
				$('#newModal').modal("show");
				$('#newModal').find('#l30,canvas').remove();
				
				$('.msel').before('<h4  id="l30" style="padding-left:10px;">过去30天消耗示意图</h4><canvas id="cas2" height="50"></canvas>');
				ysel(document.getElementById("ysels"));
				var ctx = document.getElementById("cas2");
				//var dt1 = ["January", "February", "March", "April", "May", "June", "July"];
				//var dt2 = [65, 59, 80, 81, 56, 55, 40];
				
				var data = {
					labels: d['dt1'],
					datasets: [
						{
							data: d['dt2'],
							label: "消耗",
							fill: true,
							lineTension: 0.05,
							backgroundColor: "rgba(164,228,255,0.1)",
							borderColor: "#49c9f8",
							borderCapStyle: 'butt',
							borderDash: [],
							borderDashOffset: 0.0,
							borderJoinStyle: 'miter',
							pointBorderColor: "#009fda",//实心点
							pointBackgroundColor: "#fff", //实心点
							pointBorderWidth: 0.2,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "rgba(75,192,192,1)",
							pointHoverBorderColor: "rgba(220,220,220,1)",
							pointHoverBorderWidth: 1,
							pointRadius: 4,
							pointHitRadius: 20,
							spanGaps: false,
						}
					]
				}
				
				var chartInstance = new Chart(ctx, {
					type: 'line',
					data: data,
					options: {
						title: {
							display: false,
							text: 'Custom Chart Title'
						},
						legend: {
							display: false,
							labels: {
								fontColor: 'rgb(255, 99, 132)'
							}
						}
					}
				})
			}
		});
}

function suggest_view(cid){
	$.ajax({
		type: "POST",
		url: "/Home/Manager/getName",
		
		data: {"cid":cid},
		success: function(d){
			$('#suggestModal').modal({backdrop: 'static', keyboard: false});
			$('#suggestModal').modal("show");
			$('#suggestModal').find('#suggestModalLabel').html(d);
			$.ajax({
				type: "POST",
				url: "/Home/Alerted/suggest",
				dataType:"json",
				data: {"cid":cid},
				beforeSend: function(){
					$('#suggestModal').find('.gallery-loader').removeClass('hide');	
				},
				success: function(dd){
					
					//window.setTimeout(function(){
					$('#suggestModal').find('.gallery-loader').addClass('hide');
					$('#suggestModal').find('.tab-content').show();
					$('#suggestModal').find('.nav').show();
					$('#suggestModal').find('.close').show();
					
					
					$('.costErr:eq(0)').html(dd['costErr']['range']);
					$('.costErr:eq(1)').html(dd['costErr']['grade']);
					$('.costErr:eq(2)').html(dd['costErr']['point']);
					
					$('.renewals:eq(0)').html(dd['renewals']['range']);
					$('.renewals:eq(1)').html(dd['renewals']['grade']);
					$('.renewals:eq(2)').html(dd['renewals']['point']);
					
					$('.budgetErr:eq(0)').html(dd['budgetErr']['range']);
					$('.budgetErr:eq(1)').html(dd['budgetErr']['grade']);
					$('.budgetErr:eq(2)').html(dd['budgetErr']['point']);
					
					$('.delivery:eq(0)').html(dd['delivery']['range']);
					$('.delivery:eq(1)').html(dd['delivery']['grade']);
					$('.delivery:eq(2)').html(dd['delivery']['point']);
					
					$('.campaignCtr:eq(0)').html(dd['campaignCtr']['range']);
					$('.campaignCtr:eq(1)').html(dd['campaignCtr']['grade']);
					$('.campaignCtr:eq(2)').html(dd['campaignCtr']['point']);
					
					
					
					$('.kwPoint:eq(0)').html(dd['kwPoint']['range']);
					$('.kwPoint:eq(1)').html(dd['kwPoint']['grade']);
					$('.kwPoint:eq(2)').html(dd['kwPoint']['point']);
					
					$('.kwCount:eq(0)').html(dd['kwCount']['range']);
					$('.kwCount:eq(1)').html(dd['kwCount']['grade']);
					$('.kwCount:eq(2)').html(dd['kwCount']['point']);
					
					$('.adCount:eq(0)').html(dd['adCount']['range']);
					$('.adCount:eq(1)').html(dd['adCount']['grade']);
					$('.adCount:eq(2)').html(dd['adCount']['point']);
					
					$('.ref:eq(0)').html(dd['ref']['range']);
					$('.ref:eq(1)').html(dd['ref']['grade']);
					$('.ref:eq(2)').html(dd['ref']['point']);
					
					$('.BounceRate:eq(0)').html(dd['BounceRate']['range']);
					$('.BounceRate:eq(1)').html(dd['BounceRate']['grade']);
					$('.BounceRate:eq(2)').html(dd['BounceRate']['point']);
					
					$('.Loadtime:eq(0)').html(dd['Loadtime']['range']);
					$('.Loadtime:eq(1)').html(dd['Loadtime']['grade']);
					$('.Loadtime:eq(2)').html(dd['Loadtime']['point']);
					
					$('.Dwelltime:eq(0)').html(dd['Dwelltime']['range']);
					$('.Dwelltime:eq(1)').html(dd['Dwelltime']['grade']);
					$('.Dwelltime:eq(2)').html(dd['Dwelltime']['point']);
					
					$('.convers:eq(0)').html(dd['convers']['range']);
					$('.convers:eq(1)').html(dd['convers']['grade']);
					$('.convers:eq(2)').html(dd['convers']['point']);
					
					$('.crmServerCount:eq(0)').html(dd['crmServerCount']['range']);
					$('.crmServerCount:eq(1)').html(dd['crmServerCount']['grade']);
					$('.crmServerCount:eq(2)').html(dd['crmServerCount']['point']);
					$('#sugtable').show();
					
					//},100);
					
					
				}
			})
		}
	})
}
</script>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closes2"> <span aria-hidden="true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel2"></h4>
      </div>
      <div class="modal-body" style="overflow:auto;"> <img src="/Public/images/487.gif" width="50" id="collect_loading" style="position: fixed; left:0; top:0; right:0; bottom:0; margin:auto; display:none;" />
        <div class="gallery-loader" id="load2">
          <div class="loader" style="top:45%;"></div>
        </div>
        <div style="width:99%;" id="month_cost_info">
          <!--<canvas  height="50"></canvas>-->
          <table width="100%" id="collect" style=" border-collapse:collapse; display:none;" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="50%" valign="top" ><div style="background:#39F;" class="info_tit">续费提醒</div>
                <div  class="mains"> <img src="/Public/images/success.png" width="40" style=" position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="budget_info" style="display:none;">
                    <thead>
                      <tr>
                        <th style="text-align:center">近7天日均消耗</th>
                        <th style="text-align:center">余额</th>
                        <th style="text-align:center">可消耗天数</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
              <td width="50%" valign="top"><div style="background:#39F;" class="info_tit">投放渠道</div>
                <div  class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="deliveryChannel_info">
                    <thead>
                      <tr>
                        <th style="text-align:center">PC搜索</th>
                        <th style="text-align:center">PC展示</th>
                        <th style="text-align:center">PC再营销</th>
                        <th style="text-align:center">移动搜索</th>
                        <th style="text-align:center">移动展示</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
            </tr>
            <tr>
              <td width="50%" valign="top" ><div style="background:#F90;" class="info_tit">系列消耗预算比X异常 (X>90% OR X < 60%)</div>
                <div  class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="campaignBudget_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th style="text-align:center">预算</th>
                        <th style="text-align:center">花费</th>
                        <th style="text-align:center">异常比</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
              <td width="50%" valign="top"><div style="background:#F90;" class="info_tit">系列消耗日差值 Y 异常 (Y > 20)</div>
                <div class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="campaignCost_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th style="text-align:center">前天消耗</th>
                        <th style="text-align:center">昨天消耗</th>
                        <th style="text-align:center">差值</th>
                        <th style="text-align:center">差值比（>30%）</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
            </tr>
            <tr>
              <td width="50%" valign="top" ><div style="background:#39F;" class="info_tit">广告组CTR <1% OR >3%</div>
                <div  class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="ctr_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th>组名称</th>
                        <th style="text-align:center">CTR</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
              <td width="50%"  valign="top"><div style="background:#39F;" class="info_tit">广告语数量 X (X<1) </div>
                <div class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="adCount_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th>组名称</th>
                        <th style="text-align:center">广告语数量</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
            </tr>
            <tr>
              <td width="50%" valign="top" ><div style="background:#F90;" class="info_tit">广告语CTR</div>
                <div  class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="adCtr_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th>组名称</th>
                        <th>广告语</th>
                        <th style="text-align:center">CTR</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
              <td width="50%"  valign="top"><div style="background:#F90;" class="info_tit">关键词质量 </div>
                <div class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="keywords_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th>组名称</th>
                        <th>关键词</th>
                        <th style="text-align:center">质量得分</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
            </tr>
            <tr>
              <td width="50%" valign="top" ><div style="background:#39F;" class="info_tit">广告异常 </div>
                <div class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="adErr_info">
                    <thead>
                      <tr>
                        <th>系列名称</th>
                        <th>组名称</th>
                        <th style="text-align:center">状态</th>
                        <th>拒登原因</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
              <td width="50%"  valign="top"><div style="background:#39F;" class="info_tit">关键词数量</div>
                <div class="mains"> <img src="/Public/images/success.png" width="40" style="position:absolute; left:47%;display:none;" />
                  <table class="table table-bordered table-striped no-m" id="kwCount_info">
                    <thead>
                      <tr>
                        <th>广告系列</th>
                        <th>广告组</th>
                        <th style="text-align:center">关键词数量</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="app">
<!-- top header -->
<header class="header header-fixed navbar">
  <div class="brand"> 
    <!-- toggle offscreen menu --> 
    <a href="javascript:;" class="ti-menu off-left visible-xs" data-toggle="offscreen" data-move="ltr"></a> 
    <!-- /toggle offscreen menu --> 
    
    <!-- logo --> 
    <a href="index.html" class="navbar-brand"> <img src="/Public/img/logo.png" alt=""> <span class="heading-font"> Adwords管理系统 </span> </a> 
    <!-- /logo --> 
  </div>
  <ul class="nav navbar-nav">
    <li class="hidden-xs"> 
      <!-- toggle small menu --> 
      <a href="javascript:;" class="toggle-sidebar"> <i class="ti-menu"></i> </a> 
      <!-- /toggle small menu --> 
    </li>
    <li class="header-search"> 
      <!-- toggle search --> 
      <a href="javascript:;" class="toggle-search"> <i class="ti-search"></i> </a> 
      <!-- /toggle search -->
      <div class="search-container" style="width:500px;"> 
      
      <!--<span style="float:left; margin:0 10px; position:relative; top:3px; color:#fff; display:none;">
        <input type="radio" value="1" name="searcht" id="search1" checked />
        <label for="search1">关键词</label>
        &nbsp;
        <input id="search2" type="radio" name="searcht" value="2"  />
        <label for="search2">CID</label>
        </span>-->
        <form role="search" style=" float:left; width:160px;">
          <input type="text" class="form-control search"   placeholder="请输入CID或关键词">
        </form>
        <!--<span style="float:left; margin:0 10px; position:relative; top:3px; color:#fff; display:none;">
        <input type="radio" value="1" name="head" id="head1" checked />
        <label for="head1">查询</label>
        &nbsp;
        <input id="head2" type="radio" name="head" value="2"  />
        <label for="head2">下载</label>
        </span>-->
        <button type="button" class="btn btn-success" id="search_cid" style="display:inline-block; float:left;" onClick="btnSearch(this)">确认</button>
      </div>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li class="off-right"> <a href="javascript:;" data-toggle="dropdown"> <img src="/Public/img/faceless.jpg" class="header-avatar img-circle" alt="user" title="user"> <span class="hidden-xs ml10"><?php echo $_SESSION[mcc][nickname]; ?></span> <i class="ti-angle-down ti-caret hidden-xs"></i> </a>
      <ul class="dropdown-menu animated fadeInRight">
        <li> <a href="javascript:void(0);" onClick="ads.editPwd2('GET')"><i class="fa fa-key"></i>&nbsp;修改密码</a> </li>
        <li> <a href="/Login/logout"><i class="fa fa-sign-out"></i>&nbsp;安全退出</a> </li>
      </ul>
    </li>
  </ul>
</header>
<!-- /top header -->
	<section class="layout">
            <!-- sidebar menu -->
            <aside class="sidebar offscreen-left">
                <!-- main navigation -->
                <nav class="main-navigation" data-height="auto" data-size="6px" data-distance="0" data-rail-visible="true" data-wheel-step="10">
                    <p class="nav-title">栏目</p>
                    <ul class="nav">
                     	
                        <?php if(is_array($columnList)): $i = 0; $__LIST__ = $columnList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["controller"] == $cc): ?><li class="open">
                                <a href="javascript:;"  class="active">
                                    <i class="toggle-accordion"></i>
                                     <i class="<?php echo ($vo["icon"]); ?>"></i>
                                    <span><?php echo ($vo["name"]); ?></span>
                                </a>
                                <ul class="sub-menu">
                                <?php if(is_array($vo['children'])): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i; if($sub["controller"] == 'Home/AdGroup/index'): ?><li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                                
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                              		
                                    <?php elseif($sub["controller"] == 'Home/Campaign/index'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                    <?php elseif($sub["controller"] == 'Home/AdGroup/keywordsErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>    
                                        
                                    <?php elseif($sub["controller"] == 'Home/Mcc/deliveryChannel'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>        
                                    
                                    
                                    <?php elseif($sub["controller"] == 'Home/Campaign/costErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[2][value]); ?>&disabled=1">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                        
                                    <?php elseif($sub["controller"] == 'Home/Mcc/index'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                        
                                      <?php elseif($sub["controller"] == 'Home/Mcc/monthCost'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[5][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>      
                                        
                                        <?php elseif($sub["controller"] == 'Home/AdGroup/adCtrErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[4][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>      
                                   
                                    <?php elseif($sub["controller"] == 'Home/AdGroup/adCountErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                        
                                    <?php elseif($sub["controller"] == 'Home/Mcc/active'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[5][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>    
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/tools'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                        <?php elseif($sub["controller"] == 'Home/Campaign/conversionsContrast'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                        <?php elseif($sub["controller"] == 'Home/Campaign/cpaContrast'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                              
                                    <?php elseif($sub["controller"] == 'Home/Mcc/olsa'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                
                            	</ul>
                                
                            </li>
                            
                            <?php else: ?>
                            
                            <li>
                                <a  href="javascript:;">
                                    <i class="toggle-accordion"></i>
                                     <i class="<?php echo ($vo["icon"]); ?>"></i>
                                    <span><?php echo ($vo["name"]); ?></span>
                                </a>
                                <ul class="sub-menu">
                                <?php if(is_array($vo['children'])): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i; if($sub["controller"] == 'Home/AdGroup/index'): ?><li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                        
                                     <?php elseif($sub["controller"] == 'Home/Campaign/index'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                     <?php elseif($sub["controller"] == 'Home/AdGroup/keywordsErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/deliveryChannel'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>        
                              		
                                    
                                    <?php elseif($sub["controller"] == 'Home/Campaign/costErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[2][value]); ?>&disabled=1">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/index'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>    
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/monthCost'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[5][value]); ?>">
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>    
                                        
                                      <?php elseif($sub["controller"] == 'Home/AdGroup/adCtrErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[4][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>        
                                        
                                        <?php elseif($sub["controller"] == 'Home/AdGroup/adCountErr'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>    
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/active'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[5][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>   
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/tools'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>  
                                        
                                        <?php elseif($sub["controller"] == 'Home/Campaign/conversionsContrast'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>  
                                         
                                        <?php elseif($sub["controller"] == 'Home/Campaign/cpaContrast'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[3][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>        
                                        
                                        <?php elseif($sub["controller"] == 'Home/Mcc/olsa'): ?>
                                    	<li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>?date=<?php echo ($dateList[1][value]); ?>&disabled=1">
                                          
                                               <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li>         
                                    
                                    <?php else: ?>
                                        <li>
                                            <a  href="/<?php echo ($sub["controller"]); ?>">
                                                <?php if($sub["controller"] == $cc1): ?><span style="color:#63D5FF;"><?php echo ($sub["name"]); ?></span>
                                           		<?php else: ?>
                                               	 	<span><?php echo ($sub["name"]); ?></span><?php endif; ?>
                                            </a>
                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                
                            	</ul>
                                
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    
                    
                    
                   
                </nav>
            </aside>
            <!-- /sidebar menu -->

            <!-- main content -->
            <section class="main-content">

                <!-- content wrapper -->
                <div class="content-wrap">

                    <!-- inner content wrapper -->
                    <div class="wrapper">
                        
					
                        <ol class="breadcrumb">
    <li>
    	<a href="javascript:;"><i class="ti-home mr5"></i>Adwords管理系统</a>
    </li>
    
    <li>
    	<i class="<?php echo ($nav["icon"]); ?> mr5" style="position:relative;top:-1px; font-size:14px;"></i><span><?php echo ($nav["name"]); ?></span>
    </li>
    
    <li class="active"  ><?php echo ($nav["now_name"]); ?></li>

     <?php if(isset($_GET['disabled'])){ ?>
    
   
        <select id="date" style="float:right; width:px;" disabled onChange="ads.changeDate(this.value)">
            <?php if(is_array($dateList)): $i = 0; $__LIST__ = $dateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["value"] == $date): ?><option selected value="<?php echo ($vo["value"]); ?>"  ><?php echo ($vo["day"]); ?></option>
                   
                        
                   
                <?php else: ?>
                    <option value="<?php echo ($vo["value"]); ?>" ><?php echo ($vo["day"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
       
        </select>
     <?php }else{ ?>
   
           <select id="date" style="float:right; width:px;" onChange="ads.changeDate(this.value)">
            <?php if(is_array($dateList)): $i = 0; $__LIST__ = $dateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["value"] == $date): ?><option selected value="<?php echo ($vo["value"]); ?>"  ><?php echo ($vo["day"]); ?></option>
                   
                        
                   
                <?php else: ?>
                    <option value="<?php echo ($vo["value"]); ?>" ><?php echo ($vo["day"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
       
        </select>

   
   
     <?php } ?>
</ol>
                        
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                
                                <section class="panel">
                                    
                                   <table border="0" width="100%" cellpadding="0"  cellspacing="0" style="border-collapse:collapse;">
                                    <tr>
                                    <td width="15%">
                                    <div class="panel-heading no-b" style="padding:10px 21px; float:;">
                                        <h5 style="margin-bottom:5px;"><?php echo ($gmcc["nickname"]); ?></h5>
                                        <span><?php echo ($gmcc["id"]); ?></span>
                                    </div>
                                    
                                    </td>
                                    <td>
                                    <div class="panel-heading no-b" style="padding:10px 21px; float:; display:none;">
                                       <table id="tb" class="table table-bordered table-striped no-m" width="100%"  >
                                       		<thead>
                                                <tr>
                                                	<th style="text-align:center" id="kerr">账户总量</th>
                                                   	<th style="text-align:center" id="kaerr">（无）GA总量</th>
                                                    <th style="text-align:center" id="per">（无）转化总量</th>
                                                </tr>
                                   		</thead>
                                            <tbody align="center" id="tbd1" style="display:">
                                             	<tr height="35">
                                                    <td id="c1">0</td>
                                                    <td id="c2">0</td>
                                                    <td id="c3">0</td>
                                                
                                                </tr>
                                            </tbody>
                                       </table>
                                    </div>
                                    
                                     </td>
                                    
                                    <td  width="25%" align="right">
                                    <div class="panel-heading no-b" style="float:; margin-top:15px;">
                                        <select id="accountSel" onChange="ads.selects('/Home/Mcc/alertedList?mcc='+this.value+'&date='+$('#date').val())">
                                        	<option value="000-000-0000">选择查看</option>
                                          <!--  <?php echo ($accountTree); ?>-->
											<?php if(is_array($accountTrees)): $i = 0; $__LIST__ = $accountTrees;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == $gmcc['id']): ?><option selected value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option>
                                                <?php else: ?>
                                                	<option  value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        
                                        </select>
                                    </div>
                                    </td>
                                    </tr>
                                    </table>
                                    
                                    
 
                                    <div class="panel-body">
                                    <div style="position:fixed; top:50px; height:36px; overflow:hidden; z-index:9999; background-color: #fff;" id="fixs">
                                    
                                    </div>
                                    
                                    	
              <div>
              <style>
.TabCon tr td{vertical-align: middle !important; text-align:center;}
</style>
              <table class="table table-bordered  TabCon">
                <thead>
                  <tr>
                  	<td rowspan="2" style="text-align:left">账户</td>
                    <td rowspan="2">CID</td>
                    <!--<td rowspan="2">等级</td>-->
                    <td colspan="2">账户端</td>
                    <td colspan="2">广告系列</td>
                    <td colspan="2">广告组</td>
                    <td colspan="2">GA网站指标</td>
                   <!-- <td rowspan="2">联系频次</td>-->
                    <td rowspan="2">分值</td>
                  </tr>
                  <tr>
                  	<td style="border-left:1px solid #e3e6f3;">消耗异常</td>
                    <td>剩余天数</td>
                    <td>点击率</td>
                    <td>转化次数</td>
                    <td>广告状态</td>
                    <td>质量得分</td>
                    <td>跳出率</td>
                    <td>加载时间</td>
                  </tr>

                </thead>
                
                <tbody>
                
                <!--<tr>
                  	<td>数据</td>
                  	<td>数据</td>
                  	<td>数据</td>
                  	<td>消耗异常</td>
                    <td>剩余天数</td>
                    <td>点击率</td>
                    <td>转化次数</td>
                    <td>广告状态</td>
                    <td>质量得分</td>
                    <td>跳出率</td>
                    <td>加载时间</td>
                    <td>联系频次</td>
                    <td>分组数据</td>
                  </tr>-->
                
                </tbody>
              </table>
            </div>
                                    </div>
                                </section>
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- /inner content wrapper -->

                </div>
                <!-- /content wrapper -->
                <a class="exit-offscreen"></a>
            </section>
            <!-- /main content -->
        </section>
        
<script type="text/javascript">
	
	$('#date').children('option:eq(3)').get(0).selected = true;
	$('#date').get(0).disabled = true;
	//$('#tools_top').css('width',w+'px');
	ads.children = <?php echo ($children); ?>;
	ads.getAlertedList(ads.children);

</script> 

</div>
	<script src="/Public/bootstrap/js/bootstrap.js"></script>
    <script src="/Public/plugins/jquery.slimscroll.min.js"></script>
    <script src="/Public/plugins/jquery.easing.min.js"></script>
    <script src="/Public/plugins/appear/jquery.appear.js"></script>
    <script src="/Public/plugins/jquery.placeholder.js"></script>
    <script src="/Public/plugins/fastclick.js"></script>
	<script src="/Public/plugins/table-sortable/sortable.min.js"></script>
	<script src="/Public/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="/Public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
     <script src="/Public/plugins/fuelux/pillbox.js"></script>
    <script src="/Public/plugins/fuelux/spinner.js"></script>
    <script src="/Public/plugins/wysiwyg/jquery.hotkeys.js"></script>
	<script src="/Public/plugins/switchery/switchery.js"></script>
    <script src="/Public/plugins/icheck/icheck.js"></script>
    <script src="/Public/js/offscreen.js"></script>
    <script src="/Public/js/main.js"></script>
	<script src="/Public/js/form-custom.js"></script>
    
</body>
<!-- /body -->

</html>