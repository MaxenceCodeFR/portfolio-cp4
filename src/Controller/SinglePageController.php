<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/')]
class SinglePageController extends AbstractController
{
    #[Route('/', name: "portfolio")]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    #[Route('/contact', name:'contact', methods: ['POST', 'GET'])]
    public function contact(Request $request, MailerInterface $mailer, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact, [
            'action'=>$this->generateUrl('contact')
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);


            $email = (new Email())
                ->from($contact->getName())
                ->to('wilder@wildcodeschool.fr')
                ->subject('Portfolio: Vous avez reçu une bonne nouvelle')
                ->html($this->renderView('newContactEmail.html.twig', ['contact' => $contact]));
                $contact->getContent();
                $contact->getTel();

            $mailer->send($email);
            return $this->redirectToRoute('portfolio',[], Response::HTTP_SEE_OTHER);
        }
        return  $this->render('contact.html.twig',[
            'form'=>$form,
            'contact'=>$contact,
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

    #[Route('/', name: 'app_project_index', methods: ['GET'])]
    public function project(ProjectRepository $projectRepository): Response
    {

        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }




}