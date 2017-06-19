<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/21
 * Time: 10:21
 */
class CatController extends Controller{
    public function index() {
        $id = intval($_GET['id']);
        if(!$id) {
            return $this->error('ID不存在');
        }

        $nav = D("Menu")->find($id);
        if(!$nav || $nav['status'] != 1) {
            $this->error('栏目id不存在或者状态不为正常');
        }
        $advNews = D("PositionContent")->select(array('status' => 1 , 'position_id' => 1) , 2);
        $rankNews = D("Index")->getRank();
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 20;
        $condition = array(
            'status' => 1,
            'thumb' => array('neq',''),
            'catid' => $id,
        );
        $news = D("News")->getNews($condition,$page,$pageSize);
        $count = D("News")->getNewsCount($condition);
        $res = new \Think\Page($count,$pageSize);
        $pageRes = $res->show();

        $this->assign('result' , array(
            'advNews' =>$advNews,
            'rankNews' => $rankNews,
            'catId' => $id,
            'listNews' => $news,
            'pageRes' => $pageRes,
        ));
        $this->display();
    }

    public function error($message = '') {
        $message = $message ? $message : '系统发生错误';
        $this->assign('message',$message);
        $this->display("Index/error");
    }
}
