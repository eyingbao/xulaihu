<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<title>Google Adwords月报</title>
<link href="/Public/Reports/css/style.css" type="text/css" rel="stylesheet">
<link href="/Public/Reports/css/materialize.min.css" type="text/css" rel="stylesheet">
<style type="text/css">
.boxcon [data-table="campaign_table"]  thead{ border:0;}
.boxcon [data-table="campaign_table"] table tbody tr  {background:#fff; height:20px;border:0;}
.boxcon [data-table="campaign_table"] td{height:30px; line-height:30px; border:0;}
.boxcon [data-table="campaign_table"] {height:250px;}
.boxcon [data-table="campaign_table"] td { border:0;}
.boxcon [data-table="campaign_table"] table td { border:0;}

</style>
<script type="text/javascript" src="http://test.qdetong.com/Form/Public/Js/jquery.js"></script>
<script type="text/javascript" src="http://test.qdetong.com/Form/Public/Accounts/js/Chart.js"></script>
<script type="text/javascript">
Chart.defaults.global = {
    // Boolean - Whether to animate the chart
    animation: false,

    // Number - Number of animation steps
    animationSteps: 60,

    // String - Animation easing effect
    // Possible effects are:
    // [easeInOutQuart, linear, easeOutBounce, easeInBack, easeInOutQuad,
    //  easeOutQuart, easeOutQuad, easeInOutBounce, easeOutSine, easeInOutCubic,
    //  easeInExpo, easeInOutBack, easeInCirc, easeInOutElastic, easeOutBack,
    //  easeInQuad, easeInOutExpo, easeInQuart, easeOutQuint, easeInOutCirc,
    //  easeInSine, easeOutExpo, easeOutCirc, easeOutCubic, easeInQuint,
    //  easeInElastic, easeInOutSine, easeInOutQuint, easeInBounce,
    //  easeOutElastic, easeInCubic]
    animationEasing: "easeOutQuart",

    // Boolean - If we should show the scale at all
    showScale: true,

    // Boolean - If we want to override with a hard coded scale
    scaleOverride: false,

    // ** Required if scaleOverride is true **
    // Number - The number of steps in a hard coded scale
    scaleSteps: null,
    // Number - The value jump in the hard coded scale
    scaleStepWidth: null,
    // Number - The scale starting value
    scaleStartValue: null,

    // String - Colour of the scale line
    scaleLineColor: "rgba(0,0,0,.1)",

    // Number - Pixel width of the scale line
    scaleLineWidth: 1,

    // Boolean - Whether to show labels on the scale
    scaleShowLabels: true,

    // Interpolated JS string - can access value
    scaleLabel: "<%=value%>",

    // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
    scaleIntegersOnly: true,

    // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: false,

    // String - Scale label font declaration for the scale label
    scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Scale label font size in pixels
    scaleFontSize: 12,

    // String - Scale label font weight style
    scaleFontStyle: "normal",

    // String - Scale label font colour
    scaleFontColor: "#666",

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    responsive: false,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,

    // Boolean - Determines whether to draw tooltips on the canvas or not
    showTooltips: true,

    // Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
    customTooltips: false,

    // Array - Array of string names to attach tooltip events
    tooltipEvents: ["mousemove", "touchstart", "touchmove"],

    // String - Tooltip background colour
    tooltipFillColor: "rgba(0,0,0,0.8)",

    // String - Tooltip label font declaration for the scale label
    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip label font size in pixels
    tooltipFontSize: 14,

    // String - Tooltip font weight style
    tooltipFontStyle: "normal",

    // String - Tooltip label font colour
    tooltipFontColor: "#fff",

    // String - Tooltip title font declaration for the scale label
    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip title font size in pixels
    tooltipTitleFontSize: 14,

    // String - Tooltip title font weight style
    tooltipTitleFontStyle: "bold",

    // String - Tooltip title font colour
    tooltipTitleFontColor: "#fff",

    // Number - pixel width of padding around tooltip text
    tooltipYPadding: 6,

    // Number - pixel width of padding around tooltip text
    tooltipXPadding: 6,

    // Number - Size of the caret on the tooltip
    tooltipCaretSize: 8,

    // Number - Pixel radius of the tooltip border
    tooltipCornerRadius: 6,

    // Number - Pixel offset from point x to tooltip edge
    tooltipXOffset: 10,

    // String - Template string for single tooltips
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",

    // String - Template string for multiple tooltips
    multiTooltipTemplate: "<%= value %>",

    // Function - Will fire on animation progression.
    onAnimationProgress: function(){},

    // Function - Will fire on animation completion.
    onAnimationComplete: function(){}
}

</script>
</head>

<body>
<!-- START MAIN -->
<div id="main"> 
  <!-- START HEADER -->
  <header>
    <h1 class="fontfamilysty">Google Adwords月报 - <span><?php echo ($rs["customer"]["companyname"]); ?></span></h1>
    <img src="/Public/Reports/images/top_logo.jpg" class="logo">
    <div class="clear"></div>
  </header>
  <!-- END HEADER --> 
  <!-- START section -->
  <section>
    <h4>尊敬的客户：</h4>
<p style="line-height:25px;">&nbsp;&nbsp;&nbsp;您好，我是您的客服<?php echo ($rs["customerService"]["username"]); ?>，首先感谢您在过去一个月来对Google业务的支持，为了更方便且及时地让您了解Google AdWords推广数据，我们为您精心制作了如下报表，内容将从广告系列、关键字、投放国家、每日花费等各个情况展开做数据分析，这将对您全面了解市场动态，有效制定营销策略有重要帮助，如果您在查看报表时，有任何问题，欢迎您随时与我联系，合作愉快！</p>
  </section>
  <!-- END section --> 
  <!-- START section -->
  <section>
    <div class="tit titicon1">账户概况（<?php echo ($d1); ?>~<?php echo ($d2); ?>）</div>
    <div class="row">
      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-content  green white-text">
            <p class="card-stats-title"> $总花费</p>
            <h4 class="card-stats-number">￥<?php echo ($rs["top"]["cost"]); ?></h4>
           
           <?php if($rs['compared']['cost'][0] == 'N/A'){ ?>
           
            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>N/A</p>
         	
             <?php }else{ ?>
            
                 <?php if($rs['compared']['cost'][0] == '1'){ ?>
                    
                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up">∧</i> 与上月相比增长 <span class="green-text text-lighten-5"><?php echo $rs['compared']['cost'][1]; ?>%</span> </p>
                
                <?php }else{ ?>
   
    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up">∨</i> 与上月相比降幅 <span class="green-text text-lighten-5"><?php echo $rs['compared']['cost'][1]; ?>%</span> </p>
                
                <?php } ?>
            
            <?php } ?>
         
          </div>
          <div class="card-action  green darken-2"><img src="/Public/Reports/images/map1.png"> </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-content pink lighten-1 white-text">
            <p class="card-stats-title"><i class="mdi-action-trending-up"><img src="/Public/Reports/images/tit1.jpg"></i> 点击次数</p>
            <h4 class="card-stats-number"><?php echo ($rs["top"]["clicks"]); ?></h4>
         
          <?php if($rs['compared']['clicks'][0] == 'N/A'){ ?>
           
            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i>N/A</p>
          
          <?php }else{ ?>
         
         	<?php if($rs['compared']['clicks'][0] == '1'){ ?>
         
          	<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down">∧</i> 与上月相比增长<span class="deep-purple-text text-lighten-5"><?php echo $rs['compared']['clicks'][1]; ?>%</span> </p>
          
          	<?php }else{ ?>
          	<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down">∨</i> 与上月相比降幅<span class="deep-purple-text text-lighten-5"><?php echo $rs['compared']['clicks'][1]; ?>%</span> </p>
          	<?php } ?>
        
          <?php } ?>
          
          </div>
          <div class="card-action  pink darken-2"> <img src="/Public/Reports/images/map2.png"> </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-content blue-grey white-text">
            <p class="card-stats-title"><i><img src="/Public/Reports/images/tit2.jpg"></i> 展示次数</p>
            <h4 class="card-stats-number"><?php echo ($rs["top"]["impressions"]); ?></h4>
          <?php if($rs['compared']['impressions'][0] == 'N/A'){ ?>
            
            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> N/A</span> </p>
            
           
            <?php }else{ ?>
             <?php if($rs['compared']['impressions'][0] == '1'){ ?>
           
           	<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up">∧</i> 与上月相比增长 <span class="blue-grey-text text-lighten-5"><?php echo $rs['compared']['impressions'][1]; ?>%</span> </p>
             <?php }else{ ?>
             	<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up">∨</i> 与上月相比降幅<span class="blue-grey-text text-lighten-5"><?php echo $rs['compared']['impressions'][1]; ?>%</span> </p>
             <?php } ?>
            
             <?php } ?>
          
          </div>
          <div class="card-action blue-grey darken-2"><img src="/Public/Reports/images/map3.png"> </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-content purple white-text">
            <p class="card-stats-title">$剩余余额</p>
            <h4 class="card-stats-number">￥<?php echo ($rs['blance'][0]); ?></h4>
            <p class="card-stats-compare"><i><img src="/Public/Reports/images/calendars.png"></i> 剩余天数<span class="purple-text text-lighten-5"><?php echo ($rs['blance'][1]); ?></span> </p>
          </div>
          <div class="card-action purple darken-2"><img src="/Public/Reports/images/map4.png"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section --> 
  <!-- START section -->
  <section>
    <div class="tit titicon2">报表类型</div>
    <ul class="formstyle">
      <li><i>P1</i><a>广告系列报告</a><span><img src="/Public/Reports/images/site1.jpg"></span></li>
      <li><i>P2</i><a>每日花费报告</a><span><img src="/Public/Reports/images/site2.jpg"></span></li>
      <li><i>P3</i><a>关键词报告</a><span><img src="/Public/Reports/images/site3.jpg"></span></li>
      <li><i>P4</i><a>地理位置报告</a><span><img src="/Public/Reports/images/site4.jpg"></span></li>
    </ul>
  </section>
  <!-- END section --> 
  <!-- START section -->
  <section>
    <div class="tit titicon3">报告详情</div>
    <div class="detailbox">
      <div class="head">
        <div class="isw-graph"></div>
        <h1>广告系列报告（<?php echo ($d1); ?>~<?php echo ($d2); ?>）</h1>
        <div class="clear"></div>
      </div>
      <div class="boxcon">
        <ul class="canvasul">
        
        <li style="width:47.333%; height:320px; float:left; overflow:;">
         	<div style="font-size:1.2rem; height:60px; border:0; line-height:60px; text-align:center;">广告系列花费 (TOP7)</div>
           <canvas id="campaign_histogram"   width="550" height="240"  style="margin-top:10px; margin-left:10px;"></canvas>
          </li>
        
          <li style="width:48.111%; margin-left:0;float:right; height:320px;">
           <div style="font-size:1.2rem; height:60px; border:0; line-height:60px; text-align:center;">广告系列转化次数 (TOP7)</div>
           <table style="border-collapse: collapse;width:100%; margin-top:10px;" border="0"  data-table="campaign_table">
           	
              <tbody>
                <tr style="background:#fff;">
                  <td  width="30%" align="center" bordercolor="0"><canvas id="campaign_pie"   width="150"></canvas></td>
                  <td width="70%" align="right">
                  <table style="border-collapse:collapse;width:90%;" border="0">
                      <tbody>
                        <?php foreach($rs['campaign']['pie']['table'] as $k=>$v){ ?>
                            <tr style="background:#fff; font-size:12px;">
                              <td width="10%" ><div style="width:7px; height:7px; border-radius:50%; background:<?php echo ($v[0]); ?>;"></div></td>
                              <td align="left"><?php echo ($k); ?></td>
                              <td  align="center" width="30%"><?php echo ($v[1]); ?></td>
                            </tr>
                      		<?php } ?>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </li>
          </ul>
        <div class="clear"></div>
         <div style="height:630px;">
        <table border="1" class="trd" id="<?php echo ($rs["campaign"]["class_name"]); ?>">
          <tbody>
          <tr style="background:none;" class="tit"><td colspan="12" style="font-size:1.2rem; text-align:center;">&nbsp;&nbsp;广告系列花费及转化详情<span style="font-size:13px;"></td></tr>
            <tr class="titbg">
              <td>Campaign</td>
              <td>Status</td>
              <td>Budget</td>
              <td>Clicks</td>
              <td>Impressions</td>
              <td>CTR</td>
              <td>CPC</td>
              <td>Cost</td>
              <td>Position</td>
              <td>Conversions</td>
              <td>Cost/conv.</td>
              <td>Conv.rate</td>
            </tr>
            <?php if(is_array($rs[campaign][table])): $i = 0; $__LIST__ = $rs[campaign][table];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="font-size:12px;">

                <td><?php echo ($vo["campaign_name"]); ?></td>
                <td><?php echo get_cam_status($vo['campaign_name'],$cid); ?></td>
                <td><?php echo ($vo["budget"]); ?></td>
                <td><?php echo ($vo["clicks"]); ?></td>
                <td><?php echo ($vo["impressions"]); ?></td>
                <td><?php echo ($vo["ctr"]); ?>%</td>
                <td><?php echo ($vo["average_cpc"]); ?></td>
                <td><?php echo ($vo["cost"]); ?></td>
                <td><?php echo ($vo["average_position"]); ?></td>
                <td><?php echo ($vo["all_conversions"]); ?>.00</td>
                <td><?php echo ($vo["cost_per_all_conversion"]); ?></td>
                <td><?php echo ($vo["all_conversion_rate"]); ?>%</td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr class="last">
                  <td>汇总</td>
                  <td>-</td>
                  <td><?php echo ($rs["campaign"]["total"]["budget"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["clicks"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["impressions"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["ctr"]); ?>%</td>
                  <td><?php echo ($rs["campaign"]["total"]["average_cpc"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["cost"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["average_position"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["all_conversions"]); ?>.00</td>
                  <td><?php echo ($rs["campaign"]["total"]["cost_per_all_conversion"]); ?></td>
                  <td><?php echo ($rs["campaign"]["total"]["all_conversion_rate"]); ?>%</td>
                </tr>
          </tbody>
        </table>
        
       <div style="font-size:12px; color:#333; margin-top:10px;"> <b>表头注释</b>：Campaign:广告系列，Status:状态，Budget:预算，Clicks:点击次数，Impressions:展示次数，CTR:点击率，CPC:平均每次点击费用，Cost:总费用，Position:平均排名，Conversions:转化次数<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost/conv:每次转化费用，Conv.rate:转化率</div>
      </div>
    </div>
    </div>
    <div class="detailbox">
      <div class="head">
        <div class="isw-graph"></div>
        <h1>每日报告（<?php echo ($d1); ?>~<?php echo ($d2); ?>）</h1>
        <div class="clear"></div>
      </div>
      <div class="boxcon">
        <ul class="canvasul">
         <li style="width:99%; margin-left:0;float:left; height:270px;">
         <div style="font-size:1.2rem; height:40px; border:0; line-height:40px; text-align:center;">每日花费</div>
         	<canvas id="daily_line1"   width="600" height="100"  style="margin-top:10px; margin-left:10px;"></canvas>
         </li>
        
         <li style="width:99%; margin-left:0;float:left; height:270px;">
         <div style="font-size:1.2rem; height:40px; border:0; line-height:40px; text-align:center;">每日转化</div>
         	<canvas id="daily_line2"   width="600" height="100"  style="margin-top:10px; margin-left:10px;"></canvas>
         </li>
         
        </ul>
        <div class="clear"></div>
        <p class="mark">备注：Google Adwords本月 点击次数：<?php echo ($rs["daily"]["total"]["clicks"]); ?>，日均花费：<?php echo ($rs["daily"]["total"]["avg_cost"]); ?>，点击率：<?php echo ($rs["daily"]["total"]["ctr"]); ?>%，转化次数：<?php echo ($rs["daily"]["total"]["all_conversions"]); ?></p>
        
       		<div style="height:1060px;">
            <table border="1" class="snd" id="daily_tables">
 
              <tbody>
              <tr style="background:none;"  class="tit"><td colspan="10" style="font-size:1.2rem;">每日花费及转化详情</td></tr>
                <tr class="titbg">
                  <td>Date</td>
                  <td>Clicks</td>
                  <td>Impressions</td>
                  <td>CTR</td>
                  <td>CPC</td>
                  <td>Cost</td>
                  <td>Position</td>
                  <td>Conversions</td>
                  <td>Cost/conv.</td>
                  <td>Conv.rate</td>
                </tr>
                 <?php if(is_array($rs[daily][table])): $i = 0; $__LIST__ = $rs[daily][table];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr  style="font-size:12px;">
                      <td><?php echo ($vo["day"]); ?></td>
                      <td><?php echo ($vo["clicks"]); ?></td>
                      <td><?php echo ($vo["impressions"]); ?></td>
                      <td><?php echo ($vo["ctr"]); ?>%</td>
                      <td><?php echo ($vo["average_cpc"]); ?></td>
                      <td><?php echo ($vo["cost"]); ?></td>
                      <td><?php echo ($vo["average_position"]); ?></td>
                      <td><?php echo ($vo["all_conversions"]); ?>.00</td>
                      <td><?php echo ($vo["cost_per_all_conversion"]); ?></td>
                      <td><?php echo ($vo["all_conversion_rate"]); ?>%</td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr class="last">
                  <td>汇总</td>
                  <td><?php echo ($rs["daily"]["total"]["clicks"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["impressions"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["ctr"]); ?>%</td>
                  <td><?php echo ($rs["daily"]["total"]["average_cpc"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["cost"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["average_position"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["all_conversions"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["cost_per_all_conversion"]); ?></td>
                  <td><?php echo ($rs["daily"]["total"]["all_conversion_rate"]); ?>%</td>
                </tr>
              </tbody>
            </table>
            
            <div style="font-size:12px; color:#333; margin-top:10px;"> <b>表头注释</b>：Date:日期，Clicks:点击次数，Impressions:展示次数，CTR:点击率，CPC:平均每次点击费用，Cost:总费用，Position:平均排名，Conversions:转化次数</div>
            
     	</div>
      </div>
    </div>
    <div class="detailbox" style="border-bottom:0;">
      <div class="head">
        <div class="isw-graph"></div>
        <h1>关键词报告（<?php echo ($d1); ?>~<?php echo ($d2); ?>）</h1>
        <div class="clear"></div>
      </div>
      <div class="boxcon">
        <ul class="canvasul">
          
         <li style="width:99%; margin-left:0">
         	<div style="font-size:1.2rem; height:60px; border:0; line-height:60px; text-align:center;">关键词花费 (TOP 20)</div>
            <canvas id="keywords_histogram1"   width="1150" height="400" style="margin-left:10px;"></canvas>
         </li>
         <li style="width:99%; margin-left:0">
         	<div style="font-size:1.2rem; height:60px; border:0; line-height:60px; text-align:center;">关键词转化 (TOP 20)</div>
            <canvas id="keywords_histogram2"   width="1150" height="400" style="margin-left:10px;"></canvas>
         </li>
         
       <!--	<li style="width:48.111%; margin-left:0; height:350px;">
       		<div style="font-size:1.2rem; height:60px; border:0; line-height:60px; text-align:center;">关键词转化</div>
            <canvas id="keywords_histogram2"   width="550" height="270"  style="margin-top:10px; margin-left:10px;"></canvas>
       </li>-->
        </ul>
        <div style="clear:both;"></div>
        <p class="mark">备注：Google Adwords  TOP20关键词报告，花费最高的前五名关键字有：<span class="fontred"><?php echo ($rs["keywords"]["top5"]); ?></span></p>
        
        <!--<div style="height:645px;">-->
        
       		<div style="height:667px;">
        <table border="1" class="fst" id="<?php echo ($rs["keywords"]["class_name"]); ?>">
          <tbody>
          	<tr style="background:none;height:30px;"  class="tit"><td colspan="14" style="font-size:1.2rem; ">关键词花费及转化详情 (TOP20)</td></tr>
            <tr class="titbg">
              <!--<td>关键词状态</td>-->
              <td>Keyword</td>
              <td>Campaign</td>
              <td>Adgroup</td>
              <!--<td>状态</td>-->
              <td>Clicks</td>
              <td>Impressions</td>
              <td>CTR</td>
              <td>CPC</td>
              <td>Cost</td>
              <td>Position</td>
              <td>Conv</td>
              <td>Cost/conv.</td>
              <!--<td>转化率</td>-->
            </tr>
           
            <?php if(is_array($rs[keywords][table])): $i = 0; $__LIST__ = $rs[keywords][table];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="font-size:12px;">
                  <td align="left" style="padding-left:5px;"><?php echo ($vo["criteria"]); ?></td>
                  <td align="left" style="padding-left:5px;"><?php echo ($vo["campaign_name"]); ?></td>
                  <td align="left" style="padding-left:5px;"><?php echo ($vo["adgroup_name"]); ?></td>
                  <!--<td><span style="padding:0 5px;"><?php echo ($vo["system_serving_status"]); ?></span></td>-->
                  <td><?php echo ($vo["clicks"]); ?></td>
                  <td><?php echo ($vo["impressions"]); ?></td>
                  <td><?php echo ($vo["ctr"]); ?>%</td>
                  <td><?php echo ($vo["average_cpc"]); ?></td>
                  <td><?php echo ($vo["cost"]); ?></td>
                  <td><?php echo ($vo["average_position"]); ?></td>
                  <td><?php echo ($vo["all_conversions"]); ?></td>
                  <td><?php echo ($vo["cost_per_all_conversion"]); ?></td>
                 <!-- <td><?php echo ($vo["all_conversion_rate"]); ?>%</td>-->
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            
            
          </tbody>
        </table>
        <div style="font-size:12px; color:#333; margin-top:7px;"> <b>表头注释</b>：Keyword:关键词，Campaign:广告系列，Adgroup:广告组，Clicks:点击次数，Impressions:展示次数，CTR:点击率，CPC:平均每次点击费用，Cost:总费用，Position:平均排名，Conversions:转化次数，<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost/conv:每次转化费用</div>
        </div>
      </div>
    </div>
    <div class="detailbox">
      <div class="head">
        <div class="isw-graph"></div>
        <h1>地理位置报告（<?php echo ($d1); ?>~<?php echo ($d2); ?>）</h1>
        <div class="clear"></div>
      </div>
      <div class="boxcon">
        <ul class="canvasul">
          <li style="width:48.111%; margin-left:0;float:left; height:px;">
           <table style="border-collapse: collapse;width:100%; margin-top:px;" border="0"  data-table="campaign_table">
              <tbody>
                <tr style="background:#fff;">
                  <td  width="50%" align="center" bordercolor="0"><canvas id="geo_pie1"  height="170"></canvas></td>
                  <td width="50%">
                  <table style="border-collapse:collapse;" border="0" width="100%" >
                  <thead>
                	<tr style="background:none;"><th colspan="3">前五名国家或地区花费占比</th></tr>
                </thead>
                      <tbody>
                        <?php foreach($rs['geo']['pie1']['table'] as $k=>$v){ ?>
                            <tr style="background:#fff;">
                              <td width="10%" ><div style="width:7px; height:7px; border-radius:50%; background:<?php echo ($v[0]); ?>;"></div></td>
                              <td align="left"><?php echo ($k); ?></td>
                              <td  align="center" width="30%"><?php echo ($v[1]); ?>%</td>
                            </tr>
                      		<?php } ?>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </li>
          
          <li style="width:48.111%; margin-left:0;float:left; height:px;">
           <table style="border-collapse: collapse;width:100%; margin-top:px;" border="0"  data-table="campaign_table">
              <tbody>
                <tr style="background:#fff;">
                  <td  width="50%" align="center" bordercolor="0"><canvas id="geo_pie2"  height="170"></canvas></td>
                  <td width="50%">
                  <table style="border-collapse:collapse;" border="0" width="100%" >
                  <thead>
                	<tr style="background:none;"><th colspan="3">前五名国家或地区转化次数占比</th></tr>
                </thead>
                      <tbody>
                        <?php foreach($rs['geo']['pie2']['table'] as $k=>$v){ ?>
                            <tr style="background:#fff;">
                              <td width="10%" ><div style="width:7px; height:7px; border-radius:50%; background:<?php echo ($v[0]); ?>;"></div></td>
                              <td align="left"><?php echo ($k); ?></td>
                              <td  align="center" width="30%"><?php echo ($v[1]); ?></td>
                            </tr>
                      		<?php } ?>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </li>
       </ul>
      <div class="clear"></div>
        <p class="mark">备注：上月Google AdWords  TOP20地理位置报告，花费最高的前五名国家为：<span class="fontred"><?php echo ($rs["geo"]["top5"]); ?></span></p>
        <div style="height:685px;">
        <table border="1" class="forth" id="<?php echo ($rs["geo"]["class_name"]); ?>">
          <tbody>
              <tr style="background:none;" class="tit"><td colspan="10" style="font-size:1.2rem;">地理位置花费及转化详情 (TOP20)</td></tr>
              <tr class="titbg">
              <td>Country / Territory</td>
              <td>Clicks</td>
              <td>Impressions</td>
              <td>CTR</td>
              <td>CPC</td>
              <td>Cost</td>
              <td>Position</td>
              <td>Conversions</td>
              <td>Cost / conv.</td>
              <td>Conv. rate</td>
            </tr>
            <?php if(is_array($rs[geo][table])): $i = 0; $__LIST__ = $rs[geo][table];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="font-size:12px;">
              <td><?php echo ($vo["cname"]); ?> <!--<?php echo ($vo["country_criteria_id"]); ?>--></td>
              <td><?php echo ($vo["clicks"]); ?></td>
              <td><?php echo ($vo["impressions"]); ?></td>
              <td><?php echo ($vo["ctr"]); ?>%</td>
              <td><?php echo ($vo["average_cpc"]); ?></td>
              <td><?php echo ($vo["cost"]); ?></td>
              <td><?php echo ($vo["average_position"]); ?></td>
              <td><?php echo ($vo["all_conversions"]); ?></td>
              <td><?php echo ($vo["cost_per_all_conversion"]); ?></td>
              <td><?php echo ($vo["all_conversion_rate"]); ?>%</td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
        
        <div style="font-size:12px; color:#333; margin-top:10px;"> <b>表头注释</b>：Country / Territory:国家 / 地区，Clicks:点击次数，Impressions:展示次数，CTR:点击率，CPC:平均每次点击费用，Cost:总费用，Position:平均排名，Conversions:转化次数，Cost/conv:每次转化费用<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conv.rate:转化率</div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section --> 
</div>
<!-- END MAIN -->



<footer> <img src="/Public/Reports/images/er.jpg">
  <h2>查看更多详细报告，关注公众号：Google 易营宝海外营销</h2>
   <ul class="detailshow">
        <li style="display:inline-block; color:#fff; margin-right:5px;"><i></i>客服专员：<?php echo ($rs["customerService"]["username"]); ?></li>
        <li style="display:inline-block; color:#fff;margin-right:5px;"><i></i>客服专线：<?php echo ($rs["customerService"]["office"]); ?></li>
        <li style="display:inline-block; color:#fff;margin-right:5px;"><i></i>E-mail：<?php echo ($rs["customerService"]["email"]); ?></li>
      </ul>
  <!--<h3>如需账户咨询，请联系您的专属客服，谢谢！</h3>-->
</footer>
<script type="text/javascript">

var campaign_pie_data =<?php echo ($rs["campaign"]["pie"]["data"]); ?>;
campaign_pie = document.getElementById('campaign_pie').getContext("2d");
var campaign_pie_chart = new Chart(campaign_pie).Doughnut(campaign_pie_data);

var campaign_histogram_data =<?php echo ($rs["campaign"]["histogram"]["data"]); ?>;
campaign_histogram = document.getElementById('campaign_histogram').getContext("2d");
var campaign_histogram_chart = new Chart(campaign_histogram).Bar(campaign_histogram_data);

var color1 = ["rgba(42, 96, 169,0.1)","rgba(42, 96, 169,1)","rgba(42, 96, 169,1)","rgba(42, 96, 169,1)"];
var color2 = ["rgba(42, 96, 169,0.1)","rgba(42, 96, 169,0.4)","rgba(42, 96, 169,0.4)","rgba(42, 96, 169,0.4)"];
								
var daily_line1_chart =<?php echo ($rs["daily"]["line1"]["data"]); ?>;
var daily_line1 = document.getElementById('daily_line1').getContext("2d");
window.my_daily_line1 = new Chart(daily_line1).Line(daily_line1_chart, {
//success:true,
responsive: true,
bezierCurve:false,
datasetStroke:false
});

var daily_line2_chart =<?php echo ($rs["daily"]["line2"]["data"]); ?>;
var daily_line2 = document.getElementById('daily_line2').getContext("2d");
window.my_daily_line2 = new Chart(daily_line2).Line(daily_line2_chart, {
//success:true,
responsive: true,
bezierCurve:false,
datasetStroke:false
});


var keywords_histogram1_data =<?php echo ($rs["keywords"]["histogram1"]["data"]); ?>;
keywords_histogram1 = document.getElementById('keywords_histogram1').getContext("2d");
var keywords_histogram1_chart = new Chart(keywords_histogram1).Bar(keywords_histogram1_data);


var keywords_histogram2_data =<?php echo ($rs["keywords"]["histogram2"]["data"]); ?>;
keywords_histogram2 = document.getElementById('keywords_histogram2').getContext("2d");
var keywords_histogram2_chart = new Chart(keywords_histogram2).Bar(keywords_histogram2_data);


var geo_pie1_data =<?php echo ($rs["geo"]["pie1"]["data"]); ?>;
geo_pie1 = document.getElementById('geo_pie1').getContext("2d");
var geo_pie1_chart = new Chart(geo_pie1).Doughnut(geo_pie1_data);


var geo_pie2_data =<?php echo ($rs["geo"]["pie2"]["data"]); ?>;
geo_pie2 = document.getElementById('geo_pie2').getContext("2d");
var geo_pie2_chart = new Chart(geo_pie2).Doughnut(geo_pie2_data);
</script>
</body>
</html>