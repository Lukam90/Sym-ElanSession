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
    public static function getWeb = [$modules[0], $modules[1], $modules[2], $modules[3], $modules[4], $modules[5], $modules[6], $modules[7]];

    public static function getJava = [$modules[4], $modules[5], $modules[6]];

    public static function getInfographie = [$modules[2], $modules[5], $modules[11]];

    public static function getSecretariat = [$modules[5], $modules[7], $modules[8]];

    public static function getCompta = [$modules[5], $modules[6], $modules[8]];

    public static function getVente = [$modules[5], $modules[6], $modules[11]];
    */

    public function load(ObjectManager $manager)
    {
        // Utilisateurs

        $users = Values::getUsers();

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
