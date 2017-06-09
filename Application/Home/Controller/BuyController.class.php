<?php 
// 
// 	设计数据库的时候，一定更要注意啊！
// 	不要用任何驼峰法！！！妈的，会出问题啊！
// 	最好用纯小写啊！
// 	===============================
// 	
// 	规则： 纯小写字母+下划线+（纯小写字母/数字）
// 	例如： ken_buyinfo_main_201706
// 	
// 	===============================
// 
// 
namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller{
	/**
	 * [header description]
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-04-14T10:08:32+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	public  function header(){
		$this->display();
	}
	public function index(){


		$buyids =  'BUY-'.date('YmdH').'-'.rand(100,200);
		
		
		$Buyinfo = M('buyinfo'); // 实例化Buyinfo对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$data = $Buyinfo->order('bdate desc')->page($_GET['p'].',15')->select();
		$this->assign('data',$data);// 赋值数据集
		$count = $Buyinfo->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('prev', '上一页');
	 	$Page->setConfig('next', '下一页');
	 	$Page->setConfig('last', '末页');
	 	$Page->setConfig('first', '首页');
		$Page->setConfig("theme" ,"共%TOTAL_ROW%条数据  %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%  ");
		// $Page->setConfig("theme" ,"共%TOTAL_ROW%个数据 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('buyids',$buyids);// 赋值分页输出
		
		// p(buyids());
		$this->display(); // 输出模板
		// print_r("SESSION是：". $_SESSION['var']);
	}


	/**
	 * 增加购买记录
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-03-07T10:27:29+0800
	 * ================
	 */
	public function add(){
		//print_r($getinfo);
		// echo "asdf";
		// $info['bname'] = $getinfo['bname'];

		$data=$_POST;
		$data['bname'] = trim($data['bname']);
		$data['buyid'] = trim($data['buyid']);
		$data['bprice'] = trim($data['bprice']);
		$data['buser'] = trim($data['buser']);
		$data['bnum'] = trim($data['bnum']);
		$data['bpayer'] = trim($data['bpayer']);
		 $Buy = M('buyinfo');
		//p($data);
		if(empty($data['bname'])){
			$this->error('品名不能为空啊！');
		};
		if(empty($data['bprice'])){
			$this->error('价格不能为空！');
		}elseif(empty($data['buser'])){
			$this->error('使用者信息不能为空！');
		}
			$result = $Buy->add($data); 
			if($result){
			    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
			    $this->success('新增成功', 'index');
			} else {
			    //错误页面的默认跳转页面是返回前一页，通常不需要设置
			    $this->error('新增失败');
			}
				
		
	//	p($data);
	//	die;
	
		
	}

	/**
	 * 修改购买记录
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-03-07T10:28:03+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	public function edit(){
			
			

			
				$Form = M('buyinfo');
				$data = $_GET['bid'];
				// echo $data;
				
				// $map['bid'] =$data;
				$this->row=$Form->find($data);
				p($result);
				
				// $this->assign('data',$result);// 赋值数据集
				$this->display();
			
	}


	public function update(){

			$Form = M('buyinfo');
			$Form->create();
			if($Form->save()){
				  $this->success('修改成功', U('Buy/Index'));
			}else{
			
				  $this->error('修改失败');
			};


	}
	
	public function del(){
	
		$id = $_GET['bid'];
		//p($data);
		$Form = M('buyinfo');
		$result = $Form->delete($id);
		if($result){
			    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
			    $this->success('删除成功', U('Buy/Index'));
			} else {
			    //错误页面的默认跳转页面是返回前一页，通常不需要设置
			    $this->error('删除失败');
			}
	
	}


	public function lists(){

		$this->display();
	}


	/**
	 * [ReceiveList description]
	 * @ReceiveList  | 电脑领取管理		领取信息登记在这里
	 * 	           	| 调用buyinfo表		字段名称以 Receive开头的	
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-06-07T20:25:46+0800
	 * ================
	 */
	public function ReceiveList(){



		$Buyinfo = M('buyinfo'); // 实例化Buyinfo对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$data = $Buyinfo->order('bdate desc')->page($_GET['p'].',15')->select();
		$this->assign('data',$data);// 赋值数据集
		$count = $Buyinfo->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('prev', '上一页');
	 	$Page->setConfig('next', '下一页');
	 	$Page->setConfig('last', '末页');
	 	$Page->setConfig('first', '首页');
		$Page->setConfig("theme" ,"共%TOTAL_ROW%条数据  %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%  ");
		// $Page->setConfig("theme" ,"共%TOTAL_ROW%个数据 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出


			//p($data);die;

		$this->display();
	}

	/**
	 * [ReceiveEdit description]
	 * @ReceiveList  | 电脑领取管理 单个信息编辑
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-06-07T21:26:56+0800
	 * ================
	 */
	public function ReceiveEdit(){



		$Form = M('buyinfo');
		$data = $_GET['bid'];
		
		$this->row=$Form->find($data);
		$this->display();


	}

	public function ReceiveUpdate(){
		p($_GET[$row]);

			$Form = M('buyinfo');
			$Form->create();
			if($Form->save()){
				  $this->success('修改成功', U('Buy/ReceiveList'));
			}else{
			
				  $this->error('修改失败');
			};


	}

}
