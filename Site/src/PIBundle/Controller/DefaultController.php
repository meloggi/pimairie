<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PIBundle\Entity\Housing;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        return $this->render('PIBundle:Default:accueil2.html.twig');
    }
}
