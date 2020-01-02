<?php
return array(
	//数据库配置
	'db' => array(
		//读者需要根据自身环境修改此处配置
		'user' => 'root',
		'pass' => '',
		'dbname' => 'mvc_study',
	),

	//平台台配置
	'home' => array(
		'default_controller' => 'chart',//默认控制器
		'default_action' => 'home',//默认方法
		'pagesize' => 5,//每页评论数
	),

);
