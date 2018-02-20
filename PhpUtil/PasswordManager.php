<?php

  /**
  * This class is based on BcryptPasswordEncoder
  */
  class PasswordManager {

      /**
      * Compare if the password match and return true
      */
      public static function isValid($password, $hashed) {

        $status = false;

        if ( password_verify($password, $hashed) ) {
            $status = true;
        }

        return $status;

      }

      /**
      * Encrypt the written password and then return the hashed string
      */
      public static function encrypt($password) {
          return password_hash($password, PASSWORD_DEFAULT);
      }

  }


?>
