<!DOCTYPE html>
<html>
<head>
<title><?php echo $this->_var['lang']['cp_home']; ?><?php if ($this->_var['ur_here']): ?> - <?php echo $this->_var['ur_here']; ?> <?php endif; ?></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'transport_org.js,car_org.js,jquery-1.3.2.min.js,jquery.json-1.3.js')); ?>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
</head>
<body>

<h1>
<?php if ($this->_var['action_link']): ?>
<span class="action-span"><a href="<?php echo $this->_var['action_link']['href']; ?>"><?php echo $this->_var['action_link']['text']; ?></a></span>
<?php endif; ?>
<?php if ($this->_var['action_link2']): ?>
<span class="action-span"><a href="<?php echo $this->_var['action_link2']['href']; ?>"><?php echo $this->_var['action_link2']['text']; ?></a>&nbsp;&nbsp;</span>
<?php endif; ?>
<span class="action-span1"><a href="index.php?act=main">后台管理中心</a> </span><span id="search_id" class="action-span1"><?php if ($this->_var['ur_here']): ?> - <?php echo $this->_var['ur_here']; ?> <?php endif; ?></span>
<div style="clear:both"></div>
</h1>


<div class="list-div">
<table width="100%" id="car-table" align="center">
 <tr>
      <th colspan="20" scope="col" id="gname"><?php echo $this->_var['goods_name']; ?></th>
    </tr>
            <tr>
        <td bgcolor="#ffffff" align="center">是否通用</td>
        <td bgcolor="#ffffff" align="center"><input type="checkbox" value="<?php echo $this->_var['gid']; ?>" id="is_common" <?php if ($this->_var['is_common'] == 1): ?> checked="checked"<?php endif; ?>>是</td>
		</tr>
      <tr align="center">
        <th width="20%" bgcolor="#ffffff">品牌</th>
        <th width="20%" bgcolor="#ffffff">车系</th>
        <th width="30%" bgcolor="#ffffff">车款</th>
        <th width="15%" bgcolor="#ffffff">操作</th>
      </tr>
       <?php $_from = $this->_var['gcars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'icar');if (count($_from)):
    foreach ($_from AS $this->_var['icar']):
?>
      <tr>
        <td bgcolor="#ffffff" align="center"><?php echo $this->_var['icar']['cbrand_name']; ?></td>
        <td bgcolor="#ffffff" align="center"><?php echo empty($this->_var['icar']['csys_name']) ? '------' : $this->_var['icar']['csys_name']; ?></td>
        <td bgcolor="#ffffff" align="center"><?php echo empty($this->_var['icar']['ctype_name']) ? '------' : $this->_var['icar']['ctype_name']; ?></td>
        <td bgcolor="#ffffff" align="center"><a onclick="javascript:dlcar(<?php echo $this->_var['icar']['id']; ?>)" href="javascript:void(0)">删除</a></td>
      </tr>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <form method="post" action="" id="addform">
    <tr>
        <td bgcolor="#ffffff" align="center">
        <select onchange="callbrand(this.value)" name="cbrand" id="cb">
            <option value="">请选择品牌</option>
            <?php $_from = $this->_var['cb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cb_0_82758000_1342536758');if (count($_from)):
    foreach ($_from AS $this->_var['cb_0_82758000_1342536758']):
?>
            <option value="<?php echo $this->_var['cb_0_82758000_1342536758']['id']; ?>"><?php echo $this->_var['cb_0_82758000_1342536758']['cbrand_name']; ?></option>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td bgcolor="#ffffff" align="center">
        <select onchange="callsys(this.value)" name="csys" id='cx'>
            <option value="">请选择车系</option>
         </select>
        </td>
        <td bgcolor="#ffffff" align="center">
        <select name="ctype" id='ck'>
    	<option value="">请选择车款</option>
    	</select>
        </td>
        <td bgcolor="#ffffff" align="center">
        <input type="hidden" name="gid" value="<?php echo $this->_var['gid']; ?>" id="gid" />
        <input type="button" value="新增" id="addcars" />
        </td>
      </tr>
     </form>   
        </table>
</div>        
        
        
        
<div id="footer">
<?php echo $this->_var['query_info']; ?><?php echo $this->_var['gzip_enabled']; ?><?php echo $this->_var['memory_info']; ?><br />
</div>
<script type="text/javascript">
$(document).ready(function() {
        $("#is_common").change(function() {
            if (!$(this).attr("checked")) {
                var conf=window.confirm("确定取消通用？");
				var gid=$(this).val();
				if(conf){
				   window.location.href ="goodscars.php?act=un_common&gid="+gid;
			   }else{
				  $(this).attr("checked", "ture");  
			   }
            }else if($(this).attr("checked")){
               var conf=window.confirm("选为通用将自动删除所有已关联的车型");
			   var gid=$(this).val();
			   if(conf){
				 window.location.href ="goodscars.php?act=is_common&gid="+gid;
			   }else{
				  $(this).removeAttr("checked");  
			   }
            }
        });
 
 
 		$("#addcars").click(function() {
			var gid = $("#gid").val();
			var cbrand = $("#cb").val();
			var csys = $("#cx").val();
			var ctype = $("#ck").val();
			var gname = $("#gname").text();
			var cbname = $("#cb").find("option:selected").text();
			var csname = $("#cx").find("option:selected").text();
			if(!cbrand){
			alert ("请选择品牌");
			}else{
				if(!csys){
					var conf=window.confirm("此操作将自动删除本商品与"+cbname+"品牌下的车系和车型的关联");
					if(conf){
						$("#addform").attr("action","goodscars.php?act=add_blink").submit();
			                }
				}else{
					if(!ctype){
					var conf=window.confirm("此操作将自动删除本商品与"+cbname+"品牌或者"+csname+"车系下的车型的关联");	
					if(conf){
				           $("#addform").attr("action","goodscars.php?act=add_slink").submit();
			                }	
					}else{
						var conf=window.confirm("此操作将自动删除本商品与"+cbname+"品牌或者"+csname+"车系的关联");
						if(conf){
				              $("#addform").attr("action","goodscars.php?act=add_tlink").submit();
			                    }
					}
				}
			}
		});
 
 });
function dlcar(lid){
	var conf=window.confirm("确定删除？");
	if(conf){
		window.location.href ="goodscars.php?act=dlcar&lid="+lid;
	}
}
</script>