<?php if (!defined('LONG_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="canonical" href="{$config_siteurl}" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/default/css/common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/default/css/index.css">
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/default/css/focus.css">
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.8.2.min.js"></script>
<SCRIPT language=javascript src="{$config_siteurl}statics/default/js/jq1.js"></SCRIPT>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.SuperSlide.js"></script>
<SCRIPT language=javascript src="{$config_siteurl}statics/default/js/Designer.js"></SCRIPT>
<!--[if IE 6]>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
EvPNG.fix('div, ul, ol, li, dl, dt, dd, img, input, a, span, b, i, em, p, h1, h2, h3, h4, h5, h6');
</script>
<![endif]-->
</head>
<body>
<template file="Contents/header.php" />
<!--banner-->
<div class="Aflash">
<div style="height: 350px;" class="index_focus">
<div class="bd">
<ul style="position: relative; width:960px; height: 350px;">
  <content action="lists" catid="363" order="listorder ASC">
    <volist name="data" id="vo">
      <li><a href="{$vo.url}" class="pic" target="_blank"><img class="pic" src="{$vo.pic}" alt="" width="960" height="350"></a></li>
    </volist>
  </content>
</ul>
</div>
<div class="slide_hx">
<div class="slide_nav">
<content action="lists" catid="363" order="listorder ASC">
    <volist name="data" id="vo" key="k">
      <a class="" href="javascript:;"><i>{$k}</i></a>
    </volist>
</content>
</div>
</div>
</div>
<!-- End 焦点图 -->    
<script type="text/javascript">
    jQuery(".index_focus").hover(function () {
        jQuery(this).find(".index_focus_pre,.index_focus_next").stop(true, true).fadeTo("show", 1)
    }, function () {
        jQuery(this).find(".index_focus_pre,.index_focus_next").fadeOut()
    });
    jQuery(".slide_pre").hover(function () {
        jQuery(this).find(".slide_pre").stop(true, true).fadeTo("show", 1)
    }, function () {
        jQuery(this).find(".slide_pre").fadeOut()
    });
    jQuery(".slide_nxt").hover(function () {
        jQuery(this).find(".slide_nxt").stop(true, true).fadeTo("show", 1)
    }, function () {
        jQuery(this).find(".slide_nxt").fadeOut()
    });
    jQuery(".index_focus").slide({
        titCell: ".slide_nav a ",
        mainCell: ".bd ul",
        delayTime: 500,
        interTime: 3500,
        //prevCell:".index_focus_pre",
        //nextCell:".index_focus_next",
        prevCell: ".slide_pre",
        nextCell: ".slide_nxt",
        effect: "fold",
        autoPlay: true,
        trigger: "click",
        startFun: function (i) {
            jQuery(".index_focus_info").eq(i).find("h3").css("display", "block").fadeTo(1000, 1);
            jQuery(".index_focus_info").eq(i).find(".text").css("display", "block").fadeTo(1000, 1);
        }
    });
</script>
</div>
<div class="content1">
<div class="wenhua">
<div class="tl">
<span>关于我们</span>
</div>
<h>
<content action="article" catid="417" table="article">
&nbsp;&nbsp;&nbsp;&nbsp;{$data.description}  
</content>
</h>
</div>
<div class="xinwen">
<div class="tl">
<span>新闻资讯</span>
<a href="{:U('index/lists',array('catid'=>333))}"><img src="{$config_siteurl}statics/default/image/more.jpg" /></a>
</div>
<ul>
<content action="lists" catid="333" num="9">
   <volist name="data" id="vo">
      <li><a href=""><span>· {$vo.title|str_cut=###,14}</span><h>{$vo.updatetime|date="Y/m/d",###}</h></a></li>
   </volist>
</content>
</ul>
</div>
<div class="shipin">
<div class="tl">
<span>经典视频</span>
<a href="{:U('index/lists',array('catid'=>333))}"><img src="{$config_siteurl}statics/default/image/more.jpg" /></a>
</div>
<div class="play">
<center><div id="video"><div id="a1"></div></div></center>

<script type="text/javascript" src="{$config_siteurl}statics/default/js/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
	var flashvars={
		f:'http://movie.ks.js.cn/flv/other/1_0.flv',
		c:0,
		b:1
		};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
	CKobject.embedSWF('{$config_siteurl}statics/default/ckplayer/ckplayer.swf','a1','ckplayer_a1','280','200',flashvars,params);
	/*
	CKobject.embedSWF(播放器路径,容器id,播放器id/name,播放器宽,播放器高,flashvars的值,其它定义也可省略);
	下面三行是调用html5播放器用到的
	*/
	var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4'];
	var support=['iPad','iPhone','ios','android+false','msie10+false','webKit'];
	CKobject.embedHTML5('video','ckplayer_a1',280,200,video,flashvars,support);
  </script>
  </div>
</div>
</div>
<!--电视频道-->
<div class="dspd">
<div class="tl">
<span>电视频道</span>
<a href="{:U('index/lists',array('catid'=>374))}"><img src="{$config_siteurl}statics/default/image/more.jpg" /></a>
</div>
 <ul class="h218px">
<table width="960" height="100" align="center" cellpadding="0" cellspacing="0" border="0">
	<tr><th width="19" valign="top"><img src="{$config_siteurl}statics/default/image/leftjt.gif" class="pointer" id="arrLeft" border="0" /></th>
    <td width="920" valign="top">
    	<div id="scrollbox">
        <ul>
          <content action="lists" catid="374" num="13" >
             <volist name="data" id="vo">
               <li><a href="{$vo.url}"><img src="{$vo.thumb}" border="0" ><br />{$vo.title}</a></li>
             </volist>
          </content>
        </ul>
        </div>
    </td>
    <th width="19" valign="top"><img src="{$config_siteurl}statics/default/image/rightjt.gif" class="pointer" id="arrRight" border="0" /></th></tr>
</table>
<SCRIPT language=javascript type=text/javascript>
		var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "scrollbox"; //内容容器ID
		scrollPic_02.arrLeftId      = "arrLeft";//左箭头ID
		scrollPic_02.arrRightId     = "arrRight"; //右箭头ID
		scrollPic_02.frameWidth     = 920;//显示框宽度
		scrollPic_02.pageWidth      = 920; //翻页宽度
		scrollPic_02.speed          = 8; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 8; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 4; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
</SCRIPT>
    </ul>
</div>
<template file="Contents/footer.php" />
</body>
</html>
