<?php

include_once("init.php");

class Autoload
{
    private static $_instance;
    private $_db;

    /**
     * Singleton Pattern
     */

    public function getInstance()
    {
        if(!isset(self::$_instance))
        {
            self::$_instance = new Autoload;
        }
        return self::$_instance;
    }

    public function loadFiles()
    {
        spl_autoload_register(function($class)
        {
            $bar = dirname(dirname(dirname(__FILE__)));
            $pathFile = "$bar\\";

            $paths = array(
                'App\\',
                'App\\Controller\\',
                'App\\Model\\',
                'App\\View\\'
            );

            foreach ($paths as $bit) 
            {
                if (file_exists($pathFile . $bit . $class . '.php')) 
                {
                    require_once($pathFile . $bit . $class . '.php');
                }
            }
        });
    }
}

$load = new Autoload;
$load->getInstance()->loadFiles();