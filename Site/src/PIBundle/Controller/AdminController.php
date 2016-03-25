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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
*@Auteurs: Paul Le Noac'h, Komel Jamal, Brian Blessou
*@Mail: brian.blessou@telecomnancy.net
*@Version: PHP5
*Cette classe permet de rediriger les bonnes pages Html/Twig en fonction de l'URL
*/
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('PIBundle:Admin:index.html.twig');
    }

    /*
    *La fonction dashboardAction permet de renvoyer la page dashboard.html.twig avec la liste des 
    *demandes éronnées, nouvelles, expirées et non attribuées.
    *Les demandes sont classées en fonction de la date de saisie du formulaire
    */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list_demand_new = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Non", 'wrong' => "Non", 'archived' =>"Non"));
        $list_demand_wrong = $em->getRepository('PIBundle:Demand')->findBy(array('wrong' => "Oui", 'archived' => "Non"));
        $list_demand_expired = $em->getRepository('PIBundle:Demand')->findBy(array('archived' => "Non"));
        $list_demand_free = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Oui", 'archived' =>"Non"));
        $list_demand_not_viewed = $em->getRepository('PIBundle:Demand')->findBy(array('viewed' => "Non"));
        $date = new \DateTime();
        $interval = new \DateInterval('P11M');
        $date->sub($interval);
        return $this->render('PIBundle:Admin:dashboard.html.twig', array('list_demand_new' => $list_demand_new, 'list_demand_not_viewed' => $list_demand_not_viewed, 'list_demand_free' => $list_demand_free, 'list_demand_wrong' => $list_demand_wrong, 'list_demand_expired' => $list_demand_expired, 'date' => $date));
    }

   /*
    *La fonction appartmentAction permet de récupérer les champs du filtre afin de rechercher la bonne liste d'appartement
    */

     /**
     * Liste l'ensemble des articles triés par date de publication pour une page donnée.
     *
     * @Route("/admin/appartment/{page}", requirements={"page" = "\d+"}, name="platform_admin_appartment")
     * @Method("GET")
     * @Template("PIBundle:Admin:appartment.html.twig")
     *
     * @param int $page Le numéro de la page
     *
     * @return array
     */


    public function appartmentAction(Request $request, $page)

    {

 $session = $request->getSession();
        $search = new SearchHousing();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(SearchHousingType::class,$search);
        $liste_appartment = 'vide';
        $liste_appartment2 = 'vide';
        
    if($page==0){
            $page=1;
      $pagination = array(
                    'page' => $page,
                    'nbPages' => 0,
                    'nomRoute' => 'platform_admin_appartment',
                    'paramsRoute' => array()
                );
     
        $session->set('liste_appartment2',$liste_appartment2);
   return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $liste_appartment, 'pagination' => $pagination ));
  }

        if ($form->handleRequest($request)->isValid()) {


             if($page!=0){
            $page=1;

        }
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
                $liste_appartment = $em->getRepository('PIBundle:Housing')->findAppartementPagine($location, $bailleur, $adress, $residence, $type, $rentmin, $rentmax, $floor, $numero, $contingent, $attribution, $page, 5);
           $liste_appartment2 = $em->getRepository('PIBundle:Housing')->findAppartment($location, $bailleur, $adress, $residence, $type, $rentmin, $rentmax, $floor, $numero, $contingent, $attribution);
                     

    $pagination = array(
                    'page' => $page,
                    'nbPages' => ceil(count($liste_appartment) / 5),
                    'nomRoute' => 'platform_admin_appartment',
                    'paramsRoute' => array()
                );


   $session = $request->getSession();

                $session->set('last_request', [
                        'location'=>  $location ,
                        'bailleur' => $bailleur,
                        'adress' => $adress,
                        'residence' => $residence,
                        'type' => $type,
                        'rentmin' => $rentmin,
                        'rentmax' => $rentmax,
                        'floor' => $floor,
                        'numero' => $numero,
                        'contingent' => $contingent,
                        'attribution' => $attribution,
                       
                    ]);

               
           

        $session->set('liste_appartment2',$liste_appartment2);
        return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $liste_appartment, 'pagination' => $pagination ));

             
            }

        else{
                $session = $request->getSession();

                $location = $session->get('last_request')['location'];
                $bailleur = $session->get('last_request')['bailleur'];
                $adress = $session->get('last_request')['adress'];
                $residence = $session->get('last_request')['residence'];
                $type = $session->get('last_request')['type'];
                $rentmin = $session->get('last_request')['rentmin'];
                $rentmax = $session->get('last_request')['rentmax'];
                $floor = $session->get('last_request')['floor'];
                $numero = $session->get('last_request')['numero'];
                $contingent = $session->get('last_request')['contingent'];
                $attribution = $session->get('last_request')['attribution'];
              $liste_appartment = $em->getRepository('PIBundle:Housing')->findAppartementPagine($location, $bailleur, $adress, $residence, $type, $rentmin, $rentmax, $floor, $numero, $contingent, $attribution, $page, 5);
                 $liste_appartment2 = $em->getRepository('PIBundle:Housing')->findAppartment($location, $bailleur, $adress, $residence, $type, $rentmin, $rentmax, $floor, $numero, $contingent, $attribution);
              
        
 $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($liste_appartment) / 5),
            'nomRoute' => 'platform_admin_appartment',
            'paramsRoute' => array()
        );
     
     
     $session->set('liste_appartment2',$liste_appartment2);
        return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $liste_appartment, 'pagination' => $pagination ));
    }
    }

