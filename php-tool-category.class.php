<?php

class Category{
	//数组型的分类结构
	private  $categorylist;
	
	//构造函数
	public function category($categorylist){
		$this->$categorylist = $categorylist;
	}

	//获取上一层的父亲
	public function get_parent($cateid){

	}

	//获取下一层的儿子
	public function get_children($cateid){

	}

	//获取全部父亲
	public function get_parents($cateid){

	}

	//获取全部儿子
	public function get_childrens($catdid){

	}

	//获取同级兄弟
	public function get_siblings($cateid){

	}

	//获取分类深度
	public function get_depth($cateid){
		
	}

}
