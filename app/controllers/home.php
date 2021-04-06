<?php

	class home extends nebula_controller implements controllerInterface{

		function index(){

			$data['page_title'] = "SuperNova Framework";
			$data['page_message'] = "Welcome to the Galactic Universe";

			load::view("main::index",$data);
		}
		
	}

?>
