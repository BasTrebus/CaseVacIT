<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Vacature;
use App\Entity\Sollicitatie;

class VacatureController extends AbstractController
{
    /**
     * @Route("/vacature/{id}", name="vacature")
     * @Template()
     */
    public function index($id = 1)
    {
        $rep = $this->getDoctrine()->getRepository(Vacature::class);
        $data1 = $rep->getVacature($id);

        return array("vacaturedata" => $data1);
    }

    /**
     * @Route("/vacature/{id}/{werkgever}/solliciteer", name="solliciteer")
     * @Template()
     */
    public function solliciteer($id, $werkgever)
    {
        $user = $this->getUser();
        $user_id = $user->getId();

        $params = array(
            "user_id" => $user_id,
            "vacature_id" => $id,
            "werkgever" => $werkgever
        );
        
        $rep = $this->getDoctrine()->getRepository(Sollicitatie::class);
        $sollicitatie = $rep->saveSollicitatie($params);

        return($this->redirectToRoute('vacature'));
    }
}