<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PIBundle\Entity\Demand;
use PIBundle\Form\DemandType;
use PIBundle\Repository\DemandRepository;
use Symfony\Component\HttpFoundation\Request;

/*
*@Auteurs: Paul Le Noac'h, Komel Jamal, Brian Blessou
*@Mail: brian.blessou@telecomnancy.net
*@Version: PHP5
*Cette classe permet de rediriger les bonnes pages Html/Twig en fonction de l'URL
*/
class FormulaireController extends Controller
{
    /*
    *La fonction accueilAction permet d'afficher la page Accueil du site web.
    *Si l'utilisateur est un administrateur alors il sera redirigé vers la page d'accueil de l'administrateur,
    *dashboard.html.twig
    *Si l'utilisateur est un demandeur alors il sera redirigé vers la page d'accueil de la plateforme web, accueil.html.twig
    */
    public function accueilAction()
    { $token=$this->get('security.token_storage')->getToken();

    $roles = $token->getRoles();
        // On transforme le tableau d'instance en tableau simple
    $rolesTab = array_map(function($role){ 
      return $role->getRole(); 
  }, $roles);
        // S'il s'agit d'un admin ou d'un super admin on le redirige vers le backoffice
    if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true)){
     $em = $this->getDoctrine()->getManager();
     $list_demand_new = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Non", 'wrong' => "Non", 'archived' =>"Non"));
     $list_demand_wrong = $em->getRepository('PIBundle:Demand')->findBy(array('wrong' => "Oui", 'archived' => "Non"));
     $list_demand_expired = $em->getRepository('PIBundle:Demand')->findBy(array('archived' => "Non"));
     $list_demand_free = $em->getRepository('PIBundle:Demand')->findBy(array('confirmed' => "Oui", 'archived' =>"Non"));
     $date = new \DateTime();
     $interval = new \DateInterval('P11M');
     $date->sub($interval);
     $list_demand_not_viewed = $em->getRepository('PIBundle:Demand')->findBy(array('viewed' => "Non"));
     return $this->render('PIBundle:Admin:dashboard.html.twig', array('list_demand_new' => $list_demand_new, 'list_demand_not_viewed' => $list_demand_not_viewed, 'list_demand_free' => $list_demand_free, 'list_demand_wrong' => $list_demand_wrong, 'list_demand_expired' => $list_demand_expired, 'date' => $date));
 }
         // sinon il s'agit d'un membre
 else
   return $this->render('PIBundle:Formulaire:accueil.html.twig');
}

    /*
    *La fonction formulaire_introductionAction permet d'afficher la page de validation des conditions avant 
    *la complétion du formulaire.
    */
    public function formulaire_introductionAction()
    {
        $em = $this->getDoctrine()->getManager();

        //récupérer id de l'utilisateur connecté
        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        //récupérer l'utilisateur en fonction de son id
        $user = $em->getRepository('PIBundle:User')->find($id);

        //récupérer la demande de l'utilisateur
        $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        
        if($demand == null){
            return $this->render('PIBundle:Formulaire:formulaire_introduction.html.twig');
        }
        return $this->render('PIBundle:Formulaire:redirection_creer.html.twig');
    }

    /*
    *La fonction formulaire_creerDemandeAction permet de créer une demande pour un demandeur.
    */
    public function formulaire_creerDemandeAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        $user = $em->getRepository('PIBundle:User')->find($id);

        $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        
        $demand= new Demand();

        //Creation du formulaire en fonction de la demand
        $form = $this->createForm(DemandType::class,$demand); 

        if ($form->handleRequest($request)->isValid()) {
            //Cas où l'utilisateur valide le formulaire
            $em = $this->getDoctrine()->getManager();
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
            $this->envoiMail();

            //retourne la page accederDemande.html.twig avec comme paramètre l'objet demande afin d'avoir accès à tous ses attributs
            return $this->render('PIBundle:Formulaire:formulaire_accederDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand));
        }
        //rtourne le formulaire de création de demande si le formulaire n'est pas validé
        return $this->render('PIBundle:Formulaire:formulaire_creerDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand));
    }


    /*
    *La fonction formulaire_modifierDemandeAction permet de modifier la demande précédemment créee.
    *S'il y a une demande de créer alors l'utilisateur sera redirigé vers formulaire_modifierDemande
    *sinon il sera redirigé vers une autre page
    */
    public function formulaire_modifierDemandeAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        $user = $em->getRepository('PIBundle:User')->find($id);

        $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));



        $form = $this->createForm(DemandType::class,$demand); 
        if($demand != null){
            //Cas où il y a une demande de créer
            if ($form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($demand);
                $em->flush();
                $this->envoiMail();
                return $this->render('PIBundle:Formulaire:formulaire_accederDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand));

            }
            return $this->render('PIBundle:Formulaire:formulaire_modifierDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand));
        }

        return $this->render('PIBundle:Formulaire:contact.html.twig');
    }


    /*
    *La fonction contactAction permet d'afficher la page d'information de contact de la mairie.
    */
    public function contactAction()
    {
        return $this->render('PIBundle:Formulaire:contact.html.twig');
    }

    /*
    *La fonction redirection_accessAction permet d'afficher la page de redirection lorsque l'utiisateur
    * essaye d'accéder à sa demande sans en avoir créeé une au préalable.
    */
    public function redirection_accessAction()
    {
        return $this->render('PIBundle:Formulaire:redirection_access.html.twig');
    }

    /*
    *La fonction redirection_creerAction permet d'afficher la page de redirection lorsque l'utiisateur
    * essaye de créer une demande alors qu'il en déjà crée une.
    */
    public function redirection_creerAction()
    {
        return $this->render('PIBundle:Formulaire:redirection_creer.html.twig');
    }

    /*
    *Cette fonction permet d'afficher les informations saisies par le deandeur lors de la completion du
    *formulaire
    */
    public function formulaire_accederDemandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $iduser= $this->get('security.token_storage')->getToken()->getUser()->getId(); 

        $demand1 = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser'=>$iduser));

        $form = $this->createForm(DemandType::class,$demand1); 
        if($demand1 != null){
            if ($form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($demand1);
                $em->flush();

                $this->envoiMail();

                return $this->render('PIBundle:Formulaire:formulaire_accederDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand1));
            }
            return $this->render('PIBundle:Formulaire:formulaire_accederDemande.html.twig', array('form' => $form->createView(), 'demand' => $demand1));
        }
        return $this->render('PIBundle:Formulaire:redirection_access.html.twig');
    }


    /*
    *Cette fonction permet d'envoyer un mail à l'utilisateur connecté
    */
    public function envoiMail()
    {
            //envoie d'un mail pour prévenir de la maj de la demande
        $message = \Swift_Message::newInstance()
        ->setSubject('Nouvelle demande de logement social')
        ->setFrom('demandelogementvillers@gmail.com')
        ->setTo('demandelogementvillers@gmail.com')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'PIBundle:Emails:registration.html.twig'
                ),
            'text/html'
            );
        $this->get('mailer')->send($message);


    }

}
