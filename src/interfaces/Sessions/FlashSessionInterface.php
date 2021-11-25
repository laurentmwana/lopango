<?php

namespace interfaces\Sessions;

/**
 * [Description FlashSessionInterface]
 */
interface FlashSessionInterface
{

    /**
     * @param string $key
     * 
     * @return bool
     */
    public function hasSession (string $key): bool;

    /**
     * @param string $key
     * 
     * @return void
     */
    public function setKey (string $key): void;

    /**
     * @return string
     */
    public function getKey (): string;

    /**
     * @param string $key
     * 
     * @return array
     */
    public function getSession (string $key): array;

    /**
     * @param string $key
     * @param string $value
     * 
     * @return void
     */
    public function setSession (string $key , string $value): void;

}