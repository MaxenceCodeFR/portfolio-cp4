<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[route('/portfolio', name: "portfolio")]
class SinglePageController extends AbstractController
{
    #[route('/', name: "portfolio")]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
    #[route('/', name: "links")]
    public function links(): Response
    {
        return $this->render('links.html.twig');
    }

}