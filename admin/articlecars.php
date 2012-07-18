<?php

/*
*文章关联车型程序
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

//关联车型列表
if ($_REQUEST['act'] == 'link_car')
{
	$sql="SELECT title FROM". $ecs->table('article') ."WHERE article_id = '$_GET[aid]'";
	$tittle = $db->getone($sql);
	$smarty->assign('tittle', $tittle);	
	$sql="SELECT a.*, s.csys_name, t.ctype_name, b.cbrand_name FROM"  . $ecs->table('articlecars'). " AS a". " LEFT JOIN " . $ecs->table('cbrand')." AS b ON a.cbrand = b.id"  . " LEFT JOIN " .    $ecs->table('csys')." AS s ON a.csys = s.id" . " LEFT JOIN ".  $ecs->table('ctype')." AS t ON a.ctype = t.id"." WHERE a.aid = '$_GET[aid]' AND a.is_common = '0'"." ORDER BY b.alpha ASC";
	$acars=$db->getall($sql);
	$smarty->assign('acars', $acars);
	
	$smarty->assign('aid', $_GET['aid']);
	$smarty->assign('is_common', is_common($_GET['aid']));
	$smarty->assign('ur_here', '文章关联车型');
	$action_link = array('href' => 'article.php?act=list', 'text' => '文章列表');
    $smarty->assign('action_link',  $action_link);
	$smarty->assign('cb',           getcbrand());//获得车品牌列表

	/* 显示关联车型列表页面 */
    assign_query_info();
    $smarty->display('articlecars.htm');

}
//通用关联处理
if($_REQUEST['act'] == 'is_common'){
$id = $_GET['aid'];
$sql = "DELETE FROM " . $ecs->table('articlecars') . " WHERE aid = $id";
$db->query($sql);
$sql = "INSERT INTO ".$ecs->table('articlecars')."(aid, is_common) ".
            "VALUES ('$id', '1')";
$res =$db->query($sql);
header("Location: articlecars.php?act=link_car&aid=".$_GET['aid']);	
}
//取消通用
if($_REQUEST['act'] == 'un_common'){
$res = del_common($_GET['aid']);
header("Location: articlecars.php?act=link_car&aid=".$_GET['aid']);	
}
//关联品牌
if($_REQUEST['act'] == 'add_blink'){
del_common($_POST['aid']);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') . " WHERE aid = '$_POST[aid]' AND cbrand = '$_POST[cbrand]'";
$GLOBALS['db']->query($sql); //删除品牌下关联
$sql = "INSERT INTO ".$ecs->table('articlecars')."(aid, cbrand) ".
            "VALUES ('$_POST[aid]', '$_POST[cbrand]')";
$db->query($sql);
header("Location: articlecars.php?act=link_car&aid=".$_POST['aid']);	
}

//关联车系
if($_REQUEST['act'] == 'add_slink'){
del_common($_POST['aid']);
del_cbrand($_POST['aid'], $_POST['cbrand']);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') . " WHERE aid = '$_POST[aid]' AND csys = '$_POST[csys]'";
$GLOBALS['db']->query($sql); //删除车系下关联
$sql = "INSERT INTO ".$ecs->table('articlecars')."(aid, cbrand, csys) ".
            "VALUES ('$_POST[aid]', '$_POST[cbrand]', '$_POST[csys]')";
$db->query($sql);
header("Location: articlecars.php?act=link_car&aid=".$_POST['aid']);	
}

//关联车款
if($_REQUEST['act'] == 'add_tlink'){
del_common($_POST['aid']);
del_cbrand($_POST['aid'], $_POST['cbrand']);
del_csys($_POST['aid'], $_POST['csys']);
$sql = "INSERT INTO ".$ecs->table('articlecars')."(aid, cbrand, csys, ctype) ".
            "VALUES ('$_POST[aid]', '$_POST[cbrand]', '$_POST[csys]', '$_POST[ctype]')";
$db->query($sql);
header("Location: articlecars.php?act=link_car&aid=".$_POST['aid']);	
}
//删除某一项关联
if($_REQUEST['act'] == 'dlcar'){
$sql="SELECT aid FROM". $ecs->table('articlecars') ."WHERE id = '$_GET[lid]'";
$aid = $db->getone($sql);
$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') . " WHERE id = '$_GET[lid]'";
$GLOBALS['db']->query($sql);
header("Location: articlecars.php?act=link_car&aid=".$aid);	
}

//判断是否通用
function is_common($aid){
	$sql="SELECT is_common FROM ". $GLOBALS['ecs']->table('articlecars') . " WHERE aid = '$aid' AND is_common = 1";
	$is_common = $GLOBALS['db']->getone($sql);
	return $is_common;
}
//删除通用关联
function del_common($aid){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') . " WHERE aid = '$aid'  AND is_common = 1";
    $result = $GLOBALS['db']->query($sql);
	return $res;
}

//删除关联品牌
function del_cbrand($aid, $cbrand){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') . " WHERE cbrand = '$cbrand' AND csys = 0";
	$res = $GLOBALS['db']->query($sql);
}

//删除关联车系
function del_csys($aid, $csys){
	$sql = "DELETE FROM " . $GLOBALS['ecs']->table('articlecars') .  " WHERE csys = '$csys' AND ctype = 0";
	$res = $GLOBALS['db']->query($sql);
}
?>