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

        $average_list = $this->average_notes($green_space_list_note, $event_list_note, $velib_list_note, $wifi_list_note);

        $districts_list = [];

        foreach ($districts as $district) {
            $event_note = $event_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getEvents()), 0)];
            $velib_note = $velib_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getVelibs()), 0)];
            $wifi_note = $wifi_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getWifis()), 0)];
            $green_space_note = $green_space_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getGreenSpaces()), 0)];
            $data = [];
            $data['district'] = $district->getCode();
            $data['notes']['green_space']['name'] = 'Espace Vert';
            $data['notes']['green_space']['note'] = $green_space_note;
            $data['notes']['event']['name'] = 'Évènement';
            $data['notes']['event']['note'] = $event_note;
            $data['notes']['velib']['name'] = 'Station Velib';
            $data['notes']['velib']['note'] = $velib_note;
            $data['notes']['wifi']['name'] = 'Qualité du Wifi';
            $data['notes']['wifi']['note'] = $wifi_note;
            $data['global_note'] = $this->global_note($data['notes']);

            array_push($districts_list, $data);
        }

        $data_districts = [
            "districts" => $districts_list,
            "average_notes" => $average_list
        ];

        $data = $this->_serializer->serialize($data_districts, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function average_notes($green_space_list_note, $event_list_note, $velib_list_note, $wifi_list_note)
    {
        $green_space_average = [
            'name' => 'Espace Vert',
            'note' => round(array_sum($green_space_list_note) / count($green_space_list_note), 1)
        ];

        $event_average = [
            'name' => 'Évènement',
            'note' => round(array_sum($event_list_note) / count($event_list_note), 1)
        ];

        $velib_average = [
            'name' => 'Station Velib',
            'note' => round(array_sum($velib_list_note) / count($velib_list_note), 1)
        ];

        $wifi_average = [
            'name' => 'Qualité du wifi',
            'note' => round(array_sum($wifi_list_note) / count($wifi_list_note), 1)
        ];

        return [$green_space_average, $event_average, $velib_average, $wifi_average];
    }

    private function global_note($note_list)
    {
        $global_note = 0;
        foreach ($note_list as $note) {
            $global_note += $note['note'];
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
            $new_value = round(1 + (($score - $min) * (4 / ($max - $min))), 1);
            $list_note[$score] = $new_value;
        }

        return $list_note;
    }
}
