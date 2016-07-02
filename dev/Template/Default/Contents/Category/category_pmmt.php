<?php if (!defined('LONG_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/default/css/style.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="{$config_siteurl}statics/default/js/ScrollText.js"></script>
<script language="javascript" type="text/javascript">
    window.onload = function () {
        var scrollup = new ScrollText("hotNews");
        scrollup.LineHeight = 16;
        scrollup.Amount = 2;
        scrollup.Start();
    }
    </script>
<!--[if IE 6]>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
EvPNG.fix('div, ul, ol, li, dl, dt, dd, img, input, a, span, b, i, em, p, h1, h2, h3, h4, h5, h6');
</script>
<![endif]-->
</head>
<body>
<template file="Contents/header1.php" />
<div class="banner"><img src="{$Categorys[150][image]}" height="150" width="1004"></div>
<div class="layout_div">
  <div class="fl w220">
      <div class="pageL_nav">
        <ul>
          <content action="category" catid="150" order="listorder ASC">
            <volist name="data" id="vo" key="k">
              <li><a href="{$vo.url}" <if condition="$k eq 1">class="navOn"</if>>{$vo.catname}</a></li>
            </volist>
          </content>
        </ul>
      </div><!--.pageL_nav end--> 
<h1 class="pageL_title">公司业务<span>service</span></h1>
<ul class="pageL_service">
    <content action="category" catid="150" order="listorder ASC">
          <volist name="data" id="vo" key="k">
            <li <if condition="($k%2) eq 0"><else />class="pr13"</if>><a href="{$vo.url}" class="numeber_0{$k}">{$vo.catname}</a></li> 
          </volist>
        </content>
</ul>      <img src="{$config_siteurl}statics/default/images/pageL_tel.jpg" height="57" width="219">    
    </div><!--.fl end-->
<div class="fr w774">
      <div class="sec_title border_B">
        <h1>{$Categorys[371][catname]}
        </h1><!--标题-->
        <div>当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></div>    
      </div><!--.sec_title end-->
      <div class="p_25 border3 mh600">
        <content action="article" catid="371" table="article">
           {$data.content}
         </content>        
      </div>
  </div><!--.fr end-->  
  <div class="clearfix"></div><!--.clearfix 删除浮动-->
  </div>
<template file="Contents/footer.php" />
</body>
</html>