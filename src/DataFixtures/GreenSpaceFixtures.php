<?php

namespace App\DataFixtures;

use App\Entity\GreenSpace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class GreenSpaceFixtures extends Fixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$file = file_get_contents(__DIR__ . '/../Data/espaces_verts.json');
		$green_space_json = json_decode($file, true);
		// $green_space_array = [];
		// foreach ($green_space_json as $green_space) {
		// 	array_push($green_space_array, $green_space['fields']['adresse_codepostal']);
		// }
		// $green_space_total = array_count_values($green_space_array);
		// $green_space_district = 
		foreach ($green_space_json as $green_space) {
			$greenSpace = (new GreenSpace())
				->setDistrict($green_space['fields']['adresse_codepostal']);
			$manager->persist($greenSpace);
		}
		$manager->flush();
	}

	public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
