<?php

namespace App\DataFixtures;


use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $suppliers = [
            ['BMC', 'Geneve', 'Swiss', '11 rue de la licorne', 1201, 'Bob Bigelow', 12345678, 'bob-bigletow@bmc.com'],
            ['CUBE', 'Munich', 'Allemagne', '19 boulevard de la biere', 6531, 'Marcus Purner', 12345678, 'marcus-purner@cube.com'],
            ['GIANT', 'Taipei', 'Taiwan', '20 avenue du sushi ', 7954, 'Chin-Piao Liu', 12345678, 'king-liu@giant.com'],
            ['KTM', 'Berlin', 'Allemagne', '36 rue de la soif', 9895, 'Ernst Kronreif', 12345678, 'ernst-kronreif@ktm.com'],
            ['SCOTT', 'Miami', 'Etat-Unis', '84 avenue springbreak', 6562, 'Ed Scott', 987654321, 'ed-scott@scott.com'],
       ];
       
       foreach ($suppliers as $keySupplier => $supplier) {   
        $sup = new Supplier();
        $sup->setName($supplier[0]);
        $sup->setCity($supplier[1]);
        $sup->setCountry($supplier[2]);
        $sup->setAddress($supplier[3]);
        $sup->setZipCode($supplier[4]);
        $sup->setContact($supplier[5]);
        $sup->setPhone($supplier[6]);
        $sup->setEmail($supplier[7]);


        $manager->persist($sup);
       }
        
        $manager->flush();
    }
}
