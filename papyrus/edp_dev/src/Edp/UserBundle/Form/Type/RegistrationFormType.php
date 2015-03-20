<?php

namespace Edp\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder
                ->add('genre', 'choice', array('choices' => array("Mme" => "Madame", "Mr" => "Monsieur"), 
                                            'multiple' => false))
                ->add('username', null, array('label' => 'Prenom', 'translation_domain' => 'FOSUserBundle'))
                ->add('name', null, array('label' => 'Nom'))
                ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
                ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Votre mot de passe'),
                'second_options' => array('label' => 'Retapez votre mot de passe'),
                'invalid_message' => 'fos_user.password.mismatch',  ))
                ->add('principal_adress', null, array('label' => 'Adresse'))
                ->add('principal_adress2', null, array('label' => "Complement d'adresse"))
                ->add('zipcode', null, array('label' => 'Code postal'))
                ->add('country','country',array('label' => 'Pays'))
//                ->add('codes','entity',array('label' => "Choisissez vos codes",
//                'attr' => array('class' => 'RadioType'),
//                'class' => 'Edp\MainBundle\Entity\code', 'property' => 'titre',"multiple" => true,'expanded' => true))
                
                ;
    }

    public function getName()
    {
        return 'edp_user_registration';
    }
}