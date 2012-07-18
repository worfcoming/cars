<?php echo $this->fetch('pageheader.htm'); ?>
<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
    <tr>
      <th>首字母</th>
      <th>品牌名称</th>
      <th>是否显示</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['cbrand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cb');if (count($_from)):
    foreach ($_from AS $this->_var['cb']):
?>
    <tr>
      <td align="center"><?php echo $this->_var['cb']['alpha']; ?></td>
      <td align="center"><?php echo $this->_var['cb']['cbrand_name']; ?></td>
      <td align="center"><?php if ($this->_var['cb']['cbrand_sort'] == '1'): ?>是<?php else: ?>否<?php endif; ?></td>
      <td align="center">
        <a href="cbrand.php?act=cb_edit&id=<?php echo $this->_var['cb']['id']; ?>">编辑</a> |
        <a href="javascript:;" onclick="" >移除</a> 
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  </div>
<?php echo $this->fetch('pagefooter.htm'); ?>