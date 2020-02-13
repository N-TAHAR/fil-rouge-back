<?php

namespace App\DataFixtures;

use App\Entity\District;
use App\Entity\GreenSpace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DistrictFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file_green_space = file_get_contents(__DIR__ . '/../Data/espaces_verts.json');
        $green_space_json = json_decode($file_green_space, true);
        $file_district = file_get_contents(__DIR__ . '/../Data/district.json');
        $district_json = json_decode($file_district, true);
        
        foreach ($district_json as $district) {
            $district_entity = (new District())
                ->setCode($district['code'])
                ->setSize($district['size']);
            $manager->persist($district_entity);

            foreach ($green_space_json as $green_space) {
                if ($green_space['fields']['adresse_codepostal'] == $district['code']) {
                    $green_space_entity = (new GreenSpace())
                        ->setDistrict($green_space['fields']['adresse_codepostal'])
                        ->setDistrictId($district_entity);
                    $manager->persist($green_space_entity);
                }
            }
        }
        $manager->flush();
    }
}
