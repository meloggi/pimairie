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
        $em = $this->getDoctrine()->getManager();
        $housing= new Housing();
        $form = $this->createForm(HousingType::class,$housing); 

        return $this->render('PIBundle:Default:form1.html.twig', array('form' => $form->createView()));
    }


}
