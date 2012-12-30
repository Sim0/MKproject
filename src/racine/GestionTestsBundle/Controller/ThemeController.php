<?php

namespace racine\GestionTestsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionTestsBundle\Entity\Theme;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ThemeController extends Controller
{
    
    public function IndexAction(request $request)
    {
       
   if ($request->isXmlHttpRequest()) 
       {

            $rp = $this->getDoctrine()->getRepository('racineGestionTestsBundle:Theme');

            $themes = $rp->selectThemes();



            $secho = "1";
            $iTotalRecords = \count($themes);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($themes as $row) {
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

        return $this->render('racineGestionTestsBundle:Theme:GestionThemes.html.twig');
  }
  
   public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
            $theme = new Theme();
          
            $theme->setTitle($request->get('nom'));
            $theme->setDescription($request->get('description',''));
           
            
            
            $em = $this->getDoctrine()->getManager();
         
            $em->persist($theme);
            $em->flush();
            
             //récupérer l'id du test récemment ajouté
            $idTheme = $theme->getId();
            
        }
        
        $content = array("status"=>"200","info"=>$idTheme);
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
