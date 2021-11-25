<?php

use Framework\Container;

require dirname(__DIR__). DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

define("SCRIPT", dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR);
define("NAMESPACE__", dirname(__DIR__) . DIRECTORY_SEPARATOR .  'views' . DIRECTORY_SEPARATOR);

$renderer = new \Framework\Renderer(NAMESPACE__);

$uri = isset($_GET['uri']) ? $_GET['uri'] : '/';

 //  demarrage de l'application
 $app = new \Framework\App([
    \Framework\Modules\BlogModule::class,
    \Framework\Modules\PostModule::class
], [
    'renderer' => $renderer
]);

// Execution de l'application
$app->run($uri);

