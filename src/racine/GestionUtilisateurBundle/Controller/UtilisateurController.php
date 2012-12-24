<?php

namespace racine\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use racine\GestionUtilisateurBundle\Entity\Utilisateur;
use racine\GestionUtilisateurBundle\Entity\UtilisateurRepository;
use racine\GestionUtilisateurBundle\Form\Type\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends Controller {

    public function IndexAction(request $request) {
        
        if ($request->isXmlHttpRequest()) {

            $repository = $this->getDoctrine()->getRepository('racineGestionUtilisateurBundle:Utilisateur');

            $users = $repository->selectUsers();



            $secho = "1";
            $iTotalRecords = \count($users);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($users as $row) {
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

        return $this->render('racineGestionUtilisateurBundle:Utilisateurs:GestionUtilisateurs.html.twig');
    }

    public function getRolesAction(request $request) {
        if ($request->isXmlHttpRequest()) {



            $repository = $this->getDoctrine()->getRepository('racineGestionUtilisateurBundle:Groupes');

            $roles = $repository->selectRoles();
            

            $secho = "1";
            $iTotalRecords = \count($roles);
            $iTotalDisplayRecords = $iTotalRecords;

            $js = "{\"secho\": ";
            $js .= $secho . ",\n";
            $js .= "\"iTotalRecords\": \"$iTotalRecords\",\n";
            $js .= "\"iTotalDisplayRecords\": \"";
            $js .= $iTotalDisplayRecords . "\",\n";
            $js .= "\"aaData\": [\n";
            // $jsar = array();
            foreach ($roles as $row) {
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

        return $this->render('racineGestionUtilisateurBundle:Utilisateurs:GestionUtilisateurs.html.twig');
    }

    
    
    
   public function AddAction(request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
            $user = new Utilisateur();
          
            $user->setNom($request->get('nom',''));
            $user->setPrenom($request->get('prenom',''));
            $user->setTel($request->get('tel',''));
            $user->setEmail($request->get('email',''));
            $user->setUsername($request->get('pseudo',''));
            $user->setPassword(sha1($request->get('password')));
            $user->setSalt("");
            $idGroup = $request->get('idrole');
            
            $em = $this->getDoctrine()->getManager();
           
            $group = $em->find('racineGestionUtilisateurBundle:Groupes', $idGroup);
            
            $user->getGroupes($group)->add($group);
           
            $em->persist($user);
            $em->flush();
            
             //Vérifier si la valeur idrole est bien assignée!!
            $idUser = $user->getId(); 
            
            
           
            
            
        }
        
        $content = array("status"=>"200","info"=>$idUser,"group"=>$group->getNom());
        $content = \json_encode($content);
        
        $resp = new Response();
        $resp->setStatusCode(200);
        $resp->setContent($content);
       
            
        
       
        return $resp;
        
        
    }

}

?>