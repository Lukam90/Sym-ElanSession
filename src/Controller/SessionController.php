<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 ** @Route("/session", name="session")
 */
class SessionController extends AbstractController
{
    /**
     * @Route("/add", name="session_add")
     * @Route("/{id}/edit", name="session_edit")
     */
    public function sessionEdit()
    {

    }

    /**
     ** @Route("/", name="index")
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
     ** @Route("/{id}", name="session_show", methods='GET')
     */
    public function oneSession(Session $sessions):Response
    {
        return $this->render('session/index.html.twig', [
            'session' => $sessions,
        ]);
    }

    
}
