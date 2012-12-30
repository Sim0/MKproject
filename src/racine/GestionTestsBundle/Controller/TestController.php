<?php

namespace racine\GestionTestsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionTestsBundle\Entity\Test;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class TestController extends Controller
{
    
    public function IndexAction(request $request)
    {
       
   if ($request->isXmlHttpRequest()) 
       {

            $rp = $this->getDoctrine()->getRepository('racineGestionTestsBundle:Test');

            $tests = $rp->selectTests();



            $secho = "1";
            $iTotalRecords = \count($tests);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($tests as $row) {
                $js.='[';
                foreach ($row as $i => $attributes) {
                    if($i == "isPublished")
                    {
                        if ($attributes =="")
                        {
                            $attributes = "Non publié";
                           
                        }
                        elseif ($attributes =="1")
                        {
                            $attributes = "Publié";
                        }
                    }
                    $js.='"' . $attributes . '",';
                }
                

                $jslen = \strlen($js);
                $js[$jslen - 1] = ']';
                $js.=',';
            }


            $jslen = \strlen($js);
            $js[$jslen - 1] = "]";

            $js .="}";


            return new response($js);
        }

        return $this->render('racineGestionTestsBundle:Test:GestionTests.html.twig');
  }
  
   public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
            $test = new Test();
          
            $test->setNom($request->get('nom',''));
            $test->setDuree($request->get('duree'));
            $test->setDureeMaxQuestion($request->get('dureeMaxQuestion'));
            $test->setIsPublished(false);
            $test->setNbrQuestions($request->get('nbrQuestion'));
            $test->setDescription($request->get('description'));
            $user  = $this->getUser();
            $test->setUtilisateur($user);
            
            
            
            $em = $this->getDoctrine()->getManager();
         
            $em->persist($test);
            $em->flush();
            
             //récupérer l'id du test récemment ajouté
            $idTest = $test->getId();
            
            
           
            
            
        }
        
        $content = array("status"=>"200","info"=>$idTest);
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
       
        return $resp;
        
        
    }
    
     public function EditAction(request $request)
      {
        if ($request->isXmlHttpRequest()) {
            
              $id = $request->get('id');
              $em = $this->getDoctrine()->getManager();

                $test = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

                if (!$test) {
                    throw $this->createNotFoundException('Unable to find Question entity.');
                }
            
           
            $test->setDuree($request->get('duree'));
            $test->setDureeMaxQuestion($request->get('dureeMaxQuestion'));
            $test->setNbrQuestions($request->get('nbrQuestion'));
            $test->setDescription($request->get('description'));
            $user  = $this->getUser();
            $test->setUtilisateur($user);
                
         
            $em->persist($test);
            $em->flush();
            
            
            $idTest = $test->getId(); 
            
        }
        
        $content = array("status"=>"200","info"=>$idTest);
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
            
        
       
        return $resp;
        
        
    }
    
    public function DeleteAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
              $id = $request->get('id');
              $em = $this->getDoctrine()->getManager();

                $test = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

                if (!$test) {
                    throw $this->createNotFoundException('Test inexistant !');
                }
                
              $em->remove($test);
              $em->flush();
              
        $content = array("status"=>"200");
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
            
        return $resp;
              
            
        }
        
        
        
    }
    
    public function PublishAction(request $request)
      {
        if ($request->isXmlHttpRequest()) {
            
              $id = $request->get('id');
              
              
              $em = $this->getDoctrine()->getManager();
              $rp = $em->getRepository('racineGestionTestsBundle:Test');
               
              $testPublished = $rp->selectPublished($id);
               
              $test = $em->getRepository('racineGestionTestsBundle:Test')->find($testPublished['id']);

                if (!$test) {
                    throw $this->createNotFoundException('Test inexistant !');
                }
           
              
            $test->setIsPublished(false);
           
            /*
            $test->setDuree($request->get('duree'));
            $test->setDureeMaxQuestion($request->get('dureeMaxQuestion'));
            $test->setNbrQuestions($request->get('nbrQuestion'));
            $test->setDescription($request->get('description'));
            $user  = $this->getUser();
            $test->setUtilisateur($user);
            */
         
            $em->persist($test);
            $em->flush();
            
            
            $idTest = $test->getId(); 
            
        }
        
        $content = array("status"=>"200","info"=>$idTest);
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
            
        
       
        return $resp;
        
        
    }
    
    public function getTestAction(request $request)
    {
       if ($request->isXmlHttpRequest()) { 
        
                                             $js  = '{  "title":"Capitales",
                                                        "description":"Questions d\'ordre générale sur les capitales du mondes",
                                                        "questions":[
                                                           {
                                                              "type":"Question",
                                                              "text":"Quelle est la capitale du maroc ?",
                                                              "answers":[
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"Rabat",
                                                                    "correct":"true"
                                                                 },
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"Dublin",
                                                                    "correct":"false"
                                                                 }
                                                              ]
                                                            },
                                                            {
                                                              "type":"Question",
                                                              "text":"Quelle est la capitale de la tunisie?",
                                                              "answers":[
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"Tunis",
                                                                    "correct":"true"
                                                                 },
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"Alger",
                                                                    "correct":"false"
                                                                 }
                                                              ]
                                                            },
                                                            {
                                                              "type":"Question",
                                                              "text":"Quelle est la capitale des Etats unis ?",
                                                              "answers":[
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"Washignton.",
                                                                    "correct":"true"
                                                                 },
                                                                 {
                                                                    "type":"Answer",
                                                                    "text":"New York",
                                                                    "correct":"false"
                                                                 }
                                                              ]
                                                            }]}';
           
           
           return new response($js);
                                          } 
          return $this->render('racineGestionTestsBundle:Test:PasserTest.html.twig');
    }
     
    
}
