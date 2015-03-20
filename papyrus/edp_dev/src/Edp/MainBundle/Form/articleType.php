<?php

namespace Edp\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class articleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('nor')
            ->add('texte')
            ->add('date')
            ->add('codes','entity',array('label' => "Choisissez le code correspondant",
                    'attr' => array('class' => 'form-control'),
                    'class' => 'Edp\MainBundle\Entity\code', 'property' => 'titre'))
//            ->add('motclef','text')
//            ->add('images')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edp\MainBundle\Entity\article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edp_mainbundle_article';
    }
}
