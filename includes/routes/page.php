<?php

// Namespaces
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Explore
$container['getExplorer'] = function($container)
{
    // Data view
    $dataView =
    [
        'chapters' => $container['chapters'],
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