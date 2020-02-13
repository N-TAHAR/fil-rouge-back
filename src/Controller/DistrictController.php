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

        $data_districts = [];
        foreach ($districts as $district) {
            $green_space_note = $green_space_list_note[round((floatval($district->getSize()) * 1000000) / count($district->getGreenSpaces()), 0)];
            $object = [];
            $object['district'] = $district->getCode();
            $object['notes']['green_space_note'] = $green_space_note;
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
        $green_space_score = [];
        foreach ($districts as $district) {
            $note= round((floatval($district->getSize()) * 1000000) / count($district->getGreenSpaces()), 0);
            array_push($green_space_score, $note);
        }

        $max = max($green_space_score);
        $min = min($green_space_score);

        $green_space_list_note = [];
        foreach ($green_space_score as $score) {
            $new_value = round(1 + (($score - $min) * (9 / ($max - $min))), 1);
            $green_space_list_note[$score] = $new_value;
        }

        return $green_space_list_note;
    }
}
