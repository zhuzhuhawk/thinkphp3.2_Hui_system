<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<title>修改</title>
	<meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	
	<!-- 信息修改 -->
	<div class="container">
		<!-- <form class="form" action="/index.php/Home/Buy/add" method="post"> -->
		<form class="form" action="<?php echo U('update');?>" method="post">
			<table class="table table-bordered  col-md-12 ">
				<tr><input class="form-control" type="hidden" name="bid" value="<?php echo ($row['bid']); ?>">
					<!-- <td><label for="">编号：</label></td> -->
					<td colspan="2" ><label for="">品名：</label><input class="form-control" type="text" name="bname" value="<?php echo ($row['bname']); ?>"></td>
					<td class="col-sm-3" colspan="2" rowspan="2" style="line-height: 50px;">
						
							<label for="">数量：</label>
							<div class="col-md-12">
								<div class="input-group">
   								  <span class="input-group-addon">一共：</span>
   								  <input type="text" class="form-control"  name="bnum" value="<?php echo ($row["bnum"]); ?>">
   								  <span class="input-group-addon">个</span>
   								</div>
   							</div> 
						
					</td>
					<!-- <td></td> -->
				</tr>
				<tr>
					<td><p class="col-md-12">
							<div class="col-md-1"><label for="">价格</label></div>
							<div class="col-md-7"><input class="form-control" type="text" name="bprice" value="<?php echo ($row["bprice"]); ?>" size="5"></div>
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
					<td><label for="">申请人：</label><input class="form-control" type="text" name="buser" value="<?php echo ($row[buser]); ?>"></td>
					<td colspan="3"><label for="">申请说明：</label><textarea class="form-control"  name="binfo" width=100 placeholder="尽量写详细点。。。"  ><?php echo ($row[binfo]); ?></textarea></td>
					
					
				</tr>
				<tr>
					
					<td>
						<label for="">购买人：</label>
						<input class="form-control" type="text" name="bpayer" value="<?php echo ($row[bpayer]); ?>">
					</td>
					<td>
						<label for="">购买日期：</label>
						<!-- <div class="form-date">
							<input class="form-control" type="text" name="bdate" size="12" >
						</div> -->
						<div class="form-date">
 						   <input style="    font-size: 16pt;    font-weight: bold;" class="form-control"  value="<?php echo ($row[bdate]); ?>" size="16" type="text" value=""  name="bdate" onfocus="WdatePicker({isShowWeek:true})">
 						</div>
						
					</td>
					<td></td>
					<td></td>
					
				</tr>
				<tr>
					<td colspan="10" style="text-align: center;">
						<button class="btn btn-primary">提交信息</button>
						<button class="btn btn-danger" type="reset">重置信息</button>
						<a href="<?php echo U('Buy/index');?>" class="btn btn-info"><i class="icon icon-home"></i> 返回列表</a>
					</td>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>