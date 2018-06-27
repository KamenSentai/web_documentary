<?php

// Namespaces
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Container
$container = $app->getContainer();

// View
$container['view'] = function($container)
{
    // Initialize views
    $view   = new \Slim\Views\Twig('../includes/views');
    $router = $container->get('router');
    $uri    = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// Database
$container['database'] = function($container)
{
    // Connect to database
    $db  = $container['settings']['database'];
    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['name'].';port='.$db['port'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connect to database
    $database = new DM\Database($pdo);

    return $database;
};

// Chapters
$container['chapters'] = function($container)
{
    $chapters =
    [
        [
            'number'    => 1,
            'title'     => 'Voyage au fil<br>de l\'eau',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'États des lieux',
            'slug'      => 'introduction',
        ],
        [
            'number'    => 2,
            'title'     => 'L\'or bleu<br>la bataille de l\'eau',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Utilisation de l\'eau',
            'slug'      => 'utilisation',
        ],
        [
            'number'    => 3,
            'title'     => 'Gestion publique<br>acteurs civiques',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Gestion publique',
            'slug'      => 'gestion-publique',
        ],
        [
            'number'    => 4,
            'title'     => 'Gestion privée<br>ressource protégée',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Gestion privée',
            'slug'      => 'gestion-privee',
        ],
        [
            'number'    => 5,
            'title'     => 'Droit ou besoin<br>le statut de l\'eau',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Droit ou besoin',
            'slug'      => 'droit-ou-besoin',
        ],
    ];

    return $chapters;
};