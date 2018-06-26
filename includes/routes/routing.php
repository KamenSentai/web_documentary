<?php

// Namespaces
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface      as Response;
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Home
$app->get('/',  DC\Page::class . ':getHome')->setName('home');
$app->post('/', DC\Page::class . ':postHome');

$app->get('/chapter',  DC\Page::class . ':getChapter')->setName('chapter');