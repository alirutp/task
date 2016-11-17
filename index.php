<?php

/**
 * 前端页面加载
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'init.php';// 初始化

define('TEMPLATE_PATH', TPLS_PATH.Option::get('nonce_templet').'/');//前台模板路径
$emDispatcher = Dispatcher::getInstance();
$emDispatcher->dispatch();//缓存页面
View::output();//输出缓存