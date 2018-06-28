<?php

// Namespaces
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface      as Response;
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Home
$app->get('/', DC\Page::class . ':getHome')->setName('home');

// Chapters
$app->get('/chapters', DC\Page::class . ':getchapters')->setName('chapters');

// Chapter
$app->get('/chapters/{slug:[a-z-]+}', DC\Page::class . ':getChapter')->setName('chapter');

// Chapter1slide1
$app->get('/chapter1slide1', DC\Page::class . ':getChapter1slide1')->setName('chapter1slide1');

// Chapter2slide1
$app->get('/chapter2slide1', DC\Page::class . ':getChapter2slide1')->setName('chapter2slide1');

// Chapter2slide2
$app->get('/chapter2slide2', DC\Page::class . ':getChapter2slide2')->setName('chapter2slide2');