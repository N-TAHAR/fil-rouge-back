<?php

namespace App\Controller;

use App\Entity\GreenSpace;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class GreenSpaceController extends AbstractController
{

    public function __construct(SerializerInterface $serializer)
    {
        $this->_serializer = $serializer;
    }

    /**
     * @Route("/GreenSpaces/{id}", name="GreenSpace_show")
     */
    public function showAction(GreenSpace $GreenSpace)
    {
        $data = $this->_serializer->serialize($GreenSpace, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/GreenSpaces", name="GreenSpace_create", methods={"POST", "HEAD"})
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $GreenSpace = $this->_serializer->deserialize($data, 'App\Entity\GreenSpace', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($GreenSpace);
        $em->flush();

        return new Response('Saved the new GreenSpace', Response::HTTP_CREATED);
    }

    /**
     * @Route("/GreenSpaces", name="GreenSpace_list", methods={"GET", "HEAD"})
     */
    public function listAction()
    {
        $GreenSpaces = $this->getDoctrine()->getRepository('App:GreenSpace')->findAll();
        $data = $this->_serializer->serialize($GreenSpaces, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
