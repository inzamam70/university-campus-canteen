<?php

namespace BITM\CUMPUS;

class Config{
    static public  $driver = 'mysql';

    const   DB_HOST = 'localhost';         
    const   DB_USER = 'root';         
    const   DB_PASSWORD = '';         
    const   DB_NAME = 'php-12'; 

    static public function datasource()
    {
        return self::docroot()."frontend/datasource".DIRECTORY_SEPARATOR;
    }

    static public function docroot()
    {
        return $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
    }
}




?>