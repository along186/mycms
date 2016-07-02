<form method="post" action="{:U('Index/post')}" id="myform" name="myform">
    <input type="hidden" name="formid" value="{$formid}"/>
    <ul>
        <?php
        if (is_array($forminfos)) {
            foreach ($forminfos as $field => $info) {
                if ($info['isomnipotent'])
                    continue;
                if ($info['formtype'] == 'omnipotent') {
                    foreach ($forminfos as $_fm => $_fm_value) {
                        if ($_fm_value['isomnipotent']) {
                            $info['form'] = str_replace('{' . $_fm . '}', $_fm_value['form'], $info['form']);
                        }
                    }
                }
                ?>

                <li><span>{$info['name']}：</span>{$info['form']}</li>
                <?php
            }
        }
        ?>
        <li style=" width:90%; text-align:center;"><input name="forward" type="hidden" value="{$forward}"><input name="dosubmit" type="submit" id="dosubmit" value="提交留言" style=" width:72px; height:25px; border:none; background:url({$config_siteurl}statics/default/images/bo_tit.gif); text-align:center; color:#FFF;" ></li>
    </ul>
</form>