<?php
header("content-type:text/html;charset=utf-8");
include 'mysqldb.class.php';
include 'config.inc.php';
$dao= new MySQLDB($config);//将config.inc中的config数组导入
//var_dump($dao);测试初始化对象
$rsArr=$dao->query("select * from member where uname='houli'");
var_dump($rsArr);//输出所查询到的符合条件的所有数据
//变量是0，‘’，null，array() ==false,但是如果数组中没有查询到数据那数组中应该是什么值呢，怎么通过最后一层ELSE验证
if(!empty($rsArr)){//如果不是空数组
	foreach ($rsArr as $row) {
		echo "$row[id]<br>";
	}
}elseif ($rsArr===false) {
	echo $dao->getError();//此处正式遍历输出所查询的数据
}else{
	echo "没有满足条件的查询结果";
}
//执行一个插入类操作
$rs=$dao->exec("insert into member(name,telephone,uname)values('abc','123','houli'),('def','456','houli')");
if ($rs===false) {
	echo $dao->getError();
}else{
	echo "插入成功{$rs}条记录";
}
?>