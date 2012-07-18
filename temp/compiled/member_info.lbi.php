<?php if ($this->_var['user_info']): ?>
<div class="lrg">
<?php echo $this->_var['user_info']['username']; ?>
</div>
<div class="lrg">
<a href="user.php<?php echo $this->_var['curl']; ?>"><?php echo $this->_var['lang']['user_center']; ?></a>|
<a href="user.php?act=logout"><?php echo $this->_var['lang']['user_logout']; ?></a>|
</div>
<?php else: ?>
<div class="lrg">
<a href="user.php<?php echo $this->_var['curl']; ?>">请登录</a>|
</div>
<div class="lrg">
<a href="user.php?act=register&cid=<?php echo $this->_var['cid']; ?>">注册</a>|
</div>
<?php endif; ?>