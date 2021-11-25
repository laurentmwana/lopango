<?php

namespace interfaces;


interface ValidatorInterface
{
    
  
    /**
     * @param string $action
     * @param string $name
     * @param string|null $value
     * @param string|null $values
     * 
     * @return mixed
     */
    public function rule (string $action, string $name, ?string $value = null, ?string $values = null);

    /**
     * @return array
     */
    public function getMessage (): array;

    /**
     * @param string $key
     * @param string $value
     * @param string $reference
     * 
     * @return void
     */
    public function label (string $key, string $value, string $reference): void;

    /**
     * @return bool
     */
    public function validate (): bool;
}