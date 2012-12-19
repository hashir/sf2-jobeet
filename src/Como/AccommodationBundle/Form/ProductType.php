<?php

namespace Como\AccommodationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product_id')
            ->add('delete_indicator')
            ->add('international_ready_flag')
            ->add('national_head_office_flag')
            ->add('product_category_id')
            ->add('owning_organisation_id')
            ->add('contributing_organisation_id')
            ->add('market_variant_id')
            ->add('product_name')
            ->add('children_catered_for_flag')
            ->add('pets_allowed_flag')
            ->add('disabled_access_flag')
            ->add('brochure_available_flag')
            ->add('validity_date_from')
            ->add('validity_date_to')
            ->add('attribute_id_atdw_status')
            ->add('attribute_id_atdw_status_description')
            ->add('atdw_expiry_date')
            ->add('free_entry_flag')
            ->add('attribute_id_currency')
            ->add('attribute_id_currency_description')
            ->add('attribute_id_rate_basis')
            ->add('attribute_id_rate_basis_description')
            ->add('rate_from')
            ->add('rate_to')
            ->add('city_name')
            ->add('state_name')
            ->add('country_name')
            ->add('domestic_region_name')
            ->add('product_description')
            ->add('max_star_rating')
            ->add('product_classification_match')
            ->add('product_classifications')
            ->add('service_classification_match')
            ->add('service_classifications')
            ->add('product_attribute_match')
            ->add('product_attributes')
            ->add('service_attribute_match')
            ->add('service_attributes')
            ->add('relevance')
            ->add('total_criteria')
            ->add('percent_relevance')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Como\AccommodationBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'como_accommodationbundle_producttype';
    }
}
