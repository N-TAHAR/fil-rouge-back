<?php

namespace App\DataFixtures;

use App\Entity\District;
use App\Entity\GreenSpace;
use App\Entity\Event;
use App\Entity\Velib;
use App\Entity\Wifi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DistrictFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file_green_space = file_get_contents(__DIR__ . '/../Data/espaces_verts.json');
        $green_space_json = json_decode($file_green_space, true);
        $file_event = file_get_contents(__DIR__ . '/../Data/event.json');
        $event_json = json_decode($file_event, true);
        $file_velib = file_get_contents(__DIR__ . '/../Data/velib.json');
        $velib_json = json_decode($file_velib, true);
        $file_wifi = file_get_contents(__DIR__ . '/../Data/wifi.json');
        $wifi_json = json_decode($file_wifi, true);
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

            foreach ($event_json as $event) {
                if ($event['fields']['address_zipcode'] == $district['code']) {
                    $event_entity = (new Event())
                        ->setDistrict($event['fields']['address_zipcode'])
                        ->setDistrictId($district_entity);
                    $manager->persist($event_entity);
                }
            }

            foreach ($velib_json as $velib) {
                if ($velib['fields']['cp'] == $district['code']) {
                    $velib_entity = (new Velib())
                        ->setDistrict($velib['fields']['cp'])
                        ->setDistrictId($district_entity);
                    $manager->persist($velib_entity);
                }
            }

            foreach ($wifi_json as $wifi) {
                if ($wifi['fields']['cp'] == $district['code']) {
                    $wifi_entity = (new Wifi())
                        ->setDistrict($wifi['fields']['cp'])
                        ->setDistrictId($district_entity);
                    $manager->persist($wifi_entity);
                }
            }
        }
        $manager->flush();
    }
}