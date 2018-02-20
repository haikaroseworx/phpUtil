<?php
    require_once("phpUtil.php");

    class DatabaseManager{

        public $connection;

        public function __construct(
                  $host = HOST,
                  $password = PASSWORD,
                  $username = USERNAME,
                  $database = DATABASE_NAME ) {

              $this->connection = new mysqli($host,$username,$password,$database);

        }
        public function clean($value) {

          return mysqli_real_escape_string($this->connection,$value);

        }

        //return the last inserted id
        public function insertedId() {

          return $connection->insert_id;

        }

        //return last error if any
        public function errorOccured() {

            return $connection->error;

        }

        //return row affected info if any//
        public function rowAffected(){

            return $connection->affected_rows;

        }
    }

 ?>
