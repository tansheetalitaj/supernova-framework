<?php

class router{

	private $routes;

	function __construct(){
		$this->routes = $GLOBALS['config']['routes'];
		$route = $this->findRoute();
		$controller = $route['controller'];
		if(class_exists($controller)){
			$controller = new $route['controller']();
			$method = $route["method"];
			if(method_exists($controller, $method)){
				$controller->$method();
			}else{
				bugs::display(404);
			}
		}else{
			$route = $this->findCustomRoute();
			if(isset($route['controller'])){
				$controller = $route['controller'];
				if(class_exists($controller)){
					$controller = new $route['controller']();
					$method = $route["method"];
					if(method_exists($controller, $method)){
						$controller->$method();
					}else{
						bugs::display(404);
					}
				}else{
					bugs::display(404);
				}
			}else{
				bugs::display(404);
			}
		}
	}

	private function routePart($route){
		if(is_array($route) && isset($route['url'])){
			$route = $route['url'];
			$parts = explode("/", $route);
			return $parts;
		}else{
			return $route;
		}
	}

	static function uri($part){
		$parts = explode("/", $_SERVER["REQUEST_URI"]);
			if(isset($parts[2])){
				if($parts[2] == $GLOBALS['config']['paths']['index']){
					$part++;
				}
			}
		return (isset($parts[$part])) ? $parts[$part] : "";
	}

	private function findCustomRoute(){
	    $url_validation_regex = "/^[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/"; 
		if(preg_match($url_validation_regex, $_SERVER['SERVER_NAME'])){
			$uri_1 = router::uri(1);
			$uri_2 = router::uri(2);
		}else{
			$uri_1 = router::uri(2);
			$uri_2 = router::uri(3);
		}
		foreach ($this->routes as $key => $route){
			$parts = $this->routePart($key);
			if($uri_1 == $parts){
			 		$custom_route = $GLOBALS['config']['routes'][$parts];
					$route = array(
						"controller" => $custom_route['controller'],
						"method" => $custom_route['method']
					);

					return $route;
				}
		}
	}

	private function findRoute()
	{
		foreach ($this->routes as $route){
			$parts = $this->routePart($route);
			$allMatch = true;
			foreach ($parts as $key => $value){
				if($value != "*"){
					if(router::uri($key) != $value){
						$allMatch = false;
					}
				}
			}
			if($allMatch){
				return $route;
			}
		}
    
		$url_validation_regex = "/^[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/"; 
		if(preg_match($url_validation_regex, $_SERVER['SERVER_NAME'])){
			$uri_1 = router::uri(1);
			$uri_2 = router::uri(2);
		}else{
			$uri_1 = router::uri(2);
			$uri_2 = router::uri(3);
		}

		if($uri_1 == ""){
			$uri_1 = $GLOBALS['config']['defaults']['controller'];
		}
		if($uri_2 == ""){
			$uri_2 = $GLOBALS['config']['defaults']['method'];
		}

		$route = array(
			"controller" => $uri_1,
			"method" => $uri_2
		);

		return $route;
	}
}

?>
