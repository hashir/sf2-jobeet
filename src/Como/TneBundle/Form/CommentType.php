<?php

namespace Como\TneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment')
//            ->add('user_id')
//            ->add('job_id')
            ->add('user')
            ->add('job')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Como\TneBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'como_tnebundle_commenttype';
    }
}
