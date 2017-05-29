<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	 // 这是主页
            $this->display(); 
    }
   public function showdeptlist(){

	
    	//print_r($model);

    	$Dept = M("Dept");
    	$this->data = $Dept->select(); 
    	
    	//$this ->d_name ='asdf';
    	$this->display();
    	echo PATH;
    	echo "<br>";
    	ECHO __APP__."PUBLIC";
    	ECHO COMMON_PATH;
    	p($this);
    }
  


}