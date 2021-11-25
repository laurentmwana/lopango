<?php


namespace Controller;

use Framework\Exceptions\ValidatorException;
use interfaces\ValidatorInterface;

class Validator  implements ValidatorInterface
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
     * @var array
     */
    public $label = [];

    /**
     * Validator Constructor 
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }


    /**
     * @param string $key
     * 
     * @return string|null
     */
    private function field (string $key): ?string
    {
        if (!isset($this->posts[$key]) &&  (!empty($this->posts[$key]) || empty($this->posts[$key]))) {
            throw new ValidatorException("Vous ne pouvez pas modifier ou supprimer la clé du formulaire");
        }

        return $this->posts[$key];
    }

   /**
    * @param string $action
    * @param string $name
    * @param string|null $value
    * @param string|null $values
    * 
    * @return void
    */
   public function rule(string $action, string $name, ?string $value = null, ?string $values = null)
   {
       if ($action === 'required' && is_null($value) && is_null($values)) {
           return $this->required($name);
       } elseif ($action === 'regex' && is_null($values)) {
           return $this->regex($name, $value);
       }
   }

    /**
     * @param string $name
     * @param string $regex
     * 
     * @return void
     */
    private function regex (string $name, string $regex)
    {
        if (!preg_match($regex, $this->field($name))){
            $value = isset($this->label['regex'][$name]) ? $this->label['regex'][$name] : $name . " n'est pas valide";
            $this->errors[$name] = $value;
        }
    }

    /**
     * @param mixed $name
     * 
     * @return void
     */
    private function required ($name)
    {
        if (empty($this->field($name))) {
            if (isset($this->label['required'][$name])) {
                $value = $this->label['required'][$name];
            } else {
                $value = $name . ' est requiet';
            }

            $this->errors[$name] = $value;
        }
    }

    /**
     * @param string $key
     * @param string $value
     * 
     * @return void
     */
    public function label(string $key, string $value, string $reference): void
    {
        $this->label[$reference][$key] = $value;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->errors;
    }

}