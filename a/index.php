<?php

//生成时用到的函数

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

    $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    switch ($theType) {
        case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "long":
        case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "now()";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
        case "sqltable":
            $theValue = ($theValue != "") ?  $theValue  : die("NULL Table");
            break;
    }
    return $theValue;
}



//上面函数结数



//mysql的操作类
  ?>
<?php
/*
* @copyright (C) 2003 - 2006 SystN International Pty Ltd.
* @license http://www.SystN.com
*/

Class Dirver {


//连接数据库
//link database
    function DBLink($dbhost='localhost', $dbuser='root', $password='', $dbname='', $pconnect=0) {
        $this->LinkID[$this->Line] = ($pconnect == 1)? @mysql_pconnect($dbhost, $dbuser, $password) : @mysql_connect($dbhost, $dbuser, $password) or die("Connect to MySQL ($dbhost,$dbuser) failed");
        //选择连接数据库
        //choose to link database
        //强行转换编码
        $this->query("SET NAMES 'utf8'"); //因项目而定
        @mysql_select_db($dbname, $this->LinkID[$this->Line]) or die('Cannot use database '.$dbname);
        return $this->LinkID[$this->Line];
    }


    /**
     * 查询语句
     * view qurry
     * @param <type> $query
     * @param <type> $limit
     * @return <type>
     */
    function query($query,$limit='') {
        $this -> nums ++;
        //检测如果有限制数据集则处理
        //test if there is finite data,then function
        if($limit>0) {
            $query = $query.' LIMIT '.$limit;
        }
        $this-> Lists[$this->Line][] = $query;


        $querys = mysql_query($query,$this->LinkID[$this->Line]);
        if(!$querys) {
            $this->DB_Error($query);
        }
        return $querys;
    }

   
    /**
     * 返回数组资料
     * back to array info
     * @param <type> $query
     * @return <type> 
     */
    function fetch_array($query) {
        return @mysql_fetch_array($query, MYSQL_ASSOC);
    }

    //返回数组资料
    //back to array info]
    /**
     *返回数组资料
     * @param <type> $query
     * @return <type>
     */
    function result($query) {
        return @mysql_result($query,$this->LinkID[$this->Line]);
    }

    //
    //back to row info
    /**
     * 返回数组资料行
     * @param <type> $query
     * @return <type>
     */
    function rows($query) {
        return $this->fetch_array($this->query($query));
    }


    //
    //back to numrows
    /**
     * 返回数组行
     */
    function nums($query) {
        return $this->num_rows($this->query($query));
    }

    //取得返回列的数目
    //fetch the numbers backing out
    /**
     * 取得返回列的数目
     * @param <type> $query
     * @return <type>
     */
    function num_rows($query) {
        return @mysql_num_rows($query);
    }

    //返回单列的各字段
    //return to every field of single row
    /**
     * 取得返回列的数目
     */
    function fetch_row($query) {
        return @mysql_fetch_row($query);
    }

    //返回最后一次使用 INSERT 指令的 ID
    //return to inserted ID used last time
    /**
     *返回最后一次使用 INSERT 指令的 ID
     * @return <type>
     */
    function insert_id() {
        return @mysql_insert_id($this->LinkID[$this->Line]);
    }

    //关闭当前数据库连接
    //close current database link
    /**
     * 关闭当前数据库连接
     * @return <type>
     */
    function close() {
        return @mysql_close($this->LinkID[$this->Line]);
    }

    //检测mysql版本
    //test mysql version
    function version() {
        $query = @mysql_query("SELECT VERSION()",$this->LinkID[$this->Line]);
        return  @mysql_result($query, 0);
    }


    //返回友情提示信息
    //return to kindly note
    function DB_Error($query='') {
        global $PHP_SELF;

        //出错语句提示
        //error sentence
        $errors = preg_replace("/'(.+?)'/is","&nbsp;'<font color='#8899DF'><b>\\1</b></font>'&nbsp;",mysql_error());


        $charset ='';
        //提示语言
        //language noted
        $lang = Array('This SQL Error Info!', 'Error Script:', 'Present time:',
            'Http Host:', 'Server Name:', 'Server Software:',
            'Host IP Address:', 'Remote User Agent:', 'Current File:',
            'Current Line:', 'Line.', 'The Error number:',
            'The specific Error was:', 'SQL Query :', 'Not discover whateverly SQL Sentence ！');
        //时间处理
        //time
        $nowdate = date('Y-m-d H:i A');
        $errors = preg_replace("/'(.+?)'/is","'<font color='#8899DF'><b>\\1</b></font>'",mysql_error());

        //检测是否有语句
        //test if there is any sentence.
        if($query=='') {
            $query = $lang[14];
        }

        echo "<html>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=$charset'>
	<title>$lang[0]</title>
	</head>
	<body>
	</body>
	</html>
	<table style='BORDER-COLLAPSE: collapse;font-size:9pt;' borderColor='#a8b7c6' cellSpacing='1' width='100%' border='1' cellpadding='3' align='center'>
					<tr>
						<td bgColor='#F9F9F9' height='38' colspan='2'>
						<font size='4' face='Arial' color='#800000'>$lang[0]</font></td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[2]</td>
						<td bgColor='#F9F9F9'>$nowdate</td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[3]</td>
						<td bgColor='#F9F9F9'><b>".$_SERVER['HTTP_HOST']."</b></td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[4]</td>
						<td bgColor='#F9F9F9'>".$_SERVER['SERVER_NAME']."</td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[5]</td>
						<td bgColor='#F9F9F9'>".$_SERVER['SERVER_SOFTWARE']."</td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[6]</td>
						<td bgColor='#F9F9F9'><font color=\"#800000\">".$_SERVER['REMOTE_ADDR']."</font></td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[7]</td>
						<td bgColor='#F9F9F9'><font color=\"#000080\">".$_SERVER['HTTP_USER_AGENT'].";</font></td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[11]</td>
						<td bgColor='#F9F9F9'><b>".mysql_errno()."</b></td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[12]</td>
						<td bgColor='#F9F9F9'>$errors</td>
					</tr>
					<tr>
						<td bgColor='#F9F9F9' width='165'>
						<p align='right'>$lang[13]</td>
						<td bgColor='#F9F9F9'>$query</td>
					</tr>
				</table>
					</td>
				</tr>
			</table>";
        exit;
    }

}
?>


