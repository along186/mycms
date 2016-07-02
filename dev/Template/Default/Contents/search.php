<?php if (!defined('LONG_VERSION')) exit(); ?>
<div class="select">
<div class="condition">
<form action="{$config_siteurl}" method="get">
<input type="hidden" name="a" value="lists" />
<input type="hidden" name="catid" value="408" />
<div class="city">
<a>出场费：</a>
<select name="chu" id="chu">
<option value="0">不限</option>
  <content action="category" catid="427" order="catid">
     <volist name="data" id="vo">
        <option value="c{$vo.catid}" <if condition="substr($chu,1,strlen($chu)) eq $vo[catid]">selected="selected"</if> >{$vo.catname}</option>
     </volist>
  </content>
</select>
</div>
<div class="city">
<a>代言费：</a>
<select name="dai" id="dai">
<option value="0">不限</option>
  <content action="category" catid="436" order="catid">
     <volist name="data" id="vo">
        <option value="d{$vo.catid}" <if condition="substr($dai,1,strlen($dai)) eq $vo[catid]">selected="selected"</if>>{$vo.catname}</option>
     </volist>
  </content>  
</select>
</div>
<div class="sex">
<a>性别：</a>
 <content action="category" catid="389" order="catid">
     <volist name="data" id="vo" key="k">
        <input type="radio" <if condition="substr($sex,1,strlen($sex)) eq $vo[catid]">checked="checked"</if> <if condition="$k eq 1">checked="checked"</if> name="sex" value="x{$vo.catid}"><h>{$vo.catname}</h>
     </volist>
  </content>  
</div>
<div class="diqu">
<div class="lf"><a>地区：</a></div>
<div class="rh">
<ul>
<content action="category" catid="392" order="catid">
     <volist name="data" id="vo" key="k">
       <li><input type="radio" <if condition="substr($diqu,1,strlen($diqu)) eq $vo[catid]">checked="checked"</if><if condition="$k eq 1">checked="checked"</if> name="diqu" value="d{$vo.catid}" ><h>{$vo.catname}</h></li>
     </volist>
</content>  
</ul> 
</div> 
</div>
<div class="zhiye">
<div class="lf"><a>职业：</a></div>
<div class="rh">
<ul>
<content action="category" catid="398" order="catid">
     <volist name="data" id="vo" key="k">
       <li><input type="radio" <if condition="substr($zhiye,1,strlen($zhiye)) eq $vo[catid]">checked="checked"</if><if condition="$k eq 1">checked="checked"</if> name="zhiye" value="l{$vo.catid}" ><h>{$vo.catname}</h></li>
     </volist>
</content>  
</ul>  
</div>
</div>
<div class="button">
<input type="submit" name="submit" value="条件搜索" class="btn" />
</div>
</form>
</div>
<div class="starsearch">
<h>热门搜索:</h>
<position action="position" posid="33" order="listorder asc" num="6">
   <volist name="data" id="vo">
      <a href="{$vo.data.url}">{$vo.data.title}</a>
   </volist>
</position>
<div class="input">
<input id="demo" onfocus="javascript:if(this.value=='输入您想要的明星姓名')this.value=''" value="输入您想要的明星姓名">
<button  type="button" onclick="myFunction()">明星搜索</button>
<script type="text/javascript">
function myFunction(){
 var starname = document.getElementById("demo").value;
 window.location.href="index.php?a=lists&catid=408&starname="+starname; 
}
</script>
</div>
<h>明星报价热线:</h><span>021-61841882</span>
<div class="snav">
<a href="{:U('index/lists',array('catid'=>146))}">了解我们 |</a>
<a href="{:U('index/lists',array('catid'=>408))}">明星出场费报价 |</a>
<a href="{:U('index/lists',array('catid'=>408))}">明星代言费报价 |</a>
<a href="{:U('index/lists',array('catid'=>374))}">演出活动须知 |</a>
</div>
<div class="tnav">
<span>
<content action="category" catid="392" order="catid asc">
  <volist name="data" id="vo" key="k">
    <a href="index.php?a=lists&catid=408&diqu=d{$vo.catid}"><if condition="$k eq 1">{$vo.catname}<else /> |{$vo.catname}</if> </a>
  </volist>
</content>
</span>
</div>
</div>
<div class="loading">
<span>用户登录</span>
<a>用户名：</a><input type="text" name="id" id="id" value=""/>
<br />
<a>密码：</a><input type="password" name="password" id="password" value=""/>
<input class="mm" type="checkbox"><h>记住密码</h><a class="wj" href="">忘记密码</a>
<div class="an">
<a style="margin-left:10px;"><button  type="button" onclick="myFunction()">登录</button></a>
<a href="zhuce.html"><button  type="button" onclick="myFunction()">注册</button></a></div>
</div>
</div>
<!--/search-->