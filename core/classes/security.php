<?php

$corePath = $GLOBALS['config']['paths']['core'];
$appName = $GLOBALS['config']['appName'];
$doc_root = $_SERVER['DOCUMENT_ROOT'];

include $doc_root."/".$appName."/core/phpeas/src/Aes.php";
use PhpAes\Aes;

class security{

	static function EncryptPassword($string, $severity = NULL){

    $encryption_key = $GLOBALS['config']['encryption_key'];

    $z = "abcdefgh01234567";
    $mode = 'CBC';
    $iv = '1234567890abcdef';

		$str_strength = strlen($string);

    if($encryption_key != ""){
			if($severity == NULL){
				if($str_strength <= 3){
					$severity = 'high';
				}elseif($str_strength > 3 && $str_strength <= 8) {
					$severity = 'medium';
				}else{
					$severity = 'low';
				}
			}
      if($severity == 'high'){
          $b64_sk = base64_encode($encryption_key);
          $b64_string = base64_encode($string);
          $encrypted_medium = md5($b64_sk.$b64_string);

          $aes = new AES($z, $mode, $iv);
          $encrypted = $aes->encrypt($string);

          $encrypted_string = bin2hex($encrypted_medium);
      }else if($severity == 'medium'){
          $b64_sk = base64_encode($encryption_key);
          $b64_string = base64_encode($string);

          $encrypted_string = md5($b64_sk.$b64_string);
      }else{
          $encrypted_string = base64_encode($encryption_key.$string);
      }
      return $encrypted_string;
    }else{
      return "Kindly set encryption_key in configuration file first in order to use this functionality!";
    }
  }
}

?>
