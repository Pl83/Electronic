<?php

namespace App\DataFixtures;

use App\Entity\Claviers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $claviers = new Claviers();

        $claviers->setNom('Clavier 1');

        $manager->persist($claviers);

        $manager->flush();



    }
}
