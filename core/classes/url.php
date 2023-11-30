<?php

	class url{


		static function part($number){
			$url = explode("?", $_SERVER["REQUEST_URI"]);
			$parts = explode("/", $url[0]);
			return (isset($parts[$number])) ? $parts[$number] : false;
		}


		static function post($key){
			return (isset($_POST[$key])) ? $_POST[$key] : false;
		}


		static function get($key){
			return (isset($_GET[$key])) ? urldecode($_GET[$key]) : false;
		}


		static function request($key){
			if(url::get($key)){
				return url::get($key);
			}elseif(url::post($key)){
				return url::post($key);
			}else{
				return false;
			}
		}


		static function build($url, $params = array()){
			if(strpos($url, "//") == false){
				$prefix = "//".$GLOBALS['config']['domain'];
			}else{
				$prefix = "";
			}
			$append = "";

			foreach ($params as $key => $param) {
				$append .= ($append == "") ? "?" : "&";
				$append .= urlencode($key)."=".urlencode($param);
			}

			return $prefix.$append;
		}


		static function assemble($url){
			if(strpos($url, "//") == false){
				$prefix = "//".$GLOBALS['config']['domain'];
			}else{
				$prefix = "";
			}
			return $prefix;
		}


		static function redirect($to, $exit = true){
			if(headers_sent()){
				echo "<script>window.location = '{$to}';</script>";
			}else{
				header("location: {$to}");
			}

			if($exit){
				die();
			}

		}


		static function load_base_url($url){
			$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
			$root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			if($url == ''){
				return $root;
			}else{
				return $root.''.$url;
			}
		}


		static function base_url($to, $exit = true){
			if(strpos($to, "/") == false){
				$base_url = $_SERVER['REQUEST_SCHEME']. "://" . $_SERVER['SERVER_NAME'] ."/". $GLOBALS['config']['appName'];
				if(headers_sent()){
					echo "<script>window.location = '{$base_url}';</script>";
				}else{
					header("location: {$base_url}");
				}
			}else{
				$redirect_url = $_SERVER['REQUEST_SCHEME']. "://" . $_SERVER['SERVER_NAME'] ."/". $GLOBALS['config']['appName'] . "/" . $to;
				if(headers_sent()){
					echo "<script>window.location = '{$redirect_url}';</script>";
				}else{
					header("location: {$redirect_url}");
				}
			}

			if($exit){
				die();
			}

		}

	}

?>
