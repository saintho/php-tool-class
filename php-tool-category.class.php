<?php

class Category{
	//分类模型
	private $cateid = 'cateid'; //表主键字段
	private $catename = 'catename'; //分类名称字段
	private $pid = 'pid'; //父id字段
	private $path = 'path'; //路径字段
	private $sort = 'sort'; //排序字段

	//数组型的分类结构
	//array($subcate,$subcate,$subcate...)
	private $categorylist; //全部分类的列表
	private $parentslist; //全部父亲的列表
	
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

	//获取分类的结构化
	//return array('cateid', 'catename', 'order')
	public function get_struct_category($pid = 0, &$result = array(), $spac = 0){
		$spac = $spac + 2;
		$sql = "SELECT * FROM deepcate WHERE pid = $pid";
		$res = mysql_query($sql);
		while ($row = mysql_fetch_assoc($res)) {
			$row['catename'] = '|--'.$row['catename'];
			$result[] = $row;
			get_struct_category($row['id'], $result, $spac);
		}
		return $result

		$parentslist = $this->_get_all_parents(); //获取全部父亲
		foreach ($parentslist as $key => $parent) {
			
		}
	}

	public function _get_all_parents(){
		$parentslist = array();
		foreach ($this->categorylist as $key => $categoryitem) {
			if($categoryitem[$this->pid] == 0){
				$parentslist[] = $categoryitem;
			}
		}
		return $parentslist;
	}

	public fucntion test(){
		$sql = 'select id, catename, path, concat(path,',',id) as fullpath from likecate order by fullpath asc';
		$res = mysql_query($sql);
		$result = array();
		while($row = mysql_fetch_assoc($res)){
			$deep = explode(',', $row['fullpath']);
			$row['catename'] = str_repeat('&nbsp;&nbsp;', $deep).'|--'.$row['fullpath'];
			$result[] = $row;
		}
		return $result;
	}

}
