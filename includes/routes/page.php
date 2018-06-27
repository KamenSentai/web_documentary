<?php

// Namespaces
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Home
$container['getHome'] = function($container)
{
    // Data view
    $dataView =
    [

    ];
    return $dataView;
};

// 404
$container['notFoundHandler'] = function($container)
{
    return function($request, $response) use ($container)
    {
        $dataView =
        [

        ];
        return $container['view']->render($response->withStatus(404), 'pages/404.twig', $dataView);
    };
};