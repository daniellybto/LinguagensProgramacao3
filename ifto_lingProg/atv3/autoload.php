<?php
    spl_autoload_register(
        function($classe){
            require "class/$classe.php";
        }
    );

?>