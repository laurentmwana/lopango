<?php

namespace interfaces\HTML;

/**
 * Alert message 
 */
interface AlertInterface
{
    /**
     * @return string|null
     */
    public function getSuccess (): ?string;

    /**
     * @return string|null
     */
    public function  getDanger (): ?string;

    /**
     * @return string|null
     */
    public function getWarning (): ?string;

    /**
     * @return string|null
     */
    public function getInfo (): ?string;

    /**
     * @return string|null
     */
    public function getSecondary (): ?string;


    /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setRed ($keys): void;


     /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setBlack ($keys): void;



     /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setTeal ($keys): void;


     /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setGreen ($keys): void;


     /**
     * @param mixed $keys
     * 
     * @return void
     */
    public function setYellow ($keys): void;


    
    /**
     * 
     * @return string
  

    /**
     * 
     * @return string
     */
    public function getGreen (): string;


     /**
     * 
     * @return string
     */
    public function getRed (): string;



     /**
     * 
     * @return string
     */
    public function getYellow (): string;


     /**
     * 
     * @return string
     */
    public function getTeal (): string;


     /**
     * 
     * @return string
     */
    public function getBlack (): string;
}