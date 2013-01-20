<?php

// src/Como/AccommodationBundle/Admin/ProductExternalAdmin.php

namespace Como\AccommodationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use Como\AccommodationBundle\Entity\ProductExternal;

class ProductExternalAdmin extends Admin
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
                ->add('txa_attribute')
                ->add('provider_short_name')
//                ->add('product', 'sonata_type_model', array('label' => 'Product', 'required' => true), array('edit' => 'standard'))
//                ->add('product', 'entity', array(
//                    'empty_value' => false,
//                    'class' => 'ComoAccommodationBundle:ProductExternal',
//                    'property' => 'product',
//                ))
//                ->add('product')
//                ->add('product', 'hidden', array(
//                    'data' => "",
//                ))
                ->end();
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('txa_attribute')
                ->add('provider_short_name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                 ->add('txa_attribute')
                ->add('provider_short_name')

        ;
    }
    
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                 ->add('txa_attribute')
                ->add('provider_short_name')
        ;
    }

}