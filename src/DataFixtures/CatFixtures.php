<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Subcategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cat1 = new Categorie();
        $cat1->setName("Vélos");
        $manager->persist($cat1);

        $subcat1 = new Subcategorie();
        $subcat1->setName("BMC");
        $subcat1->setCategory($cat1);
        $manager->persist($subcat1);

        $subcat2 = new Subcategorie();
        $subcat2->setName("Cube");
        $subcat2->setCategory($cat1);
        $manager->persist($subcat2);

        $subcat3 = new Subcategorie();
        $subcat3->setName("Giant");
        $subcat3->setCategory($cat1);
        $manager->persist($subcat3);

        $subcat4 = new Subcategorie();
        $subcat4->setName("KTM");
        $subcat4->setCategory($cat1);
        $manager->persist($subcat4);

        $subcat5 = new Subcategorie();
        $subcat5->setName("Scott");
        $subcat5->setCategory($cat1);
        $manager->persist($subcat5);

        $cat2 = new Categorie();
        $cat2->setName("Casques");
        $manager->persist($cat2);


        $manager->flush();
    }
}
