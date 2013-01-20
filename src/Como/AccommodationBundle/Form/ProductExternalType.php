<?php

namespace Como\AccommodationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductExternalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('txa_attribute')
            ->add('provider_short_name')
            ->add('product')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Como\AccommodationBundle\Entity\ProductExternal'
        ));
    }

    public function getName()
    {
//        return 'como_accommodationbundle_productexternaltype';
        return 'productexternal';
    }
}
