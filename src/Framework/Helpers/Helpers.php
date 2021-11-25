<?php

namespace Framework\Helpers;

class Helpers
{
    
    /**
     * @param string $path
     * 
     * @return void
     */
    public static function HeaderPermanently (string $path): void
    {
        header("Location: {$path}");
        header("HTTP/1.1 moved Permanently");
        exit();
    }
}