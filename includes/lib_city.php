<?php
require(dirname(__FILE__) . '/iplocaion.class.php');
//匹配本地城市数据库
function querycity(){
$ct = getcity();
$cty = str_replace ("市","",$ct);
if(strlen($cty) >= 12){
	$cti =  substr($cty,-6);
}else{
	$cti = $cty;
}	
$sql = 'SELECT region_id, region_name FROM ' . $GLOBALS['ecs']->table('region') . " WHERE region_name LIKE '$cti' AND region_type = 2";
$res = $GLOBALS['db']->getrow($sql);
return $res['region_name'];	
}
//根据IP获得用户所在城市
function getcity(){
$IpLocation = new IpLocation(dirname(__FILE__) .'/qqwry.dat');
$clentip=$IpLocation->clientIp();
$client = $IpLocation->getlocation($clentip);
$ci  = $client['country'];
return $ci;
}
?>