<?php

// 
//  设计数据库的时候，一定更要注意啊！
//  不要用任何驼峰法！！！妈的，会出问题啊！
//  最好用纯小写啊！
//  ===============================
//  
//  规则： 纯小写字母+下划线+（纯小写字母/数字）
//  例如： ken_buyinfo_main_201706
//  
//  ===============================
// 
// 
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	 // 这是主页
            $this->display(); 
    }



}