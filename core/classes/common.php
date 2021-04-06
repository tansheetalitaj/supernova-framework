<?php


	class common{

		static function isLoggedIn(){
			$check = array("id", "username", "firstname", "lastname");
			return (session::check($check)) ? true : false;
		}
	}

?>
