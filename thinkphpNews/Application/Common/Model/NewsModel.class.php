<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 18:06
 */
namespace Common\Model;
use Think\Model;
class NewsModel extends  Model {
    private $_db = '';

    public function __construct(){
        $this->_db = M('news');
    }

    public function insert ($data = array()) {
        if(!is_array($data) || !$data) {
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);
    }

    //获取新闻
    public function getNews($data,$page,$pageSize) {
        $conditions = $data;
        if(isset($data['title']) && $data['title']) {
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if (isset($data['catid']) && $data['catid']) {
            $conditions['catid'] = intval($data['catid']);
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
                     ->order('listorder desc , news_id desc')
                     ->limit($offset , $pageSize)
                     ->select();
        return $list;
    }

    public function getNewsCount ($data = array()) {
        if(isset($data['title']) && $data['title']) {
            $conditions['title'] =  array('like','%'.$data['title'].'%');
        }
        if (isset($data['catid']) && $data['catid']) {
            $conditions['catid'] = intval($data['catid']);
        }
        $conditions['status'] = array('neq' , -1);
        $res = $this->_db->where($conditions)->count();
        return $res;
    }

    public function find($id) {
        $data = $this->_db->where('news_id='.$id)->find();
        return $data;
    }

    public function updateById($id,$data) {
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function updateStatusById($id , $status) {

        if(!is_numeric($status)) {
            throw_exception('status不能为非数字');
        }
        if(!$id || is_numeric($id)) {
            //throw_exception('ID不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function updateNewsListorderById($id , $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder' => intval($listorder));
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function getNewsByNewsIdIn($newsIds) {
        if(!is_array($newsIds)) {
            throw_exception('参数不合法');
            //如果你在子程序中捕获了错误，想广播到调用者处理的话，就可以用ThrowException()
        }
        $data = array(
            'news_id' => array('in',implode(',',$newsIds)),
            //implode() 函数返回由数组元素组合成的字符串。
        );
        return $this->_db->where($data)->select();
    }

    public function getRank($data = array() , $limit = 10) {
        $list = $this->_db->where($data)->order('count desc , news_id desc')->select();
        return $list;
    }

    public function select($data = array() , $limit = 0) {
        //print_r($data);exit;
        if($data['title']) {
            $data['title'] = array('like' , '%'.$data['title'].'%');
        }

        if($limit) {
            $list = $this->_db->where($data)->order('listorder desc,news_id desc')->limit($limit)->select();
        }else{
            $list = $this->_db->where($data)->order('listorder desc,news_id desc')->select();
        }
        return $list;
    }

    public function updateCount($id , $count) {
        if(!is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($count)) {
            throw_exception("count不能为非数字");
        }

        $data['count'] = $count;
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function maxcount() {
        $data=array(
            'status' => 1,
        );
        return $this->_db->where($data)->order('count desc')->limit(1)->find();
        //find只返回满足查询条件的第一组数据，而select获取所有满足查询条件的记录。
        //因此二者在数组结构上表现出区别，find获得的是查询数据的一维数组，而select是二维数组，这样即便只查询到一条记录，二者的数组结构也是不同的。

    }
}

