<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content=" " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'user.js,transport_org.js,car_org.js')); ?>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<?php if ($this->_var['action'] == 'login'): ?>
<div class="usBox clearfix">
  <div class="usBox_1 f_l">
   <div class="logtitle"></div>
   <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
        <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
          <tr>
            <td width="15%" align="right"><?php echo $this->_var['lang']['label_username']; ?></td>
            <td width="85%"><input name="username" type="text" size="25" class="inputBg" /></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['label_password']; ?></td>
            <td>
            <input name="password" type="password" size="15"  class="inputBg"/>
            </td>
          </tr>
          <?php if ($this->_var['enabled_captcha']): ?>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
            <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td colspan="2"><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember"><?php echo $this->_var['lang']['remember']; ?></label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left">
            <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
            <input type="submit" name="submit" value="" class="us_Submit" />
            </td>
          </tr>
	  <tr><td></td><td><a href="user.php?act=qpassword_name" class="f3"><?php echo $this->_var['lang']['get_password_by_question']; ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" class="f3"><?php echo $this->_var['lang']['get_password_by_mail']; ?></a></td></tr>
      </table>
    </form>
  </div>
  <div class="usTxt">
    <strong><?php echo $this->_var['lang']['user_reg_info']['0']; ?></strong>  <br />
    <strong class="f4"><?php echo $this->_var['lang']['user_reg_info']['1']; ?>：</strong><br />
    <?php if ($this->_var['car_off'] == 1): ?>
    <?php echo $this->_var['lang']['user_reg_info']['2']; ?><br />
    <?php endif; ?>
    <?php if ($this->_var['car_off'] == 0): ?>
    <?php echo $this->_var['lang']['user_reg_info']['8']; ?><br />
    <?php endif; ?>
    <?php echo $this->_var['lang']['user_reg_info']['3']; ?>：<br />
    1. <?php echo $this->_var['lang']['user_reg_info']['4']; ?><br />
    2. <?php echo $this->_var['lang']['user_reg_info']['5']; ?><br />
    3. <?php echo $this->_var['lang']['user_reg_info']['6']; ?><br />
    4. <?php echo $this->_var['lang']['user_reg_info']['7']; ?>  <br />
    <a href="user.php?act=register"><img src="themes/car/images/bnt_ur_reg.gif" /></a>
  </div>
