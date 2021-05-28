<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Formation;
use App\Form\SessionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 ** @Route("/session")
 */
class SessionController extends AbstractController
{
    /**
     * @Route("/add", name="session_add")
     * @Route("/{id}/edit", name="session_edit")
     */
    public function add_edit(Session $session = null, Request $request)
    {
        if(!$session)
        {
            $session = new Session();
        }

        $form = $this->createForm(SessionType::class, $session);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $session = $form->getData();

            // On ajoute un (joli) message flash

            if ($session->getId() !== null)
                $this->addFlash("success", "Session modifiée avec succès.");
            else
                $this->addFlash("success", "Session créée avec succès.");

            // On ajoute la nouvelle session

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($session);
            $entityManager->flush();

            return $this->redirectToRoute('sessions_list');
        }

        return $this->render('session/add_edit.html.twig', [
            'formSession' => $form->createView(),
            'editMode'    => $session->getId() !== null
        ]);
    }

    /**
     ** @Route("/", name="sessions_list")
     */
    public function allSession(): Response
    {
        $formations = $this->getDoctrine()
                ->getRepository(Formation::class)
                ->findBy([], ["titre" => "ASC"]);

        $sessions = $this->getDoctrine()
            ->getRepository(Session::class)
            ->findBy([], ["intitule" => "ASC"]);

        return $this->render('home/index.html.twig', [
            'formations' => $formations,
            'sessions'   => $sessions,
        ]);
    }
    
    /**
     ** @Route("/show/{id}", name="session_show", methods="GET")
     */
    public function oneSession(Session $session):Response
    {
        return $this->render('session/index.html.twig', [
            'session' => $session
        ]);
    }

    
}
