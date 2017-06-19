<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 15:31
 * 公用的方法
 */

function  show($status,$message,$data=array()){
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );
    exit(json_encode($result));
}

function getMd5Password($password){
    return md5($password);
}

function getMenuType($type) {
    return $type == 1 ? '后台菜单' : '前端导航';
}

function status($status) {
    if($status == 0 ){
        $str = '关闭';
    }elseif($status == 1) {
        $str = '正常';
    }elseif($status == -1) {
        $str = '删除';
    }
    return $str;
}

//获取菜单的链接
function getAdminMenuUrl($nav) {
    $url = 'admin.php?c='.$nav['c'].'&a='.$nav['a'];
    if($nav['f']=='index') {
        $url = 'admin.php?c='.$nav['c'];
    }
    return $url ;
}

//菜单悬停效果
function getActive($navc) {
    $c = strtolower(CONTROLLER_NAME);
    //strtolower把所有字符转化为小写
    if(strtolower($navc) == $c) {
        return 'class="active"';
    }
    return '';
}

function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'url'=>'上传失败')));
}

function getLoginUsername() {
    return $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username'] : '';
}

function getCatName($navs , $id) {
    foreach($navs as $nav) {
        $navList[$nav['menu_id']] = $nav['name'];
    }
    return isset($navList[$id]) ? $navList[$id] : '';
}

function getCopyFromById($id) {
    $copyFrom = C("COPY_FROM");
    return $copyFrom[$id] ? $copyFrom[$id] : '';
}

function isThumb($thumb) {
    if($thumb) {
        return '<span style = "color:red">有</span>';
    }
    return '无';
}