<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[route('/', name: "portfolio")]
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
    #[route('/', name: "symfonytyped")]
    public function symfonyUXTyped(){

        return $this->render('uxtyped.html.twig');
}
    #[route('/', name: 'presentation')]
    public function content(): Response
    {
        return $this->render('presentation.html.twig');
    }
    #[route('/', name: 'hardskills')]
    public function hardSkills(): Response
    {
        return  $this->render('hardskills.html.twig');
    }

}