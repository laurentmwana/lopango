<?php

namespace Framework;


/**
 * Application de principale 
 */
class App 
{

    /**
     * @var @Modules
     */
    private $module;

    /**
     * @var \Framework\Router\Router
     */
    private $route;

    /**
     * @var array dependencies à inclure 
     */
    private $dependencies = [];


    /**
     * 
     * @param array $modules
     * @param array $dependencies
     */
    public function __construct(array $modules, array $dependencies = [])
    {
        $this->route = new \Framework\Router\Router();
        $this->dependencies = $dependencies;
        if (!array_key_exists('renderer', $dependencies)) {
            $this->dependencies['renderer'] = null;
        } else {
            $this->dependencies['renderer']->addGlobals('router', $this->route);
        }

        foreach ($modules as $module) {
           $this->module = new $module($this->route, $this->dependencies['renderer']);
        }
    }
    
   
    /**
     * @param string $uri|null
     * 
     * @return \Framework\Router\Router|null
     */
    public function run (?string $uri = null): ?\Framework\Router\Router 
    {
        $response = null;
        try {
            $response =  $this->route->run($uri);
            var_dump($response);
        } catch (\Framework\Exceptions\RouteErrorException $th) {
            $message = $th->getMessage();
            $th->notFound404($this->dependencies['renderer'], $message);
        } catch (\Framework\Exceptions\HelpersErrorException $th) {
            echo "valuer...";
        } finally {
            return $response;
        }
    }
}