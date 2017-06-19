<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/19
 * Time: 0:46
 */
namespace Common\Model;
use Think\Model;
class PositionContentModel extends  Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('position_content');
        //parent::__construct();
    }

    public function insert ($data = array()) {
        if(!is_array($data) || !$data) {
            return 0;
        }
        $data['create_time'] = time();
        return $this->_db->add($data);
    }

    public function select($data = array() , $limit = 0) {
        if($data['title']) {
            $data['title'] = array('like' , '%'.$data['title'].'%');
        }

        if($limit) {
            $list = $this->_db->where($data)->order('listorder desc,id desc')->limit($limit)->select();
        }else{
            $list = $this->_db->where($data)->order('listorder desc,id desc')->select();
        }
        return $list;
    }

    public function updateStatusById($id , $status){
        if(!is_numeric($id) || !$id){
            throw_exception("ID不合法");
        }
        if(!is_numeric($status) || !$status){
            throw_exception("状态不合法");
        }

        $data['status'] = $status;
        $data['id'] = $id;
        return $this->_db->where('id='.$id)->save($data);
    }

    public function find($id) {
        $data = $this->_db->where('id='.$id)->find();
        return $data;
    }

    public function updateContentById($id, $data)
    {
        //print_r($data);exit;
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }
        if (isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }

        return $this->_db->where('news_id=' . $id)->save($data);
    }

    public function updateById ($id,$data) {
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception("更新的数据不合法");
        }
        return $this->_db->where('id='.$id)->save($data);
    }

    public function updateListorderById($id , $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder'=>intval($listorder));
        return $this->_db->where('id='.$id)->save($data);
    }

    public  function  getPositionContent($data,$page,$pageSize = 10){
        $data['status'] = array('neq',-1);
        $offset = ($page -1) * $pageSize;
        $list = $this->_db->where($data)->order('id desc')->limit($offset,$pageSize)->select();
        return $list;

    }
    public function getPositionContentCount($data = array()){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }
}