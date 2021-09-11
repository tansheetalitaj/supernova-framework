<?php

class input{

  static function post($key){
    return (isset($_POST[$key])) ? htmlspecialchars($_POST[$key], ENT_QUOTES, 'UTF-8') : false;
  }


  static function get($key){
    return (isset($_GET[$key])) ? urldecode(htmlspecialchars($_GET[$key], ENT_QUOTES, 'UTF-8')) : false;
  }

  static function request($key){
    if(input::get($key)){
      return input::get($key);
    }elseif(input::post($key)){
      return input::post($key);
    }else{
      return false;
    }
  }

}
