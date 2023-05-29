<?php

namespace BITM\CUMPUS;

class Config{
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