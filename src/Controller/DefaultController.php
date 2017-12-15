<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Zend\Http\Request;

/**
 * Class DefaultController
 *
 * @package App\Controller
 */
class DefaultController
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function indexAction()
    {
        return new JsonResponse([
            'method' => Request::METHOD_GET,
            'url' => '/',
            'errors' => [
                [
                    'type' => 'unknown_error',
                    'message' => 'Unknown error',
                    'parameter_name' => null,
                ],
            ],
        ], 404);
    }
}
