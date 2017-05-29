<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   /**
    * 主页
    * ================
    * @AuthorHTL
    * @DateTime  2017-04-14T21:15:40+0800
    * ================
    * @return    [type]                   [description]
    */
    public function index(){

        $this->display();

    }

   //公用头部模版
    public function header(){
    	$this->display();
    }

    //公用底部模版
    public function footer(){
    	$this->display();
    }

    // 左侧列表
    public function leftmenu(){
    	$this->display();
    }

}