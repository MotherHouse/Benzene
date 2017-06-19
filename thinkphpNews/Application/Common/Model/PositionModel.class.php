<?php
namespace Common\Model;
use Think\Model;

/**
 * 推荐位管理操作
 */

class PositionModel extends Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('Position');
    }
    public function select($data = array()) {
        $conditions = $data;
        $list = $this->_db->where($conditions)->order('id')->select();
        return $list;
    }

    public function find($id) {
        $data = $this->_db->where('id='.$id)->find();
        return $data;
    }

    public function updateById($id,$data) {
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }
        return $this->_db->where('id='.$id)->save($data);
    }


    public function getNormalPositions() {
        //获取正常的推荐位
        $conditions = array('status'=>1);
        $list = $this->_db->where($conditions)->order('id')->select();
        return $list;
    }

    public  function  getPositions($data,$page,$pageSize = 10){
        $data['status'] = array('neq',-1);
        $offset = ($page -1) * $pageSize;
        $list = $this->_db->where($data)->order('id desc')->limit($offset,$pageSize)->select();
        return $list;

    }
    public function getPositionsCount($data = array()){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function insert ($data = array()) {
        if(!is_array($data) || !$data) {
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);
    }

    public function updateStatusById($id , $status)
    {
        //echo $status;exit;
        if (!is_numeric($id) || !$id) {
            throw_exception("ID不合法");
        }
        if (!is_numeric($status) || !$status) {
            throw_exception("状态不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('id='.$id)->save($data);
    }

    public function updatePositionById($id , $data){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('id='.$id)->save($data);
    }
}
