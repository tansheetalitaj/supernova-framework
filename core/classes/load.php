<?php
$corePath = $GLOBALS['config']['paths']['core'];
$appName = $GLOBALS['config']['appName'];
$doc_root = $_SERVER['DOCUMENT_ROOT'];

include $doc_root."/".$appName."/core/BladeOne/BladeOne.php";
use eftec\bladeone\BladeOne;
class load{

	static function view($viewFileName, $viewVars = array()){
		extract($viewVars);
		$viewFileCheck = explode(".", $viewFileName);
		if(!isset($viewFileCheck[1])){
			$viewFileName .= ".blade.php";
		}
		$viewFileName = str_replace("::", "/", $viewFileName);
		$views = $_SERVER['DOCUMENT_ROOT']."/".$GLOBALS['config']['appName']."/".$GLOBALS['config']['paths']['app']."views"; // folder where is located the templates
		$compiledFolder = $_SERVER['DOCUMENT_ROOT']."/".$GLOBALS['config']['appName']."/".$GLOBALS['config']['paths']['app']."compiled";
		$blade= new BladeOne($views,$compiledFolder,BladeOne::MODE_DEBUG);
		$blade->pipeEnable=true;
		echo $blade->run($viewFileName,$viewVars);
	}


	static function helper($helperFileName){
		$helperFileCheck = explode(".", $helperFileName);
		if(!isset($helperFileCheck[1])){
			$helperFileName .= "_helper.php";
		}
		$helperFileName = str_replace("::", "/", $helperFileName);
		require_once $GLOBALS['config']['paths']['app']."helpers/{$helperFileName}";
	}


	static function model($modelFileName){
		$modelFileCheck = explode(".", $modelFileName);
		if(!isset($modelFileCheck[1])){
			$modelFileName .= "_model.php";
		}
		$modelFileName = str_replace("::", "/", $modelFileName);
		require_once $GLOBALS['config']['paths']['app']."models/{$modelFileName}";
	}

	static function library($libFileName){
		$libFileCheck = explode(".", $libFileName);
		if(!isset($libFileCheck[1])){
			$libFileName .= ".php";
		}
		$libFileName = str_replace("::", "/", $libFileName);
		require_once $GLOBALS['config']['paths']['app']."libs/{$libFileName}";
	}

	static function template($templateFileName, $templateVars = array()){
		extract($templateVars);
		$templateFileCheck = explode(".", $templateFileName);
		if(!isset($templateFileCheck[1])){
			$templateFileName .= ".blade.php";
		}
		$templateFileName = str_replace("::", "/", $templateFileName);
		$templates = $_SERVER['DOCUMENT_ROOT']."/".$GLOBALS['config']['appName']."/".$GLOBALS['config']['paths']['app']."views/template"; // folder where is located the templates
		$compiledFolder = $_SERVER['DOCUMENT_ROOT']."/".$GLOBALS['config']['appName']."/".$GLOBALS['config']['paths']['app']."compiled";
		$blade= new BladeOne($templates,$compiledFolder,BladeOne::MODE_DEBUG);
		$blade->pipeEnable=true;
		echo $blade->run($templateFileName,$templateVars);
	}
}

?>
