<?php

namespace racine\GestionTestsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use racine\GestionTestsBundle\Entity\Reponse;
use racine\GestionTestsBundle\Entity\Question;
use racine\GestionTestsBundle\Entity\Theme;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class QuestionController extends Controller
{
  public function IndexAction(request $request)
    {
       
   if ($request->isXmlHttpRequest()) 
       {

            $rp = $this->getDoctrine()->getRepository('racineGestionTestsBundle:Question');

            $questions = $rp->selectQuestions();



            $secho = "1";
            $iTotalRecords = \count($questions);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($questions as $row) {
                $js.='[';
                foreach ($row as $i => $attributes) {
                   
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

        return $this->render('racineGestionTestsBundle:Question:GestionQuestions.html.twig');
  }
  
   public function getThemeAction(request $request){
       $resp = new Response();
       if ($request->isXmlHttpRequest()) {

            if($request->get('action') == "getThemes")
            {
             $rp = $this->getDoctrine()->getRepository('racineGestionTestsBundle:Theme');

                 $themes = $rp->selectThemes();

                 
                 $resp->setContent(\json_encode($themes)) ;


            }
       
   }
           return $resp;
   }
   public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
            $question = new Question();
            $em = $this->getDoctrine()->getManager();
            
            $user = $this->getUser();
            $question->setUtilisateur($user);
            
            $question->setDescription($request->get('description'));
            $theme = $em->getRepository('racineGestionTestsBundle:Theme')->find($request->get('theme_id'));
            
             if (!$theme) {
                 
                    throw $this->createNotFoundException('Theme introuvable !');
                    
                }
            
            
            $question->setTheme($theme);
            
            $reponses = $request->get('reponses');
            $etats = $request->get('etat');
            
            
            
            
            foreach ($reponses as $i => $val) {
                $rep = new Reponse();
                $description = $reponses[$i];
                
                $rep->setDescription($description);
                
                
                $etat = $etats[$i];
                if($etat == "true")
                {
                 $rep->setIsCorrect(true);
                }
                else if( $etat =="false")
                {
                  $rep->setIsCorrect(false);
                }
                $rep->setQuestion($question);
              
               $em->persist($rep);   
               $question->addReponse($rep);
                
            }
            
            
           
            $em->persist($question);
            $em->flush();
            
             //récupérer l'id du test récemment ajouté
            $idQuestion="";
            $idQuestion = $question->getId();
            
        }
        
        $content = array("status"=>"200","info"=>$idQuestion,"addedBy"=>$user->setUsername());
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
       
        return $resp;
        
        
    }
    
    public function getReponseByIdAction(request $request)
    {
        $rep = new Response();
        $id= $this->getRequest()->get('id');
        
        if ($request->isXmlHttpRequest()) 
            {
               $rp = $this->getDoctrine()->getRepository('racineGestionTestsBundle:Reponse');
               $reponses = $rp->selectReponseById($id);
               
               $secho = "1";
               $iTotalRecords = \count($reponses);
               $iTotalDisplayRecords = $iTotalRecords;

                $js = "{\"secho\": ";
                $js .= $secho . ",\n";
                $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
                $js .= "\"iTotalDisplayRecords\": \"";
                $js .= $iTotalDisplayRecords . "\",\n";
                $js .= "\"aaData\": [\n";
           
                
            foreach ($reponses as $row) {
                $js.='[';
                foreach ($row as $i => $attributes) {
                   
                     if($i == "isCorrect")
                    {
                        if ($attributes =="")
                        {
                            $attributes = "Fausse";
                           
                        }
                        elseif ($attributes =="1")
                        {
                            $attributes = "Juste";
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
        return rep;
    }
    
     public function EditAction(request $request)
      {
        if ($request->isXmlHttpRequest()) {
            
              $id = $request->get('id');
              $em = $this->getDoctrine()->getManager();

                $theme = $em->getRepository('racineGestionTestsBundle:Theme')->find($id);

                if (!$theme) {
                    throw $this->createNotFoundException('Theme introuvable !');
                    
                }
            
            
            $theme->setTitle($request->get('nom')); 
            $theme->setDescription($request->get('description'));
           
                
         
            $em->persist($theme);
            $em->flush();
            
            
            $idTheme = $theme->getId(); 
            
        }
        
        $content = array("status"=>"200","info"=>$idTheme);
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

                $theme = $em->getRepository('racineGestionTestsBundle:Theme')->find($id);

                if (!$theme) {
                    throw $this->createNotFoundException('Theme introuvable !');
                }
                
              $em->remove($theme);
              $em->flush();
              
        $content = array("status"=>"200");
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
            
        return $resp;
              
            
        }
        
        
        
    }
}
