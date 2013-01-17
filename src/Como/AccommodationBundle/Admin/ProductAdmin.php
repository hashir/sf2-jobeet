<?php

// src/Como/AccommodationBundle/Admin/ProductAdmin.php

namespace Como\AccommodationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use Como\AccommodationBundle\Entity\Product;

class ProductAdmin extends Admin
{

// setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'product_id'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
             ->with('Product Attributes')
                ->add('product_attr_id')                
                ->add('product_category_id')                
                ->add('product_name')
                ->add('product_description', 'text', array('required' => false))
                ->add('rate_from')
                ->add('rate_to')
//                ->add('productimages', 'collection', array(
//                        'type'          => new \Como\AccommodationBundle\Form\ProductImageType(),
//                        'allow_add'     => true,
//                        'allow_delete'  => true,
//                        'by_reference'  => true,
//                    ))
             ->with('Address', array('collapsed' => true))
                ->add('attribute_id_address')
                ->add('address_line_1')
                ->add('country_name')
                ->add('state_name')
                ->add('city_name')
                ->add('suburb_name')
                ->add('area_name')
                ->add('address_postal_code')
             ->with('Validity & Currency', array('collapsed' => true))
                ->add('validity_date_from')
                ->add('validity_date_to')
                ->add('atdw_expiry_date')
                ->add('free_entry_flag')
                ->add('attribute_id_currency')
                ->add('attribute_id_currency_description')
                ->add('attribute_id_rate_basis')
                ->add('attribute_id_rate_basis_description')
                ->add('domestic_region_name')                
                
                ->with('Flags', array('collapsed' => true))
                ->add('product_classifications')
                ->add('service_classifications')
                ->add('product_attributes')
                ->add('relevance')
                ->add('total_criteria')
                ->add('percent_relevance')
                
                ->add('children_catered_for_flag')
                ->add('pets_allowed_flag')
                ->add('disabled_access_flag')
                ->add('brochure_available_flag')
                
                ->add('service_attribute_match')
                ->add('service_attributes')
                ->add('service_classification_match')
                
                ->add('attribute_id_atdw_status')
                ->add('attribute_id_atdw_status_description')
                
                ->add('product_attribute_match')
                
                ->add('max_star_rating')
                ->add('product_classification_match')                
                ->add('delete_indicator')
                ->add('international_ready_flag')
                ->add('national_head_office_flag')
                ->add('owning_organisation_id')
                ->add('contributing_organisation_id')
                ->add('market_variant_id')
                ->end();
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                 ->add('product_attr_id')                
                ->add('product_category_id')                
                ->add('product_name')
                ->add('rate_from')
                ->add('city_name')
                ->add('address_postal_code')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('title', '')
                ->add('product_attr_id')
                ->add('product_name')
                ->add('city_name')
                ->add('rate_from')
//                ->add('productimages', 'string', array('template' => 'ComoAccommodationBundle:ProductAdmin:list_image.html.twig'))
//                ->add('getShowProductImage','array',array('template' => 'ComoAccommodationBundle:ProductAdmin:list_image.html.twig'))
                ->add('state_name')
                ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    )
                ));

        ;
    }
    
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                ->add('productimages')
                ->add('product_attr_id')                
                ->add('product_category_id')                
                ->add('product_name')
                ->add('product_description')
                ->add('rate_from')
                ->add('rate_to')
                ->add('attribute_id_address')
                ->add('address_line_1')
                ->add('country_name')
                ->add('state_name')
                ->add('city_name')
                ->add('suburb_name')
                ->add('area_name')
                ->add('address_postal_code')
                ->add('validity_date_from')
                ->add('validity_date_to')
                ->add('atdw_expiry_date')
                ->add('free_entry_flag')
                ->add('attribute_id_currency')
                ->add('attribute_id_currency_description')
                ->add('attribute_id_rate_basis')
                ->add('attribute_id_rate_basis_description')
                ->add('domestic_region_name')                
                
                
                ->add('product_classifications')
                ->add('service_classifications')
                ->add('product_attributes')
                ->add('relevance')
                ->add('total_criteria')
                ->add('percent_relevance')
                
                ->add('children_catered_for_flag')
                ->add('pets_allowed_flag')
                ->add('disabled_access_flag')
                ->add('brochure_available_flag')
                
                ->add('service_attribute_match')
                ->add('service_attributes')
                ->add('service_classification_match')
                
                ->add('attribute_id_atdw_status')
                ->add('attribute_id_atdw_status_description')
                
                ->add('product_attribute_match')
                
                ->add('max_star_rating')
                ->add('product_classification_match')                
                ->add('delete_indicator')
                ->add('international_ready_flag')
                ->add('national_head_office_flag')
                ->add('owning_organisation_id')
                ->add('contributing_organisation_id')
                ->add('market_variant_id')
        ;
    }
    
   public function getBatchActions()
    {
        // retrieve the default (currently only the delete action) actions
        $actions = parent::getBatchActions();

        // check user permissions
        if($this->hasRoute('edit') && $this->isGranted('EDIT') && $this->hasRoute('delete') && $this->isGranted('DELETE')){
            $actions['extend'] = array(
                'label'            => 'Extend',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );

            $actions['deleteNeverActivated'] = array(
                'label'            => 'Delete never activated jobs',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );
        }

        return $actions;
    }
    
    public function getTemplate($name)
    {
        if($name == 'show'){
            return 'ComoAccommodationBundle:ProductAdmin:show_image.html.twig';
        }elseif($name == 'list'){
            return 'ComoAccommodationBundle:ProductAdmin:list.html.twig';
        }else{
            return parent::getTemplate($name);
        }
    }

}