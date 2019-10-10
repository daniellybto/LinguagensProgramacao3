<?php

    spl_autoload_register(
        function($class){
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            // $file = "..\\$file";
            // echo $file;
            // require_once "..\\$file";
            
            // print_r(".." . DIRECTORY_SEPARATOR . $file);
            // echo "<br>";
            
            if(!file_exists(".." . DIRECTORY_SEPARATOR . $file)){
                echo "arquivo não existe";
            }
            else{
                require_once ".." . DIRECTORY_SEPARATOR . $file;
            }

            // if(!file_exists("..\\$file")){
            //     echo "arquivo não existe";
            // }
            // else{
            //     require_once "..\\$file";
            // }
        }
    )
  
?>