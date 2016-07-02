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
<link href="{$config_siteurl}statics/default/css/column.css" rel="stylesheet" type="text/css">
<link href="{$config_siteurl}statics/default/css/share_style0_16.css" rel="stylesheet">
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
<div id="lxwm">
<div class="w1000">

<div class="dir">
  <span>当前位置：</span> <span><a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span> 
</div>

<div class="info"> 
<div class="left">
    <ul>
        <li class="mxyc"></li>
         <content action="category" catid="0" order="listorder ASC">
           <volist name="data" id="vo">
              <li><a href="{$vo.url}">{$vo.catname}</a>
           </volist>
         </content>
      </ul>

    <div class="lxfs">
        <p class="tit">联系方式:</p>
       <p class="dh"> 010-59793189</p>
          <p class="tit">传真：</p>
             <p class="dh">13910187778</p>
    </div>
</div>
<div class="rit">
<div class="nr">
<div class="tit_xx">{$title}</div>
<div class="des">日期：{$updatetime}
</div>
<div class="banquan">版权问题：此网站内容皆属于北京铭星文化发展有限公司所有，未经允许禁止转载！</div>
</div>

</div>
<div style="clear:both"></div>

</div>
</div>
</div>
</div>
<template file="Contents/footer.php" />
</body>
</html>