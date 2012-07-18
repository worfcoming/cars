<?php
/**
 *车型品牌管理程序
*/
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
include_once(ROOT_PATH . 'includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);
$exc = new exchange($ecs->table('cbrand'), $db, 'id', 'cbrand_name');

/*------------------------------------------------------ */
//-- 品牌列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
	
	$sql = "SELECT  *  FROM  ".$ecs->table('cbrand')."  ORDER BY alpha ASC"; 
	$cbrand =$db-> GETALL($sql);
	
	
	
	//模板赋值
	$smarty->assign('ur_here', '车品牌列表');
	$action_link = array('href' => 'cbrand.php?act=add_cbrand', 'text' => '添加车品牌');
    $smarty->assign('action_link',  $action_link);
	$smarty->assign('cbrand',  $cbrand);
	
	/* 显示品牌列表页面 */
    assign_query_info();
    $smarty->display('cbrand.htm');

}



/*------------------------------------------------------ */
//-- 添加品牌
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add_cbrand')
{

    $smarty->assign('ur_here',     '添加车品牌');
	$smarty->assign('act',     'cb_insert');
    $smarty->assign('action_link', array('text' => '车品牌列表', 'href' => 'cbrand.php?act=list'));
    assign_query_info();
    $smarty->display('add_cbrand.htm');
}
elseif ($_REQUEST['act'] == 'cb_insert')
{
    /*检查品牌名是否重复*/
    $is_only = $exc->is_only('cbrand_name', $_POST['cbrand_name']);
    if (!$is_only)
    {
        sys_msg(sprintf('品牌已存在', stripslashes($_POST['cbrand_name'])), 1);
    }
	/*处理品牌名称首字母*/
	
	$alpha = getfirstchar($_POST['cbrand_name']);
	
     /*处理图片*/
    $img_name = basename($image->upload_image($_FILES['cbrand_logo'],'cbrandlogo'));
    /*插入数据*/
   $sql = "INSERT INTO ".$ecs->table('cbrand')."(cbrand_name, cbrand_logo, alpha, cbrand_sort) ".
           "VALUES ('$_POST[cbrand_name]','$img_name','$alpha', '$_POST[cbrand_sort]')";
    $db->query($sql);
    /* 清除缓存 */
    clear_cache_files();

    $link[0]['text'] = '继续添加';
    $link[0]['href'] = 'cbrand.php?act=add_cbrand';

    $link[1]['text'] = '返回车品牌列表';
    $link[1]['href'] = 'cbrand.php?act=list';

    sys_msg('添加成功', 0, $link);
}

/*------------------------------------------------------ */
//-- 编辑品牌
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'cb_edit')
{
	$sql = "SELECT cbrand_name, cbrand_logo, cbrand_sort FROM ".$ecs->table('cbrand')."WHERE id = '$_GET[id]'";
	$cname = $db->getrow($sql);
	$smarty->assign('cname',     $cname['cbrand_name']);
	$smarty->assign('csort',     $cname['cbrand_sort']);
	$smarty->assign('cid',     $_GET['id']);
	$smarty->assign('clogo',     $cname['cbrand_logo']);
    $smarty->assign('ur_here',     '编辑车品牌');
	$smarty->assign('act',     'edit_done');
    $smarty->assign('action_link', array('text' => '车品牌列表', 'href' => 'cbrand.php?act=list'));
    assign_query_info();
    $smarty->display('add_cbrand.htm');
}

elseif ($_REQUEST['act'] == 'edit_done')
{
	if($_POST[cbrand_name] != $_POST[old_name]){
		$is_only = $exc->is_only('cbrand_name', $_POST['cbrand_name']);
		if (!$is_only)
		{
			sys_msg(sprintf('品牌已存在', stripslashes($_POST['cbrand_name'])), 1);
		}else{
			$sql = "UPDATE " . $ecs->table('cbrand') . " SET cbrand_name = '$_POST[cbrand_name]', cbrand_sort = '$_POST[cbrand_sort]' WHERE id = '$_POST[cid]'";
   		    $result = $db->query($sql);
		}
	}
	$img_name = basename($image->upload_image($_FILES['cbrand_logo'],'cbrandlogo'));
	if(!empty($img_name)){
		$old_url = "/data/cbrandlogo/".$_POST[old_img];
		@unlink(ROOT_PATH . $old_url);
		$sql = "UPDATE " . $ecs->table('cbrand') . " SET cbrand_logo = '$img_name' WHERE id = '$_POST[cid]'";
   		$result = $db->query($sql);
	}
	
	/* 清除缓存 */
        clear_cache_files();
        $link[0]['text'] = '返回车品牌列表';
        $link[0]['href'] = 'cbrand.php?act=list';
        $note = vsprintf('编辑品牌成功', $_POST['cbrand_name']);
        sys_msg($note, 0, $link);
}


//获得品牌首字母
function getfirstchar($s0){
	    $asc=@ord(@substr($str,0,1));
	    if($asc<160){
	        if($asc>=48 && $asc<=57){
	            return "1";
	        }elseif($asc>=65 && $asc<=90){
	            return chr($asc);
	        }elseif($asc>=97 && $asc<=122){
	            return chr($asc-32);
	        }else{
	            return "0";
	        }
	    }else{
	        $s=iconv("UTF-8","gb2312", $str);
			$asc=ord($s{0})*256+ord($s{1})-65536;
			if($asc>=-20319 and $asc<=-20284)return "A";
			if($asc>=-20283 and $asc<=-19776)return "B";
			if($asc>=-19775 and $asc<=-19219)return "C";
			if($asc>=-19218 and $asc<=-18711)return "D";
			if($asc>=-18710 and $asc<=-18527)return "E";
			if($asc>=-18526 and $asc<=-18240)return "F";
			if($asc>=-18239 and $asc<=-17923)return "G";
			if($asc>=-17922 and $asc<=-17418)return "H";              
			if($asc>=-17417 and $asc<=-16475)return "J";              
			if($asc>=-16474 and $asc<=-16213)return "K";              
			if($asc>=-16212 and $asc<=-15641)return "L";              
			if($asc>=-15640 and $asc<=-15166)return "M";              
			if($asc>=-15165 and $asc<=-14923)return "N";              
			if($asc>=-14922 and $asc<=-14915)return "O";              
			if($asc>=-14914 and $asc<=-14631)return "P";              
			if($asc>=-14630 and $asc<=-14150)return "Q";              
			if($asc>=-14149 and $asc<=-14091)return "R";              
			if($asc>=-14090 and $asc<=-13319)return "S";              
			if($asc>=-13318 and $asc<=-12839)return "T";              
			if($asc>=-12838 and $asc<=-12557)return "W";              
			if($asc>=-12556 and $asc<=-11848)return "X";              
			if($asc>=-11847 and $asc<=-11056)return "Y";              
			if($asc>=-11055 and $asc<=-10247)return "Z";  
			return 0;
	        }
	    }



?>