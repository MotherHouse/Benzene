<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class ContentController extends Controller {

    public function index() {
        $conds = array();
        if($_GET['title']){
            $data['title'] = trim($_GET['title']);
            //trim() 函数移除字符串两侧的空白字符或其他预定义字符。
            $this->assign('title',$data['title']);
        }
        $title = $_GET['title'];
        if($title) {
            $conds['title'] = $title;
        }
        if($_GET['catid']) {
            $conds['catid'] = intval($_GET['catid']);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 5;
        $conds['status'] = array('neq',-1);
        $news = D("News")->getNews($conds,$page,$pageSize);
        $count = D("News")->getNewsCount($conds);
        $data['menu_id'] = $_GET['catid'] ? intval($_GET['catid']) :'';
        $res = new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        $positions = D("Position")->getNormalPositions();
        $this->assign('positions',$positions);
        $this->assign('pageres' , $pageres);
        $this->assign('news' , $news);
        $this->assign('webSiteMenu',D("Menu")->getBarMenus());
        $this->assign('MenuId',$data['menu_id']);
        $this->display();
    }

    public function add() {
        if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不存在');
            }
            if(!isset($_POST['small_title']) || !$_POST['small_title']) {
                return show(0,'短标题不存在');
            }
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'文章栏目不存在');
            }
            if(!isset($_POST['keywords']) || !$_POST['keywords']) {
                return show(0,'关键字不存在');
            }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'content不存在');
            }
            if($_POST['news_id']) {
                return $this->save($_POST);
            }
            $newsId = D("News")->insert($_POST);
            if($newsId) {
                $newsContentData['content'] = $_POST['content'];
                $newsContentData['news_id'] = $newsId;
                $cId = D("NewsContent")->insert($newsContentData);
                if($cId) {
                    return show(1,'新增成功');
                }else{
                    return show(1,'主表插入成功，副表插入失败');
                }
                //return show(0,'新增失败');
            }else{
                return show(0,'新增失败');
            }
        }else {
            $webSiteMenu = D("Menu")->getBarMenus();
            $titleFontColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPY_FROM");
            $this->assign('webSiteMenu', $webSiteMenu);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyfrom', $copyFrom);
            $this->display();
        }
    }

    public function save($data) {
        $newsId = $data['news_id'];
        unset($data['news_id']);
        try{
            $id = D("News")->updateById($newsId , $data);
            $newsContentData['content'] = $data['content'];
            $condId = D("NewsContent")->updateNewsById($newsId ,$newsContentData );
            if($id === false || $condId === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }

    }

    public function edit() {
        $newsId = $_GET['id'];
        if(!$newsId) {
            //执行跳转
            $this->redirect('admin.php?c=content');
        }
        $news = D("News")->find($newsId);
        if(!$news) {
            $this->redirect('admin.php?c=content');
        }
        $newsContent = D("NewsContent")->find($newsId);
        if($newsContent) {
           $news['content'] = $newsContent['content'];
        }
        $webSiteMenu = D("Menu")->getBarMenus();
        $this->assign('webSiteMenu',$webSiteMenu);
        $this->assign('titleFontColor',C("TITLE_FONT_COLOR"));
        $this->assign('copyfrom',C("COPY_FROM"));
        $this->assign('news',$news);
        $this->display();

    }

    public function setStatus() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D("News")->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0,'没有提交的内容');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    public function listorder() {

        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        //print_r($listorder);exit;
        $errors =array();
        try {
            if ($listorder) {
                foreach ($listorder as $newsId => $v) {
                    $id = D("News")->updateNewsListorderById($newsId, $v);
                    if ($id === false) {
                        $errors[] = $newsId;
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

    public function push() {

        $jumpUrl = $_SERVER['HTTP_REFERER'];
        //链接到当前页面的前一页面的 URL 地址。

        $positionId = intval($_POST['position_id']);
        /**
         * 语法: int intval(mixed var, int [base]);
         * 本函数可将变量转成整数类型。可省略的参数 base 是转换的基底，默认值为 10。         *
         * 转换的变量 var 可以为数组或类之外的任何类型变量。
         */

        $newsId = $_POST['push'];
        if(!$newsId || !is_array($newsId)) {
            return show(0,'请选择推荐的文章ID进行推荐');
        }
        if(!$positionId) {
            return show(0,'没有选择推荐位');
        }
        try {
            $news = D("News")->getNewsByNewsIdIn($newsId);
            if (!$news) {
                return show(0, '没有相关内容');
            }

            foreach ($news as $new) {
                $data = array(
                    'position_id' => $positionId,
                    'title' => $new['title'],
                    'thumb' => $new['thumb'],
                    'news_id' => $new['news_id'],
                    'status' => 1,
                    'create_time' => $new['create_time'],
                );
                //print_r($data);
                $position = D("PositionContent")->insert($data);
            }
        }catch (Exception $e) {
            return show(0,$e->getMessage());
            //Exception::getMessage — 获取异常消息内容
        }

        return show(1,'推荐成功',array('jump_url => $jumpUrl'));
    }

}