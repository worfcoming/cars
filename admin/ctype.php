<?php

/**
 *车款管理程序
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(ROOT_PATH . 'includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);

/*------------------------------------------------------ */
//--车款列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
	$cb = getcbrand();
	$smarty->assign('cb',   $cb);
	$smarty->assign('full_page',    1);
    $ctype = get_ctypelist();
    $smarty->assign('ctype',   $ctype['ctype']);
    $smarty->assign('filter',       $ctype['filter']);
    $smarty->assign('record_count', $ctype['record_count']);
    $smarty->assign('page_count',   $ctype['page_count']);
	

	//模板赋值
	$smarty->assign('ur_here', '车款列表');
	$action_link = array('href' => 'ctype.php?act=add_ctype', 'text' => '添加车款');
    $smarty->assign('action_link',  $action_link);
	
	/* 显示品牌列表页面 */
    assign_query_info();
    $smarty->display('ctype.htm');

}

/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $ctype = get_ctypelist();
    $smarty->assign('ctype',   $ctype['ctype']);
    $smarty->assign('filter',       $ctype['filter']);
    $smarty->assign('record_count', $ctype['record_count']);
    $smarty->assign('page_count',   $ctype['page_count']);

    make_json_result($smarty->fetch('ctype.htm'), '',
        array('filter' => $ctype['filter'], 'page_count' => $ctype['page_count']));
}

/*------------------------------------------------------ */
//--添加车款
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add_ctype')
{
	$sql = "SELECT  *  FROM  ".$ecs->table('cbrand')."  ORDER BY alpha ASC"; 
	$res =$db-> GETALL($sql);
	$smarty->assign('cb',  $res);
    $smarty->assign('ur_here',     '添加车款');
	$smarty->assign('act',     'ctype_insert');
    $smarty->assign('action_link', array('text' => '车款列表', 'href' => 'ctype.php?act=list'));
    assign_query_info();
    $smarty->display('add_ctype.htm');
}
elseif ($_REQUEST['act'] == 'ctype_insert')
{
	if(!empty($_POST[cb_name])&&!empty($_POST[csys_id])&&!empty($_POST[ctype_name])){
		
   /*处理图片*/
    $img_name = basename($image->upload_image($_FILES['ctype_pic'],'ctypepic'));

    /*插入数据*/
   $sql = "INSERT INTO ".$ecs->table('ctype')."(cb_name, csys_id, ctype_year, ctype_eg, ctype_vs, ctype_dv, ctype_bd, ctype_px, ctype_name, ctype_pic) ".
           "VALUES ('$_POST[cb_name]','$_POST[csys_id]','$_POST[ctype_year]','$_POST[ctype_eg]','$_POST[ctype_vs]','$_POST[ctype_dv]','$_POST[ctype_bd]','$_POST[ctype_px]','$_POST[ctype_name]','$img_name')";
    $db->query($sql);
    /* 清除缓存 */
    clear_cache_files();

    $link[0]['text'] = '继续添加';
    $link[0]['href'] = 'ctype.php?act=add_ctype';

    $link[1]['text'] = '返回车款列表';
    $link[1]['href'] = 'ctype.php?act=list';

    sys_msg('添加成功', 0, $link);
	}else{
		
		sys_msg(sprintf('品牌名,车系名或车款名称不能为空', stripslashes('请完善')), 1);
		
	}
}

/*------------------------------------------------------ */
//-- 编辑车款
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'ctype_edit')
{
	$sql = "SELECT  *  FROM  ".$ecs->table('cbrand')."  ORDER BY alpha ASC"; 
	$res =$db-> GETALL($sql);
	$smarty->assign('cb',  $res);
	$sql = "SELECT t.*, s.csys_name FROM ".$ecs->table('ctype')."AS t LEFT JOIN".$ecs->table('csys')."AS s ON t.csys_id = s.id"." WHERE t.id = '$_GET[id]'";
	$ctype = $db->getrow($sql);
	$sql = "SELECT id, csys_name FROM ".$ecs->table('csys')."WHERE cb_name = '$ctype[cb_name]' AND id != '$ctype[csys_id]'";
	$csys =$db-> GETALL($sql);
	$smarty->assign('csys',    $csys);
	$smarty->assign('ctype',    $ctype);
    $smarty->assign('ur_here',     '编辑车款');
	$smarty->assign('act',     'ctdone');
    $smarty->assign('action_link', array('text' => '车款列表', 'href' => 'ctype.php?act=list'));
    assign_query_info();
    $smarty->display('add_ctype.htm');
}

