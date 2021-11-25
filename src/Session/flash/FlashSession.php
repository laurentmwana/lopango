<?php


namespace Session\flash;

use interfaces\Sessions\FlashSessionInterface;

/**
 * Flash message 
 */
class FlashSession  implements FlashSessionInterface
{
    /**
     * @var FlashSession
     */
    private static $flash;

    /**
     * @var string
     */
    private  static $keys = 'flash';


    /**
     * 
     * @return \Session\flash\FlashSession
     */
    public static function SESSION (): \Session\flash\FlashSession
    {
        if (is_null(self::$flash)) {
            self::$flash = new \Session\flash\FlashSession();
        }

        return self::$flash;
    }

    /**
     * FlashSession Constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Le message 
     * @param string $key
     * 
     * @return array
     */
    public function getSession(string $key): array
    {
        if ($this->hasSession($key)) {
            return $this->unsetSession($key);
        }

        return [];
    }


    /**
     * Ecrire un message
     * @param string $key
     * @param string $value
     * 
     * @return void
     */
    public function setSession(string $key, string $value): void
    {
        $_SESSION[$this->getkey()][$key] = $value;
    }


    /**
     * Vérifie que le message à un clé qui est aussi définie 
     * @param string $key
     * 
     * @return bool
     */
    public function hasSession(string $key): bool
    {
        if (isset($_SESSION[$this->getkey()][$key])) {
           return true;
        } 

        return false;
    }

    /**
     * Définie un nouveau clé 
     * @param string $key
     * 
     * @return void
     */
    public function setKey(string $key): void
    {
        self::$keys = $key;
    }

    /**
     * @return string
     */
    public function getKey (): string
    {
        return self::$keys;
    }

    /**
     * Supprimer un clé qui est définie 
     * @param mixed $key
     * 
     * @return array
     */
    private function unsetSession ($key): array
    {
        $value = $_SESSION[$this->getkey()];
        unset($_SESSION[$this->getkey()][$key]);
        return $value;
    }
}