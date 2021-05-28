<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
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
        $sessions = $this->getDoctrine()
            ->getRepository(Session::class)
            ->findBy([], ["intitule" => "ASC"]);

        return $this->render('home/index.html.twig', [
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
