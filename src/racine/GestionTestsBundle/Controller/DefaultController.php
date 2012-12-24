<?php

namespace racine\GestionTestsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('racineGestionTestsBundle:Default:index.html.twig', array('name' => $name));
    }
}
