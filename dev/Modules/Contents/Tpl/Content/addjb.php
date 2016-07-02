<?php if (!defined('LONG_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>添加新文章 - 系统后台 - {$Config.sitename} - by IITCMS</title>
<Admintemplate file="Admin/Common/Cssjs"/>
<script type="text/javascript">
    var catid = "{$catid}";
</script>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("{$config_siteurl}statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
<script type="application/javascript" language="javascript">
function addFilterAttr(obj)
{
  var src = obj.parentNode.parentNode;
  var tbl = document.getElementById('tbody-attr');
  var row  = tbl.insertRow(tbl.rows.length);
  var cell = row.insertCell(-1);
  cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addFilterAttr)(.*)(\[)(\+)/i, "$1removeFilterAttr$3$4-");
}
function removeFilterAttr(obj)
{ 
  var row = obj.parentNode.parentNode.rowIndex;
  var tbl = document.getElementById('tbody-attr');
  tbl.deleteRow(row);
}
function addFilterAttr2(obj)
{
  var src = obj.parentNode.parentNode;
  var tbl = document.getElementById('tbody-attr2');
  var row  = tbl.insertRow(tbl.rows.length);
  var cell = row.insertCell(-1);
  cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addFilterAttr)(.*)(\[)(\+)/i, "$1removeFilterAttr$3$4-");
}
function removeFilterAttr2(obj)
{ 
  var row = obj.parentNode.parentNode.rowIndex;
  var tbl = document.getElementById('tbody-attr2');
  tbl.deleteRow(row);
}
</script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc">
      <li class="current"><a href="{:U('Content/classlist', array('catid'=>$catid)  )}">{$category.catname}列表</a></li>
    </ul>
  </div>
  <div class="h_a">温馨提示</div>
  <div class="prompt_text"> 
    <p>请不要发布违反法律不允许的内容！</p>
   </div>
  <form name="myform" id="myform" action="{:U("Contents/Content/add")}" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
<?php
if(is_array($forminfos['senior'])) {
 foreach($forminfos['senior'] as $field=>$info) {
	if($info['isomnipotent']) continue;
	if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?> 
         <tr>
          <td><b><?php echo $info['name']?></b><?php if($info['star']){ ?><font color="red">*</font><?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $info['form'];?><?php echo $info['tips'];?></td>
        </tr>
<?php
   }
}
?>
         
         
         <tr>
          <td><b>状态</b></td>
        </tr>
        <tr>
          <td>
          <span class="switch_list cc">
			<label><input type="radio" name="info[status]" value="99" checked><span>审核通过</span></label>
			<label><input type="radio" name="info[status]" value="1"  ><span>待审核</span></label>
		 </span></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="col-auto">
    <div class="h_a">文章内容</div>
    <div class="table_full">
      <table width="100%">
            <?php
if(is_array($forminfos['base'])) {
 foreach($forminfos['base'] as $field=>$info) {
	 if($info['isomnipotent']) continue;
	 if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?>
            <tr>
              <th width="80">
                <?php echo $info['name'];?> 
               </th>
              <td><?php if($info['star']){ ?><span class="must_red">*</span><?php } ?><?php echo $info['form'];?> <?php echo $info['tips'];?></td>
            </tr>
            <?php
} }
?>
        <?php
		  if($modelid == 1)
		  {
	      ?>
		    <tr>
            <th>大科室</th>
            <td><select name="info[bigks]" onChange="onChangebigks()" id="bigks">
                <option value="0">请选择</option>
                <?php
				 foreach($keshi_list as $key => $row)
				 {
				?>
                <option value="<?php echo $row['catid'] ?>"><?php echo $row['catname']?></option>
                <?php
				 }
				?>
            </select>
            </td>
            </tr>
            <tr>
             <th>小科室</th>
             <td id="smallks"></td>
            </tr>
            <tr>
             <th>疾病</th>
             <td id="jibing"></td>
            </tr>
		  <?php
		  }
		?>
        <?php
           if($modelid == 8){
		   ?>
           <tr>
             <th>结果类型</th>
              <td>
                 <table border="0" cellpadding="0" cellspacing="0" id="tbody-attr2">
                   <tr>
                     <td>
                       <a href="javascript:;" onclick="addFilterAttr2(this)">[+]</a>
                        最小分数：<input type="text" name="info[self_result_min][]"   />&nbsp;最大分数：<input type="text" name="info[self_result_max][]" /> &nbsp;结果描述:<input type="text" name="info[self_result_desc][]">
                </td>
              </tr>
             </table>
        </td>
        </tr>	
            <tr>
             <th>问题</th>
              <td>
                 <table border="0" cellpadding="0" cellspacing="0" id="tbody-attr">
                   <tr>
                     <td>
                       <a href="javascript:;" onclick="addFilterAttr(this)">[+]</a>
                        问题：<input type="text" name="info[questarr][]"   />选项：<input type="text" name="info[selectarr][]" />(选项请用英文字符 <font color="#FF0000">,</font> 隔开) &nbsp;分值:<input type="text" name="info[valuearr][]">(分值请用英文字符 <font color="#FF0000">,</font> 隔开)
                </td>
              </tr>
             </table>
        </td>
        </tr>	   
	     <?php
         }
		?>
        <?php
          if($modelid == 9)
		  {
		 ?>
           <tr>
             <th>部位</th>
             <td>
               <select name="info[bw_id]" id="bw_id" onChange="onChangeBw()" style="float:left; display:block;">
                  <option value="59">不限</option>
				  <?php
				     foreach($bw_list as $key => $row)
					 {
                  ?>
                     <option value="<?php echo $row['catid']?>"><?php echo $row['catname']?></option>
                  <?php
					 }
				  ?>
                 
               </select>
               <div id="zi_info" style=" width:120px; float:left; margin-left:20px; _margin-left:10px;"></div>
             </td>
           </tr>
           <tr>
             <th>科室</th>
             <td>
               <select name="info[ks_id]" id="ks_id" onChange="onChangeKs()" style="float:left; display:block;">
                 <option value="76">不限</option>
                 <?php
				     foreach($ks_list as $key => $row)
					 {
                  ?>
                     <option value="<?php echo $row['catid']?>"><?php echo $row['catname']?></option>
                  <?php
					 }
				  ?>
               </select>
               <div id="ks_zi_info" style=" width:120px; float:left; margin-left:20px; _margin-left:10px;"></div>
             </td>
           </tr>
           <tr>
             <th>首字母</th>
             <td>
              <select name="info[zm]" id="zm">
              <?php
				     foreach($zm_list as $key => $row)
					 {
                  ?>
                     <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                  <?php
					 }
				  ?>
              </select>
             </td>
           </tr>
         <?php
		  }
		?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn_wrap" style="z-index:999;text-align: center;">
    <div class="btn_wrap_pd">
      <input type="hidden" name="ajax" value="1" />
      <button class="btn btn_submit J_ajax_submit_btn"type="submit" style="display:none" id="dosubmit"></button>
    </div>
  </div>
  <input type="hidden" name="catid" value="{$catid}"/>
  </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script type="text/javascript"> 
$(function () {
	$(".J_ajax_close_btn").on('click', function (e) {
		e.preventDefault();
	    Wind.use("artDialog", function () {
	        art.dialog({
	            id: "question",
	            icon: "question",
	            fixed: true,
	            lock: true,
	            background: "#CCCCCC",
	            opacity: 0,
	            content: "您确定需要关闭当前页面嘛？",
	            ok:function(){
					setCookie("refersh_time",1);
					window.close();
					return true;
				}
	        });
	    });
	});
    Wind.use('validate', 'ajaxForm', 'artDialog', function () {
		//javascript
        {$formJavascript}
        var form = $('form.J_ajaxForms');
        //ie处理placeholder提交问题
        if ($.browser.msie) {
            form.find('[placeholder]').each(function () {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            });
        }
        //表单验证开始
        form.validate({
			//是否在获取焦点时验证
			onfocusout:false,
			//是否在敲击键盘时验证
			onkeyup:false,
			//当鼠标掉级时验证
			onclick: false,
            //验证错误
            showErrors: function (errorMap, errorArr) {
				//alert("asdfafd");
				//errorMap {'name':'错误信息'}
				//errorArr [{'message':'错误信息',element:({})}]
				try{
					$(errorArr[0].element).focus();
					art.dialog({
						id:'error',
						icon: 'error',
						lock: true,
						fixed: true,
						background:"#CCCCCC",
						opacity:0,
						content: errorArr[0].message,
						cancelVal: '确定',
						cancel: function(){
							$(errorArr[0].element).focus();
						}
					});
				}catch(err){
				}
            },
            //验证规则
            rules: {$formValidateRules},
            //验证未通过提示消息
            messages: {$formValidateMessages},
            //给未通过验证的元素加效果,闪烁等
            highlight: false,
            //是否在获取焦点时验证
            onfocusout: false,
            //验证通过，提交表单
            submitHandler: function (forms) {
				var dialog = art.dialog({id: 'loading',fixed: true,lock: true,background: "#CCCCCC",opacity: 0,esc:false,title: false});
				$(forms).ajaxSubmit({
                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                    dataType: 'json',
                    beforeSubmit: function (arr, $form, options) {   
                    },
                    success: function (data, statusText, xhr, $form) {
						//alert(data);
						dialog.close();
                        if(data.status){
							//alert(data);
							setCookie("refersh_time",1);
							//添加成功
							Wind.use("artDialog", function () {
							    art.dialog({
							        id: "succeed",
							        icon: "succeed",
							        fixed: true,
							        lock: true,
							        background: "#CCCCCC",
							        opacity: 0,
							        content: data.info,
							    });
							});
						}else{
							isalert(data.info);
						}
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>