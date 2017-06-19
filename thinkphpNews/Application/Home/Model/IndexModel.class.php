<?php
namespace Home\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/21
 * Time: 9:10
 */
class IndexModel extends  Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('news');
    }

    public function getRank($data = array() , $limit = 10) {
        $list = $this->_db->where($data)->order('count desc , news_id desc')->limit($limit)->select();
        return $list;
    }
}