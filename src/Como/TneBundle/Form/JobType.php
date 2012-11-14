<?php

namespace Como\TneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Como\TneBundle\Entity\Job as Job;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add('type')
//            ->add('company')
//            ->add('logo')
//            ->add('url')
//            ->add('position')
//            ->add('location')
//            ->add('description')
//            ->add('how_to_apply')
//            ->add('token')
//            ->add('is_public')
//            ->add('is_activated')
//            ->add('email')
//            ->add('expires_at')
//            ->add('created_at')
//            ->add('updated_at')
//            ->add('category')
//        ;
        $builder->add('category');
        $builder->add('type', 'choice', array('choices' => Job::getTypes(), 'expanded' => true));
        $builder->add('company');
        $builder->add('file', 'file', array('label' => 'Company logo', 'required' => false));
        $builder->add('url');
        $builder->add('position');
        $builder->add('location');
        $builder->add('description');
        $builder->add('how_to_apply', null, array('label' => 'How to apply?'));
        $builder->add('is_public', null, array('label' => 'Public?'));
        $builder->add('email');      
                
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Como\TneBundle\Entity\Job'
        ));
    }

    public function getName()
    {
        return 'como_tnebundle_jobtype';
    }
}
