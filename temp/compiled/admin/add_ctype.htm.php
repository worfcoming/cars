<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<div class="list-div" style="margin-bottom: 5px; margin-top: 10px;" id="listDiv">
<form method="post" action="ctype.php?act=<?php echo $this->_var['act']; ?>"  enctype="multipart/form-data" >
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">请选择品牌及车系</td>
    <td>
    <select onchange="callbrand(this.value)" name="cb_name">
    <option value="0">请选择品牌</option>
    <?php $_from = $this->_var['cb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cb_0_04801400_1342536313');if (count($_from)):
    foreach ($_from AS $this->_var['cb_0_04801400_1342536313']):
?>
    <option <?php if ($this->_var['ctype']['cb_name'] == $this->_var['cb_0_04801400_1342536313']['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_var['cb_0_04801400_1342536313']['id']; ?>"><?php echo $this->_var['cb_0_04801400_1342536313']['cbrand_name']; ?></option>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    <select onchange="" name="csys_id" id='cx'>
    <option value="<?php echo $this->_var['ctype']['csys_id']; ?>"><?php if ($this->_var['ctype']['csys_name'] != ''): ?><?php echo $this->_var['ctype']['csys_name']; ?><?php else: ?>请选择车系<?php endif; ?></option>
    <?php $_from = $this->_var['csys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'csys');if (count($_from)):
    foreach ($_from AS $this->_var['csys']):
?>
    <option value="<?php echo $this->_var['csys']['id']; ?>"><?php echo $this->_var['csys']['csys_name']; ?></option>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    </td>
  </tr>

  
    <tr>
    <td class="label">年款</td>
    <td>
    <select name="ctype_year">
    <option>2012款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2011款'): ?>selected="selected"<?php endif; ?>>2011款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2010款'): ?>selected="selected"<?php endif; ?>>2010款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2009款'): ?>selected="selected"<?php endif; ?>>2009款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2008款'): ?>selected="selected"<?php endif; ?>>2008款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2007款'): ?>selected="selected"<?php endif; ?>>2007款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2006款'): ?>selected="selected"<?php endif; ?>>2006款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2005款'): ?>selected="selected"<?php endif; ?>>2005款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2004款'): ?>selected="selected"<?php endif; ?>>2004款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2003款'): ?>selected="selected"<?php endif; ?>>2003款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2002款'): ?>selected="selected"<?php endif; ?>>2002款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2001款'): ?>selected="selected"<?php endif; ?>>2001款</option>
    <option <?php if ($this->_var['ctype']['ctype_year'] == '2000款'): ?>selected="selected"<?php endif; ?>>2000款</option>
    
    </select>
    </td>
  </tr>
  
        <tr>
    <td class="label">发动机</td>
    <td><input type="text" name="ctype_eg" size="40" value="<?php echo $this->_var['ctype']['ctype_eg']; ?>">
    </td>
  </tr>
  
      <tr>
    <td class="label">变速</td>
    <td><input type="radio" name="ctype_vs" checked="checked" value="AT">AT
    <input type="radio" name="ctype_vs" value="MT" <?php if ($this->_var['ctype']['ctype_vs'] == 'MT'): ?>checked="checked"<?php endif; ?>>MT
    
    </td>
  </tr>
  
    
    <tr>
    <td class="label">驱动</td>
    <td><input type="radio" name="ctype_dv" checked="checked"  value="前驱">前驱
    <input type="radio" name="ctype_dv"  value="后驱" <?php if ($this->_var['ctype']['ctype_dv'] == '后驱'): ?>checked="checked"<?php endif; ?>>后驱
    <input type="radio" name="ctype_dv" value="四驱" <?php if ($this->_var['ctype']['ctype_dv'] == '四驱'): ?>checked="checked"<?php endif; ?>>四驱
    </td>
  </tr>
  
    <tr>
    <td class="label">车体</td>
    <td><input type="radio" name="ctype_bd" checked="checked" value="两厢">两厢
    <input type="radio" name="ctype_bd" value="三厢" <?php if ($this->_var['ctype']['ctype_bd'] == '三厢'): ?>checked="checked"<?php endif; ?>>三厢
    </td>
  </tr>
  

    <tr>
    <td class="label">配型</td>
    <td><input type="text" name="ctype_px" size="40" value="<?php echo $this->_var['ctype']['ctype_px']; ?>">
    </td>
  </tr>
  
  
  <tr>
    <td class="label">车款名称</td>
    <td><input type="text" name="ctype_name" size="40" value="<?php echo $this->_var['ctype']['ctype_name']; ?>">
    </td>
  </tr>

 <tr>
    <td class="label">车款主图</td>
    <td><input type="file" name="ctype_pic" size="45" value="">
    </td>
  </tr>

  <tr>
    <td colspan="2" align="center"><br />
      <input type="hidden" name = "ctid" value="<?php echo $this->_var['ctype']['id']; ?>" />
      <input type="hidden" name = "old_img" value="<?php echo $this->_var['ctype']['ctype_pic']; ?>" />
      <input type="submit" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
    </td>
  </tr>
</table>
</form>

</div>
<?php echo $this->fetch('pagefooter.htm'); ?>
<script type="text/javascript">

function callbrand(bid){
	Ajax.call('/car.php?act=ibrand','bid='+bid, cbResponse, 'POST', 'JSON');
}
function cbResponse(result){
	var obj=document.getElementById('cx');
	obj.options.length=0;
	obj.options.add(new Option("请选择车系", "0"));
	for (i = 0; i <result.length; i ++ )
    {
    obj.options.add(new Option(result[i].csys_name, result[i].id)); //这个兼容IE与firefox
	}
	
}


</script>