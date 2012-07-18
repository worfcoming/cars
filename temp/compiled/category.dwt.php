<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content=" " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<?php if ($this->_var['cat_style']): ?>
<link href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,global.js')); ?>
</head>
<body>
<div class="body">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="icontent">
<div class="ileft">
<div class="ilogo">
<img src="themes/car/images/logo3.png" alt="logo">
</div>

<?php echo $this->fetch('library/category_tree.lbi'); ?>
<?php echo $this->fetch('library/history.lbi'); ?>



    
  </div>
  
  
<div class="iright">
  <div class="guide">
<a href="index.php">&nbsp;</a>
<div class="hov">
<a href="">商城</a>
<a href="">资讯</a>
<a href="">问答</a>
</div>
</div>
<div class="blank5"></div>
	 
	  <?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
	  <div class="box">
		 <div class="box_1">
			<?php if ($this->_var['brands']['1']): ?>
			<div class="screeBox">
			  <strong><?php echo $this->_var['lang']['brand']; ?>：</strong>
				<?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
					<?php if ($this->_var['brand']['selected']): ?>
					<span><?php echo $this->_var['brand']['brand_name']; ?></span>
					<?php else: ?>
					<a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a>&nbsp;
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['price_grade']['1']): ?>
			<div class="screeBox">
			<strong><?php echo $this->_var['lang']['price']; ?>：</strong>
			<?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
				<?php if ($this->_var['grade']['selected']): ?>
				<span><?php echo $this->_var['grade']['price_range']; ?></span>
				<?php else: ?>
				<a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a>&nbsp;
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<?php endif; ?>
			<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_04500100_1342501676');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_04500100_1342501676']):
?>
      <div class="screeBox">
			<strong><?php echo htmlspecialchars($this->_var['filter_attr_0_04500100_1342501676']['filter_attr_name']); ?> :</strong>
			<?php $_from = $this->_var['filter_attr_0_04500100_1342501676']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
				<?php if ($this->_var['attr']['selected']): ?>
				<span><?php echo $this->_var['attr']['attr_value']; ?></span>
				<?php else: ?>
				<a href="<?php echo $this->_var['attr']['url']; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a>&nbsp;
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 </div>
		</div>
		<div class="blank5"></div>
	  <?php endif; ?>
	 
   
<?php echo $this->fetch('library/goods_list.lbi'); ?>
<?php echo $this->fetch('library/pages.lbi'); ?>



  </div>  
  
</div>
<div class="blank5"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>
</body>
</html>
