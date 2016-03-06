<?php

namespace PIBundle\Controller;
use PIBundle\Entity\Housing;
use PIBundle\Entity\Demand;
use PIBundle\Entity\SearchHousing;
use PIBundle\Form\HousingType;
use PIBundle\Form\DemandType;
use PIBundle\Form\SearchHousingType;
use PIBundle\Repository\SearchHousingRepository;
use PIBundle\Entity\User;
use PIBundle\Form\UserRepository;
use PIBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

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
        $housing ->setAttribution("Non");
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

    public function demandeurAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(RegistrationType::class,$user);
        $liste_demandeur = 'vide';
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($user);
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $liste_demandeur = $em->getRepository('PIBundle:User')->findDemandeur($firstName, $lastName, $email);
            return $this->render('PIBundle:Admin:demandeur.html.twig', array('form' => $form->createView(), 'liste_demandeur' => $liste_demandeur ));
        }
        return $this->render('PIBundle:Admin:demandeur.html.twig', array('form' => $form->createView(), 'liste_demandeur' => $liste_demandeur ));
    }

    public function ajouter_demandeurAction(Request $request){
        $user= new User();
        $form = $this->createForm(RegistrationType::class,$user); 
        $user ->setUsername("NULL");
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->render('PIBundle:Admin:ajouter_demandeur.html.twig', array('form' => $form->createView()));
        }
        return $this->render('PIBundle:Admin:ajouter_demandeur.html.twig', array('form' => $form->createView()));
    }

    public function modifier_demandeurAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PIBundle:User')->find($id);
        $form = $this->createForm(RegistrationType::class,$user);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->render('PIBundle:Admin:modifier_demandeur.html.twig', array('form' => $form->createView(), 'user' => $user));
        }
        return $this->render('PIBundle:Admin:modifier_demandeur.html.twig', array('form' => $form->createView(), 'user' => $user));
    }

    public function ajouter_demandeAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PIBundle:User')->find($id);
        $demand= new Demand();
        $form = $this->createForm(DemandType::class,$demand);
        if ($form->handleRequest($request)->isValid()) {
            $demand ->setViewed("Non")
                ->setConfirmed("Non")
                ->setArchived("Non")
                ->setWrong("Non")
                ->setDateAttribution(new \DateTime("0000-00-00 00:00:00"))
                ->setDateArchivage(new \DateTime("0000-00-00 00:00:00"))
                ->setIdAppartment('0')
                ->setIdUser($user->getId())
                ->setDateCreation(new \DateTime());
            $em->persist($demand);
            $em->flush();
            return $this->render('PIBundle:Admin:ajouter_demande.html.twig', array('form' => $form->createView(), 'user' => $user, 'demand' => $demand));
        }
        return $this->render('PIBundle:Admin:ajouter_demande.html.twig', array('form' => $form->createView(), 'user' => $user, 'demand' => $demand));
    }

}