elseif ($_REQUEST['act'] == 'ctdone')
{
	if(!empty($_POST[cb_name])&&!empty($_POST[csys_id])&&!empty($_POST[ctype_name])){
	$sql = "UPDATE " . $ecs->table('ctype') . " SET cb_name = '$_POST[cb_name]',csys_id = '$_POST[csys_id]',ctype_year = '$_POST[ctype_year]',ctype_eg = '$_POST[ctype_eg]',ctype_vs = '$_POST[ctype_vs]',ctype_dv = '$_POST[ctype_dv]',ctype_bd = '$_POST[ctype_bd]',ctype_px = '$_POST[ctype_px]',ctype_name = '$_POST[ctype_name]' WHERE id = '$_POST[ctid]'";
    $result = $db->query($sql);
	
	$img_name = basename($image->upload_image($_FILES['ctype_pic'],'ctypepic'));
	if(!empty($img_name)){
		$old_url = "/data/ctypepic/".$_POST[old_img];
		@unlink(ROOT_PATH . $old_url);
		$sql = "UPDATE " . $ecs->table('ctype') . " SET ctype_pic = '$img_name' WHERE id = '$_POST[ctid]'";
   		$result = $db->query($sql);
	}
	
	/* 清除缓存 */
        clear_cache_files();
        $link[0]['text'] = '返回车款列表';
        $link[0]['href'] = 'ctype.php?act=list';
        $note = vsprintf('编辑车款成功', $_POST['ctype_name']);
        sys_msg($note, 0, $link);
	}else{
		
		sys_msg(sprintf('品牌名,车系名或车款名称不能为空', stripslashes('请完善')), 1);
	}
}

/* 获得车系列表 */
function get_ctypelist()
{
    $result = get_filter();
    if ($result === false)
    {
        /* 分页大小 */
        $filter = array();

        /* 记录总数以及页数 */
        if (isset($_POST['cb_name']) && $_POST['cb_name']!=0)
        {
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('ctype') .' WHERE cb_name = \''.$_POST['cb_name'].'\'';
        }
        else
        {
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('ctype');
        }

        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 查询记录 */
        if (isset($_POST['cb_name'])&& $_POST['cb_name']!=0)
        {
           $sql = "SELECT  t.id, t.cb_name, t.csys_id, t.ctype_name, s.csys_name, b.cbrand_name  FROM  ".$GLOBALS['ecs']->table('ctype')."AS t LEFT JOIN " .$GLOBALS['ecs']->table('cbrand')."AS b ON t.cb_name = b.id LEFT JOIN ".$GLOBALS['ecs']->table('csys')." AS s ON t.csys_id = s.id"." WHERE s.cb_name = '$_POST[cb_name]'"." ORDER BY CONVERT( t.cb_name USING gbk ) COLLATE gbk_chinese_ci ASC";
        }
        else
        {
            $sql = "SELECT  t.id, t.cb_name, t.csys_id, t.ctype_name, s.csys_name, b.cbrand_name  FROM  ".$GLOBALS['ecs']->table('ctype')."AS t LEFT JOIN " .$GLOBALS['ecs']->table('cbrand')."AS b ON t.cb_name = b.id LEFT JOIN ".$GLOBALS['ecs']->table('csys')." AS s ON t.csys_id = s.id ORDER BY CONVERT( t.cb_name USING gbk ) COLLATE gbk_chinese_ci ASC";
        }

        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);
	while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $arr[] = $rows;
    }

    return array('ctype' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

?>