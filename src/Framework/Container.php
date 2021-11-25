<?php


namespace Framework;

use PDO;

class Container 
{
    /**
     * @var string
     */
    private static $name = "lopango";

    /**
     * @var string
     */
    private static $host = "localhost";

    /**
     * @var string
     */
    private static $user = "root";

    /**
     * @var string
     */
    private static $pass = "";

    private static $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    /**
     * @var PDO
     */
    private static $pdo = null;
    


    /**
     * @return PDO
     */
    public static function getPDO (): PDO
    {
        if (is_null(self::$pdo)) {
           
            $pdo = new PDO(
                "mysql:dbname=" . self::$name . ";host=" . self::$host . "",
                self::$user,
                self::$pass,
                self::$option
            );
            self::$pdo = $pdo;
        }

        return self::$pdo;
    }
}