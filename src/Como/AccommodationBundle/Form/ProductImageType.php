<?php

namespace Como\AccommodationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('market_variant_name')
            ->add('multimedia_id')
            ->add('server_path')
            ->add('attribute_id_multimedia_file')
            ->add('attribute_id_multimedia_content')
            ->add('attribute_id_size_orientation')
            ->add('width')
            ->add('height')
            ->add('alt_text')
            ->add('product')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Como\AccommodationBundle\Entity\ProductImage'
        ));
    }

    public function getName()
    {
        return 'como_accommodationbundle_productimagetype';
    }
}
