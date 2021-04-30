<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{

    public function index(): JsonResponse
    {






        $em->$this->getDoctrine()->getManager();
        var_dump($em);
        die();
        $response = new JsonResponse();
        $response->setData([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
        return $response;
    }
}
