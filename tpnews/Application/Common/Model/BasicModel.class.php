<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 18:06
 */
namespace Common\Model;
use Think\Model;
class BasicModel extends  Model {
    private $_db = '';
    public function __construct(){
        $this->_db = M('admin');
    }

    public function save($data = array()) {
        if(!$data) {
            throw_exception('没有提交的数据');
        }
        $id = F('basic_web_config' , $data);
        return $id;
    }

    public function select() {
        return F("basic_web_config");
    }
}