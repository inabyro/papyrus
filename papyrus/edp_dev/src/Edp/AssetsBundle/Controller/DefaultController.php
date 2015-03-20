<?php

namespace Edp\AssetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EdpAssetsBundle:Default:index.html.twig', array('name' => $name));
    }
}
