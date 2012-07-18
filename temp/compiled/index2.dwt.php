<!DOCTYPE HTML>
<html>
<head>
<meta name="Generator" content=" " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>首页</title>
<meta name="generator" content="VIP2.0" />
<meta name="author" content="作者:Xiao feng  QQ:790241441" />
<meta name="copyright" content="2007-2012n" />
<meta name="robots" content="all" />
<!--[if IE 6]> 
    <script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('*'); </script> 
<![endif]-->
<link href="/themes/car/css/main.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.3.2.min.js,jquery.json-1.3.js,transport_org.js,home.js,car.js')); ?>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
</head>
<body>
<div class="top">
<div class="head">
<div class="logo">
<img src="themes/car/images/logo.png" alt="logo">
</div>
<div class="city">
<?php echo empty($this->_var['city']) ? '北京' : $this->_var['city']; ?><span><a href="javascript:void(0)">[切换]</a></span>
</div>
<div class="car">
<div class="selected">
<div class="ctext" id="cbname">请选择品牌</div>
<div class="sel" id="box">
<?php $_from = $this->_var['cbrand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'cb');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['cb']):
?>
<ul>
<h5><?php echo $this->_var['key']; ?>&nbsp;|</h5>
<?php $_from = $this->_var['cb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cbname');if (count($_from)):
    foreach ($_from AS $this->_var['cbname']):
?>
<a onClick="javascript:callcsys(<?php echo $this->_var['cbname']['id']; ?>);" href="javascript:void(0);" ><?php echo $this->_var['cbname']['cbrand_name']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>

<div class="select" id="cx">
<div class="ctext" id="csys">请选择车系</div>
<div class="sel" id="box2">
</div>
</div>

<div class="select" id="ck">
<div class="ctext">请选择车款</div>
<div class="sel" id="box3">
</div>
</div>

</div>
<div class="login">
<a href="user.php">登录</a>|
<a href="user.php?act=register">注册</a>|
<a href="">帮助中心</a>
</div>
</div>
</div>
<div class="center">
<?php echo $this->fetch('library/index.lbi'); ?>
</div>
<div class="bottom">
<div class="bot">
<div class="bleft">
<div class="blp">
<h5>单个服务项目介绍</h5>
<p>介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容</p>
</div>
<div class="bpic">
<img src="themes/car/images/bleft.png">
</div>
</div>

<div class="bright">
<div class="blp">
<h5>单个服务项目介绍</h5>
<p>介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容</p>
</div>
<div class="bpic">
<img src="themes/car/images/bright.png">
</div>
</div>

</div>
</div>
<div class="foot">
Copyright&nbsp;@&nbsp;www.26car.com
<a href="#">联系我们</a>|
<a href="#">关于我们</a>
</div>
</body> 
</html>