<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    public function jsonConvert($jsonFile) {
        $res = file_get_contents("json/$jsonFile");

        $res = json_decode($res);

        return $res;
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        echo "<h1>Utilisateurs</h1>";

        $users = $this->jsonConvert("users.json");

        //var_dump($users);

        foreach ($users as $user) {
            $objUser = new User();
            $objUser->setId($user->id);
            $objUser->setEmail($user->email);
            $objUser->setPrenom($user->prenom);
            $objUser->setNom($user->nom);
            $objUser->setPassword($user->password);
            $objUser->setRole($user->role);

            var_dump($objUser);
        }

        echo "<h1>Stagiaires</h1>";

        $stagiaires = $this->jsonConvert("stagiaires.json");

        var_dump($stagiaires);

        echo "<h1>Lieux</h1>";

        $lieux = $this->jsonConvert("lieux.json");

        var_dump($lieux);

        echo "<h1>Sessions</h1>";

        $sessions = $this->jsonConvert("sessions.json");

        var_dump($sessions);

        echo "<h1>Modules</h1>";

        $modules = $this->jsonConvert("modules.json");

        var_dump($modules);

        echo "<h1>Formations</h1>";

        $formations = $this->jsonConvert("formations.json");

        var_dump($formations);

        return new Response;
    }
}
