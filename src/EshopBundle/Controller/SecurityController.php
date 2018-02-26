<?php

namespace EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
}
