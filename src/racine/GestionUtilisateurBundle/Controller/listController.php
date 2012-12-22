<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;
use racine\GestionUtilisateurBundle\Entity\UtilisateurRepository;
use racine\GestionUtilisateurBundle\Form\Type\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class listController extends Controller
{
    
    public function IndexAction(request $request)
    {
         if ($request->isXmlHttpRequest()) {
             
         
        
         $repository = $this->getDoctrine()->getRepository('racineGestionUtilisateurBundle:Utilisateur');
         
         $users = $repository->selectUsers();
         
        
         
                  $secho="1";
		 $iTotalRecords = \count($users);
		 $iTotalDisplayRecords = $iTotalRecords ;
	 
		 $js = "{\"secho\": ";
		 $js .= $secho.",\n";
		 $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
		 $js .= "\"iTotalDisplayRecords\": \"";
		 $js .= $iTotalDisplayRecords."\",\n";
		 $js .= "\"aaData\": [\n";
		// $jsar = array();
                foreach ($users as $row) {
                      $js.='[';
                   foreach ($row as $attributes)
                    {
                        $js.='"'.$attributes.'",';
                    }
                       
                     $jslen = \strlen($js);
                     $js[$jslen - 1]=']';
                     $js.=',';
                     
                                           }
                
               
		 $jslen = \strlen($js);
		 $js[$jslen - 1]="]";
		 
		 $js .="}";
         
                 
        return new response($js);
         }
        
        return $this->render('racineGestionUtilisateurBundle:lister:lister.html.twig');
        
    }
    
    
    public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
       
            $user = new Utilisateur();
            
            $user.setNom($request->get('nom',''));
            $user.setPrenom($request->get('prenom',''));
            $user.setGsm($request->get('gsm',''));
            $user.setMail($request->get('mail',''));
            $user.setGrade($request->get('grade',''));
            $user.setLogin($request->get('login',''));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
        }
            
        
       
        return new response('Success');
        
        
    }
    
    
}
?>