<?php 
namespace Home\Controller;
use Think\Controller;
class DeptController extends Controller{

	// 部门主页
	public function index(){
		$this->display();
	}
	
	// 部门添加页面  填写
	public function dept_add(){

		// p('asdf');
		$m=M('dept_type');
		 $data = $m->field("*,concat(path,',',id) as paths")->order("path")->select();
		 foreach($data as $k=>$v){
		 	$data[$k]['name']=str_repeat("|----",$v['level']).$v['name'];
		 }
		$this->assign("data",$data);
		$this->display();
		p($data);
	}

	// 添加分类到数据库
	public function dept_add_save(){
		
		$data['name']	=$_POST['name'];
		$data['pid']	=$_POST['pid'];
		$m=M('dept_type');
		if($data['name']!=""&&$data['pid']!=0){
			
			$path = $m->field("path")->find($data['pid']);		// 定义“path”字段，先获取父栏目“path”
			$data['path']=$path['path'];				// 先将数据的path定义为父栏目path
			$data['level']=substr_count($data['path'],',');		// 获取等级level，根据path的分号数量
			$re = $m->add($data);					// 返回插入信息的ID
	
	
			$path['path']=$data['path'].','.$re;			//修改path为新的path
			$path['level']=substr_count($path['path'],',');		//修改最新的栏目等级
			$m->where('id=%d',$re)->save($path); 
			 if($re){
				  $this->success('新增成功', 'admin.php/home/dept/dept_add');
			 } else {
				    // 错误页面的默认跳转页面是返回前一页，通常不需要设置
				    $this->error('新增失败');
			 }
		}else if($data['name']!="" &&$data['pid']==0){
			
			//$path = $m->field("path")->find($data['pid']);		// 定义“path”字段，先获取父栏目“path”
			$data['path']=$data['pid'];				// 先将数据的path定义为父栏目path
			$data['level']=1;					// pid=0，表示添加主栏目，指定为1
			$re = $m->add($data);					// 返回插入信息的ID
	
	
			$path['path']=$data['path'].','.$re;			//修改path为新的path
			
			$m->where('id=%d',$re)->save($path); 
			 if($re){
				  $this->success('新增成功', 'admin.php/home/dept/dept_add');
			 } else {
				    // 错误页面的默认跳转页面是返回前一页，通常不需要设置
				    $this->error('新增失败');
			 }
		}else{
			$this->error('新增失败');
		}
		


		p($data);
		p($path);
		p($re);
		p($m);
	}


	public function comefrom(){
		$this->display();
	}



}

