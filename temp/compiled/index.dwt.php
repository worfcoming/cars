<!DOCTYPE html>
<head>
<meta name="Generator" content=" " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
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

<div class="flv">
<div class="iflash">
<?php echo $this->fetch('library/index_ad.lbi'); ?>
</div>
<div class="inews">
<div class="ctypeimg">
<img src="/data/ctypepic/ccc.png">
</div>
<div class="inewt">
<span>资讯热点</span>
</div>
<ul>
<li><a href="">奥迪新A4L或增3.0TFSI车型</a></li>
<li><a href="">都市精英之旅将于9月举行</a></li>
<li><a href="">2012款奥迪A4L正式上市</a></li>
<li><a href="">改款奥迪A4L国内谍照首曝</a></li>
<li><a href="">L优惠1万元现金看车团活动</a></li>
<li><a href="">奥迪新A4L或增3.0TFSI车型</a></li>
</ul>
</div>
</div>


<div class="glist">
<div class="gtittle"><div class="gtleft"></div><div class="gtcenter">专用商品推荐</div><div class="gtright"></div></div>
<div class="gcon">
<ul>
<?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
<li class="goodsbox">
<div class="goodsimg">
<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a>
</div>
<div class="goodstit">
<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"  title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a>
</div>
<p class="goodsdes"><?php echo $this->_var['goods']['brief']; ?></p>
<p class="goodsprice">
<?php if ($this->_var['goods']['promote_price'] != ""): ?>
<span class="shopprice"><?php echo $this->_var['goods']['promote_price']; ?></span>
<?php else: ?>
<span class="shopprice"><?php echo $this->_var['goods']['shop_price']; ?></span>
<?php endif; ?>
<span class="marketprice"><?php echo $this->_var['goods']['market_price']; ?></span>
<span class="buynum">已有<span class="bnum"><?php echo $this->_var['goods']['comment_count']; ?></span>人评论</span>
</p>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>

<div class="glist">
<div class="gtittle"><div class="gtleft"></div><div class="gtcenter">通用商品热卖推荐</div><div class="gtright"></div></div>
<div class="gcon">
<?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
<li class="goodsbox">
<div class="goodsimg">
<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a>
</div>
<div class="goodstit">
<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"  title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a>
</div>
<p class="goodsdes"><?php echo $this->_var['goods']['brief']; ?></p>
<p class="goodsprice">
<?php if ($this->_var['goods']['promote_price'] != ""): ?>
<span class="shopprice"><?php echo $this->_var['goods']['promote_price']; ?></span>
<?php else: ?>
<span class="shopprice"><?php echo $this->_var['goods']['shop_price']; ?></span>
<?php endif; ?>
<span class="marketprice"><?php echo $this->_var['goods']['market_price']; ?></span>
<span class="buynum">已有<span class="bnum"><?php echo $this->_var['goods']['comment_count']; ?></span>人评论</span>
</p>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>

</div>

</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>
</body>
</html>
