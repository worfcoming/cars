<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content=" " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
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
<?php echo $this->fetch('library/article_category_tree.lbi'); ?>
<?php echo $this->fetch('library/filter_attr.lbi'); ?>
<?php echo $this->fetch('library/price_grade.lbi'); ?>

<?php echo $this->fetch('library/goods_related.lbi'); ?>



    
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
    <div class="box">
     <div class="box_1">
      <div style="border:4px solid #fcf8f7; background-color:#fff; padding:20px 15px;">
         <div class="tc" style="padding:8px;">
         <font class="f5 f6"><?php echo htmlspecialchars($this->_var['article']['title']); ?></font><br /><font class="f3"><?php echo htmlspecialchars($this->_var['article']['author']); ?> / <?php echo $this->_var['article']['add_time']; ?></font>
         </div>
         <?php if ($this->_var['article']['content']): ?>
          <?php echo $this->_var['article']['content']; ?>
         <?php endif; ?>
         <?php if ($this->_var['article']['open_type'] == 2 || $this->_var['article']['open_type'] == 1): ?><br />
         <div><a href="<?php echo $this->_var['article']['file_url']; ?>" target="_blank"><?php echo $this->_var['lang']['relative_file']; ?></a></div>
          <?php endif; ?>
         <div style="padding:8px; margin-top:15px; text-align:left; border-top:1px solid #ccc;">
         
          <?php if ($this->_var['next_article']): ?>
            <?php echo $this->_var['lang']['next_article']; ?>:<a href="<?php echo $this->_var['next_article']['url']; ?>" class="f6"><?php echo $this->_var['next_article']['title']; ?></a><br />
          <?php endif; ?>
          
          <?php if ($this->_var['prev_article']): ?>
            <?php echo $this->_var['lang']['prev_article']; ?>:<a href="<?php echo $this->_var['prev_article']['url']; ?>" class="f6"><?php echo $this->_var['prev_article']['title']; ?></a>
          <?php endif; ?>
         </div>
      </div>
    </div>
  </div>
 </div>
  
</div>
<div class="blank5"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>
</body>
</html>
