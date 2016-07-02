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
<link href="{$config_siteurl}statics/default/css/Style.css" rel="stylesheet" type="text/css">
<link href="{$config_siteurl}statics/default/css/mxda.css" rel="stylesheet" type="text/css">
<!--lightbox-->
<script src="{$config_siteurl}statics/default/js/jquery-1.js"></script>
<script src="{$config_siteurl}statics/default/js/lightbox.js"></script>
<link href="{$config_siteurl}statics/default/css/lightbox.css" rel="stylesheet">
<script src="{$config_siteurl}statics/default/js/share.js"></script>
<link href="{$config_siteurl}statics/default/css/share_style0_16.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/imgshare.css" rel="stylesheet"></head>
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
<div id="current">当前位置：<span><a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span> </div>
<div class="da_itm border">
	<div class="box">
    	<div class="da_pic"><div class="da_pic_bod"><a href="{$thumb}"><img data-bd-imgshare-binded="1" src="{$thumb}"></a></div></div>
        <div class="da_inf">
        	<div class="box">
            	<div class="inf_lef">
                	<div class="inf_lef_tit">明星档案</div>
                	<div class="inf_lef_lis1">姓名：{$title}</div>
                    <div class="inf_lef_lis1">地区：{$diqu} </div>
                    <div class="inf_lef_lis1">国籍：{$gj}</div>
                    <div class="inf_lef_lis1">身高：{$sg}</div>
                    <div class="inf_lef_lis1">体重：{$tz}</div>
                    <div class="inf_lef_lis1">生日：{$sr}</div>
                    <div class="inf_lef_lis2">座右铭：{$zrm}</div>
                </div>
                <div class="inf_lef">
                	<div class="inf_lef_tit">工作联系</div>
                	<div class="inf_lef_lis3">{$dyjj}</div>
                    <div class="inf_lef_lis3">金牌经纪人：{$jpjjr}</div>
                    <div class="inf_lef_lis3">经纪人热线：{$jjgsrx}</div>
                    <div class="inf_lef_lis3">经纪人邮箱：{$jjryx}</div>
                    <div class="inf_lef_lis3">{$yaoqiu}</div>
                </div>
            </div>
            <div class="box mt20">
            	<div class="da_des_tit"><div class="da_des_tit_bg">明星简介</div></div>
                <div class="da_des">{$content}</div>
            </div>
        </div>
    </div>
    <!--明星相册-->
    <div class="box mt20">
    	<div class="da_des_tit"><div class="da_des_tit_bg">明星相册</div></div>
        <div class="da_xc">
            	
        </div>
    </div> <!--明星相册-->
</div>
</div>
</div>
<template file="Contents/footer.php" />
</body>
</html>