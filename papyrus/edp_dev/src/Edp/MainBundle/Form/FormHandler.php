<?php
namespace Edp\MainBundle\Form;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;


/**
 * Description of FormHandler
 *
 * @author stagiaire
 */
class FormHandler {
    protected $form;
    protected $em;
    protected $request;
    
    public function __construct(Form $form,Request $request,EntityManager $em) {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }
    
    public function process() {
        if($this->request->getMethod()=="POST") { // Vérifier type de méthode GET ou POST
            $this->form->bind($this->request);    // Bindparam like du formulaire courant suite au submit (request)
            if($this->form->isValid()) {          // Si le formulaire est valide...
                $this->onSuccess($this->form->getData()); // envoyer les données
                return true;
            }
        }
        return false;
    }
    
    private function onSuccess($objet) {
        $this->em->persist($objet);
        $this->em->flush();
    }
}
