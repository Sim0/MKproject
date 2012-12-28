<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionCandidatsBundle\Entity\Candidat;
use racine\GestionCandidatsBundle\Entity\CandidatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CandidatController extends Controller {

    public function IndexAction(request $request) {
        
        if ($request->isXmlHttpRequest()) {

            $repository = $this->getDoctrine()->getRepository('racineGestionCandidatsBundle:Candidat');

            $candidats = $repository->selectCandidats();



            $secho = "1";
            $iTotalRecords = \count($candidats);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($candidats as $row) {
                $js.='[';
                foreach ($row as $attributes) {
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

        return $this->render('racineGestionUtilisateurBundle:Candidats:GestionCandidats.html.twig');
    }
    
    public function getInvalidAction(request $request) {
        
        if ($request->isXmlHttpRequest()) {

            $repository = $this->getDoctrine()->getRepository('racineGestionCandidatsBundle:Candidat');

            $candidats = $repository->selectCandidats(false);



            $secho = "1";
            $iTotalRecords = \count($candidats);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($candidats as $row) {
                $js.='[';
                foreach ($row as $attributes) {
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

        return $this->render('racineGestionUtilisateurBundle:Candidats:GestionCandidatsNonValides.html.twig');
    }
 
     public function DeleteAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
              $id = $request->get('id');
              $em = $this->getDoctrine()->getManager();

                $candidat = $em->getRepository('racineGestionCandidatsBundle:Candidats')->find($id);

                if (!$candidat) {
                    throw $this->createNotFoundException('Unable to find Question entity.');
                }
                
              $em->remove($candidat);
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

?>