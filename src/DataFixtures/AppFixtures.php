<?php

namespace App\DataFixtures;

use App\Data\Values;
use App\Entity\User;
use App\Entity\Module;
use App\Entity\Session;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    // users

    // stagiaires

    // lieux

    // sessions

    // modules

    // formations

    /*
    $mWeb = [$modules[0], $modules[1], $modules[2], $modules[3], $modules[4], $modules[5], $modules[6], $modules[7]];

    $mJava = [$modules[4], $modules[5], $modules[6]];

    $mInfographie = [$modules[2], $modules[5], $modules[11]];

    $mSecretariat = [$modules[5], $modules[7], $modules[8]];

    $mCompta = [$modules[5], $modules[6], $modules[8]];

    $mVente = [$modules[5], $modules[6], $modules[11]];
    */

    public function jsonConvert($jsonFile) {
        $res = file_get_contents("json/$jsonFile");

        $res = json_decode($res);

        return $res;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisateurs

        //$users = file_get_contents("json/users.json");

        //var_dump($users);

        /*$users = Values::getUsers();

        foreach ($this->users as $user) {
            $manager->persist($user);
        }

        // Stagiaires

        /*foreach ($this->stagiaires as $stagiaire) {
            $manager->persist($stagiaire);
        }

        // Lieux

        foreach ($this->lieux as $lieu) {
            $manager->persist($lieu);
        }

        // Sessions

        foreach ($this->sessions as $session) {
            $manager->persist($session);
        }
        
        // Modules

        foreach ($this->modules as $module) {
            $manager->persist($module);
        }

        // Formations

        foreach ($this->formations as $formation) {
            $manager->persist($formation);
        }*/

        $manager->flush();
    }
}
