<?php

namespace App\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UserType extends AbstractType
{
    
   
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enabled', 'checkbox', array('required' => false))
            ->add('username')
            ->add('email')
            ->add('password', 'password', array('required' => false))
            ->add('plainPassword', 'password', array('required' => false))
            ->add('groups','entity', array(
                'class' => 'AppAdminBundle:Group',
                'property' => 'name',
                'required'  => true,
                'multiple' => true,
                'expanded'  => false,
            ))
        ;
    }
    
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\AdminBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_adminbundle_user';
    }
}
