<?php 
/**
 * 2017年3月2日14:46:24
 */

function p($a){
	echo "<pre>";
	print_r($a);
	echo "</pre>";
}

/**
 * [getpage 分页函数]
 * ================
 * @AuthorHTL
 * @DateTime  2017-04-01T09:33:39+0800
 * ================
 * @param     [type]                   $count    [信息总数]
 * @param     integer                  $pagesize [每页大小]
 * @return    [type]                             [ ]
 */
function getpage($count, $pagesize = 10) {
  $p = new Think\Page($count, $pagesize);
  $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
  $p->setConfig('prev', '上一页');
  $p->setConfig('next', '下一页');
  $p->setConfig('last', '末页');
  $p->setConfig('first', '首页');
  $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
  $p->lastSuffix = false;//最后一页不显示为总页数
  return $p;
}