<?php

namespace App\Controller;



use App\Entity\Media;
use App\Form\MediaType;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController
{
    #[Route('/uploads', name:'uploads', methods:['GET','POST'])]
    public function testVich(Request $request, MediaRepository $mediaRepository): Response
    {
        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mediaRepository->save($media, true);

        }

        return $this->render('uploads.html.twig', [
            'media' => $media,
            'form' => $form,
        ]);
    }

}