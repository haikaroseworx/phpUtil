<?php

  class SessionManager{

    public static function prepare(){

      session_start();

    }

    public static function quit(){

      session_unset();
      session_destroy();

    }

    public static function add($key, $value){

        $_SESSION[$key] = $value;

    }

    public static function remove($key){

      unset($_SESSION[$key]);

    }

    public static function get($name){

      if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION[$name])){

           return $_SESSION[$name];

      }
       return null;
    }

  }
?>
