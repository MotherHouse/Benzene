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

class PositionContentController extends Controller {

    public function index(){
        $positions = D("Position")->getNormalPositions();
        $data['status'] = array('neq' , -1);
        if($_GET['title']){
            $data['title'] = trim($_GET['title']);
            $this->assign('title',$data['title']);
        }
        $data['position_id'] = $_GET['position_id'] ? intval($_GET['position_id']) : $positions[0]['id'];


        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 2;
        $positionContent = D("PositionContent")->getPositionContent($data,$page,$pageSize);
        $positionContentCount = D("PositionContent")->getpositionContentCount($data);
        $res = new \Think\Page($positionContentCount,$pageSize);
        //$pageRes = $res->show();
        $this->assign('pageRes', $pageRes);


        $contents = D("PositionContent")->select($data);
        $this->assign('positionId' , $data['position_id']);
        $this->assign('positions' , $positions);
        $this->assign('contents' , $contents);
        $this->display();
    }

    public function add() {
        if($_POST) {
            if(!isset($_POST['position_id']) || !$_POST['position_id']){
                return show(0,'推荐位ID不能为空');
            }
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0,'推荐位标题不能为空');
            }
            if(!isset($_POST['url']) && !$_POST['news_id']){
                return show(0,'url和文章ID不能同时为空');
            }
            if(!isset($_POST['thumb']) && !$_POST['thumb']){
                if ($_POST['news_id']) {
                    $res = D("News")->find($_POST['news_id']);
                    if($res && is_array($res)) {
                        $_POST['thumb'] = $res['thumb'];
                    }
                }else{
                    return show(0,'图片不能为空');
                }
            }
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try{
                $id = D("PositionContent")->insert($_POST);
                if($id) {
                    return show(1,'新增成功');
                }
                return show(0,'新增失败');
            }catch(Exception $e) {
                return show(0,$e->getMessage());
            }
        }else {
            $positions = D("Position")->getNormalPositions();
            $this->assign('positions',$positions);
            $this->display();
        }
    }

    public function setStatus(){
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];
                //执行数据更新操作
                $res = D("PositionContent")->updateStatusById($id,$status);
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
        $id = $_GET['id'];
        $position = D("PositionContent")->find($id);
        $positions = D("Position")->getNormalPositions();
        $this->assign('positions',$positions);
        $this->assign('vo',$position);
        $this->display();
    }

    public function save($data) {
        $id = $data['id'];
        unset($data['id']);
        try {
            $resId = D("PositionContent")->updateById($id,$data);
            if($resId === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    public function listorder() {
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors =array();
        try {
            if ($listorder) {
                foreach ($listorder as $Id => $v) {
                    $id = D("PositionContent")->updateListorderById($Id, $v);
                    if ($id === false) {
                        $errors[] = $Id;
                    }
                }

                if ($errors) {
                    return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
                }
                return show(1, '排序成功', array('jump_url' => $jumpUrl));
            }
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_url'=>$jumpUrl));
    }
}