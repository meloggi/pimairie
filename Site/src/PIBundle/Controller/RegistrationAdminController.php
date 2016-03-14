<?php

namespace PIBundle\Controller;

use PIBundle\Entity\User;
use PIBundle\Form\UserRepository;
use PIBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use FOS\UserBundle\Controller\RegistrationController;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends Controller
{
    



  public function ajouterAdminAction(Request $request)
    {
    
            $user=$this->get('fos_user.user_manager')->createUser();
          $em = $this->getDoctrine()->getManager();


          $form= $this->createForm(RegistrationType::class,$user);

       
 if ($form->handleRequest($request)->isValid()) {
     
            $em->persist($user);

            $em->flush();


 return $this->render('PIBundle:Registration:register_content_admin.html.twig',array('formAdmin' => $form->createView()));


        } 


 return $this->render('PIBundle:Registration:register_content_admin.html.twig',array('formAdmin' => $form->createView()));


        


}

}