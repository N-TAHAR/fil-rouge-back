<?php

namespace App\DataFixtures;

use App\Entity\GreenSpace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GreenSpaceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file = file_get_contents(__DIR__.'/../Data/espaces_verts.json');
        $green_space_array = json_decode($file, true);
        foreach($green_space_array as $green_space) {
            $greenSpace = (new GreenSpace())
                           ->setDistrict($green_space['fields']['adresse_codepostal'])
            ;
            $manager->persist($greenSpace);
          }
        $manager->flush();
    }
}
