<?php

namespace PIBundle\Controller;
use PIBundle\Entity\Housing;
use PIBundle\Form\HousingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function appartmentAction()
    {
        return $this->render('PIBundle:Admin:appartment.html.twig');
    }

    public function ajouter_appartmentAction(Request $request)
    {   
        $housing= new Housing();
        $housing ->setAttribution("false");
        /*$housing->setLocation("blabla")
                 ->setRent("8000")
                 ->setFloor("5");
        $em->persist($housing);
        $em->flush();
        */
        $form = $this->createForm(HousingType::class,$housing); 
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($housing);
            $em->flush();
            return $this->render('PIBundle:Admin:appartment.html.twig');
        }
        return $this->render('PIBundle:Admin:ajouter_appartment.html.twig', array('form' => $form->createView()));
    }

   /* public function post_appartmentAction($adresse, $type){
        $em = $this->getDoctrine()->getEntityManager();
        $logement = new Logement();
        $logement->setAdresse($adresse)
                 ->setType($type);
                 /*->setLoyer($loyer)
                 ->setEtage($etage)
                 ->setNumero($numero);*/
     /*   $em->persist($logement);
        $em->flush();
        return $this->render('PIBundle:Admin:appartment.html.twig');
    }*/
}
