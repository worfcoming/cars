<link href="/themes/car/css/common.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.3.2.min.js,jquery.json-1.3.js,car.js')); ?>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<div class="inav">
<div class="inavl">
</div>
<div class="inavc">
<div class="iac">
<a href="index.php<?php echo $this->_var['curl']; ?>">首页</a>|
<?php echo empty($this->_var['city']) ? '北京' : $this->_var['city']; ?><a href="javascript:void(0)">[切换]</a>|
<a href="javascript:void(0);">变更车型</a>
</div>
<div class="icar">
<?php if ($this->_var['mycar'] != ''): ?>
欢迎“<span class="icname"><?php echo $this->_var['mycar']; ?></span>"车主大驾光临
<?php endif; ?>
</div>

<div class="lac">
<?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
<div class="lrg">
<a href="#">帮助</a>
</div>
<a href="flow.php<?php echo $this->_var['curl']; ?>"><img src="themes/car/images/cart.png" alt="cart"></a>
</div>

</div>
<div class="inavr">
</div>
</div>