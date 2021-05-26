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
    public function jsonConvert($jsonFile) {
        $res = file_get_contents("json/$jsonFile", true);

        $res = json_decode($res);

        return $res;
    }

    public function load(ObjectManager $manager)
    {
        

        // ...

        foreach ($this->formations as $formation) {
            //$manager->persist($formation);
        }

        $manager->flush();
    }
}
