<?php if (!defined('THINK_PATH')) exit();?><html>
 <head>
   <title>部门管理</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/PUBLIC/DIST/CSS/zui.min.css">
 </head>
 <body>

 <div class="container">
 	<div class="col-md-12">
 		<table class="table-bordered">
 			<tr>
 				<td><select name="dept" id="dept" class="form-control">
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["d_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select></td>
 				<td>123</td>
 			</tr>
 			<tr>
 				<td>123</td>
 				<td>123</td>
 			</tr>


 		</table>


 	</div>
 	<div class="col-md-12">
 		<row class="col-md-12 ">
 			<form action="/index.php/Home/Indexdeptadd">
 				<table class="table-bordered col-md-12">
 					<tr>
 						<th>编号</th>
 						<th>添加部门信息</th>
 						<th>说明信息</th>
 					</tr>
 					<tr>
 						<td>部门编号</td>
 						<td><input type="text" name="id"></td>
 						<td>*可以为空</td>
 					</tr>
 				
 					<tr>
 						<td>上级栏目</td>
 						<td><select name="mainid" id="mainid">
 							<option value="0">===选择父栏目===</option>
 							<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["d_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
 							</select>
 						</td>
 						<td>*默认为一级栏目</td>
 					</tr>
 					<tr>
 						<td>部门名字</td>
 						<td><input type="text" name="d_name" id="d_name"></td>
 						<td>*必填项</td>
 					</tr>
 				</table>
 			</form>
 		</row>
 	</div>
 </div>

<?php echo CSS_URL;?>
 <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["d_name"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
 </body>
</html>