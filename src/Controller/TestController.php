<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Entity\User;
use App\Entity\Module;
use App\Entity\Session;
use App\Entity\Formation;
use App\Entity\Stagiaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/tests")
 * @IsGranted("ROLE_USER")
 */
class TestController extends AbstractController
{
    /**
     * @Route("/_login", name="test_login")
     */
    public function login()
    {
        return $this->render('test/test_login.html.twig');
    }

    /**
     * @Route("/_logout", name="test_logout")
     */
    public function logout()
    {
        return $this->render('test/test_logout.html.twig');
    }
}
