<?php 
namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller {

	public function index(){	

		 $m = M('buybak');
		$data = $m->select();
		$this->assign('data',$data);

		$this->display();
	}


	public function buyclass(){

		// $m = M('dept');
		// p($m);
		$this->display();
	}

	public function comefrom(){
		$this->display();
	}




	// 添加采购记录
	public function buy_add(){
		$this->display();
	}



}

