<?php

namespace PIBundle\Controller;
use PIBundle\Entity\Housing;
use PIBundle\Entity\SearchHousing;
use PIBundle\Form\HousingType;
use PIBundle\Form\SearchHousingType;
use PIBundle\Repository\SearchHousingRepository;
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

    public function appartmentAction(Request $request)
    {
        $search = new SearchHousing();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(SearchHousingType::class,$search);
        $liste_appartment = 'vide';
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($search);
            $location = $search->getLocation();
            $bailleur = $search->getBailleur();
            $adress = $search->getAdress();
            $residence = $search->getResidence();
            $type = $search->getType();
            $rentmin = $search->getRentmin();
            $rentmax = $search->getRentmax();
            $floor = $search->getFloor();
            $numero = $search->getNumero();
            $contingent = $search->getContingent();
            $attribution = $search->getAttribution();
            $liste_appartment = $em->getRepository('PIBundle:Housing')->findAppartment($location, $bailleur, $adress, $residence, $type, $rentmin, $rentmax, $floor, $numero, $contingent, $attribution);
            return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $liste_appartment ));
        }
        return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $liste_appartment ));
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
            return $this->render('PIBundle:Admin:ajouter_appartment.html.twig', array('form' => $form->createView()));
        }
        return $this->render('PIBundle:Admin:ajouter_appartment.html.twig', array('form' => $form->createView()));
    }

    public function modifier_appartmentAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $housing = $em->getRepository('PIBundle:Housing')->find($id);
        $form = $this->createForm(HousingType::class,$housing);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($housing);
            $em->flush();
            return $this->render('PIBundle:Admin:modifier_appartment.html.twig', array('form' => $form->createView(), 'housing' => $housing));
        }
        return $this->render('PIBundle:Admin:modifier_appartment.html.twig', array('form' => $form->createView(), 'housing' => $housing));
    }
}
