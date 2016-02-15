<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        return $this->render('PIBundle:Default:accueil.html.twig');
    }
}
