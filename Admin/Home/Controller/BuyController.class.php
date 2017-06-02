<?php 
namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller {

	public function index(){	

		 $m = M('buybak');
		$data = $m->select();
		$count = $m->count();
		$this->assign('data',$data);
		$this->assign('countlist',$count);
		$this->display();
	}


	public function buyclass(){

		// $m = M('dept');
		// p($m);
		$this->display();
	}
	/**
	 * 采购来源管理
	 * ================
	 * @
	 * @DateTime  2017-05-31T21:28:08+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	public function comefrom(){
		 $md = M('buycomefrom');
		$data = $md->select();
		$countList = $md ->count();
		$this->assign('data',$data);
		// 统计数据条数
		$this->countList = $countList;
		// p($this);
		// p($countList);

		$this->display();
	}
	public function buycomefromDel(){
		echo "aaa";
		$data['delid']= $_GET['delid'];
		p($data);
		// p($countList);
	}


	// 添加采购记录
	public function buy_add(){
		$this->display();
	}



}

