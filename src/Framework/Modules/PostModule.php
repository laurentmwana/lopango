<?php

namespace Framework\Modules;

/**
 * Charger le fichier dans le dossier "post"
 */
class PostModule
{
    /**
     * Router
     * @var \Framework\Router\Router
     */
    private $route;

    /**
     * @var \Framework\Renderer
     */
    private $renderer;


    /**
     * PostModule Constructor 
     * 
     * @param \Framework\Router\Router $route
     * @param \Framework\Renderer $renderer
     */
    public function __construct(\Framework\Router\Router $route, \Framework\Renderer $renderer)
    {
        $route
            ->map('GET#POST', 'add-mylopango', [$this, 'addme'], 'addme');
        $this->route = $route;
        
        $this->renderer = $renderer;
    }

    /**
     * @return mixed
     */
    public function addme()
    {
        $post = new \Controller\Post\PostController($_POST);
        $posts = $post->add();
        return $this->renderer->render("@post.me.add", compact('posts'));
    }
}
