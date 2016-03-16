<?php

namespace PIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PIBundle\Entity\Demand;
use PIBundle\Form\DemandType;
use PIBundle\Repository\DemandRepository;


use PIBundle\Entity\DemandDemand;
use PIBundle\Form\DemandDemandType;
use PIBundle\Repository\DemandDemandRepository;


use Symfony\Component\HttpFoundation\Request;







class DefaultController extends Controller
{


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
        return $this->render('PIBundle:Admin:dashboard.html.twig', array('list_demand_new' => $list_demand_new, 'list_demand_free' => $list_demand_free, 'list_demand_wrong' => $list_demand_wrong, 'list_demand_expired' => $list_demand_expired, 'date' => $date));
 }
         // sinon il s'agit d'un membre
        else
           return $this->render('PIBundle:Default:accueil2.html.twig');
       

    }

    public function form1Action()
    {
        $em = $this->getDoctrine()->getManager();

        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        $user = $em->getRepository('PIBundle:User')->find($id);

        $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        
        if($demand == null){
        return $this->render('PIBundle:Default:form1.html.twig');
    }
        return $this->render('PIBundle:Default:contact.html.twig');
    }

    public function form2Action(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        $user = $em->getRepository('PIBundle:User')->find($id);

        $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));
        
            $demand= new Demand();
            $form = $this->createForm(DemandType::class,$demand); 

            if ($form->handleRequest($request)->isValid()) {
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
                return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand));
            }

            return $this->render('PIBundle:Default:form2.html.twig', array('form' => $form->createView(), 'demand' => $demand));
    }



        public function form2_modifierAction(Request $request)
        {

            $em = $this->getDoctrine()->getManager();

            $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

            $user = $em->getRepository('PIBundle:User')->find($id);

            $demand = $em->getRepository('PIBundle:Demand')->findOneBy(array('idUser' => $id, 'archived' => "Non"));

            
            
            $form = $this->createForm(DemandType::class,$demand); 
                if($demand != null){
                if ($form->handleRequest($request)->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($demand);
                    $em->flush();
                    $this->envoiMail();
                    return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand));
            
                }
               return $this->render('PIBundle:Default:form2_modifier.html.twig', array('form' => $form->createView(), 'demand' => $demand));
           }
           
           return $this->render('PIBundle:Default:contact.html.twig');
}

            
        


        public function form_proAction(Request $request)
        {
       //  $em = $this->getDoctrine()->getManager();
       // // $user = $em->getRepository('PIBundle:Demand')->findDemand($mail);
       //  $form = $this->createForm(DemandType::class,$user);


       //  $em = $this->getDoctrine()->getManager();
       //  $user->setMail($mail);
       //  $em->persist($user);
       //  $em->flush();

       //  return $this->render('PIBundle:Default:form_pro.html.twig', array('form' => $form->createView(), 'demand' => $user));
         $user= new DemandDemand(); 


         $form = $this->createForm(DemandDemandType::class,$user); 




         if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('PIBundle:Default:form_pro.html.twig', array('form' => $form->createView(), 'demand_demand' => $user));
        }
        return $this->render('PIBundle:Default:form2_modifier.html.twig', array('form' => $form->createView(), 'demand_demand' => $user)); 

    }

    public function form_justificatifAction()
    {
        return $this->render('PIBundle:Default:form_justificatif.html.twig');
    }

    public function form_logementAction()
    {
        return $this->render('PIBundle:Default:form_logement.html.twig');
    }

    public function form_motifAction()
    {
        return $this->render('PIBundle:Default:form_motif.html.twig');
    }



    public function form_ressourceAction()
    {
        return $this->render('PIBundle:Default:form_ressource.html.twig');
    }

    public function contactAction()
    {
        return $this->render('PIBundle:Default:contact.html.twig');
    }


    public function form3Action(Request $request)
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

            return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand1));
        }
        return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand1));
        }
        return $this->render('PIBundle:Default:contact.html.twig');
    }

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
