<?php if (!defined('LONG_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/default/css/mxhy.css" rel="stylesheet" />
<link href="{$config_siteurl}statics/default/css/common.css" rel="stylesheet" type="text/css"/>
<!--[if IE 6]>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
EvPNG.fix('div, ul, ol, li, dl, dt, dd, img, input, a, span, b, i, em, p, h1, h2, h3, h4, h5, h6');
</script>
<![endif]-->
</head>
<body>
<template file="Contents/header.php" />
<div class="banner"><img src="{$Categorys[$catid]['image']}" /></div>
<template file="Contents/search.php" />
<div class="star">
<div class="ph">
<content action="lists" catid="$catid" order="updatetime DESC" num="8" page="$page" >
<volist name="data" id="vo" key="k">
<ul <if condition="($k%4) eq 1">class="first"</if>>
<li><img src="{$vo.thumb}"/></li>
<li class="jianjie">
<a href="{$vo.url}">{$vo.title}</a></a></li>
</ul>
</volist>
</content>
</div>
 <div class="yema">
      {$pages}
</div>
</div>
<template file="Contents/footer.php" />
</body>
</html>