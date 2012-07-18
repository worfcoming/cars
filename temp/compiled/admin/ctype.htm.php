<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div class="form-div">
  <form action="javascript:searchCtype()" name="searchForm" >
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <select name="cb_name" >
       <option value="0">请选择品牌</option>
    <?php $_from = $this->_var['cb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cb_0_06684000_1342529235');if (count($_from)):
    foreach ($_from AS $this->_var['cb_0_06684000_1342529235']):
?>
    <option value="<?php echo $this->_var['cb_0_06684000_1342529235']['id']; ?>"><?php echo $this->_var['cb_0_06684000_1342529235']['cbrand_name']; ?></option>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="button" />
  </form>
</div>

<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>
<table cellpadding="3" cellspacing="1">
    <tr>
      <th>品牌名称</th>
      <th>车系名称</th>
      <th>车款名称</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['ctype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ctype_0_06732100_1342529235');if (count($_from)):
    foreach ($_from AS $this->_var['ctype_0_06732100_1342529235']):
?>
    <tr>
      <td align="center"><?php echo $this->_var['ctype_0_06732100_1342529235']['cbrand_name']; ?></td>
      <td align="center"><?php echo $this->_var['ctype_0_06732100_1342529235']['csys_name']; ?></td>
      <td align="center"><?php echo $this->_var['ctype_0_06732100_1342529235']['ctype_name']; ?></td>
      <td align="center">
        <a href="ctype.php?act=ctype_edit&id=<?php echo $this->_var['ctype_0_06732100_1342529235']['id']; ?>">编辑</a> |
        <a href="javascript:;" onclick="" >移除</a> 
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <tr>
      <td align="right" nowrap="true" colspan="6">
      <?php echo $this->fetch('page.htm'); ?>
      </td>
    </tr>
  </table>
<?php if ($this->_var['full_page']): ?>
  </div>
</form>  
<script type="text/javascript" language="javascript">
  <!--
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  
  onload = function()
  {
      // 开始检查订单
      startCheckOrder();
  }
  
   function searchCtype()
 {
    listTable.filter.cb_name = parseInt(document.forms['searchForm'].elements['cb_name'].value);
    listTable.filter.page = 1;
    listTable.loadList();
 }
  
  //-->
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>