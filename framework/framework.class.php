<?php
/**
 * 框架基础类
 */
class framework{
	public function runApp(){
		$this->loadConfig();        //加载配置
		$this->registerAutoLoad();  //注册自动加载方法
		$this->getRequestParams();  //获得请求参数
		$this->dispatch();          //请求分发
	}
	/**
	 * 注册自动加载方法
	 */
	private function registerAutoLoad(){
		spl_autoload_register(array($this,'user_autoload'));
	}
	/**
	 * 自动加载方法
	 * $param $class_name string 类名
	 */
	public function user_autoload($class_name){
		//依次判断 基础类、控制器类
		if (substr($class_name,-5) == 'Model'){
			require "./application/model/{$class_name}.class.php";
		}elseif (substr($class_name, -10) == 'Controller'){
			require "./application/controller/{$class_name}.class.php";			
		}
	}
	/**
	 * 载入配置文件
	 */
	private function loadConfig(){
		//使用全局变量保存配置
		$GLOBALS['config'] = require './application/config/app.conf.php';
	}
	/**
	 * 获取请求参数，p=平台 c=控制器 a=方法
	 */
	private function getRequestParams(){
		//得到当前控制器名
		define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['home']['default_controller']);
		//当前方法名
		define('ACTION', isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['home']['default_action']);
	}
	/**
	 * 请求分发
	 */
	private function dispatch(){
		//实例化控制器
		$controller_name = CONTROLLER.'Controller';
		$controller = new $controller_name;
		//调用当前方法
		$action_name = ACTION . 'Action';
		$controller->$action_name();
	}
}
