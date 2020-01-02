<?php
	class chartController{
		public function homeAction(){
			require './application/view/home.html';
		}
		
		public function navigationAction(){
			require './application/view/navigation.html';
		}
		
		//表方法
		public function tableAction(){
			require './application/view/table.html';
			
		}
		
		//柱形图
		public function barAction(){
			require './application/view/bar.html';
			
		}
		
		//折线图
		public function lineAction(){
			require './application/view/line.html';
			
		}
	}

?>