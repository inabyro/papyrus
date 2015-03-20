<?php

namespace Edp\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class codeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('prix')
//           !! Pour actionner les champs ci-dessous,mentionner 'entity' de reference
//            ->add('abonnements')
//            ->add('utilisateurs')
            ->add('images')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edp\MainBundle\Entity\code'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edp_mainbundle_code';
    }
}