function exportCSVAction(Request $request)
{
     $input_array=  $request->getSession()->get('liste_appartment2');
$output_file_name="Appartements.csv"; 
    $delimiter=',';
       $search = new SearchHousing();
    $form = $this->createForm(SearchHousingType::class,$search);
   

    $pagination = array(
            'page' => 1,
            'nbPages' => ceil(count($input_array) / 5),
            'nomRoute' => 'platform_admin_appartment',
            'paramsRoute' => array()
        );

    /** open raw memory as file, no need for temp files, be careful not to run out of memory thought */
    $f = fopen('php://memory', 'w');
    /** loop through array  */
    foreach ($input_array as $line) {
        /** default php csv handler **/
        fputcsv($f, $line, $delimiter);
    }
    /** rewrind the "file" with the csv lines **/
    fseek($f, 0);
    /** modify header to be downloadable csv file **/
    header('Content-Type: application/csv');
    header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
    /** Send file to browser for download */
    fpassthru($f);
    fclose($f);
    exit;
    
      return $this->render('PIBundle:Admin:appartment.html.twig', array('form' => $form->createView(), 'liste_appartment' => $input_array, 'pagination' => $pagination ));
  }


    /*
    *La fonction ajouter_appartmentAction permet d'ajouter un nouvel appartement
    *Cette fonction envoie les attributs de l'entité "Housing" à la page ajouter_appartment.html.twig
    */
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

    /*
    *La fonction modifier_appartmentAction permet de modifier un appartement
    *Cette fonction envoie les attributs de l'appartement à modifier à la page ajouter_appartment.html.twig
    */
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

    /*
    *La fonction demandeurAction permet de récupérer les champs du filtre afin de rechercher la bonne liste de demandeurs
    */
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

    /*
    *La fonction ajouter_demandeurAction permet d'ajouter un nouvel demandeur
    *Cette fonction envoie les attributs de l'entité "User" à la page ajouter_demandeur.html.twig
    */
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

    /*
    *La fonction modifier_demandeurAction permet de modifier un demandeur
    *Cette fonction envoie les attributs du demandeur à modifier à la page modifier_demandeur.html.twig
    */
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

    /*
    *Cette fonction renvoie l'état de la demande, c'est à dire si la demande est confirmée, éronnée, expirée
    *non attribuée
    */
    public function etat_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $list_demand_current = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Non"));
        $list_demand = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Oui"));
        $date_zero = new \DateTime('0000-00-00 00:00');
        return $this->render('PIBundle:Admin:etat_demande.html.twig', array('list_demand_current' => $list_demand_current, 'list_demand' => $list_demand, 'id' => $id, 'date_zero' => $date_zero));
    }

    /*
    *Cette fonction permet d'afficher les informations de la demande saisie par un demandeur
    *A partir de ces informations l'administrateur pourra confirmer, modifier, supprimer la demande
    */
    public function affichage_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        $demand_current->setViewed("Oui");
        $em->persist($demand_current);
        $em->flush();
        return $this->render('PIBundle:Admin:affichage_demande.html.twig', array('demand_current' => $demand_current, 'id' => $id));
    }

    /*
    *Cette fonction permet d'ajouter une demande à un demandeur
    */
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

    /*
    *Cette fonction permet de valider la demande lorsuqe vous cliquez sur le bouton valider des demandes en cours
    */
    public function valider_demandeAction(){
        return $this->render('PIBundle:Admin:valider_demande.html.twig');
    }

    /*
    *Cette fonction permet de confirmer la demande lorsuqe vous la consultez
    *Une demande doit être confirmé avant d'être attribuée
    */
    public function confirmer_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        $demand_current->setConfirmed("Oui");
        $demand_current->setWrong("Non");
        $em->persist($demand_current);
        $em->flush();
        return $this->render('PIBundle:Admin:confirmer_demande.html.twig');
    }

    /*
    *Cette fonction va vous permettre d'archiver la demande depuis l'onglet Demandeur
    */
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
    /*
    *Cette fonction va vous permettre de refuser la demande depuis l'onglet Demandeur
    */
    public function refuser_demandeAction($id){
    $em = $this->getDoctrine()->getManager();
    $demand_current = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
    $demand_current->setWrong("Oui");
    $demand_current->setConfirmed("Non");
    $em->persist($demand_current);
    $em->flush();
    return $this->render('PIBundle:Admin:refuser_demande.html.twig');
    }

    /*
    *Cette fonction va vous permettre de modifier la demande depuis l'onglet Demandeur
    */
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

    /*
    *Cette fonction va vous permettre de consulter l'attribution depuis l'onglet Demandeur
    */
    public function attribution_demandeAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $list_appartment_free = $em->getRepository('PIBundle:Housing')->findBy(array('attribution' => "Non"));
        return $this->render('PIBundle:Admin:attribution_demande.html.twig', array('demand' => $demand, 'list_appartment_free' => $list_appartment_free));
    }

    /*
    *Cette fonction va vous permettre d'attribuer la demande depuis l'onglet Demandeur
    */
    public function attribuer_demandeAction($id, $idappart){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        return $this->render('PIBundle:Admin:attribuer_demande.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    /*
    *Cette fonction va vous permettre de valider l'attribution depuis l'onglet Demandeur
    */
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

    /*
    *Cette fonction va vous permettre de comparer un appartement à plusiurs demandeurs
    *Les demandeurs sont sélectionné en fonction du type d'appartement qu'il souhaite.
    *En effet seul les demandeurs qui coorrspondront à la typologie de l'appartement, ou
    *à la typologie de l'appartement + 1 ou à la typologie de l'appartement -1 seront sélectionnés
    */
    public function attribution_logementAction($id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $type = $appartment ->getType();
        $type_inf = "T1";
        $type_sup = "T1";
        if ($type == "T1"){
            $type_inf = "T1 bis";
            $type_sup = "T2";
        }elseif ($type == "T2"){
            $type_inf = "T1";
            $type_sup = "T3";
        }elseif ($type == "T3"){
            $type_inf = "T2";
            $type_sup = "T4";
        }elseif ($type == "T4"){
            $type_inf = "T3";
            $type_sup = "T5";
        }elseif ($type == "T5"){
            $type_inf = "T4";
            $type_sup = "T6";
        }elseif ($type == "T6"){
            $type_inf = "T5";
            $type_sup = "T5";
        }elseif ($type == "T1 bis"){
            $type_inf = "T1";
            $type_sup = "T2";
        }
        
        $list_demand = $em->getRepository('PIBundle:Demand')->findBy(array('archived' => "Non", 'confirmed' => "Oui"));
        return $this->render('PIBundle:Admin:attribution_logement.html.twig', array('appartment' => $appartment, 'list_demand' => $list_demand, 'type_inf' => $type_inf, 'type_sup' => $type_sup));
    }

    /*
    *Cette fonction permet d'attribuer un demandeur à un appartement précédemment sélectionné pour l'onglet appartement
    */
    public function attribuer_logementAction($id, $iddemand){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        return $this->render('PIBundle:Admin:attribuer_logement.html.twig', array('demand' => $demand, 'appartment' => $appartment));
    }

    /*
    *Cette fonction permet de valider l'attribution d'un demandeur à un appartement pour l'onglet Appartement
    */
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

    /*
    *Cette fonction permet d'archiver une demande d'un demandeur
    */
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

    /*
    *Cette fonction permet d'afficher la liste des demandes archivées en fonctiond d'un filtre précédemment rempli
    */
    public function affichage_archiveAction($id){
        $em = $this->getDoctrine()->getManager();
        $list_demand_archived = $em->getRepository('PIBundle:Demand')->findBy(array('idUser' => $id, 'archived' => "Oui"));
        return $this->render('PIBundle:Admin:affichage_archive.html.twig', array('list_demand_archived' => $list_demand_archived ));
    }

    /*
    *Cette fonction permet d'afficher le logement attribué à un demandeur lorsque la demande a été archivée
    */
    public function affichage_logement_archiveAction($id){
        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('PIBundle:Demand')->find($id);
        $idappart = $demand -> getIdAppartment();
        $appartment = $em->getRepository('PIBundle:Housing')->find($idappart);
        $date_zero = new \DateTime('0000-00-00 00:00');
        return $this->render('PIBundle:Admin:affichage_logement_archive.html.twig', array('appartment' => $appartment, 'demand' => $demand, 'date_zero' => $date_zero));
    }

    /*
    *Cette fonction permet de libérer un appartement à une demande depuis l'onglet Demandeur
    */
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

    /*
    *Cette fonction permet de libérer un appartement à une demande depuis l'onglet Appartement
    */
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

    /*
    *Cette fonction permet d'afficher les informations d'un locataire lorsque celu-ci a été attribué
    *à un appartement
    */
    public function afficher_locataireAction($id){
        $em = $this->getDoctrine()->getManager();
        $appartment = $em->getRepository('PIBundle:Housing')->find($id);
        $iddemand = $appartment ->getIdDemand();

        $demand = $em->getRepository('PIBundle:Demand')->find($iddemand);
         print_r($demand, true);
        return $this->render('PIBundle:Admin:afficher_locataire.html.twig', array('demand' => $demand, 'id' => $id));
    }

    /*
    *Lorsque la demande est archivée celle-ci peut être supprimer, cette fonction permet de réaliser cette action
    */
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

    /*
    *Cette fonction permet de supprimer un appartement 
    */
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

    /*
    *Cettefonction permet de supprimer un utilisateur
    */
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

    /*
    *Cette fonction permet de consulter les statistiques présentes sur l'onglet Statistique
    */
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
        $list_appartment_f1_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1", 'attribution' => "Non"));
        $list_appartment_f1bis_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1 bis", 'attribution' => "Non"));
        $list_appartment_f2_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F2", 'attribution' => "Non"));
        $list_appartment_f3_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F3", 'attribution' => "Non"));
        $list_appartment_f4_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F4", 'attribution' => "Non"));
        $list_appartment_f5_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F5", 'attribution' => "Non"));
        $list_appartment_f6_free = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F6", 'attribution' => "Non"));
        $list_appartment_f1_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1", 'attribution' => "Oui"));
        $list_appartment_f1bis_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F1 bis", 'attribution' => "Oui"));
        $list_appartment_f2_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F2", 'attribution' => "Oui"));
        $list_appartment_f3_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F3", 'attribution' => "Oui"));
        $list_appartment_f4_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F4", 'attribution' => "Oui"));
        $list_appartment_f5_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F5", 'attribution' => "Oui"));
        $list_appartment_f6_taken = $em->getRepository('PIBundle:Housing')->findBy(array('type' => "F6", 'attribution' => "Oui"));
        $list_appartment_contingent = $em->getRepository('PIBundle:Housing')->findBy(array('contingent' => "Oui"));
        $list_appartment_noncontingent = $em->getRepository('PIBundle:Housing')->findBy(array('contingent' => "Non"));
        $list_demand_f1_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F1", 'idAppartment' => "0"));
        $list_demand_f1_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F1", 'idAppartment' => "0"));
        $list_demand_f1bis_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F1 bis", 'idAppartment' => "0"));
        $list_demand_f1bis_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F1 bis", 'idAppartment' => "0"));
        $list_demand_f2_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F2", 'idAppartment' => "0"));
        $list_demand_f2_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F2", 'idAppartment' => "0"));
        $list_demand_f3_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F3", 'idAppartment' => "0"));
        $list_demand_f3_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F3", 'idAppartment' => "0"));
        $list_demand_f4_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F4", 'idAppartment' => "0"));
        $list_demand_f4_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F4", 'idAppartment' => "0"));
        $list_demand_f5_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F5", 'idAppartment' => "0"));
        $list_demand_f5_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F5", 'idAppartment' => "0"));
        $list_demand_f6_type1 = $em->getRepository('PIBundle:Demand')->findBy(array('type1' => "F6", 'idAppartment' => "0"));
        $list_demand_f6_type2 = $em->getRepository('PIBundle:Demand')->findBy(array('type2' => "F6", 'idAppartment' => "0"));
        return $this->render('PIBundle:Admin:statistiques.html.twig', array('list_appartment_free' => $list_appartment_free, 'list_demand_f1_type1' => $list_demand_f1_type1, 'list_demand_f1_type2' => $list_demand_f1_type2, 'list_demand_f1bis_type1' => $list_demand_f1bis_type1, 'list_demand_f1bis_type2' => $list_demand_f1bis_type2, 'list_demand_f2_type1' => $list_demand_f2_type1, 'list_demand_f2_type2' => $list_demand_f2_type2, 'list_demand_f3_type1' => $list_demand_f3_type1, 'list_demand_f3_type2' => $list_demand_f3_type2, 'list_demand_f4_type1' => $list_demand_f4_type1, 'list_demand_f4_type2' => $list_demand_f4_type2,  'list_demand_f5_type1' => $list_demand_f5_type1, 'list_demand_f5_type2' => $list_demand_f5_type2, 'list_demand_f6_type1' => $list_demand_f6_type1, 'list_demand_f6_type2' => $list_demand_f6_type2,'list_appartment_contingent' => $list_appartment_contingent, 'list_appartment_noncontingent' => $list_appartment_noncontingent, 'list_appartment_occuped' => $list_appartment_occuped, 'list_appartment_total' => $list_appartment_total, 'list_appartment_f1' => $list_appartment_f1, 'list_appartment_f1bis' => $list_appartment_f1bis, 'list_appartment_f2' => $list_appartment_f2, 'list_appartment_f3' => $list_appartment_f3, 'list_appartment_f4' => $list_appartment_f4, 'list_appartment_f5' => $list_appartment_f5, 'list_appartment_f6' => $list_appartment_f6, 'list_appartment_f1_free' => $list_appartment_f1_free, 'list_appartment_f1bis_free' => $list_appartment_f1bis_free, 'list_appartment_f2_free' => $list_appartment_f2_free, 'list_appartment_f3_free' => $list_appartment_f3_free, 'list_appartment_f4_free' => $list_appartment_f4_free, 'list_appartment_f5_free' => $list_appartment_f5_free, 'list_appartment_f6_free' => $list_appartment_f6_free, 'list_appartment_f1_taken' => $list_appartment_f1_taken, 'list_appartment_f1bis_taken' => $list_appartment_f1bis_taken, 'list_appartment_f2_taken' => $list_appartment_f2_taken, 'list_appartment_f3_taken' => $list_appartment_f3_taken, 'list_appartment_f4_taken' => $list_appartment_f4_taken, 'list_appartment_f5_taken' => $list_appartment_f5_taken, 'list_appartment_f6_taken' => $list_appartment_f6_taken ));
    }



}
