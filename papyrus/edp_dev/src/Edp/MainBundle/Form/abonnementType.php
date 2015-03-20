<?php

namespace Edp\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class abonnementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('debut')
            ->add('fin')
            ->add('isActive')
            ->add('utilisateurs')
            ->add('codes','entity',array('label' => "Choisissez vos codes",
                    'attr' => array('class' => 'form-control'),
                    'class' => 'Edp\MainBundle\Entity\code', 'property' => 'titre',"multiple" => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edp\MainBundle\Entity\abonnement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edp_mainbundle_abonnement';
    }
}
