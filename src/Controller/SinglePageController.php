<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/', name: "portfolio")]
class SinglePageController extends AbstractController
{
    #[Route('/', name: "portfolio")]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    public function contact(Request $request, MailerInterface $mailer, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            $email = (new Email())
                //->from($this->getParameter('mailer_from'))
                ->from('jacquis@gmail.com&')
                ->to('wilder@wildcodeschool.fr')
                ->subject('Une nouvelle série vient d\'être publiée !')
                ->html($this->renderView('newContactEmail.html.twig', ['contact' => $contact]));

            $mailer->send($email);
        }
        return  $this->render('contact.html.twig',[
            'form'=>$form
        ]);
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