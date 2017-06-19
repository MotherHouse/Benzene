<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 10:55
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display();
    }
    public function add(){
        echo 'testadd2333';
    }
}