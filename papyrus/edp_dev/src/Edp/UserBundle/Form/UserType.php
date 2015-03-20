<?php

namespace Edp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre', 'choice', array('choices' => array("Mme" => "Madame", "Mr" => "Monsieur"), 
                                            'multiple' => false))    
            ->add('username',null, array('label' => 'Prenom', 'translation_domain' => 'FOSUserBundle',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('name', null, array('label' => "Nom",
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('email', 'email', array('label' => "Email",
                        'attr' => array('class' => 'form-control')))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Votre mot de passe',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')),
                'second_options' => array('label' => 'Retapez votre mot de passe',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')),
                'invalid_message' => 'fos_user.password.mismatch',  ))
            ->add('principal_adress', null, array('label' => 'Adresse',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('principal_adress2', null, array('label' => "Complement d'adresse",
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('zipcode', null, array('label' => 'Code postal',
                        'attr' => array('class' => 'form-control', 'placeholder' => '...')))
            ->add('country','country',array('label' => 'Pays'))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edp\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edp_userbundle_user';
    }
}
