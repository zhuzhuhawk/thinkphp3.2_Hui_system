<?php 
namespace Home\Controller;
use Think\Controller;
// use Think\tree;
class DeptController extends Controller{
	public function index(){
		$Dept = M('dept_type');
		p($Dept);
	
		}
	}
