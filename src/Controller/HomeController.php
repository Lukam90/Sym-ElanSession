<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
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
}
