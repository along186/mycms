<form method="post" action="{:U('Index/post')}" id="myform" name="myform">
    <input type="hidden" name="formid" value="{$formid}"/>
    <table cellspacing="0" class="feedback">
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
                <tr>
                <th>{$info['name']}：</th> 
                <td class="input_bg">{$info['form']}</td>
                </tr>
                <?php
            }
        }
        ?>
        <tr>
            <td colspan="2">
                <!--提交成功返回地址-->
                <input name="forward" type="hidden" value="{$forward}">
                <input name="dosubmit" type="submit" id="dosubmit" value="提交" style=" width:100px;background:#F00; color:#FFF;" ></td>
        </tr>
    </table>
</form>