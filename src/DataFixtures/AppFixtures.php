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
    private $users = Values::$users;

    private $sessions = Values::$sessions;

    private $formations = Values::$formations;

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
