<?php 


use core\Config;
use core\Database\MysqlDatabase;

class app{

    private static $_instance;
    private $db_instance;

  
    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            return self::$_instance = new app;
        }
        return self::$_instance;
    }

    public static function load()
    {
        require ROOT.'/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT.'/core/Autoloader.php';
        core\Autoloader::register();
    }

    public function getTable($name)
    {
        $class_name = 'App\\Model\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDb());
    }
    public function getDb()
    {
        if(is_null($this->db_instance)){
            $config = Config::getInstance( ROOT .'/config/config.php');
            $this->db_instance = new MysqlDatabase($config->get('db_name'),$config->get('db_host'),$config->get('db_user'),$config->get('db_password'));
        }    
        return $this->db_instance;
    }

    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces Interdit');
    }

    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }

}