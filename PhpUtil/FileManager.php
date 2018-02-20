<?php

  require_once("SettingAndApiLoader.php");

  class FileManager {

    /*
    ** This function upload only a single file from the request
    */
    public static function uploadSingleFile($path, $resource){

        $fileName = $path.((string)(round(microtime(true) * 1000)))
        .str_replace('.','-',uniqid('78442',true))."."
        .pathinfo(basename($_FILES[$resource]["name"]), PATHINFO_EXTENSION);

        if($_FILES[$resource]["error"]){
          return null;
        }

        if (move_uploaded_file($_FILES[$resource]["tmp_name"], $fileName)) {

            return $fileName;

        }
        return null;

    }

    /*
    ** This function upload multiple files while returning the url
    */
     public static function doTheUPloadMultiple($path,$names){

        $resources = $_FILES[$names];
        $resourcesList = array();
        $fileCount = count($resources['name']);

        if ($fileCount>0) {

              for ($i=0;$i<$fileCount;$i++) {

                    $name=$path.((string)(round(microtime(true) * 1000)))
                    .str_replace('.','-',uniqid('78442',true))."."
                    .pathinfo(basename($resources['name'][$i]), PATHINFO_EXTENSION);

                    if(!(move_uploaded_file($resources['tmp_name'][$i],$name))){

                              foreach ($resourcesList as $resource) {

                                  self::deleteFile($filePath);

                              }

                              return false;
                     }
                    $resourcesList[]=$name;
              }

        }else{

          return null;

        }

        return $resourcesList;

     }

     /*
     ** This static function serves as a file deleter
     */
     public static function deleteFile($filePath){

       if( unlink($filePath) ) {

          return true;

       }

       return false;
     }

  }
?>
