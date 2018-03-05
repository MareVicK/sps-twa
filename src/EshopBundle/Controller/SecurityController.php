<?php

namespace EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use EshopBundle\Form\RegistrationType;
use EshopBundle\Entity\User;

class SecurityController extends Controller
{
    /**
      * @Route(path="/login", name="security_login")
      */ 
    public function loginAction()
    {
        $authentication_utils = $this->get("security.authentication_utils");
       $error = $authentication_utils->getLastAuthenticationError();
       $last_username = $authentication_utils->getLastUsername();
       
       return $this->render("@Eshop\security\login.html.twig", array(
           "error" => $error,
           "last_username" => $last_username
       ));
    }
    
    /**
     * @Route(path="/registration", name="security_registration")
     */
    public function registrationAction(Request $request)
    {
        $error = "";
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            try {
                $user->setRole(ROLE_USER);
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT, array("cost" => 12)));
                        
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                dump("Registrace proběhla úspěšně");
            } catch (Exception $ex){
                dump("Registrace se nezdařila");
                $error = "Registrace se nezdařila";
            }
        }
        
        return $this->render("@Eshop\security\registration.html.twig", array(
           "form" => $form->createView(),
           "error" => $error,
           "last_username" => ""
        ));
        
    }
}
