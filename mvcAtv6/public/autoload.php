<?php

    spl_autoload_register(
        function($class){
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            
            if(!file_exists(".." . DIRECTORY_SEPARATOR . $file)){
                echo "arquivo não existe";
            }
            else{
                require_once ".." . DIRECTORY_SEPARATOR . $file;
            }

        }
    )
  
?>