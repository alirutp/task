<?php
/**
 * 全局项加载
 * @copyright (c) Emlog All Rights Reserved
 */

error_reporting(7);
ob_start();
header('Content-Type: text/html; charset=UTF-8');

define('WEB_ROOT', dirname(__FILE__));//输出根目录

require_once 'config.php';//加载设置文件
require_once 'function.base.php';//加载类文件

doStripslashes();

$CACHE = Cache::getInstance();

$userData = array();

define('ISLOGIN',	LoginAuth::isLogin());

//用户组:admin管理员, writer联合撰写人, visitor访客
define('ROLE_ADMIN', 'admin');
define('ROLE_WRITER', 'writer');
define('ROLE_VISITOR', 'visitor');
//用户角色
define('ROLE', ISLOGIN === true ? $userData['role'] : ROLE_VISITOR);
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : '');
//站点固定地址
define('WEB_URL', Option::get('blogurl'));
//模板库地址
define('TPLS_URL', WEB_URL.'/templates/');
//模板库路径
define('TPLS_PATH', WEB_ROOT.'/templates/');
//解决前台多域名ajax跨域
define('DYNAMIC_BLOGURL', getBlogUrl());
//前台模板URL
define('TEMPLATE_URL', TPLS_URL.Option::get('nonce_templet').'/');
$active_plugins = Option::get('active_plugins');
$emHooks = array();

if ($active_plugins && is_array($active_plugins)) {
	foreach($active_plugins as $plugin) {
		if(true === checkPlugin($plugin)) {
			include_once(WEB_ROOT . '/content/plugins/' . $plugin);
		}
	}
}
