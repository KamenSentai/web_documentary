<?php

// Namespaces
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface      as Response;
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Home
$app->get('/', DC\Page::class . ':getHome')->setName('home');

// Chapter
$app->get('/chapters/{slug:[a-z-]+}', DC\Page::class . ':getChapter')->setName('chapter');

// Explorer
$app->get('/explorer', DC\Page::class . ':getExplorer')->setName('explorer');

// Chapter1slide1
$app->get('/chapter1slide1', DC\Page::class . ':getChapter1slide1')->setName('chapter1slide1');