<?php

namespace LS\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('LSPlatformBundle:Admin:index.html.twig');
    }

    public function dashboardAction()
    {
        return $this->render('LSPlatformBundle:Admin:dashboard.html.twig');
    }
}
