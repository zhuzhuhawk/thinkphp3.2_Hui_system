<?php 

////////////////////////////////////
//////////////////////////////////
///////
//////
//////		部门列表管理
//////		2017年6月9日
//  //		
/////////////////////////////////

namespace Home\Controller;
use Think\Controller;
class DeptController extends Controller{
	public function index(){
		$Dept = M('dept_type');
		// p($Dept);
		// 
		$this->display();
	
		}
	}
