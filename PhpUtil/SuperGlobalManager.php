<?php

class SuperGlobalManager{

    //this function gets value submitted via post method
    public static function post($value){
      $result=null;

      if(isset($_POST[$value])){
         return $_POST[$value];
      }
      return $result;
    }

    //this function return get values from SuperGlobal
    public static function get($value){
      $result = null;
      if(isset($_GET[$value])){
         return $_GET[$value];
      }
      return $result;
    }

    //this function return file handler for the file SuperGlobal
    public static function file($value){
      $result = null;
      if (isset($_FILES[$value])) {
         return $_FILES[$value];
      }
      return $result;
    }

    //this function checks if the SuperGlobal variable passed arent null.
    public static function notNull(...$args){
          foreach($args as $param){
            if ($param == null || $param == '') {
                return false;
            }
          }
          return true;
    }

}

?>
