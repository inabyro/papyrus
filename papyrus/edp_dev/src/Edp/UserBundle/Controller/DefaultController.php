<?php

namespace Edp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EdpUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
