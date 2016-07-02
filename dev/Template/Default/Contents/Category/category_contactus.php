<?php if (!defined('LONG_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/default/css/common.css" rel="stylesheet" type="text/css">
<link href="{$config_siteurl}statics/default/css/guanggao.css" rel="stylesheet" type="text/css">
<link href="{$config_siteurl}statics/default/css/Style.css" rel="stylesheet" type="text/css">
<!--选项卡-->
<script language="javascript" src="{$config_siteurl}statics/default/js/jq1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	jQuery.jqtab = function(tabtit,tab_conbox,shijian) {
		$(tab_conbox).find("li").hide();
		$(tabtit).find("li:first").addClass("thistab").show(); 
		$(tab_conbox).find("li:first").show();
	
		$(tabtit).find("li").bind(shijian,function(){
		  $(this).addClass("thistab").siblings("li").removeClass("thistab"); 
			var activeindex = $(tabtit).find("li").index(this);
			$(tab_conbox).children().eq(activeindex).show().siblings().hide();
			return false;
		});
	
	};
	/*调用方法如下：*/
	$.jqtab("#tabs","#tab_conbox","click");
});
</script>
<!--lightbox-->
<script src="{$config_siteurl}statics/default/js/jquery-1.js"></script>
<script src="{$config_siteurl}statics/default/js/lightbox.js"></script>
<link href="{$config_siteurl}statics/default/css/lightbox.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/share_style0_16.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/share_popup.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/select_share.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/imgshare.css" rel="stylesheet">
<!--[if IE 6]>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
EvPNG.fix('div, ul, ol, li, dl, dt, dd, img, input, a, span, b, i, em, p, h1, h2, h3, h4, h5, h6');
</script>
<![endif]-->
</head>
<body>
<template file="Contents/header1.php" />
<div class="bann" style=" background-image:url({$Categorys[$catid][image]}); background-repeat:no-repeat; background-position:center center; height:300px"></div>
<div id="content">
<div class="w1000">

<ul class="tabs" id="tabs">
       <li><a href="#">平面拍摄</a></li>
       <li><a href="#">影视拍摄</a></li>
    </ul>
    <ul class="tab_conbox" id="tab_conbox">
        <li style="display: none;" class="tab_con">
            <div class="box mt12">
             <content action="lists" catid="411" order="updatetime DESC" num="16">
                <volist name="data" id="vo">
                   <div class="qy_box_list">
                     <div class="qy_box">
                       <div class="qy_box_pic">
                         <a href="{$vo.thumb}" data-title="{$vo.title}" data-lightbox="roadtripp"><img data-bd-imgshare-binded="1" src="{$vo.thumb}" title="{$vo.title}" align="{$vo.title}"></a>
                         </div>
                       </div>
                       {$vo.title}
                     </div>
                </volist>
              </content>  
                    
            </div>
            <div class="flickr"></div><!--放置页码列表-->
        </li>
            
        <li style="display: list-item;" class="tab_con">
        	<div class="box mt12">
              <content action="lists" catid="412" order="updatetime DESC" num="16">
                <volist name="data" id="vo">
                   <div class="qy_box_list">
                     <div class="qy_box">
                       <div class="qy_box_pic">
                         <a href="{$vo.thumb}" data-title="{$vo.title}" data-lightbox="roadtripp"><img data-bd-imgshare-binded="1" src="{$vo.thumb}" title="{$vo.title}" align="{$vo.title}"></a>
                         </div>
                       </div>
                       {$vo.title}
                     </div>
                </volist>
              </content>        
            </div>
            <div class="flickr"></div><!--放置页码列表-->
        </li>
    </ul>


</div>
</div>
<template file="Contents/footer.php" />
</body>
</html>