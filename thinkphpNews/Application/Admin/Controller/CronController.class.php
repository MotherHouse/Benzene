<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2017/4/23
 * Time: 14:42
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class CronController {
    public function dumpmysql() {
        $result = D("Basic")->select();
        if(!$result['dumpmysql']) {
            die("系统没有设置开启自动备份数据库的内容");
        }
        $shell = "mysqldump -u".C("DB_USER")." ".C("DB_NAME")." > /tmp/cms".date("Ymd".".sql");
        exec($shell);

    }
}