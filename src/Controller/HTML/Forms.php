<?php

namespace Controller\HTML;


/**
 * Génererer des formulaires automatiquement 
 */
class Forms
{
    /**
     * @var array
     */
    private $posts = [];

    /**
     * @var array
     */
    private $errors = [];

    /**
     * Forms Constructor 
     * @param array $posts
     * @param array $errors
     */
    public function __construct(array $posts = [], array $errors = [])
    {
        $this->posts = $posts;
        $this->errors = $errors;
    }





    /**
     * @param string $type
     * @param string $key
     * @param string $data
     * 
     * @return string
     */
    public function input (string $type, string $key, string $label,  string $data = ''): string
    {
        $types = substr($type, 1);
        return <<< HTML
        <div class="field">
            <input type="{$types}" name="{$key}" placeholder="{$label}">
        </div>
HTML;

    }


    /**
     * @param string $type
     * @param string $key
     * @param string $label
     * @param string $icon
     * @param string $class
     * 
     * @return string
     */
    public function button (string $type, string $key, string $label, string $icon, string $class = 'primary'): string
    {
        $types = substr($type, 1);
        return <<< HTML
        <button class="ui {$class} button" type="{$types}" name="{$key}"> <i class="{$icon} icon"></i> {$label}</button>
HTML;
        
    }
}