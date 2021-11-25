
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= SCRIPT  . 'Semantic-UI-CSS-master' . DIRECTORY_SEPARATOR . 'semantic.min.css' ?>">

    <title>Lopango | <?= isset($title) ? $title :  'home' ?></title>
</head>
<body>
    <div class="ui responsive  menu">
        <a class="item active" href="<?= $router->GenerateUri('home') ?>">
            Accueil
        </a>
        <a class="item" href="<?= $router->GenerateUri('about') ?>">
        A propos
        </a>
        <a class="item" href="<?= $router->GenerateUri('me') ?>">
            my lopango
        </a>
        <a class="item" href="<?= $router->GenerateUri('contact') ?>">
            Contact
        </a>
        <div class="right menu">
            <div class="item">
            <div class="ui icon input">
                <input type="text" placeholder="Search...">
                <i class="search link icon"></i>
            </div>
            </div>
            <a class="ui item">
            Se déconnecter
            </a>
        </div>
    </div>
    <div class="ui container "><?= $content ?></div>

    
    <script src="<?= SCRIPT  . 'Semantic-UI-CSS-master' . DIRECTORY_SEPARATOR . 'semantic.min.js' ?>"></script>
</body>
</html>