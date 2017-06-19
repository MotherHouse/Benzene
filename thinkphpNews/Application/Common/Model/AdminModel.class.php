<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 18:06
 */
namespace Common\Model;
use Think\Model;
class AdminModel extends  Model {
    private $_db = '';
    public function __construct(){
        $this->_db = M('admin');
    }

    public function getAdmins() {
        $data['status'] = array('neq',-1);
        $ret = $this->_db->where($data)->select();
        return $ret;
    }

    public function getAdminByUsername($username){
        $ret = $this->_db->where('username="'.$username.'"')->find();
        return $ret;
    }

    public function updateStatusById($id , $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('admin_id='.$id)->save($data);
    }

    public function updateByAdminId($id,$data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('admin_id='.$id)->save($data);
    }

    public function insert($data) {
        return $this->_db->add($data);
    }

    public function getAdminByAdminId($id) {
        return $res = $this->_db->where('admin_id='.$id)->select();
        //print_r($res);exit;
    }

    public function getLastLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' =>array("gt",$time),
        );
        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }
}