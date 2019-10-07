<?php

    spl_autoload_register(
        function($class){
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            // $file = "..\\$file";
            
            if(!file_exists("..\\$file")){
                echo "arquivo não existe";
            }
            else{
                require_once "..\\$file";
            }
        }
    )
  
?>