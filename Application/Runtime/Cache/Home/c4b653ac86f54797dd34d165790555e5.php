<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>采购信息管理</title>
	<link rel="stylesheet" href="/Public/dist/css/zui.min.css">

<!-- ZUI Javascript 依赖 jQuery -->
<script src="//cdnjs.cloudflare.com/ajax/libs/zui/1.5.0/lib/jquery/jquery.js"></script>
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<script src="/Public/dist/js/zui.min.js"></script>


	<link rel="stylesheet" href="/Public/dist/lib/datatable/zui.datatable.css">
<script src="/Public/dist/lib/datatable/zui.datatable.js"></script>



<script src="/Public/dist/my97datepicker/wdatepicker.js"></script>
	<style>

		/*顶部样式表*/
		.headerss{
			line-height: 40px;
			height: 60px;
			margin-bottom: 10px;
		}
	
		/*分页样式*/
		.current, .num, .next,.prev{
			font-weight: bold;
			 border-radius: 4px;
			 line-height: 20px;
			 border: 2px solid rgba(15, 25, 78, 0.39);
			 padding: 5px 20px;
			 margin: 0px 10px;
		}
	</style>

</head>
<body>
<!-- 头部调用 -->
<!-- <div class="header">
	<h1>这里是调用的头部信息</h1>
</div> -->


	<div class="headerss bg-primary">
		<div class="container">
			<div class="logo col-md-5">				
				<h3><i class="icon icon-2x icon-shopping-cart"></i> 采购信息管理</h3>
			</div>
			<!-- <div class="logo col-md-7">
				<ul class="nav nav-primary">
				  <li class="active"><a href="<?php echo U('Buy/index');?>">采购首页</a></li>
				  <li><a href="<?php echo U('Dept/index');?>">部门管理 </a></li>
				  <li><a href="<?php echo U('Buy/index');?>">项目 </a></li>
				  <li>
				    <a class="dropdown-toggle" data-toggle="dropdown" href="your/nice/url">更多 <span class="caret"></span></a>
				    <ul class="dropdown-menu">
				      <li><a href="your/nice/url">任务</a></li>
				      <li><a href="your/nice/url">bug</a></li>
				      <li><a href="your/nice/url">需求</a></li>
				      <li><a href="your/nice/url">用例</a></li>
				    </ul>
				  </li>
				</ul>
				
			</div> -->

			
		</div>	
		</div>
 

	
	<!-- 信息添加 -->
	<div class="container">
		<form class="form" action="/index.php/Home/Buy/add" method="post">
			<table class="table table-bordered  col-md-12 ">
				<tr><input class="form-control" type="hidden" name="bid" readonly="">
					<!-- <td><label for="">编号：</label></td> -->
					<td colspan="2" ><label for="">品名：</label><input class="form-control" type="text" name="bname"></td>
					<td class="col-sm-3" colspan="2" rowspan="2" style="line-height: 50px;">
						
							<label for="">数量：</label>
							<div class="col-md-12">
								<div class="input-group">
   								  <span class="input-group-addon">一共：</span>
   								  <input type="text" class="form-control"  name="bnum" placeholder="填写数字">
   								  <span class="input-group-addon">个</span>
   								</div>
   							</div> 
						
					</td>
					<!-- <td></td> -->
				</tr>
				<tr>
					<td><p class="col-md-12">
							<div class="col-md-1"><label for="">价格</label></div>
							<div class="col-md-7"><input class="form-control" type="text" name="bprice" size="5"></div>
							<div class="col-md-4">
								<select class="form-control"  name="bunit" id="">
									<option value="元">元</option>
									<option value="美元">美元</option>
								</select>
							</div>

						</p>
					</td>
					<td><label for="">来源：</label>
						<select class="form-control"  name="bcome" id="">
							<option value="京东">京东网</option>
							<option value="实体店">实体店</option>
							<option value="淘宝">淘宝网</option>
							<option value="一号店">一号店</option>
						</select>
					</td>
					<!-- <td>label</td>
					<td>label</td> -->
				</tr>
				<tr>
					<td><label for="">申请人：</label><input class="form-control" type="text" name="buser"></td>
					<td colspan="3"><label for="">申请说明：</label><textarea class="form-control"  name="binfo" width=100 placeholder="尽量写详细点。。。"></textarea></td>
					
					
				</tr>
				<tr>
					
					<td>
						<label for="">购买人：</label>
						<input class="form-control" type="text" name="bpayer">
					</td>
					<td>
						<label for="">购买日期：</label>
						<!-- <div class="form-date">
							<input class="form-control" type="text" name="bdate" size="12" >
						</div> -->
						<div class="form-date">
 						   <input style="    font-size: 16pt;    font-weight: bold;" class="form-control" size="16" type="text" value=""  name="bdate" onfocus="WdatePicker({isShowWeek:true})">
 						</div>
						
					</td>
					<td></td>
					<td></td>
					
				</tr>
				<tr>
					<td colspan="10" style="text-align: center;">
						<button class="btn btn-primary">提交信息</button>
						<button class="btn btn-danger" type="reset">重置信息</button>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<!-- 信息整表查看 -->
	<div class="container">
		<table class="table table-bordered table-striped col-md-12 table-hover mytable">
			<tr>
				<th width="20">编号</th>
				<th>品名</th>
				<th width="20">数量</th>
				<th style="text-align: center;">价格</th>
				<th width="20">单位</th>
				<th width="80">申请人</th>
				<th>备注</th>
				<th>购买人</th>
				<th>来源</th>
				<th>日期</th>
				<th><b>管理</b></th>
			</tr>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["bid"]); ?></td>
					<td><?php echo ($vo["bname"]); ?></td>
					<td><?php echo ($vo["bnum"]); ?></td>
					<td align="right"><?php echo ($vo["bprice"]); ?></td>
					<td><?php echo ($vo["bunit"]); ?></td>
					<td><?php echo ($vo["buser"]); ?></td>
					<td><?php echo ($vo["binfo"]); ?></td>
					<td><?php echo ($vo["bpayer"]); ?></td>
					<td><?php echo ($vo["bcome"]); ?></td>
					<td><?php echo ($vo["bdate"]); ?></td>
					<td><a href="<?php echo U('Buy/edit/',array('bid'=>$vo['bid']));?>"><i class="icon icon-edit text-primary" ></i></a>&nbsp;<a  onClick="return confirm('确定删除?'); " href="<?php echo U('Buy/del/',array('bid'=>$vo['bid']));?>"><i class="icon icon-trash text-danger" ></i></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td colspan="11" >
					<!-- <div class="col-md-3"><button  class="btn btn-primary">一共有<?php echo ($count); ?>条数据</button></div> -->
					
					<div class="col-md-9"><?php echo ($page); ?></div></td>
				</tr>
			
		</table>

		<script>
			$('table.mytable').datatable({sortable: true});
		</script>

	</div>
</body>

</html>