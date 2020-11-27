<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\User;
use App\Entity\Sollicitatie;


/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user")
     * @Template
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/enterInfo", name="enterInfo")
     */
    public function enterInfo(): Response
    {
        $user_obj = $this->getUser();
        $user["id"] = $user_obj->getId();
        return $this->render('user/enterInfo.html.twig');
    }

    /**
     * @Route("/sollicitaties", name="Sollicitaties")
     * @Template
     */
    public function sollicitaties()
    {
        $user = $this->getUser();
        $user_id = $user->getId();
        $user_roles = $user->getRoles();

        $rep = $this->getDoctrine()->getRepository(Sollicitatie::class);
        $data = $rep->getSollicitaties($user_id, $user_roles);

        return $data;
    }

}
