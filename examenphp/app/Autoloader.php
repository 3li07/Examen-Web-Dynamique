<?php
namespace App;

 Class Autoloader {

    static function register(){
        spl_autoload_register(array(get_called_class(), 'autoload'));
    }
    static function autoload($class){

        if(strpos($class, __NAMESPACE__.'\\') === 0){
            $class = str_replace(__NAMESPACE__, "", $class);
            $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
            require __DIR__.'/'.$class.'.php';
        }
    }
 }
?>