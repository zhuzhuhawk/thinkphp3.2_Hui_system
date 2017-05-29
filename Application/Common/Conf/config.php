<?php
return array(
	//'配置项'=>'配置值'
		
		////数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'jianjin_manage', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'root', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀 
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增




		// 开启调试
		'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息
		'SHOW_PAGE_TRACE' =>true, 

		// URL_MODEL		链接模式
		// 0	动态拼接					/index.php?m=Home&c=Buy&a=index
		// 1	html 后缀模式，好看				/index.php/Home/Buy/index.html
		// 2	伪静态 隐藏index.php，需要服务器支持		/Home/Buy/index.html
		// 3 	动态，包含index.php 和html后缀名		/index.php?s=/Home/Buy/index.html
		'URL_MODEL'=>1,	// html后缀的
);