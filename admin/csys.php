<?php

/**
 *车系管理程序
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(ROOT_PATH . 'includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);

/*------------------------------------------------------ */
//--车系列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
	$filter = array();
	$cb = getcbrand();
	$smarty->assign('cb',   $cb);
	$smarty->assign('full_page',    1);
    $csys = get_csyslist();
    $smarty->assign('csys',   $csys['csys']);
    $smarty->assign('filter',       $csys['filter']);
    $smarty->assign('record_count', $csys['record_count']);
    $smarty->assign('page_count',   $csys['page_count']);
	

	//模板赋值
	$smarty->assign('ur_here', '车系列表');
	$action_link = array('href' => 'csys.php?act=add_csys', 'text' => '添加车系');
    $smarty->assign('action_link',  $action_link);
	
	/* 显示品牌列表页面 */
    assign_query_info();
    $smarty->display('csys.htm');

}

/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $csys = get_csyslist();
    $smarty->assign('csys',   $csys['csys']);
    $smarty->assign('filter',       $csys['filter']);
    $smarty->assign('record_count', $csys['record_count']);
    $smarty->assign('page_count',   $csys['page_count']);

    make_json_result($smarty->fetch('csys.htm'), '',
        array('filter' => $csys['filter'], 'page_count' => $csys['page_count']));
}

/*------------------------------------------------------ */
//--添加车系
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add_csys')
{
	$sql = "SELECT  *  FROM  ".$ecs->table('cbrand')."  ORDER BY alpha ASC"; 
	$res =$db-> GETALL($sql);
	$smarty->assign('csys',  $res);
    $smarty->assign('ur_here',     '添加车系');
	$smarty->assign('act',     'csys_insert');
    $smarty->assign('action_link', array('text' => '车系列表', 'href' => 'csys.php?act=list'));
    assign_query_info();
    $smarty->display('add_csys.htm');
}
elseif ($_REQUEST['act'] == 'csys_insert')
{
	if(!empty($_POST[cb_name])&&!empty($_POST[csys_name])){

    /*插入数据*/
   $sql = "INSERT INTO ".$ecs->table('csys')."(cb_name, csys_name, csys_com) ".
           "VALUES ('$_POST[cb_name]','$_POST[csys_name]','$_POST[csys_com]')";
    $db->query($sql);
    /* 清除缓存 */
    clear_cache_files();

    $link[0]['text'] = '继续添加';
    $link[0]['href'] = 'csys.php?act=add_csys';

    $link[1]['text'] = '返回车系列表';
    $link[1]['href'] = 'csys.php?act=list';

    sys_msg('添加成功', 0, $link);
	}else{
		
		sys_msg(sprintf('品牌名称或车系名称不能为空', stripslashes('请完善')), 1);
		
	}
}

/*------------------------------------------------------ */
//-- 编辑车系
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'csys_edit')
{
	$sql = "SELECT  *  FROM  ".$ecs->table('cbrand')."  ORDER BY alpha ASC"; 
	$res =$db-> GETALL($sql);
	$smarty->assign('csys',  $res);
	$sql = "SELECT * FROM ".$ecs->table('csys')."WHERE id = '$_GET[id]'";
	$cname = $db->getrow($sql);
	$smarty->assign('cbname',     $cname['cb_name']);
	$smarty->assign('csname',     $cname['csys_name']);
	$smarty->assign('cscom',     $cname['csys_com']);
	$smarty->assign('csid',     $_GET['id']);
    $smarty->assign('ur_here',     '编辑车系');
	$smarty->assign('act',     'cedone');
    $smarty->assign('action_link', array('text' => '车系列表', 'href' => 'csys.php?act=list&'. list_link_postfix()));
    assign_query_info();
    $smarty->display('add_csys.htm');
}

elseif ($_REQUEST['act'] == 'cedone')
{
	if(!empty($_POST[cb_name])&&!empty($_POST[csys_name])){
	$sql = "UPDATE " . $ecs->table('csys') . " SET cb_name = '$_POST[cb_name]',csys_name = '$_POST[csys_name]',csys_com = '$_POST[csys_com]' WHERE id = '$_POST[csid]'";
    $result = $db->query($sql);
	/* 清除缓存 */
        clear_cache_files();
        $link[0]['text'] = '返回车系列表';
        $link[0]['href'] = 'csys.php?act=list&'. list_link_postfix();
        $note = vsprintf('编辑车系成功', $_POST['cbrand_name']);
        sys_msg($note, 0, $link);
	}else{
		
		sys_msg(sprintf('品牌名称或车系名称不能为空', stripslashes('请完善')), 1);
	}
}


/* 获得车系列表 */
function get_csyslist()
{
    $result = get_filter();
    if ($result === false)
    {
        /* 分页大小 */
        $filter = array();

        /* 记录总数以及页数 */
        if (isset($_POST['cb_name'])&& $_POST['cb_name']!=0)
        {
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('csys') .' WHERE cb_name = \''.$_POST['cb_name'].'\'';
        }
        else
        {
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('csys');
        }

        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 查询记录 */
        if (isset($_POST['cb_name'])&& $_POST['cb_name']!=0)
        {
            $sql = "SELECT  s.*, b.cbrand_name  FROM  ".$GLOBALS['ecs']->table('csys'). " AS s" . " LEFT JOIN "  .$GLOBALS['ecs']->table('cbrand')." AS b ON s.cb_name = b.id"." WHERE s.cb_name = '$_POST[cb_name]'"." ORDER BY CONVERT( s.cb_name USING gbk ) COLLATE gbk_chinese_ci ASC";
        }
        else
        {
            $sql = "SELECT  s.*, b.cbrand_name  FROM  ".$GLOBALS['ecs']->table('csys'). " AS s" . " LEFT JOIN "  .$GLOBALS['ecs']->table('cbrand')." AS b ON s.cb_name = b.id"." ORDER BY CONVERT( s.cb_name USING gbk ) COLLATE gbk_chinese_ci ASC";
        }

        set_filter($filter, $sql);
//		print_r (get_filter());
		
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);
	$arr = array();
	while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $arr[] = $rows;
    }

    return array('csys' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}
?>