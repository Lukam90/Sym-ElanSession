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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    public function jsonConvert($jsonFile) {
        $res = file_get_contents("json/$jsonFile");

        $res = json_decode($res, true);

        return $res;
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        echo "<h1>Utilisateurs</h1>";

        $tabUsers = $this->jsonConvert("users.json");

        var_dump($tabUsers[0]);

        foreach ($tabUsers as $user) {
            $objUser = new User();
            $objUser->setId($user["id"]);
            $objUser->setEmail($user["email"]);
            $objUser->setPrenom($user["prenom"]);
            $objUser->setNom($user["nom"]);
            $objUser->setPassword($user["password"]);
            $objUser->setRole($user["role"]);

            //var_dump($objUser);
        }

        echo "<h1>Stagiaires</h1>";

        $tabStagiaires = $this->jsonConvert("stagiaires.json");

        var_dump($tabStagiaires[0]);

        foreach ($tabStagiaires as $stagiaire) {
            $objStagiaire = new Stagiaire();
            $objStagiaire->setId($stagiaire["id"]);
            $objStagiaire->setNom($stagiaire["nom"]);
            $objStagiaire->setPrenom($stagiaire["prenom"]);
            $objStagiaire->setEmail($stagiaire["email"]);
            $objStagiaire->setAdresse($stagiaire["adresse"]);
            $objStagiaire->setCp($stagiaire["cp"]);
            $objStagiaire->setVille($stagiaire["ville"]);
            $objStagiaire->setTelephone($stagiaire["telephone"]);
            $objStagiaire->setNPoleEmploi($stagiaire["nPoleEmploi"]);

            //var_dump($objStagiaire);
        }

        echo "<h1>Lieux</h1>";

        $tabLieux = $this->jsonConvert("lieux.json");

        var_dump($tabLieux[0]);

        $lieux = [];

        foreach ($tabLieux as $lieu) {
            $objLieu = new Lieu();
            $objLieu->setId($lieu["id"]);
            $objLieu->setVille($lieu["ville"]);
            $objLieu->setCp($lieu["cp"]);

            array_push($lieux, $objLieu);
        }

        //var_dump($lieux);

        echo "<h1>Sessions</h1>";

        $sessions = $this->jsonConvert("sessions.json");

        var_dump($sessions[0]);

        foreach ($sessions as $session) {
            $objSession = new Session();
            $objSession->setId($session["id"]);
            $objSession->setIntitule($session["intitule"]);
            $objSession->setNbPlaces($session["nbPlaces"]);
            $objSession->setDateDebut(new \DateTime($session["dateDebut"]));
            $objSession->setDateFin(new \DateTime($session["dateFin"]));
            $objSession->setLieu($lieux[$session["lieu"]]);

            //var_dump($objSession);
        }

        echo "<h1>Modules</h1>";

        $tabModules = $this->jsonConvert("modules.json");

        var_dump($tabModules[0]);

        $modules = [];

        foreach ($tabModules as $module) {
            $objModule = new Module();
            $objModule->setId($module["id"]);
            $objModule->setNom($module["nom"]);

            array_push($modules, $objModule);
        }

        echo "<h1>Formations</h1>";

        $tabFormations = $this->jsonConvert("formations.json");

        var_dump($tabFormations[0]);

        $formations = [];

        foreach ($tabFormations as $formation) {
            $objFormation = new Formation();
            $objFormation->setId($formation["id"]);
            $objFormation->setTitre($formation["titre"]);

            array_push($formations, $objFormation);
        }

        /*foreach ($formations as $formation) {
            echo "<p>" . ($formation->getId() - 1) . " " . $formation->getTitre() . "</p>";
        }*/

        // Formation > Développeur Web PHP

        var_dump($formations[0]);

        echo "<br><br>";

        var_dump($modules[0]);
 
        //$formations[0]->addModule($modules[0]);
        /*$formations[0]->addModule($modules[1]);
        $formations[0]->addModule($modules[2]);
        $formations[0]->addModule($modules[3]);
        $formations[0]->addModule($modules[4]);
        $formations[0]->addModule($modules[5]);
        $formations[0]->addModule($modules[6]);
        $formations[0]->addModule($modules[7]);*/

        // Formation > Développeur Java / Android
/*
        $formations[1]->addModule($modules[4]);
        $formations[1]->addModule($modules[5]);
        $formations[1]->addModule($modules[6]);

        // Formation > Infographie

        $formations[2]->addModule($modules[2]);
        $formations[2]->addModule($modules[5]);
        $formations[2]->addModule($modules[11]);

        // Formation > Secrétariat

        $formations[3]->addModule($modules[5]);
        $formations[3]->addModule($modules[7]);
        $formations[3]->addModule($modules[8]);

        // Formation > Comptabilité

        $formations[4]->addModule($modules[5]);
        $formations[4]->addModule($modules[6]);
        $formations[4]->addModule($modules[8]);

        // Formation > Vente

        $formations[5]->addModule($modules[5]);
        $formations[5]->addModule($modules[6]);
        $formations[5]->addModule($modules[11]);
*/
        return new Response;
    }
}
