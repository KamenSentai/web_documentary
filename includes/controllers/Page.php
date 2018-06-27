<?php

namespace Documentary\Controllers;

// Namespaces
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface      as Response;
use \Slim\Exception\NotFoundException        as Exception;

/**
 * Class Page
 * @author Alain Cao Van Truong <cvt.alain@gmail.com>
 */
class Page
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @param object $request
     * @param object $response
     * @return object $this->container->view->render()
     */
    public function getHome(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'pages/home.twig', $this->container->getHome);
    }

    /**
     * @param object $request
     * @param object $response
     * @return object $this->container->view->render()
     */
    public function getChapter(Request $request, Response $response, $arguments)
    {
        $chapters = $this->container->chapters;

        foreach ($chapters as $_chapter)
            if ($arguments['slug'] === $_chapter['slug'])
            {
                $chapter = $_chapter;
                break;
            }

        if (!isset($chapter))
            throw new Exception($request, $response);
        else
            $dataView =
            [
                'chapter' => $chapter,
            ];

        return $this->container->view->render($response, 'pages/chapter.twig', $dataView);
    }
}