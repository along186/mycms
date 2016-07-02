<?php if (!defined('LONG_VERSION')) exit(); ?>
<!--top-->
<div class="top">
<img src="{$config_siteurl}statics/default/image/logo.jpg" />
</div>
<!--nav-->
<div class="nav_box">
<div class="nav">
<a class="current" href="{$config_siteurl}">首页</a>
<content action="category" catid="0" order="listorder ASC">
  <volist name="data" id="vo">
     <img src="{$config_siteurl}statics/default/image/nav_ jg.jpg" />
     <a href="{$vo.url}">{$vo.catname}</a>
  </volist>
</content>
<img src="{$config_siteurl}statics/default/image/nav_ jg.jpg" />
</div>
</div>
<!--/Header-->