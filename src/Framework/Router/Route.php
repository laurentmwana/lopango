<?php

namespace Framework\Router;

/**
 * [Description Route]
 */
class Route 
{
    /**
     * L'action et la methode
     * @var string
     */
    private $callable;

    /**
     * Le chemin 
     * @var string
     */
    private $path;

    /**
     * Les routes qui match
     * @var array
     */
    private $matches = [];


    /**
     * Route constructor 
     * @param string $path
     * @param callable $callable
     */
    public function __construct(string $path, callable $callable)
    {
        $this->path =  $path;
        $this->callable = $callable;
    }


    /**
     * @param string $url
     * 
     * @return bool
     */
    public function match (string $url): bool
    {
        $path = preg_replace("#:([\w]+)#" , "([^/]+)" , $this->path);
        $regex = "#^$path$#";
        $match = preg_match($regex, $url, $matches);
        if ($match) {
            array_shift($matches);
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param array $params
     * 
     * @return string
     */
    public function getParams (array $params): string
    {
       $paths =  $this->path;
       foreach ($params as $key => $value) {
           $paths = str_replace(":$key", $value, $paths);
       }

       return $paths;
    }

    /**
     * @return mixed
     */
    public function mapping ()
    {
        return call_user_func_array($this->callable, $this->matches);
    }
}