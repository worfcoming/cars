<?php

/*
*商品关联车型程序
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

//关联车型列表
if ($_REQUEST['act'] == 'link_car')
{
	$sql="SELECT goods_name FROM". $ecs->table('goods') ."WHERE goods_id = '$_GET[gid]'";
	$goods_name = $db->getone($sql);
	$smarty->assign('goods_name', $goods_name);	
	$sql="SELECT g.*, s.csys_name, t.ctype_name, b.cbrand_name FROM"  . $ecs->table('goodscars'). " AS g". " LEFT JOIN " . $ecs->table('cbrand')." AS b ON g.cbrand = b.id"  . " LEFT JOIN " .    $ecs->table('csys')." AS s ON g.csys = s.id" . " LEFT JOIN ".  $ecs->table('ctype')." AS t ON g.ctype = t.id"." WHERE g.goods_id = '$_GET[gid]' AND g.is_common = '0'"." ORDER BY b.alpha ASC";
	$gcars=$db->getall($sql);
	$smarty->assign('gcars', $gcars);
	
	$smarty->assign('gid', $_GET['gid']);
	$smarty->assign('is_common', is_common($_GET['gid']));
	$smarty->assign('ur_here', '商品关联车型');
	$action_link = array('href' => 'goods.php?act=list', 'text' => '商品列表');
    $smarty->assign('action_link',  $action_link);
	$smarty->assign('cb',           getcbrand());//获得车品牌列表

	/* 显示关联车型列表页面 */
    assign_query_info();
    $smarty->display('goodscars.htm');

}
//通用关联处理
if($_REQUEST['act'] == 'is_common'){
$id = $_GET['gid'];
$sql = "DELETE FROM " . $ecs->table('goodscars') . " WHERE goods_id = $id";
$db->query($sql);
$sql = "INSERT INTO ".$ecs->table('goodscars')."(goods_id, is_common) ".
            "VALUES ('$id', '1')";
$res =$db->query($sql);
header("Location: goodscars.php?act=link_car&gid=".$_GET['gid']);	
}
//取消通用
if($_REQUEST['act'] == 'un_common'){
$res = del_common($_GET['gid']);
header("Location: goodscars.php?act=link_car&gid=".$_GET['gid']);	
}
//关联品牌
if($_REQUEST['act'] == 'add_blink'){
del_common($_POST['gid']);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') . " WHERE goods_id = '$_POST[gid]' AND cbrand = '$_POST[cbrand]'";
$GLOBALS['db']->query($sql); //删除品牌下关联
$sql = "INSERT INTO ".$ecs->table('goodscars')."(goods_id, cbrand) ".
            "VALUES ('$_POST[gid]', '$_POST[cbrand]')";
$db->query($sql);
header("Location: goodscars.php?act=link_car&gid=".$_POST['gid']);	
}

//关联车系
if($_REQUEST['act'] == 'add_slink'){
del_common($_POST['gid']);
del_cbrand($_POST['gid'], $_POST['cbrand']);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') . " WHERE goods_id = '$_POST[gid]' AND csys = '$_POST[csys]'";
$GLOBALS['db']->query($sql); //删除车系下关联
$sql = "INSERT INTO ".$ecs->table('goodscars')."(goods_id, cbrand, csys) ".
            "VALUES ('$_POST[gid]', '$_POST[cbrand]', '$_POST[csys]')";
$db->query($sql);
header("Location: goodscars.php?act=link_car&gid=".$_POST['gid']);	
}

//关联车款
if($_REQUEST['act'] == 'add_tlink'){
del_common($_POST['gid']);
del_cbrand($_POST['gid'], $_POST['cbrand']);
del_csys($_POST['gid'], $_POST['csys']);
$sql = "INSERT INTO ".$ecs->table('goodscars')."(goods_id, cbrand, csys, ctype) ".
            "VALUES ('$_POST[gid]', '$_POST[cbrand]', '$_POST[csys]', '$_POST[ctype]')";
$db->query($sql);
header("Location: goodscars.php?act=link_car&gid=".$_POST['gid']);	
}
//删除某一项关联
if($_REQUEST['act'] == 'dlcar'){
$sql="SELECT goods_id FROM". $ecs->table('goodscars') ."WHERE id = '$_GET[lid]'";
$gid = $db->getone($sql);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') . " WHERE id = '$_GET[lid]'";
$GLOBALS['db']->query($sql);
header("Location: goodscars.php?act=link_car&gid=".$gid);	
}

//判断是否通用
function is_common($gid){
	$sql="SELECT is_common FROM ". $GLOBALS['ecs']->table('goodscars') . " WHERE goods_id = '$gid' AND is_common = 1";
	$is_common = $GLOBALS['db']->getone($sql);
	return $is_common;
}
//删除通用关联
function del_common($gid){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') . " WHERE goods_id = '$gid'  AND is_common = 1";
    $result = $GLOBALS['db']->query($sql);
	return $res;
}

//删除关联品牌
function del_cbrand($gid, $cbrand){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') . " WHERE cbrand = '$cbrand' AND csys = 0";
	$res = $GLOBALS['db']->query($sql);
}

//删除关联车系
function del_csys($gid, $csys){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodscars') .  " WHERE csys = '$csys' AND ctype = 0";
	$res = $GLOBALS['db']->query($sql);
}
?>