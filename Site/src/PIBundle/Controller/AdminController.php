<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('PIBundle:Admin:index.html.twig');
    }

    public function dashboardAction()
    {
        return $this->render('PIBundle:Admin:dashboard.html.twig');
    }
}
