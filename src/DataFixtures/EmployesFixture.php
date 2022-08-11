<?php

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EmployesFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0;$i<20;$i++)
        {
            $employes = new Employes;
            $employes->setNom("Nom$i")->setPrenom("Prenom$i")->setTelephone("06 02 03 04 0$i")->setEmail("mail$i@mail.com")->setAdresse("$i rue bidon 75000 Paris")->setPoste("ouvrier")->setSalaire(1000 + $i*100)->setDatedenaissance(new \DateTime());

            $manager->persist($employes);
        }        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
