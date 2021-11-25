<?php

namespace Framework\Exceptions;

/**
 *  Capture les erreurs du routeur
 */
class RouteErrorException extends \Exception
{

    /**
     * RouteErrorException Constructor 
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }



    /**
     * @param \Framework\Renderer $renderer
     * @param string $message
     * 
     * @return void
     */
    public function notFound404 (\Framework\Renderer $renderer, string $message)
    {
        return $renderer->render("@errors.404", compact('message'), '@layout.errors', 404);
    }
}