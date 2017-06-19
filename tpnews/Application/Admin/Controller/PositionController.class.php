<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/18
 * Time: 14:02
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
use Think\View;
class PositionController extends Controller {

    public function index(){
        /*
         * 分页逻辑
         */
        //print_r($_SESSION);exit;
        $data = array();
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'],array(0,1))){
            $data['type'] =  intval($_REQUEST['type']);
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-1);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
        $positions = D("Position")->getPositions($data,$page,$pageSize);
        $positionCount = D("Position")->getpositionsCount($data);
        $res = new \Think\Page($positionCount,$pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('positions',$positions);

        $this->display();
    }

    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0,'推荐位名称不能为空');
            }
            if($_POST['id']){
                return $this->save($_POST);
            }
            $menuId = D("Position")->insert($_POST);
            if($menuId){
                return show(1,'新增成功',$menuId);
            }

            return show(0,'新增失败',$menuId);
        }else{
            $this->display();
        }
    }




    public function setStatus(){
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];
                $res = D("Position")->updateStatusById($id,$status);
                if($res){
                    return show(1,'操作成功');
                }else{
                    return show(0,'操作失败');
                }
            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
        return show(0,'没有提交的数据');
    }

    public function edit() {
        $positionId = $_GET['id'];
        //echo $positionId;exit();
        $positions = D("Position")->find($positionId);
        //print_r($positions);exit;
        $this->assign('positions',$positions);
        $this->display();
    }

    public function save($data)
    {
        $positionId = $data['id'];
        unset($data['id']);
        try {
            $id = D("Position")->updatePositionById($positionId, $data);
            if ($id === false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }
}