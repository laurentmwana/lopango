<?php

namespace Framework\Router;

use Framework\Exceptions\RouteErrorException;

/**
 *  Router , Controler les accès dans l'url
 */
class Router 
{
    /**
     * Les routes par leurs nom
     * @var array
     */
    private $nameRoute = [];

    /**
     * Enregistrer les routes 
     * @var array
     */
    private $routes = [];

    /**
     * La valeur de l'url passer en get 
     * @var string
     */
    private $url;
    


    /**
     * Ajoute les routes 
     * @param string $method
     * @param string $path
     * @param callable $callable
     * @param string|null $nameRoutes
     * 
     * @return \Framework\Router\Route
     */
    private function addRoutes (string $method, string $path, callable $callable, ?string $nameRoutes): \Framework\Router\Route
    {
        $route = new \Framework\Router\Route($path, $callable);
        $this->routes[$method][] = $route;
        if (!is_null($nameRoutes)) {
            $this->nameRoute[$nameRoutes] = $route;
        }

        return $route;
    }

    /**
     * @param string $method
     * @param string $path
     * @param callable $callable
     * @param string|null $nameRoutes
     * 
     * @return self
     */
    public function map (string $method, string $path, callable $callable, ?string $nameRoutes): self
    {
        if ($method === 'POST') {
            $this->addRoutes($method, $path, $callable, $nameRoutes);
        } elseif ($method === 'GET') {
            $this->addRoutes($method, $path, $callable, $nameRoutes);
        } else {
            list($post, $get) = explode('#', $method);
            $this->addRoutes($get, $path, $callable, $nameRoutes);
            $this->addRoutes($post, $path, $callable, $nameRoutes);
        }
        return $this;
    }

    /**
     * @param string $nameRoute
     * @param array $params
     * 
     * @return string
     */
    public function GenerateUri (string $nameRoute, array $params = []): string
    {
        if (!isset($this->nameRoute[$nameRoute])) {
            throw new RouteErrorException("Le nom '{$nameRoute}' n'existe pas le route");
        }
        return DIRECTORY_SEPARATOR . ($this->nameRoute[$nameRoute])->getParams($params);
    }

    
    /**
     * @param string $url
     * 
     * @return \Framework\Router\Route|null
     */
    public function run (string $url): ?\Framework\Router\Route
    {
        $this->url = trim($url, '/');
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouteErrorException("La methode que vous avez utilisé n'existe pas ");
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $routes) {
            if ($routes->match($this->url)) {
               return  $routes->mapping();
            }
        }

        throw new RouteErrorException("La route <{$url}> n'existe pas ");
    }
}