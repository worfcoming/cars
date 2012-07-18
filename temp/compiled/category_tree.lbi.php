<div class="icat">
<div class="chead">
<div class="gcat selc">
按商品分类
</div>
<div class="ccat">
按特色分类
</div>
</div>

<div id="goodscat">
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
<div class="cati">
<div class="catittle">
<div class="catp"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></div>
</div>
<ul>
<?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
<li><a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?><span>(<?php echo $this->_var['child']['num']; ?>)</span></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</div>

<div id="specat">
<div class="cati">
<div class="catittle">
<div class="catp">夏季保养</div>
</div>
<ul>
<li><a href="">洗车<span>(123)</span></a></li>
<li><a href="">封釉<span>(43)</span></a></li>
<li><a href="">洗车器/设备<span>(17)</span></a></li>
<li><a href="">清洁巾/掸子<span>(33)</span></a></li>
</ul>
</div>

<div class="cati">
<div class="catittle">
<div class="catp">夏季保养</div>
</div>
<ul>
<li><a href="">洗车<span>(123)</span></a></li>
<li><a href="">封釉<span>(43)</span></a></li>
<li><a href="">洗车器/设备<span>(17)</span></a></li>
<li><a href="">清洁巾/掸子<span>(33)</span></a></li>
</ul>
</div>

<div class="cati">
<div class="catittle">
<div class="catp">夏季保养</div>
</div>
<ul>
<li><a href="">洗车<span>(123)</span></a></li>
<li><a href="">封釉<span>(43)</span></a></li>
<li><a href="">洗车器/设备<span>(17)</span></a></li>
<li><a href="">清洁巾/掸子<span>(33)</span></a></li>
</ul>
</div>

</div>

</div>