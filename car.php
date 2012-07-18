<?php

/**
 * 车型AJAX返回程序
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/cls_json.php');
//根据品牌id获得车系列表
if($_REQUEST['act'] == 'ibrand'){
$cb_name = $_POST['bid'];
$sql = "SELECT id, csys_name FROM".$ecs->table('csys')."WHERE cb_name = '$cb_name'";
$res = $db->GETALL($sql);
$json = new JSON;
echo $json->encode($res);
}
//根据车系id获得车款列表
if($_REQUEST['act'] == 'isys'){
$id = $_POST['sid'];
$sql = "SELECT id, ctype_name FROM".$ecs->table('ctype')."WHERE csys_id = '$id'";
$res = $db->GETALL($sql);
$json = new JSON;
echo $json->encode($res);	
}
//根据品牌id获得车系列表
if($_REQUEST['act'] == 'isysy'){
$cb = $_POST['cbname'];
$sql = "SELECT id, csys_com, csys_name FROM".$ecs->table('csys')."WHERE cb_name = '$cb'";
$res = $db->GETALL($sql);
foreach ($res AS $row){
	$csys[$row['csys_com']][] =$row;
}
$json = new JSON;
echo $json->encode($csys);
}
//根据车系id获得车系名称
if($_REQUEST['act'] == 'sname'){
$id = $_POST['csysid'];
$sql = "SELECT csys_name FROM".$ecs->table('csys')."WHERE id = '$id'";
$res = $db->getone($sql);
$json = new JSON;
echo $json->encode($res);	
}
?>