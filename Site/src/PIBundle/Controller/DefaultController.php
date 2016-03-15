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
    {

    return $this->render('PIBundle:Default:accueil2.html.twig');
    }

    public function form1Action()
    {

        return $this->render('PIBundle:Default:form1.html.twig');
    }

    public function form2Action(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id=$this->get('security.token_storage')->getToken()->getUser()->getId();

        $user = $em->getRepository('PIBundle:User')->find($id);

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

        $mail= $this->get('security.token_storage')->getToken()->getUser()->getEmail(); 
        



        $demand = $em->getRepository('PIBundle:Demand')->findByMail($mail, $em);
        $taille=count($demand);
        if($taille > 0){
            $form = $this->createForm(DemandType::class,$demand[$taille-1]); 

            if ($form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($demand[$taille-1]);
                $em->flush();
                  $this->envoiMail();
                return $this->render('PIBundle:Default:form2_modifier.html.twig', array('form' => $form->createView(), 'demand' => $demand[$taille-1]));
            }

            return $this->render('PIBundle:Default:form2_modifier.html.twig', array('form' => $form->createView(), 'demand' => $demand[$taille-1]));
        }else{

         


        return $this->render('PIBundle:Default:accueil2.html.twig');



    }
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

    $mail= $this->get('security.token_storage')->getToken()->getUser()->getEmail(); 



    $demand1 = $em->getRepository('PIBundle:Demand')->findByMail($mail, $em);


    $taille = count($demand1);
    if($taille > 0){
        $form = $this->createForm(DemandType::class,$demand1[$taille-1]); 

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demand1[$taille-1]);
            $em->flush();
            
            $this->envoiMail();



            return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand1[$taille-1]));
        }
        return $this->render('PIBundle:Default:form3.html.twig', array('form' => $form->createView(), 'demand' => $demand1[$taille-1]));
    }
    else {
        return $this->render('PIBundle:Default:form1.html.twig');
    }

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
        )
      
    ;
    $this->get('mailer')->send($message);


}

}