</div>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'register'): ?>
    <?php if ($this->_var['shop_reg_closed'] == 1): ?>
    <div class="usBox">
      <div class="usBox_2 clearfix">
        <div class="f1 f5" align="center"><?php echo $this->_var['lang']['shop_register_closed']; ?></div>
      </div>
    </div>
    <?php else: ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
   <div class="regtitle"></div>
    <form action="user.php" method="post" name="formUser" onsubmit="return register();">
      <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
        <tr>
          <td width="13%" align="right"><?php echo $this->_var['lang']['label_username']; ?></td>
          <td width="87%">
          <input name="username" type="text" size="25" id="username" onblur="is_registered(this.value);" class="inputBg"/>
            <span id="username_notice" style="color:#FF0000"> *</span>
          </td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['label_email']; ?></td>
          <td>
          <input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);"  class="inputBg"/>
            <span id="email_notice" style="color:#FF0000"> *</span>
          </td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['label_password']; ?></td>
          <td>
          <input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="inputBg" style="width:179px;" />
            <span style="color:#FF0000" id="password_notice"> *</span>
          </td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['label_password_intensity']; ?></td>
          <td>
            <table width="145" border="0" cellspacing="0" cellpadding="1">
              <tr align="center">
                <td width="33%" id="pwd_lower"><?php echo $this->_var['lang']['pwd_lower']; ?></td>
                <td width="33%" id="pwd_middle"><?php echo $this->_var['lang']['pwd_middle']; ?></td>
                <td width="33%" id="pwd_high"><?php echo $this->_var['lang']['pwd_high']; ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['label_confirm_password']; ?></td>
          <td>
          <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);"  class="inputBg" style="width:179px;"/>
            <span style="color:#FF0000" id="conform_password_notice"> *</span>
          </td>
        </tr>
        <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
	<?php if ($this->_var['field']['id'] == 6): ?>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['passwd_question']; ?></td>
          <td>
          <select name='sel_question'>
	  <option value='0'><?php echo $this->_var['lang']['sel_question']; ?></option>
	  <?php echo $this->html_options(array('options'=>$this->_var['passwd_questions'])); ?>
	  </select>
          </td>
        </tr>
        <tr>
          <td align="right" <?php if ($this->_var['field']['is_need']): ?>id="passwd_quesetion"<?php endif; ?>><?php echo $this->_var['lang']['passwd_answer']; ?></td>
          <td>
	  <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20'/><?php if ($this->_var['field']['is_need']): ?><span style="color:#FF0000"> *</span><?php endif; ?>
          </td>
        </tr>
	<?php else: ?>
        <tr>
          <td align="right" <?php if ($this->_var['field']['is_need']): ?>id="extend_field<?php echo $this->_var['field']['id']; ?>i"<?php endif; ?>><?php echo $this->_var['field']['reg_field_name']; ?>
          <td>
          <input name="extend_field<?php echo $this->_var['field']['id']; ?>" type="text" size="25" class="inputBg" /><?php if ($this->_var['field']['is_need']): ?><span style="color:#FF0000"> *</span><?php endif; ?>
          </td>
        </tr>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php if ($this->_var['enabled_captcha']): ?>
      <tr>
      <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
      <td><input type="text" size="8" name="captcha" class="inputBg" />
      <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
      </tr>
      <?php endif; ?>
      
      
      <tr>
      <td align="right" height="33">您的车型</td>
      <td>
    <select onchange="callbrand(this.value)" name="cb_name">
    <option value="" selected='selected'>请选择品牌</option>
    <?php $_from = $this->_var['cb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cb_0_16330500_1342530099');if (count($_from)):
    foreach ($_from AS $this->_var['cb_0_16330500_1342530099']):
?>
    <option value="<?php echo $this->_var['cb_0_16330500_1342530099']['id']; ?>"><?php echo $this->_var['cb_0_16330500_1342530099']['alpha']; ?>&nbsp;<?php echo $this->_var['cb_0_16330500_1342530099']['cbrand_name']; ?></option>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
     <select onchange="callsys(this.value)" name="csys_id" id='cx'>
     <option value="">请选择车系</option>
     </select>
     
     <select name="ctype_id" id='ck'>
     <option value="">请选择车款</option>
     </select>
	<span style="color:#FF0000"> *</span>
      </td>
      </tr>
      
      
      
      
      
      
        <tr>
          <td>&nbsp;</td>
          <td><label>
            <input name="agreement" type="checkbox" value="1" checked="checked" />
            <?php echo $this->_var['lang']['agreement']; ?></label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="left">
          <input name="act" type="hidden" value="act_register" >
          <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
          <input name="Submit" type="submit" value="" class="us_Submit_reg">
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="actionSub">
          <a href="user.php?act=login"><?php echo $this->_var['lang']['want_login']; ?></a><br />
          <a href="user.php?act=get_password"><?php echo $this->_var['lang']['forgot_password']; ?></a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['username_and_email']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['email']; ?></td>
            <td><input name="email" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="send_pwd_email" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'qpassword_name'): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="get_passwd_question" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'get_passwd_question'): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
            <td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
            <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
          </tr>
          <?php if ($this->_var['enabled_captcha']): ?>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
            <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="check_answer" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
      <br />
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php echo $this->_var['lang']['new_password']; ?></td>
          <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
        </tr>
        <tr>
          <td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
          <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" />
          </td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<?php endif; ?>

<div class="blank"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</html>
