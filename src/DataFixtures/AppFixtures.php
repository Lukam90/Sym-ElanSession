<?php

namespace App\DataFixtures;

use App\Data\Values;
use App\Entity\Lieu;
use App\Entity\User;
use App\Entity\Module;
use App\Entity\Session;
use App\Entity\Formation;
use App\Entity\Stagiaire;

use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function jsonConvert($jsonFile) {
        $res = file_get_contents("public/json/$jsonFile", true);

        $res = json_decode($res);

        return $res;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisateurs

        $tabUsers = $this->jsonConvert("users.json");

        foreach ($tabUsers as $user) {
            $objUser = new User();
            $objUser->setId($user->id);
            $objUser->setEmail($user->email);
            $objUser->setPrenom($user->prenom);
            $objUser->setNom($user->nom);

            $password = $this->encoder->encodePassword($objUser, $user->password);
            $objUser->setPassword($password);
            
            $objUser->setRole($user->role);
            $objUser->setRoles(['ROLE_ADMIN']);

            $manager->persist($objUser);
        }

        // Stagiaires

        $tabStagiaires = $this->jsonConvert("stagiaires.json");

        foreach ($tabStagiaires as $stagiaire) {
            $objStagiaire = new Stagiaire();
            $objStagiaire->setId($stagiaire->id);
            $objStagiaire->setNom($stagiaire->nom);
            $objStagiaire->setPrenom($stagiaire->prenom);
            $objStagiaire->setEmail($stagiaire->email);
            $objStagiaire->setAdresse($stagiaire->adresse);
            $objStagiaire->setCp($stagiaire->cp);
            $objStagiaire->setVille($stagiaire->ville);
            $objStagiaire->setTelephone($stagiaire->telephone);
            $objStagiaire->setNPoleEmploi($stagiaire->nPoleEmploi);

            $manager->persist($objStagiaire);
        }

        // Lieux

        $tabLieux = $this->jsonConvert("lieux.json");

        $lieux = [];

        foreach ($tabLieux as $lieu) {
            $objLieu = new Lieu();
            $objLieu->setId($lieu->id);
            $objLieu->setVille($lieu->ville);
            $objLieu->setCp($lieu->cp);

            array_push($lieux, $objLieu);

            $manager->persist($objLieu);
        }

        // Sessions

        $sessions = $this->jsonConvert("sessions.json");

        foreach ($sessions as $session) {
            $objSession = new Session();
            $objSession->setId($session->id);
            $objSession->setIntitule($session->intitule);
            $objSession->setNbPlaces($session->nbPlaces);
            $objSession->setDateDebut(new \DateTime($session->dateDebut));
            $objSession->setDateFin(new \DateTime($session->dateFin));
            $objSession->setLieu($lieux[$session->lieu]);

            $manager->persist($objSession);
        }

        // Modules

        $tabModules = $this->jsonConvert("modules.json");

        $modules = [];

        foreach ($tabModules as $module) {
            $objModule = new Module();
            $objModule->setId($module->id);
            $objModule->setNom($module->nom);

            array_push($modules, $objModule);

            $manager->persist($objModule);
        }

        // Formations

        $tabFormations = $this->jsonConvert("formations.json");

        $formations = [];

        foreach ($tabFormations as $formation) {
            $objFormation = new Formation();
            $objFormation->setId($formation->id);
            $objFormation->setTitre($formation->titre);

            array_push($formations, $objFormation);
        }

        // Formation > D??veloppeur Web PHP
 
        $formations[0]->addModule($modules[0]);
        $formations[0]->addModule($modules[1]);
        $formations[0]->addModule($modules[2]);
        $formations[0]->addModule($modules[3]);
        $formations[0]->addModule($modules[4]);
        $formations[0]->addModule($modules[5]);
        $formations[0]->addModule($modules[6]);
        $formations[0]->addModule($modules[7]);

        $manager->persist($formations[0]);

        // Formation > D??veloppeur Java / Android

        $formations[1]->addModule($modules[4]);
        $formations[1]->addModule($modules[5]);
        $formations[1]->addModule($modules[6]);

        $manager->persist($formations[1]);

        // Formation > Infographie

        $formations[2]->addModule($modules[2]);
        $formations[2]->addModule($modules[5]);
        $formations[2]->addModule($modules[11]);

        $manager->persist($formations[2]);

        // Formation > Secr??tariat

        $formations[3]->addModule($modules[5]);
        $formations[3]->addModule($modules[7]);
        $formations[3]->addModule($modules[8]);

        $manager->persist($formations[3]);

        // Formation > Comptabilit??

        $formations[4]->addModule($modules[5]);
        $formations[4]->addModule($modules[6]);
        $formations[4]->addModule($modules[8]);

        $manager->persist($formations[4]);

        // Formation > Vente

        $formations[5]->addModule($modules[5]);
        $formations[5]->addModule($modules[6]);
        $formations[5]->addModule($modules[11]);

        $manager->persist($formations[5]);

        $manager->flush();
    }
}
