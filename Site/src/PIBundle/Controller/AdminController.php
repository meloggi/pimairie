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
        $em = $this->getDoctrine()->getManager();
        $list_demand_new = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Non", 'wrong' => "Non", 'archived' =>"Non"));
        $list_demand_wrong = $em->getRepository('PIBundle:Demand')->findBy(array('wrong' => "Oui", 'archived' => "Non"));
        $list_demand_expired = $em->getRepository('PIBundle:Demand')->findBy(array('archived' => "Non"));
        $list_demand_free = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Oui", 'archived' =>"Non"));
        $date = new \DateTime();
        $interval = new \DateInterval('P11M');
        $date->sub($interval);
        return $this->render('PIBundle:Admin:dashboard.html.twig', array('list_demand_new' => $list_demand_new, 'list_demand_free' => $list_demand_free, 'list_demand_wrong' => $list_demand_wrong, 'list_demand_expired' => $list_demand_expired, 'date' => $date));
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
        $housing ->setIdDemand('0');
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

    public function etat_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $list_demand_current = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Non"));
        $list_demand = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Oui"));
        $date_zero = new \DateTime('0000-00-00 00:00');
        return $this->render('PIBundle:Admin:etat_demande.html.twig', array('list_demand_current' => $list_demand_current, 'list_demand' => $list_demand, 'id' => $id, 'date_zero' => $date_zero));
    }

    public function affichage_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        $demand_current->setViewed("Oui");
        $em->persist($demand_current);
        $em->flush();
        return $this->render('PIBundle:Admin:affichage_demande.html.twig', array('demand_current' => $demand_current, 'id' => $id));
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
            return $this->render('PIBundle:Admin:valider_demande.html.twig', array('form' => $form->createView(), 'user' => $user, 'demand' => $demand));
        }
        return $this->render('PIBundle:Admin:ajouter_demande.html.twig', array('form' => $form->createView(), 'user' => $user, 'demand' => $demand));
    }

    public function valider_demandeAction(){
        return $this->render('PIBundle:Admin:valider_demande.html.twig');
    }

    public function confirmer_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        $demand_current->setConfirmed("Oui");
        $demand_current->setWrong("Non");
        $em->persist($demand_current);
        $em->flush();
        return $this->render('PIBundle:Admin:confirmer_demande.html.twig');
    }

    public function archiver_demandeAction($id){
    $em = $this->getDoctrine()->getManager();
    $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
    $demand_current->setArchived("Oui");
    $demand_current->setConfirmed("Oui");
    $demand_current->setWrong("Non");
    $em->persist($demand_current);
    $em->flush();
    return $this->render('PIBundle:Admin:archiver_demande.html.twig');
    }

    public function refuser_demandeAction($id){
    $em = $this->getDoctrine()->getManager();
    $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
    $demand_current->setWrong("Oui");
    $demand_current->setConfirmed("Non");
    $em->persist($demand_current);
    $em->flush();
    return $this->render('PIBundle:Admin:refuser_demande.html.twig');
    }

    public function modifier_demandeAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $form = $this->createForm(DemandType::class,$demand);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $demand->setWrong("Non");
            $em->persist($demand);
            $em->flush();
            return $this->render('PIBundle:Admin:modifier_demande.html.twig', array('form' => $form->createView(), 'demand' => $demand));
        }
        return $this->render('PIBundle:Admin:modifier_demande.html.twig', array('form' => $form->createView(), 'demand' => $demand));
    }

    public function attribution_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $list_appartment_free = $em->getRepository('PIBundle:Housing')->findBy(array('attribution' => "Non"));
        return $this->render('PIBundle:Admin:attribution_demande.html.twig', array('demand' => $demand, 'list_appartment_free' => $list_appartment_free));
    }

    public function attribuer_demandeAction($id, $idappart){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        return $this->render('PIBundle:Admin:attribuer_demande.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    public function valider_attribution_demandeAction($id, $idappart){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        $demand->setIdAppartment($idappart);
        $demand->setArchived("Oui");
        $demand->setDateAttribution(new \DateTime());
        $appartment ->setAttribution("Oui");
        $appartment ->setIdDemand($id);
        $em->persist($demand, $appartment);
        $em->flush();
        return $this->render('PIBundle:Admin:valider_attribution_demande.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    public function attribution_logementAction($id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $type = $appartment ->getType();
        $type_inf = "F1";
        $type_sup = "F1";
        if ($type == "F1"){
            $type_inf = "F1 bis";
            $type_sup = "F2";
        }elseif ($type == "F2"){
            $type_inf = "F1";
            $type_sup = "F3";
        }elseif ($type == "F3"){
            $type_inf = "F2";
            $type_sup = "F4";
        }elseif ($type == "F4"){
            $type_inf = "F3";
            $type_sup = "F5";
        }elseif ($type == "F5"){
            $type_inf = "F4";
            $type_sup = "F6";
        }elseif ($type == "F6"){
            $type_inf = "F5";
            $type_sup = "F5";
        }elseif ($type == "F1 bis"){
            $type_inf = "F1";
            $type_sup = "F2";
        }
        $list_demand = $em->getRepository('PIBundle:Demand')->findBy(array('archived' => "Non", 'confirmed' => "Oui"));
        return $this->render('PIBundle:Admin:attribution_logement.html.twig', array('appartment' => $appartment, 'list_demand' => $list_demand, 'type_inf' => $type_inf, 'type_sup' => $type_sup));
    }

    public function attribuer_logementAction($id, $iddemand){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        return $this->render('PIBundle:Admin:attribuer_logement.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    public function valider_attribution_logementAction($id, $iddemand){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $demand->setIdAppartment($id);
        $demand->setArchived("Oui");
        $demand->setDateAttribution(new \DateTime());
        $appartment ->setAttribution("Oui");
        $appartment ->setIdDemand($iddemand);
        $em->persist($demand, $appartment);
        $em->flush();
        return $this->render('PIBundle:Admin:valider_attribution_logement.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    public function archiveAction(Request $request){
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
            return $this->render('PIBundle:Admin:archive.html.twig', array('form' => $form->createView(), 'liste_demandeur' => $liste_demandeur ));
        }
        return $this->render('PIBundle:Admin:archive.html.twig', array('form' => $form->createView(), 'liste_demandeur' => $liste_demandeur ));
    }

    public function affichage_archiveAction($id){
        $em = $this->getDoctrine()->getManager();
        $list_demand_archived = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Oui"));
        return $this->render('PIBundle:Admin:affichage_archive.html.twig', array('list_demand_archived' => $list_demand_archived ));
    }

    public function affichage_logement_archiveAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $idappart = $demand -> getIdAppartment();
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        $date_zero = new \DateTime('0000-00-00 00:00');
        return $this->render('PIBundle:Admin:affichage_logement_archive.html.twig', array('appartment' => $appartment, 'demand' => $demand, 'date_zero' => $date_zero));
    }

    public function liberer_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $idappart = $demand -> getIdAppartment();
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        $appartment ->setAttribution("Non");
        $appartment ->setIdDemand('0');
        $demand ->setDateArchivage(new \DateTime());
        $em->persist($appartment, $demand);
        $em->flush();
        return $this->render('PIBundle:Admin:liberer_demande.html.twig', array('demand' => $demand));
    }

    public function liberer_logementAction($id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $iddemand = $appartment ->getIdDemand();
        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
        $appartment ->setAttribution("Non");
        $appartment ->setIdDemand('0');
        $demand ->setDateArchivage(new \DateTime());
        $em->persist($appartment, $demand);
        $em->flush();
        return $this->render('PIBundle:Admin:liberer_logement.html.twig', array('appartment' => $appartment));
    }

    public function afficher_locataireAction($id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $iddemand = $appartment ->getIdDemand();
        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
        return $this->render('PIBundle:Admin:afficher_locataire.html.twig', array('demand' => $demand, 'id' => $id));
    }

    public function delete_demandAction($id, $iduser){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);  
        $list_appartment = $em->getRepository('PIBundle:Housing')->findBy(array('idDemand' => $id));
        foreach ($list_appartment as $appartment) {
            $appartment->setIdDemand('0');
            $appartment->setAttribution("Non");
            $em->persist($appartment);
        }
        $em->remove($demand);
        $em->flush();
        $list_demand_archived = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $iduser, 'archived' => "Oui"));
        return $this->render('PIBundle:Admin:affichage_archive.html.twig', array('list_demand_archived' => $list_demand_archived ));
    }

    public function delete_appartmentAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $attribution = $appartment ->getAttribution();
        $iddemand = $appartment ->getIdDemand();
            if ($attribution == "Oui"){
                $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
                $demand ->setDateAttribution(new \DateTime("0000-00-00 00:00:00"));
                $demand ->setIdAppartment('0');
                $em->persist($demand);
            }
        $em->remove($appartment);
        $em->flush();

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

    public function delete_userAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PIBundle:User')->find($id);
        $list_demand = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id));
        foreach ($list_demand as $demand){
            $date_archivage = $demand ->getDateArchivage();
            $date_zero = new \DateTime('0000-00-00 00:00');
            if ($date_archivage == $date_zero){
                $idappart = $demand ->getIdAppartment();
                $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
                if ($appartment){
                    $appartment->setIdDemand('0');
                    $appartment->setAttribution("Non");
                    $em->persist($appartment);
                }
            }
        }
        foreach ($list_demand as $demand){
            $em->remove($demand);
        }
        $em->remove($user);
        $em->flush();

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

    public function statistiquesAction(){
        $em = $this->getDoctrine()->getManager();
        $list_appartment_free = $em->getRepository('PIBundle:Housing')->findBy(array('attribution' => "Non"));
        $list_appartment_occuped = $em->getRepository('PIBundle:Housing')->findBy(array('attribution' => "Oui"));
        $list_appartment_total = $em->getRepository('PIBundle:Housing')->findAll();
        $list_appartment_f1 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1"));
        $list_appartment_f1bis = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1 bis"));
        $list_appartment_f2 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F2"));
        $list_appartment_f3 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F3"));
        $list_appartment_f4 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F4"));
        $list_appartment_f5 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F5"));
        $list_appartment_f6 = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F6"));
        $list_appartment_contingent = $em->getRepository('PIBundle:Housing')->findBy(array('contingent' => "Oui"));
        $list_appartment_noncontingent = $em->getRepository('PIBundle:Housing')->findBy(array('contingent' => "Non"));
        return $this->render('PIBundle:Admin:statistiques.html.twig', array('list_appartment_free' => $list_appartment_free, 'list_appartment_contingent' => $list_appartment_contingent, 'list_appartment_noncontingent' => $list_appartment_noncontingent, 'list_appartment_occuped' => $list_appartment_occuped, 'list_appartment_total' => $list_appartment_total, 'list_appartment_f1' => $list_appartment_f1, 'list_appartment_f1bis' => $list_appartment_f1bis, 'list_appartment_f2' => $list_appartment_f2, 'list_appartment_f3' => $list_appartment_f3, 'list_appartment_f4' => $list_appartment_f4, 'list_appartment_f5' => $list_appartment_f5, 'list_appartment_f6' => $list_appartment_f6 ));
    }



}
