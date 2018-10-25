<?php
abstract class DB{
	protected $conn;
	protected $host;
	protected $port;
    protected $user;
    protected $password;
    protected $dbName;
    protected $charset;
    protected abstract function initParam(Array $arr);
    protected abstract function getConn();//创建连接
    protected abstract function selectDB();//选择数据库
    protected abstract function setCharset();
    protected abstract function query($sql);//查询语句，查询结果
    protected abstract function exec($sql);//处理一个能够相应数据的SQL。以便确定服务器连接成功
}


?>