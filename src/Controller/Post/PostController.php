<?php

namespace Controller\Post;

use interfaces\PostControllerInterface;

class PostController implements PostControllerInterface
{

    private $posts = [];

    /**
     * PostController Constructor 
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Ajouter un nouveau lopango
     * @return array
     */
    public function add(): array
    {

        if (isset($this->posts['save'])) {
            
            var_dump($this->posts);
            $v = new \Controller\Validator($this->posts);

            $v->label('name', 'Le champs  adresse n\'estpas valide', 'regex');
            $v->label('respons', 'Le champs  responsable n\'est pas valide', 'regex');
            $v->label('porte', 'Le champs  porte n\'est pas valide', 'regex');
            $v->label('adress', 'Le champs  adresse n\'est pas valide', 'regex');

            $v->label('name', 'Le champs nom est requiet', 'required');
            $v->label('respons', 'Le champs responsable est requiet', 'required');
            $v->label('porte', 'Le champs porte est requiet', 'required');
            $v->label('adress', 'Le champs  adresse est requiet', 'required');

            
            $v->rule('regex', 'name', '([a-zA-Z_]+$)');
            $v->rule('regex', 'respons', '([a-zA-Z_]+$)');
            $v->rule('regex', 'porte', '([0-9]+$)');
            $v->rule('regex', 'adress', '([a-zA-Z_]+$)');
    
            $v->rule('required', 'name');
            $v->rule('required', 'respons');
            $v->rule('required', 'porte');
            $v->rule('required', 'adress');
        
            if ($v->validate()) {
                # code...
            }

            return $v->getMessage();
        }

        return [];
    }


    /**
     * @param string $id
     * 
     * @return array
     */
    public function update(string $id): array
    {
        return [];
    }


    /**
     * @param string $id
     * 
     * @return array
     */
    public function delete(string $id): array
    {
        return [];
    }
}