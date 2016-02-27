<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PIBundle\Entity\Housing;
use PIBundle\Form\HousingType;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        return $this->render('PIBundle:Default:accueil2.html.twig');
    }

    public function form1Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $form = $this->createForm(new HousingType()); 

        return $this->render('PIBundle:Default:form1.html.twig', array('form' => $form->createView()));
    }


}
