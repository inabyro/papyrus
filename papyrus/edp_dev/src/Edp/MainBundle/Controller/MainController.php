<?php

namespace Edp\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Edp\MainBundle\Form\aboType;
use Edp\MainBundle\Entity\abonnement;
use Edp\MainBundle\Form\FormHandler;
use Edp\UserBundle\Entity\User;

class MainController extends Controller
{
    // => Format : Nom_bundle:dossier_dans_views:nom_view (twig).
    // Nb = Symfony nous évite le chemin complet vers la view (apres Nom_bunlde, on ne renseigne pas "Resources/views".
    
//***************** TRAITEMENT ACCUEIL *******************//
    public function indexAction() {       
        return $this->render('EdpMainBundle:Main:index.html.twig');
    }
    
//***************** TRAITEMENT DETAILS CODES + ARTICLES LIES *******************//
      public function showCodeDetailsAction() {       
        return $this->render('EdpMainBundle:Main:show_code.html.twig');
    }

//***************** TRAITEMENT FORMULAIRE ABONNEMENT *******************//
     public function createAboAction() { 
         //Appel de l'entity Manager de Doctrine
         $em = $this->getDoctrine()->getManager();
         
         //Vérification du user connecté et instanciation d'un objet abonnement.
         $user = $this->get('security.context')->getToken()->getUser();    
         $abonnement = new abonnement($user);
         
         //Appel du formulaire de céation d'abonnement (aboType) lié à l'utilisateur connecté via token
         $form = $this->createForm(new aboType(),$abonnement);
         
         //Au submit, faire appel au formhandler pour traiter la requete POST du formulaire
         $formHandler = new FormHandler($form,$this->get('request'),$em);
         
         //Si le formulaire est validé par le FormHandler apres submit, on redirige sur une autre page (profile?)
        if($formHandler->process()) {
            //*****MAILING*****//
            $email = \Swift_Message::newInstance()
                    ->setSubject('Votre commande est validée!')
                    ->setFrom('lefloch.fabrice@gmail.com ')
                    ->setTo(array($abonnement->getUtilisateurs()->getEmailCanonical(),'lefloch.fabrice@gmail.com '))
                    ->setCharset('utf-8')
                    ->setContentType('text/html')
                    ->setBody($this->renderView('EdpMainBundle:Main:swiftmail.html.twig',array('abonnement'=>$abonnement,'codes'=>$abonnement->getCodes(),'utilisateur'=> $abonnement->getUtilisateurs())));
            $this->get('mailer')->send($email);            
            //*********END MAILING***********//
            return $this->redirect(
             $this->generateUrl('fos_user_profile_show',array('id'=>$abonnement->getId())));
        }
         return $this->render('EdpMainBundle:Main:create_abo.html.twig',array('form'=> $form->createView()));
    }
    
    //***************** ADMIN *******************//
     public function AdminAction() {       
        return $this->render('EdpMainBundle:Main:page_admin.html.twig');
    }
    
    //***************** TRAITEMENT RECHERCHES *******************//
      public function researchAction() {
        $user = $this->get('security.context')->getToken()->getUser();  
        return $this->render('EdpMainBundle:Main:research.html.twig',array('user' => $user,'abonnement'=>$user->getAbonnements()));
    }
    
    //***************** TRAITEMENT RECAP (EN STAND BY)*******************//
      public function recapCmdAction() {  
          $em = $this->getDoctrine()->getManager(); 
          $abonnements = $em->getRepository('EdpMainBundle:abonnement')->findAll();
        return $this->render('EdpMainBundle:Main:recap_cmd.html.twig',array('abonnements'=>$abonnements));
    }
    
    //***************** TRAITEMENT AFFICHAGE CODES DANS ABONNEMENT*******************//
      public function aboListeCodesAction($id) {  
          $user = $this->get('security.context')->getToken()->getUser();
          
          $repository = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('EdpMainBundle:abonnement')
    ;
          $abo = $repository->find($id);
        
          return $this->render('EdpMainBundle:Main:abo_liste_codes.html.twig',array('user'=>$user,'abo'=>$abo,'codes'=>$abo->getCodes()));
    }
    
    //***************** TRAITEMENT AFFICHAGE ARTICLES DANS CODE *******************//
      public function codeListeArticlesAction($id) {  
          $user = $this->get('security.context')->getToken()->getUser();
          
          $repository = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('EdpMainBundle:code')
    ;
          $code = $repository->find($id);
        
          return $this->render('EdpMainBundle:Main:code_liste_articles.html.twig',array('user'=>$user,'code'=>$code,'articles'=>$code->getArticles()));
    }
    
    //***************** TRAITEMENT CONSULTATION ARTICLE  *******************//
      public function consultArticleAction($id) {  
          $user = $this->get('security.context')->getToken()->getUser();
          
          $repository = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('EdpMainBundle:article')
    ;
          $article = $repository->find($id);
        
          return $this->render('EdpMainBundle:Main:consult_article.html.twig',array('user'=>$user,'article'=>$article,'code'=>$article->getCodes()));
    }
    
    
    
    
}
