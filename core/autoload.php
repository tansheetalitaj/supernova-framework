<?php
	spl_autoload_register(function($class){

		$corePath = $GLOBALS['config']['paths']['core'];
		$appPath = $GLOBALS['config']['paths']['app'];

		if(file_exists("{$corePath}abstracts/{$class}.php")){
			$instantiable = false;
			require_once "{$corePath}abstracts/{$class}.php";
		}else if(file_exists("{$corePath}classes/{$class}.php")){
			$instantiable = true;
			require_once "{$corePath}classes/{$class}.php";
		}else if(file_exists("{$corePath}interfaces/{$class}.php")){
			$instantiable = false;
			require_once "{$corePath}interfaces/{$class}.php";
		}else if(file_exists("{$appPath}abstracts/{$class}.php")){
			$instantiable = false;
			require_once "{$appPath}abstracts/{$class}.php";
		}else if(file_exists("{$appPath}controllers/{$class}.php")){
			$instantiable = true;
			require_once "{$appPath}controllers/{$class}.php";
		}else if(file_exists("{$appPath}helpers/{$class}.php")){
			$instantiable = true;
			require_once "{$appPath}helpers/{$class}.php";
		}else if(file_exists("{$appPath}interfaces/{$class}.php")){
			$instantiable = false;
			require_once "{$appPath}interfaces/{$class}.php";
		}else if(file_exists("{$appPath}libs/{$class}.php")){
			$instantiable = true;
			require_once "{$appPath}libs/{$class}.php";
		}else if(file_exists("{$appPath}models/{$class}.php")) {
			$instantiable = false;
			require_once "{$appPath}models/{$class}.php";
		}else if(file_exists("{$appPath}views/template/{$class}.php")) {
			$instantiable = false;
			require_once "{$appPath}views/template/{$class}.php";
		}else {
			$instantiable = false;
		}
		if($instantiable){
			foreach ($GLOBALS['instances'] as $instance) {
				$instance->$class = new $class();
			}
		}

	});
?>
