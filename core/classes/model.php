<?php

class model{

	public $model;

	function __construct(){

		$this->model = new database();
		$this->model->connectdb($GLOBALS['config']['database']['host'],
			$GLOBALS['config']['database']['username'],
			$GLOBALS['config']['database']['password'],
			$GLOBALS['config']['database']['dbname']);
	}
}

?>