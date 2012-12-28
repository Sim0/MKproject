<?php

namespace racine\GestionCandidatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('racineGestionCandidatsBundle:Default:index.html.twig', array('name' => $name));
    }
}
