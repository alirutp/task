<?php
require_once 'config.php';
require_once 'function.php';
//require_once 'mysql.php';
require_once 'db.php';
//$a=new test(sa,121,3123);
///echo $a->say();
//echo '<br/>';
//echo $a->go();
//$b=new mysql();
//$b=mysql::getInstance();//初始化
//$b->query('select * from users');
//$b->query('select * from users');
//$c=mysql::getInstance()->once_fetch_array("select * from users where id=2")['username'];
//var_dump($b->num_fields($b->query("select * from users")));
//echo siteinfo::sitename();
//$c=new siteinfo();

//echo db::sitename();

echo '<br/>';
echo db->getVersion();//直接调用没有初始化类型出错





?>