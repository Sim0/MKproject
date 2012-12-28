<?php

namespace racine\GestionTestsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class CreneauController extends Controller
{
    public function getCreneauAction(request $request)
    {
       if ($request->isXmlHttpRequest())
       {
           $em = $this->container->get('doctrine')->getEntityManager();
           $creneaux = $em->getRepository('racineGestionTestsBundle:Creneau')->findAll();
           /*
           $jsresp=array();
          
           /*
           foreach($creneaux as $creneau)
           {             
               $date = \date_format($creneau->getDate(),"Y-m-d H:i:s");;
               $dateStart = new \DateTime($date);
               $dateEnd = $dateStart->add(new \DateInterval('P90M'));
               $dateStart = \date_format($dateStart,"Y-m-d H:i:s");
               $dateEnd = \date_format($dateEnd,"Y-m-d H:i:s");
               
               \array_push($jsrep, array( 'id'=>$creneau->getId(),
                       'title'=>$creneau->getTitle(),
                       'start'=> $dateStart,
                       'end' => $dateEnd,
                       ));
            
           }
            * */
            
          
           
            $year = \date('Y');
	    $month = \date('m');
           
           $js = \json_encode(array(
	
		array(
			'id' => 111,
			'title' => "Event1",
			'start' => "$year-$month-",
			'url' => "http://yahoo.com/"
		),
		
		array(
			'id' => 262,
			'title' => "Test PHP",
			'start' => "$year-$month-26",
			'end' => "$year-$month-26",
			'url' => ""
		),
               array(
			'id' => 171,
			'title' => "Event1",
			'start' => "$year-$month-30",
			'url' => ""
		),
               array(
			'id' => 181,
			'title' => "Test Datamining",
			'start' => "$year-$month-27",
			'url' => ""
		),
               array(
			'id' => 151,
			'title' => "test Webservices",
			'start' => "$year-$month-28",
			'url' => ""
		),
               array(
			'id' => 141,
			'title' => "test Anglais",
			'start' => "$year-$month-29",
			'url' => ""
		),
               
	
	));
           
           return new response($js);
           
       }
         
    }
    
    }

