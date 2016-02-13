<?php

namespace LS\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LSPlatformBundle:Default:index.html.twig');
    }
}
