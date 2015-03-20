<?php

namespace Edp\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class aboType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        //ICI NOUS ALLONS CREER NOTRE FORMULAIRE D'ABONNEMENT EN PHP
        
        //LE $BUILDER VA CONSTRUIRE LE FORMULAIRE POUR NOUS. ON PEUT Y AJOUTER DES ATTRIBUTS DIRECTEMENT 
        //IL FAUDRA APPELLER NOTRE FORMULAIRE DANS LE CONTROLLER (auxquel on ajoutera un use Edp\MainBundle\Form\aboType;)
        
        //METHODE 1 = FORMULAIRE CONSTRUIT MANUELLEMENT
        //->add('nom_champs_entity','type_champs'
        $builder
                
                ->add('libelle', 'text', array('label' => "Libellé de votre abonnement",
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
                
                ->add('debut', 'date')
                
                ->add('fin', 'date')
                
                ->add('codes','entity',array('label' => "Choisissez vos codes",
                    'attr' => array('class' => 'form-control'),
                    'class' => 'Edp\MainBundle\Entity\code', 'property' => 'titre',"multiple" => true))
            ;
    }
    
    
    // getName = Imposé par symfony 2, le path s'écrit en minuscules et les "/" deviennent des "_". Dossier "Form" implicite.
    public function getName()
    {
        return 'edp_mainbundle_abonnement';
    }

}
