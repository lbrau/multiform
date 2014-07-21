<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin_dash")
     * @Template()
     */
    public function indexAction()
    {
       var_dump("coucou");
       
       phpinfo();
        return array('name' => "");
    }
    
    /**
     * @Route("/toto", name="user_login")
     * @Template()
     */
    public function totoAction()
    {
        return array('name' => "");
    }
    
    
    
    
}
