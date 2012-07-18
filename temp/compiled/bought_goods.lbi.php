<?php if ($this->_var['bought_goods']): ?>
     <div class="box">
     <div class="box_1">
      <h3><span class="text"><?php echo $this->_var['lang']['shopping_and_other']; ?></span></h3>
      <div class="boxCenterList clearfix ie6">
       <?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['bought_goods_data']):
?>
        <div class="goodsItem">
         <a href="<?php echo $this->_var['bought_goods_data']['url']; ?>"><img src="<?php echo $this->_var['bought_goods_data']['goods_thumb']; ?>" alt="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"  class="goodsimg" /></a><br />
         <p><a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"><?php echo $this->_var['bought_goods_data']['short_name']; ?></a></p> 
         <?php if ($this->_var['bought_goods_data']['promote_price'] != 0): ?>
        <font class="shop_s"><?php echo $this->_var['bought_goods_data']['formated_promote_price']; ?></font>
        <?php else: ?>
        <font class="shop_s"><?php echo $this->_var['bought_goods_data']['shop_price']; ?></font>
        <?php endif; ?>
        </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
    <?php endif; ?>