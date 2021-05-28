<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Formation;
use App\Form\SessionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/sessions")
 * @IsGranted("ROLE_USER")
 */
class SessionController extends AbstractController
{
    /**
     * @Route("/sort", name="sessions_sort")
     */
    public function sort(Request $request): Response
    {
        $criteria = $request->query->get("criteria");

        $formations = $this->getDoctrine()
                ->getRepository(Formation::class)
                ->findBy([], ["titre" => "ASC"]);

        $sessions = $this->getDoctrine()
                         ->getRepository(Session::class)
                         ->findBy([], [$criteria => "ASC"]);

        return $this->render('home/index.html.twig', [
            'formations' => $formations,
            'sessions'   => $sessions,
        ]);
    }

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
        return $this->render('session/show.html.twig', [
            'session' => $session
        ]);
    }

    /**
     * @Route("/delete/{id}", name="session_delete")
     * @param Session $session
     * @return Response
     */ 

    public function remove(Session $session) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($session);
        $em->flush();

        $this->addFlash("success", "Le session $session a été supprimée.");

        return $this->redirect($this->generateUrl("index"));
    }
}
