<?php

namespace Framework;

/**
 * Rendre le vue en chargeant le bon fichier 
 */
class Renderer
{

    /**
     * Chemin principale de views 
     * @var string
     */
    private  $namespaces;

    /**
     * Création de variable globale
     * @var array
     */
    private $Globals = [];

 
    /**
     * Renderer constructor
     * 
     * @param string $namespaces
     */
    public function __construct(string $namespaces)
    {
        $this->namespaces = $namespaces;
    }


    /**
     * Ajouter une variable dans le views 
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public function addGlobals (string $key , $value): void
    {
        $this->Globals[$key] = $value;
    }

    /**
     * Charger le fichier et le  template
     * @param string $file
     * @param array $params
     * @param string $template
     * @param string $code
     * 
     * @return void
     */
    public function render (string $file , array $params = [], $template = '@layout.layout', $code = 200): void
    {

        $dir = $this->namespaces;
        $files = $dir . str_replace('.', DIRECTORY_SEPARATOR, substr($file, 1)) . '.php';
        $layout = $dir . str_replace('.', DIRECTORY_SEPARATOR, substr($template, 1)) . '.php';
        ob_start();
        extract($this->Globals);
        if (!empty($params)) {
           extract($params);
        }
        http_response_code($code);
        require ($files);
        $content = ob_get_clean();
        require ($layout);
    }
}