<?php 





//list all
$sqlstr = "select * from library";
$ck->et_page($sqlstr,20);
$pageinfo->et_pageinfo();




//select [field] from where [] and 
$ListSql = sprintf("select `name`,`auditing`,`bytes`FROM library   WHERE  `name`= %s)",
	 GetSQLValueString($_POST['name'],"text"));






//list post where
$ListSql = sprintf("select * from library   WHERE  `name`= %s)",
	 GetSQLValueString($_POST['name'],"text"));


//$ck->et_list($sqlstr,20); //两者选一
$ck->et_page($sqlstr,20);
$pageinfo->et_pageinfo();
 if($_POST['id']==''){

//INSEART
$InsertSQL = sprintf("INSERT INTO  library (`name`,`auditing`,`bytes`) VALUES (%s ,%s ,%s )",
	 GetSQLValueString($_POST['name'],"text"),
	 GetSQLValueString(isset($_POST['auditing'])? "true" : "","defined","1","0"),
	 GetSQLValueString($_POST['bytes'],"nodefile"));
$db->query($InsertSQL);

}else{

//UPDATE
$UpdateSQL = sprintf("UPDATE  library SET `name`= %s, `auditing`= %s, `bytes`= %s where   `name`= %s ",
	 GetSQLValueString($_POST['name'] ,"text"),
	 GetSQLValueString(isset($_POST['auditing'])? "true" : "" ,"defined","1","0"),
	 GetSQLValueString($_POST['bytes'] ,"nodefile"),
	 GetSQLValueString($_POST['name'],"text"));
$db->query($UpdateSQL);	}

//delete
$DeleteSQL = sprintf("DELETE FROM   library WHERE `name`= %s)",
	 GetSQLValueString($_POST['name'],"textvarchar(100)"));
$db->query($DeleteSQL);

 
  ?>


<!-- add,edit tableform -->
<form id="form1" name="form1" method="post" action=""><table width="450" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
 <tr><td colspan="2" class="tdbg">&nbsp;&nbsp;library添加修改&nbsp;</td></tr><tr><td bgcolor="#B9E2F8">name</td><td bgcolor="#B9E2F8"><input type=text name="name" id="name" value="{rs['name']}" ></td></tr><tr><td bgcolor="#B9E2F8">auditing</td><td bgcolor="#B9E2F8"><input type=checkbox name="auditing" id="auditing" value="{rs['auditing']}" ></td></tr><tr><td bgcolor="#B9E2F8">bytes</td><td bgcolor="#B9E2F8"><input type=text name="bytes" id="bytes" value="{rs['bytes']}" ></td></tr><tr><td bgcolor="#B9E2F8" colspan="2" align="center"><label><input type="submit" name="button" id="button" value="提交" />&nbsp;&nbsp;<input type="reset" name="button2" id="button2" value="重设" />  <input name="button3" type="button" id="button3" onclick="history.go(-1)" value="返回" /></label></td></tr></table></form>
 
 


<!-- html tableform -->
<table width="680" border="0" align="center" cellpadding="3" cellspacing="1" class="list">
<tr><td height="25" colspan="3" class="tdbg">&nbsp;&nbsp;library管理<span id="msg" style="color:red;"></span></td>  </tr><tr><td bgcolor="#B9E2F8" >name</td><td bgcolor="#B9E2F8" >auditing</td><td bgcolor="#B9E2F8" >bytes</td></tr> 
<!--$list as $lst-->	<tr id="tr{lst['id']}">
		<td bgcolor="#B9E2F8">{lst['name']}</td>
		<td bgcolor="#B9E2F8">{lst['auditing']}</td>
		<td bgcolor="#B9E2F8">{lst['bytes']}</td>
</tr>
<!--end--><tr><td bgcolor="#B9E2F8" colspan="3">{pageinfo}</td></tr></table>
 
 

 
 
 
 





