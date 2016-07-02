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
<link href="{$config_siteurl}statics/default/css/gsxw.css" rel="stylesheet" type="text/css">
<link href="{$config_siteurl}statics/default/css/share_style0_16.css" rel="stylesheet">
<link href="{$config_siteurl}statics/default/css/Style.css" rel="stylesheet" type="text/css">
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
<div class="w1000 mt20">
	<div class="new_lef">
    	<div class="new_itm">
        <ul>
           <content action="lists" catid="333" order="updatetime DESC" num="16">
              <volist name="data" id="vo">
                <li>
                <div class="li_lef">
                </div>
                <div class="li_rig">
                </div>
                <li>
              </volist>
           </content>
           <li></li>
        </ul>
<div class="flickr"></div><!--放置页码列表-->
        </div>
    </div>
    <div class="new_rig">
    	<div class="new_rm">
            <div class="rm_tit"><span>热门预告</span></div>
              <content action="lists" catid="333" order="view DESC" num="16">
              <volist name="data" id="vo">
                <li><a href="{$vo.url}">{$vo.title}</a><li>
              </volist>
           </content>

<!--使用foreach循环输出-->

<!--使用foreach循环输出-->

        </div>
        <div class="new_ph">
        	<div class="ph_tit"><div class="ph_name">新闻排行榜</div></div>
            <div class="ph_itm">
            	<ul>
                  <content action="lists" catid="333" order="view DESC" num="16">
                    <volist name="data" id="vo">
                      <li><a href="{$vo.url}">{$vo.title}</a><li>
                    </volist>
                  </content>

                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<template file="Contents/footer.php" />
</body>
</html>