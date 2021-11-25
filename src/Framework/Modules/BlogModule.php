<?php

namespace Framework\Modules;

/**
 * Charger le fichier dans le dossier "Blog"
 */
class BlogModule
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
     * BlogModule Constructor 
     * 
     * @param \Framework\Router\Router $route
     * @param \Framework\Renderer $renderer
     */
    public function __construct(\Framework\Router\Router $route, \Framework\Renderer $renderer)
    {
        $route
            ->map('GET', '', [$this, 'home'], 'home')
            ->map('GET', 'blog/about', [$this, 'about'], 'about')
            ->map('GET', 'blog/me-lopango', [$this, 'me'], 'me')
            ->map('GET', 'blog/contact', [$this, 'contact'], 'contact');
        $this->route = $route;
        
        $this->renderer = $renderer;
    }

    /**
     * @return mixed
     */
    public function home()
    {
        return $this->renderer->render("@blog.home");
    }

    /**
     * @return mixed
     */
    public function about()
    {
        return $this->renderer->render("@blog.about");
    }

     /**
     * @return mixed
     */
    public function me()
    {
        return $this->renderer->render("@blog.me");
    }

    /**
     * @return mixed
     */
    public function contact()
    {
        return $this->renderer->render("@blog.contact");
    }
}
