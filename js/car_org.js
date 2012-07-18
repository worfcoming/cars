function callbrand(bid){
	Ajax.call('/car.php?act=ibrand','bid='+bid, cbResponse, 'POST', 'JSON');
}
function cbResponse(result){
    var obj=document.getElementById('cx');
	obj.options.length=0;
	obj.options.add(new Option("请选择车系", ""));
	var obo=document.getElementById('ck');
	obo.options.length=0;
	obo.options.add(new Option("请选择车款", ""));
	for (i = 0; i <result.length; i ++ )
    {
    obj.options.add(new Option(result[i].csys_name, result[i].id)); //这个兼容IE与firefox
	}
	
}

function callsys(sid){
	Ajax.call('/car.php?act=isys','sid='+sid, csResponse, 'POST', 'JSON');
}
function csResponse(result){
	var obj=document.getElementById('ck');
	obj.options.length=0;
	obj.options.add(new Option("请选择车款", ""));
	for (i = 0; i <result.length; i ++ )
    {
    obj.options.add(new Option(result[i].ctype_name, result[i].id)); //这个兼容IE与firefox
	}
	
}
