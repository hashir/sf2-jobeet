<?php

namespace Como\AccommodationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Como\AccommodationBundle\Entity\Product;
use Como\AccommodationBundle\Entity\ProductImage;
use Como\AccommodationBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ComoAccommodationBundle:Product')->findAll();

        return $this->render('ComoAccommodationBundle:Product:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:Product:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Product entity.
     *
     */
    public function newAction()
    {
        $entity = new Product();
        $form   = $this->createForm(new ProductType(), $entity);

        return $this->render('ComoAccommodationBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Product entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Product();
        $form = $this->createForm(new ProductType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $entity->getId())));
        }

        return $this->render('ComoAccommodationBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createForm(new ProductType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:Product:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Product entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_edit', array('id' => $id)));
        }

        return $this->render('ComoAccommodationBundle:Product:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ComoAccommodationBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function syncAction()
    {
          $em = $this->getDoctrine()->getManager();
          $strWSDL = 'http://national.atdw.com.au/soap/AustralianTourismWebService.asmx?WSDL';

              $strDistributorKey = 201212040953; 
              $client = new \SoapClient($strWSDL);

              $strCommandName = "QueryProducts";
              $strCommandParameter = "<parameters>";
              $strCommandParameter .= "<row><param>PRODUCT_CATEGORY_LIST</param><value>ACCOMM</value></row>";
              $strCommandParameter .= "<row><param>RESULTS_PER_PAGE</param><value>100</value></row>";
              $strCommandParameter .= "<row><param>EXTERNAL_SYSTEM_RETURN</param><value>YES</value></row>";
              $strCommandParameter .= "<row><param>EXTERNAL_SYSTEM_CODE</param><value>TXA_DEFAULT,TXA_MULTI</value></row>";              
              $strCommandParameter .= "<row><param>STATE</param><value>Victoria</value></row>";
              $strCommandParameter .= "<row><param>MULTIMEDIA_RETURN</param><value>YES</value></row>";
              $strCommandParameter .= "<row><param>ADDRESS_RETURN</param><value>YES</value></row>";
              $strCommandParameter .= "</parameters>";

              $param = array('DistributorKey'=> $strDistributorKey, 'CommandName'=>$strCommandName, 'CommandParameters'=>$strCommandParameter);
              $result = $client->CommandHandler($param);
              //$xmlObj = simplexml_load_string($result->CommandHandlerResult);
              $xmlUf8 = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $result->CommandHandlerResult);
              $xmlObj = simplexml_load_string($xmlUf8);

              foreach($xmlObj as $obj){
                  if($obj->product_record->product_id != NULL){
                      $product = new Product();
                      $product->setProductAttrId($obj->product_record->product_id);
                      $product->setDeleteIndicator($obj->product_record->delete_indicator);
                      $product->setInternationalReadyFlag($obj->product_record->international_ready_flag);
                      $product->setNationalHeadOfficeFlag($obj->product_record->national_head_office_flag);
                      $product->setProductCategoryId($obj->product_record->product_category_id);
                      $product->setOwningOrganisationId($obj->product_record->owning_organisation_id);
                      $product->setContributingOrganisationId($obj->product_record->contributing_organisation_id);
                      $product->setMarketVariantId($obj->product_record->market_variant_id);
                      $product->setProductName($obj->product_record->product_name);
                      $product->setChildrenCateredForFlag($obj->product_record->children_catered_for_flag);
                      $product->setPetsAllowedFlag($obj->product_record->pets_allowed_flag);
                      $product->setDisabledAccessFlag($obj->product_record->disabled_access_flag);
                      $product->setBrochureAvailableFlag($obj->product_record->brochure_available_flag);
                      $product->setValidityDateFrom(date_create(date('Y-m-d',strtotime($obj->product_record->validity_date_from))));
                      $product->setValidityDateTo(date_create(date('Y-m-d',strtotime($obj->product_record->validity_date_to))));
                      $product->setAttributeIdAtdwStatus($obj->product_record->attribute_id_atdw_status);
                      $product->setAttributeIdAtdwStatusDescription($obj->product_record->attribute_id_atdw_status_description);
                      $product->setAtdwExpiryDate(date_create(date('Y-m-d',strtotime($obj->product_record->atdw_expiry_date))));
                      $product->setFreeEntryFlag($obj->product_record->free_entry_flag);
                      $product->setAttributeIdCurrency($obj->product_record->attribute_id_currency);
                      $product->setAttributeIdCurrencyDescription($obj->product_record->attribute_id_currency_description);
                      $product->setAttributeIdRateBasis($obj->product_record->attribute_id_rate_basis);
                      $product->setAttributeIdRateBasisDescription($obj->product_record->attribute_id_rate_basis_description);
                      $product->setRateFrom($obj->product_record->rate_from);
                      $product->setRateTo($obj->product_record->rate_to);
                      $product->setCityName($obj->product_record->city_name);
                      $product->setStateName($obj->product_record->state_name);
                      $product->setCountryName($obj->product_record->country_name);
                      $product->setDomesticRegionName($obj->product_record->domestic_region_name);
                      $product->setProductDescription($obj->product_record->product_description);
                      $product->setMaxStarRating($obj->product_record->max_star_rating);
                      $product->setProductClassificationMatch($obj->product_record->product_classification_match);
                      $product->setProductClassifications($obj->product_record->product_classifications);
                      $product->setServiceClassificationMatch($obj->product_record->service_classification_match);
                      $product->setServiceClassifications($obj->product_record->service_classifications);
                      $product->setProductAttributeMatch($obj->product_record->product_attribute_match);
                      $product->setProductAttributes($obj->product_record->product_attributes);
                      $product->setServiceAttributeMatch($obj->product_record->service_attribute_match);
                      $product->setServiceAttributes($obj->product_record->service_attributes);
                      $product->setRelevance($obj->product_record->relevance);
                      $product->setTotalCriteria($obj->product_record->total_criteria);
                      $product->setPercentRelevance($obj->product_record->percent_relevance);
      //                if($obj->product_address){
                          $product->setAttributeIdAddress($obj->product_address->row->attribute_id_address);
                          $product->setAttributeIdAddressDescription($obj->product_address->row->attribute_id_address_description);
                          $product->setAttributeIdAddressDescriptionMv($obj->product_address->row->attribute_id_address_description_mv);
                          $product->setAddressLine1($obj->product_address->row->address_line_1);
                          $product->setSuburbName($obj->product_address->row->suburb_name);
                          $product->setCityName($obj->product_address->row->city_name);
                          $product->setAreaName($obj->product_address->row->area_name);
                          $product->setStateName($obj->product_address->row->state_name);
                          $product->setCountryName($obj->product_address->row->country_name);
                          $product->setAddressPostalCode($obj->product_address->row->address_postal_code);
                          $product->setSamePostalAddressFlag($obj->product_address->row->same_postal_address_flag);
                          $product->setOverrideDomesticRegionFlag($obj->product_address->row->override_domestic_region_flag);
                          $product->setGeocodeGdaLatitude($obj->product_address->row->geocode_gda_latitude);
                          $product->setGeocodeGdaLongitude($obj->product_address->row->geocode_gda_longitude);
                          $product->setAttributeIdGeocodeProjSys($obj->product_address->row->attribute_id_geocode_proj_sys);
                          $product->setAttributeIdGeocodeProjSysDescription($obj->product_address->row->attribute_id_geocode_proj_sys_description);
                          $product->setAttributeIdGeocodeProjSysDescriptionMv($obj->product_address->row->attribute_id_geocode_proj_sys_description_mv);
      //                }
                          $em->persist($product);
                  }

                  foreach ($obj->product_multimedia as $rows)
                  {
                     foreach ($rows->row as $multimedia)
                     {
                      $productImage = new ProductImage();
                      $productImage->setProduct($product);
                      $productImage->setMarketVariantName($multimedia->market_variant_name);
                      $productImage->setMultimediaId($multimedia->multimedia_id);
                      $productImage->setServerPath($multimedia->server_path);
                      $productImage->setAttributeIdMultimediaFile($multimedia->attribute_id_multimedia_file);
                      $productImage->setAttributeIdMultimediaContent($multimedia->attribute_id_multimedia_content);
                      $productImage->setAttributeIdSizeOrientation($multimedia->attribute_id_size_orientation);
                      $productImage->setWidth($multimedia->width);
                      $productImage->setHeight($multimedia->height);
                      $productImage->setAltText($multimedia->alt_text);
                      $em->persist($productImage);
                     }
                  }

              }

              $em->flush();
//              return $this->redirect($this->admin->generateUrl('ComoAccommodationBundle_product'));
        }
}
