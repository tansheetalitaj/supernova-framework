<?php 

	class nebula_controller{

		function __construct(){
			$GLOBALS['instances'][] = &$this;
		}
		
	}

?>