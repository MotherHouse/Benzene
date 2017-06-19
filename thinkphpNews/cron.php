<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2017/4/23
 * Time: 20:39
 */
if(version_compare(PHP_VERSION , '5.3.0' , '<'))    die('require PHP > 5.3.0 !');

define('APP_DEBUG' , True);

define('APP_CRONTAB' , 1);
if(!$argv || count($argv) < 4) {
    die("parmas_is_error");
}

$dir = dirname(__FILE__);
define('HTML_PATH',$dir.'/');
$_GET['m'] = !isset($_GET['m']) ? argv[1] : 'admin';
$_GET['c'] = !isset($_GET['c']) ? argv[2] : 'index';
$_GET['a'] = !isset($_GET['a']) ? argv[3] : 'index';

define('APP_PATH',$dir.'/Application/');

// 引入ThinkPHP入口文件
require $dir.'./ThinkPHP/ThinkPHP.php';