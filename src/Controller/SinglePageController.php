<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/', name: "portfolio")]
class SinglePageController extends AbstractController
{
    #[Route('/', name: "portfolio")]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    public function links(): Response
    {
        return $this->render('links.html.twig');
    }

    public function symfonyUXTyped(): Response
    {

        return $this->render('uxtyped.html.twig');
}

    public function content(): Response
    {
        return $this->render('presentation.html.twig');
    }

    public function hardSkills(): Response
    {
        return  $this->render('hardskills.html.twig');
    }


}