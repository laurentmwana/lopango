<?php

namespace Controller\HTML;

use interfaces\HTML\AlertInterface;

/**
 * Les messages d'alerte
 */
class Alert implements AlertInterface
{

    /**
     * @var string
     */
    private $info = 'teal';

    /**
     * @var string
     */
    private $success = 'green';

    /**
     * @var string
     */
    private $secondary = 'black';

    /**
     * @var string
     */
    private $danger = 'error';

    /**
     * @var string
     */
    private $warning = 'warning';

    /**
     * @var array
     */
    private $errors = [];


    /**
     * Alert Constructor 
     * @param array $errors
     */
    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
    }


    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setGreen($keys): void
    {
        $this->success = $keys;
    }


    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setBlack($keys): void
    {
        $this->secondary = $keys;
    }

    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setTeal($keys): void
    {
        $this->info = $keys;
    }


    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setRed($keys): void
    {
        $this->danger = $keys;
    }


    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setYellow($keys): void
    {
        $this->warning = $keys;
    }


    /**
     * @return string
     */
    public function getGreen(): string
    {
        return $this->success;
    }


    /**
     * @return string
     */
    public function getRed(): string
    {
        return $this->danger;
    }

    /**
     * @return string
     */
    public function getTeal(): string
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function getYellow(): string
    {
        return $this->warning;
    }


    /**
     * @return string
     */
    public function getBlack(): string
    {
        return $this->secondary;
    }


    /**
     * Message info vert (succès)
     * 
     * @return string|null
     */
    public function getSuccess(): ?string
    {
        return $this->keys($this->getGreen());
    }

    /**
     * @return string|null
     */
    public function getDanger(): ?string
    {
        return $this->keys($this->getRed());
    }


    /**
     * Message info jaune 
     * 
     * @return string|null
     */
    public function getWarning(): ?string
    {
        return $this->keys($this->getYellow());
    }

    /**
     * Message info en noir 
     * 
     * @return string|null
     */
    public function getSecondary(): ?string
    {
        return $this->keys($this->getBlack());
    }

    /**
     * Message info 
     * 
     * @return string|null
     */
    public function getInfo(): ?string
    {
        return $this->keys($this->getTeal());
    }

    
    /**
     * @param string $keys
     * 
     * @return string
     */
    private function keys (string $keys = 'error'): string
    {
        $html = '';
        if (isset($this->errors[$keys])) {
            foreach ($this->errors as $key => $value) {
                $html .=  <<< HTML
                <div class="ui message {$keys}"> {$value}</div>
    HTML;
            }
        }
       
        return $html;
    }
}