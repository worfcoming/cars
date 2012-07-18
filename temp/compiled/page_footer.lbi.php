<div id="footer1">
<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['x'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['x']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['x']['iteration']++;
?>
<div id="fot1">
<p><img  src="themes/car/images/x<?php echo ($this->_foreach['x']['iteration'] - 1); ?>.gif"/></p>
<ul >
<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
<li><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<div id="fot5">
<p><img  src="themes/car/images/sj.gif"/></p>
&nbsp;&nbsp;&nbsp;<p id="p">业务咨询:4000 111 168</p>
</div>
<div id="fot6" ><img src="themes/car/images/cx.gif"/></div>
</div>

<div id="footer2"  >
 <ul>
 <li ><a href="#">关于爱卡</a> |</li>
 <li><a href="#">招贤纳士</a> |</li>
 <li><a href="#">联系我们</a> |</li>
 <li><a href="#">友情链接</a> |</li>
 <li><a href="#">爱卡首页</a> |</li>
 <li><a href="#">选车中心</a> |</li>
 <li><a href="#">汽车论坛</a> |</li>
 <li><a href="#">站点地图</a> |</li>
  <li><a href="#">意见反馈</a> |</li>
 <li><a href="#">收藏爱车</a>  |</li>
 <li><a href="#">手机爱卡</a></li>
 </ul><pre>联系地址:北京市海淀知春路113号银网中心B座16层  邮编:100086 电话:010-82616677-1000 传真:010-62556006
    京ICP备09041801号-119  京ICP整:010319号  京公网安备:110108902134
	   COPYRIGHT Xcar.com.cn.All.Right Reserved</pre>
</div>
