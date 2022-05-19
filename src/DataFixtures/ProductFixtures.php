<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Product;
use App\Entity\Supplier;
use App\Entity\Categorie;
use App\Entity\Subcategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
       $products = [
            [
                'BMC Twostroke ', 
                3999, 
                'BMC1', 
                10, 
                2, 
                'Orange', 
                '',
                'Cadre : Twostroke 01 Premium Carbon, Fully Guided Internal Cable Routing, Integrated Fork stopper, Integrated Chain Guide, PF86 bottom bracket, Post Mount Disc, 12x148mm thru-axle\r\nFourche : Rock Shox Sid Select, 100mm\r\nVitesses : 1x12\r\nPédalier : SRAM X1 Eagle Carbon 34T\r\nCassette : SRAM GX Eagle 10-52T\r\nChaine : SRAM GX Eagle\r\nDérailleur arrière : SRAM X01 Eagle\r\nManettes : SRAM GX Eagle\r\nFreins : SRAM Level TLM / SRAM Centerline Rotors (160/160 S-M, 180/160 L-XL)\r\nGuidon : BMC MFB01 Carbon 760mm\r\nSTEM : BMC MSM01\r\nTige de selle : 01 Premium Carbon D-Shape Seatpost, 0mm offset\r\nSelle : Fizik Antares R7\r\nMoyeux : DT Swiss XR 1700\r\nJantes : DT Swiss XR 1700, 25mm\r\nPneus : Vittoria Barzo 2.25\r\nPoids : 9.5kg', 
                '2021-01-01 00:00:00', 
                '2021-01-02 00:00:00', 
                1, 
                1, 
                1
            ],
            [
                'BMC Fourstroke', 
                5999, 
                'BMC2', 
                10, 
                2, 
                'Blanc', 
                '',
                'Cadre : Fourstroke 01 Premium Carbon, 120mm Travel, Advanced Pivot System Suspension, Fully Guided Internal Cable Routing, Integrated Fork stopper\r\nFourche : Fox Float 34 SC - Performance Grip, Remote, 120mm\r\nAmortisseur arrière : Fox Float DPS - Performance Elite, Evol, Remote\r\nVitesses : 1x12\r\nPédalier : SRAM X1 Eagle Carbon 34T\r\nCassette : Sram GX Eagle 10-52T\r\nChaine : SRAM GX Eagle\r\nDérailleur arrière : SRAM GX Eagle\r\nManettes : SRAM GX Eagle\r\nFreins : Shimano Deore SLX / Shimano SM-RT66 Rotors (180/160)\r\nGuidon : BMC MFB01 Carbon 760mm\r\nSTEM : BMC MSM01\r\nTige de selle : BMC RAD, Integrated Dropper Seatpost, 80mm drop\r\nSelle : Fizik Antares R7\r\nMoyeux : DT Swiss M1900\r\nJantes : DT Swiss M1900, 30mm\r\nPneus : Maxxix Rekon 2.4\" WT, TR, EXO\r\nPoids : 12.1kg', 
                '2021-01-01 00:00:00', 
                '2021-01-02 00:00:00', 
                1, 
                1, 
                1
            ],

       ];
       
       foreach ($products as $keyProduct => $product) {   
        $sup = $manager->getRepository(Supplier::class)->find($product[11]);
        $subcat = $manager->getRepository(Subcategorie::class)->find($product[10]);

        $prod = new Product();
        $prod->setName($product[0]);
        $prod->setPrice($product[1]);
        $prod->setReference($product[2]);
        $prod->setStock($product[3]);
        $prod->setAlertStock($product[4]);
        $prod->setColor($product[5]);
        $prod->setLabel($product[6]);
        $prod->setDescription($product[7]);
        $prod->setDateCreated(new DateTime($product[8]));
        $prod->setDateUpdated(new DateTime($product[9]));
        $prod->setPictureFileName($product[10]);
        $prod->setSubCategorie($subcat);
        $prod->setSupplier($sup);



        $manager->persist($prod);
       }
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SupplierFixtures::class,
            CatFixtures::class,
        ];
    }
}
