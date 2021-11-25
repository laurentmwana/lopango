<?php

namespace Framework\Exceptions;

/**
 * Capture les erreurs de validator
 */
class ValidatorException extends \Exception
{

    /**
     * ValidatorException Constructor 
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}