<?php

namespace App\Controller;

use App\Entity\GreenSpace;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class DistrictController extends AbstractController
{

    public function __construct(SerializerInterface $serializer)
    {
        $this->_serializer = $serializer;
    }

    /**
     * @Route("/district", name="district", methods={"GET", "HEAD"})
     */
    public function index()
    {
        $districts = $this->getDoctrine()->getRepository('App:District')->findAll();

        $green_space_list_note = $this->green_space_list_note($districts);
        $event_list_note = $this->event_list_note($districts);
        $velib_list_note = $this->velib_list_note($districts);
        $wifi_list_note = $this->wifi_list_note($districts);

        $data_districts = [];
        foreach ($districts as $district) {
            $event_note = $event_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getEvents()), 0)];
            $velib_note = $velib_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getVelibs()), 0)];
            $wifi_note = $wifi_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getWifis()), 0)];
            $green_space_note = $green_space_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getGreenSpaces()), 0)];
            $object = [];
            $object['district'] = $district->getCode();
            $object['notes']['green_space_note'] = $green_space_note;
            $object['notes']['event_note'] = $event_note;
            $object['notes']['velib_note'] = $velib_note;
            $object['notes']['wifi_note'] = $wifi_note;
            $object['global_note'] = $this->global_note($object['notes']);

            array_push($data_districts, $object);
        }

        $data = $this->_serializer->serialize($data_districts, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function global_note($note_list)
    {
        $global_note = 0;
        foreach ($note_list as $note) {
            $global_note += $note;
        }

        return round($global_note/count($note_list), 1);
    }

    private function green_space_list_note($districts)
    {
        $green_space_score_list = [];
        foreach ($districts as $district) {
            $note= round((floatval($district->getSize()) * 1000000) / count($district->getGreenSpaces()), 0);
            array_push($green_space_score_list, $note);
        }

        $max = max($green_space_score_list);
        $min = min($green_space_score_list);

        return $this->notation_calcul($green_space_score_list, $max, $min);
    }

    private function event_list_note($districts)
    {
        $event_score_list = [];
        foreach ($districts as $district) {
            $note= round((floatval($district->getSize()) * 1000000) / count($district->getEvents()), 0);
            array_push($event_score_list, $note);
        }

        $max = max($event_score_list);
        $min = min($event_score_list);

        return $this->notation_calcul($event_score_list, $max, $min);
    }

    private function velib_list_note($districts)
    {
        $velib_score_list = [];
        foreach ($districts as $district) {
            $note= round((floatval($district->getSize()) * 1000000) / count($district->getVelibs()), 0);
            array_push($velib_score_list, $note);
        }

        $max = max($velib_score_list);
        $min = min($velib_score_list);

        return $this->notation_calcul($velib_score_list, $max, $min);
    }

    private function wifi_list_note($districts)
    {
        $wifi_score_list = [];
        foreach ($districts as $district) {
            $note= round((floatval($district->getSize()) * 1000000) / count($district->getWifis()), 0);
            array_push($wifi_score_list, $note);
        }

        $max = max($wifi_score_list);
        $min = min($wifi_score_list);

        return $this->notation_calcul($wifi_score_list, $max, $min);
    }

    private function notation_calcul($score_list, $max, $min)
    {
        $list_note = [];
        foreach ($score_list as $score) {
            $new_value = round(1 + (($score - $min) * (9 / ($max - $min))), 1);
            $list_note[$score] = $new_value;
        }

        return $list_note;
    }
}
