<?php

namespace Como\AccommodationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $product_attr_id;

    /**
     * @var string
     */
    private $delete_indicator;

    /**
     * @var string
     */
    private $international_ready_flag;

    /**
     * @var integer
     */
    private $national_head_office_flag;

    /**
     * @var string
     */
    private $product_category_id;

    /**
     * @var integer
     */
    private $owning_organisation_id;

    /**
     * @var integer
     */
    private $contributing_organisation_id;

    /**
     * @var string
     */
    private $market_variant_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var integer
     */
    private $children_catered_for_flag;

    /**
     * @var integer
     */
    private $pets_allowed_flag;

    /**
     * @var integer
     */
    private $disabled_access_flag;

    /**
     * @var integer
     */
    private $brochure_available_flag;

    /**
     * @var \DateTime
     */
    private $validity_date_from;

    /**
     * @var \DateTime
     */
    private $validity_date_to;

    /**
     * @var string
     */
    private $attribute_id_atdw_status;

    /**
     * @var string
     */
    private $attribute_id_atdw_status_description;

    /**
     * @var \DateTime
     */
    private $atdw_expiry_date;

    /**
     * @var integer
     */
    private $free_entry_flag;

    /**
     * @var string
     */
    private $attribute_id_currency;

    /**
     * @var string
     */
    private $attribute_id_currency_description;

    /**
     * @var string
     */
    private $attribute_id_rate_basis;

    /**
     * @var string
     */
    private $attribute_id_rate_basis_description;

    /**
     * @var float
     */
    private $rate_from;

    /**
     * @var float
     */
    private $rate_to;

    /**
     * @var string
     */
    private $city_name;

    /**
     * @var string
     */
    private $state_name;

    /**
     * @var string
     */
    private $country_name;

    /**
     * @var string
     */
    private $domestic_region_name;

    /**
     * @var string
     */
    private $product_description;

    /**
     * @var integer
     */
    private $max_star_rating;

    /**
     * @var integer
     */
    private $product_classification_match;

    /**
     * @var integer
     */
    private $product_classifications;

    /**
     * @var integer
     */
    private $service_classification_match;

    /**
     * @var integer
     */
    private $service_classifications;

    /**
     * @var integer
     */
    private $product_attribute_match;

    /**
     * @var integer
     */
    private $product_attributes;

    /**
     * @var integer
     */
    private $service_attribute_match;

    /**
     * @var integer
     */
    private $service_attributes;

    /**
     * @var integer
     */
    private $relevance;

    /**
     * @var integer
     */
    private $total_criteria;

    /**
     * @var integer
     */
    private $percent_relevance;

    /**
     * @var string
     */
    private $attribute_id_address;

    /**
     * @var string
     */
    private $attribute_id_address_description;

    /**
     * @var string
     */
    private $attribute_id_address_description_mv;

    /**
     * @var string
     */
    private $address_line_1;

    /**
     * @var string
     */
    private $suburb_name;

    /**
     * @var string
     */
    private $area_name;

    /**
     * @var string
     */
    private $address_postal_code;

    /**
     * @var string
     */
    private $same_postal_address_flag;

    /**
     * @var string
     */
    private $override_domestic_region_flag;

    /**
     * @var string
     */
    private $geocode_gda_latitude;

    /**
     * @var string
     */
    private $geocode_gda_longitude;

    /**
     * @var string
     */
    private $attribute_id_geocode_proj_sys;

    /**
     * @var string
     */
    private $attribute_id_geocode_proj_sys_description;

    /**
     * @var string
     */
    private $attribute_id_geocode_proj_sys_description_mv;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $productimages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productimages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set product_attr_id
     *
     * @param string $productAttrId
     * @return Product
     */
    public function setProductAttrId($productAttrId)
    {
        $this->product_attr_id = $productAttrId;
    
        return $this;
    }

    /**
     * Get product_attr_id
     *
     * @return string 
     */
    public function getProductAttrId()
    {
        return $this->product_attr_id;
    }

    /**
     * Set delete_indicator
     *
     * @param string $deleteIndicator
     * @return Product
     */
    public function setDeleteIndicator($deleteIndicator)
    {
        $this->delete_indicator = $deleteIndicator;
    
        return $this;
    }

    /**
     * Get delete_indicator
     *
     * @return string 
     */
    public function getDeleteIndicator()
    {
        return $this->delete_indicator;
    }

    /**
     * Set international_ready_flag
     *
     * @param string $internationalReadyFlag
     * @return Product
     */
    public function setInternationalReadyFlag($internationalReadyFlag)
    {
        $this->international_ready_flag = $internationalReadyFlag;
    
        return $this;
    }

    /**
     * Get international_ready_flag
     *
     * @return string 
     */
    public function getInternationalReadyFlag()
    {
        return $this->international_ready_flag;
    }

    /**
     * Set national_head_office_flag
     *
     * @param integer $nationalHeadOfficeFlag
     * @return Product
     */
    public function setNationalHeadOfficeFlag($nationalHeadOfficeFlag)
    {
        $this->national_head_office_flag = $nationalHeadOfficeFlag;
    
        return $this;
    }

    /**
     * Get national_head_office_flag
     *
     * @return integer 
     */
    public function getNationalHeadOfficeFlag()
    {
        return $this->national_head_office_flag;
    }

    /**
     * Set product_category_id
     *
     * @param string $productCategoryId
     * @return Product
     */
    public function setProductCategoryId($productCategoryId)
    {
        $this->product_category_id = $productCategoryId;
    
        return $this;
    }

    /**
     * Get product_category_id
     *
     * @return string 
     */
    public function getProductCategoryId()
    {
        return $this->product_category_id;
    }

    /**
     * Set owning_organisation_id
     *
     * @param integer $owningOrganisationId
     * @return Product
     */
    public function setOwningOrganisationId($owningOrganisationId)
    {
        $this->owning_organisation_id = $owningOrganisationId;
    
        return $this;
    }

    /**
     * Get owning_organisation_id
     *
     * @return integer 
     */
    public function getOwningOrganisationId()
    {
        return $this->owning_organisation_id;
    }

    /**
     * Set contributing_organisation_id
     *
     * @param integer $contributingOrganisationId
     * @return Product
     */
    public function setContributingOrganisationId($contributingOrganisationId)
    {
        $this->contributing_organisation_id = $contributingOrganisationId;
    
        return $this;
    }

    /**
     * Get contributing_organisation_id
     *
     * @return integer 
     */
    public function getContributingOrganisationId()
    {
        return $this->contributing_organisation_id;
    }

    /**
     * Set market_variant_id
     *
     * @param string $marketVariantId
     * @return Product
     */
    public function setMarketVariantId($marketVariantId)
    {
        $this->market_variant_id = $marketVariantId;
    
        return $this;
    }

    /**
     * Get market_variant_id
     *
     * @return string 
     */
    public function getMarketVariantId()
    {
        return $this->market_variant_id;
    }

    /**
     * Set product_name
     *
     * @param string $productName
     * @return Product
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;
    
        return $this;
    }

    /**
     * Get product_name
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set children_catered_for_flag
     *
     * @param integer $childrenCateredForFlag
     * @return Product
     */
    public function setChildrenCateredForFlag($childrenCateredForFlag)
    {
        $this->children_catered_for_flag = $childrenCateredForFlag;
    
        return $this;
    }

    /**
     * Get children_catered_for_flag
     *
     * @return integer 
     */
    public function getChildrenCateredForFlag()
    {
        return $this->children_catered_for_flag;
    }

    /**
     * Set pets_allowed_flag
     *
     * @param integer $petsAllowedFlag
     * @return Product
     */
    public function setPetsAllowedFlag($petsAllowedFlag)
    {
        $this->pets_allowed_flag = $petsAllowedFlag;
    
        return $this;
    }

    /**
     * Get pets_allowed_flag
     *
     * @return integer 
     */
    public function getPetsAllowedFlag()
    {
        return $this->pets_allowed_flag;
    }

    /**
     * Set disabled_access_flag
     *
     * @param integer $disabledAccessFlag
     * @return Product
     */
    public function setDisabledAccessFlag($disabledAccessFlag)
    {
        $this->disabled_access_flag = $disabledAccessFlag;
    
        return $this;
    }

    /**
     * Get disabled_access_flag
     *
     * @return integer 
     */
    public function getDisabledAccessFlag()
    {
        return $this->disabled_access_flag;
    }

    /**
     * Set brochure_available_flag
     *
     * @param integer $brochureAvailableFlag
     * @return Product
     */
    public function setBrochureAvailableFlag($brochureAvailableFlag)
    {
        $this->brochure_available_flag = $brochureAvailableFlag;
    
        return $this;
    }

    /**
     * Get brochure_available_flag
     *
     * @return integer 
     */
    public function getBrochureAvailableFlag()
    {
        return $this->brochure_available_flag;
    }

    /**
     * Set validity_date_from
     *
     * @param \DateTime $validityDateFrom
     * @return Product
     */
    public function setValidityDateFrom($validityDateFrom)
    {
        $this->validity_date_from = $validityDateFrom;
    
        return $this;
    }

    /**
     * Get validity_date_from
     *
     * @return \DateTime 
     */
    public function getValidityDateFrom()
    {
        return $this->validity_date_from;
    }

    /**
     * Set validity_date_to
     *
     * @param \DateTime $validityDateTo
     * @return Product
     */
    public function setValidityDateTo($validityDateTo)
    {
        $this->validity_date_to = $validityDateTo;
    
        return $this;
    }

    /**
     * Get validity_date_to
     *
     * @return \DateTime 
     */
    public function getValidityDateTo()
    {
        return $this->validity_date_to;
    }

    /**
     * Set attribute_id_atdw_status
     *
     * @param string $attributeIdAtdwStatus
     * @return Product
     */
    public function setAttributeIdAtdwStatus($attributeIdAtdwStatus)
    {
        $this->attribute_id_atdw_status = $attributeIdAtdwStatus;
    
        return $this;
    }

    /**
     * Get attribute_id_atdw_status
     *
     * @return string 
     */
    public function getAttributeIdAtdwStatus()
    {
        return $this->attribute_id_atdw_status;
    }

    /**
     * Set attribute_id_atdw_status_description
     *
     * @param string $attributeIdAtdwStatusDescription
     * @return Product
     */
    public function setAttributeIdAtdwStatusDescription($attributeIdAtdwStatusDescription)
    {
        $this->attribute_id_atdw_status_description = $attributeIdAtdwStatusDescription;
    
        return $this;
    }

    /**
     * Get attribute_id_atdw_status_description
     *
     * @return string 
     */
    public function getAttributeIdAtdwStatusDescription()
    {
        return $this->attribute_id_atdw_status_description;
    }

    /**
     * Set atdw_expiry_date
     *
     * @param \DateTime $atdwExpiryDate
     * @return Product
     */
    public function setAtdwExpiryDate($atdwExpiryDate)
    {
        $this->atdw_expiry_date = $atdwExpiryDate;
    
        return $this;
    }

    /**
     * Get atdw_expiry_date
     *
     * @return \DateTime 
     */
    public function getAtdwExpiryDate()
    {
        return $this->atdw_expiry_date;
    }

    /**
     * Set free_entry_flag
     *
     * @param integer $freeEntryFlag
     * @return Product
     */
    public function setFreeEntryFlag($freeEntryFlag)
    {
        $this->free_entry_flag = $freeEntryFlag;
    
        return $this;
    }

    /**
     * Get free_entry_flag
     *
     * @return integer 
     */
    public function getFreeEntryFlag()
    {
        return $this->free_entry_flag;
    }

    /**
     * Set attribute_id_currency
     *
     * @param string $attributeIdCurrency
     * @return Product
     */
    public function setAttributeIdCurrency($attributeIdCurrency)
    {
        $this->attribute_id_currency = $attributeIdCurrency;
    
        return $this;
    }

    /**
     * Get attribute_id_currency
     *
     * @return string 
     */
    public function getAttributeIdCurrency()
    {
        return $this->attribute_id_currency;
    }

    /**
     * Set attribute_id_currency_description
     *
     * @param string $attributeIdCurrencyDescription
     * @return Product
     */
    public function setAttributeIdCurrencyDescription($attributeIdCurrencyDescription)
    {
        $this->attribute_id_currency_description = $attributeIdCurrencyDescription;
    
        return $this;
    }

    /**
     * Get attribute_id_currency_description
     *
     * @return string 
     */
    public function getAttributeIdCurrencyDescription()
    {
        return $this->attribute_id_currency_description;
    }

    /**
     * Set attribute_id_rate_basis
     *
     * @param string $attributeIdRateBasis
     * @return Product
     */
    public function setAttributeIdRateBasis($attributeIdRateBasis)
    {
        $this->attribute_id_rate_basis = $attributeIdRateBasis;
    
        return $this;
    }

    /**
     * Get attribute_id_rate_basis
     *
     * @return string 
     */
    public function getAttributeIdRateBasis()
    {
        return $this->attribute_id_rate_basis;
    }

    /**
     * Set attribute_id_rate_basis_description
     *
     * @param string $attributeIdRateBasisDescription
     * @return Product
     */
    public function setAttributeIdRateBasisDescription($attributeIdRateBasisDescription)
    {
        $this->attribute_id_rate_basis_description = $attributeIdRateBasisDescription;
    
        return $this;
    }

    /**
     * Get attribute_id_rate_basis_description
     *
     * @return string 
     */
    public function getAttributeIdRateBasisDescription()
    {
        return $this->attribute_id_rate_basis_description;
    }

    /**
     * Set rate_from
     *
     * @param float $rateFrom
     * @return Product
     */
    public function setRateFrom($rateFrom)
    {
        $this->rate_from = $rateFrom;
    
        return $this;
    }

    /**
     * Get rate_from
     *
     * @return float 
     */
    public function getRateFrom()
    {
        return $this->rate_from;
    }

    /**
     * Set rate_to
     *
     * @param float $rateTo
     * @return Product
     */
    public function setRateTo($rateTo)
    {
        $this->rate_to = $rateTo;
    
        return $this;
    }

    /**
     * Get rate_to
     *
     * @return float 
     */
    public function getRateTo()
    {
        return $this->rate_to;
    }

    /**
     * Set city_name
     *
     * @param string $cityName
     * @return Product
     */
    public function setCityName($cityName)
    {
        $this->city_name = $cityName;
    
        return $this;
    }

    /**
     * Get city_name
     *
     * @return string 
     */
    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * Set state_name
     *
     * @param string $stateName
     * @return Product
     */
    public function setStateName($stateName)
    {
        $this->state_name = $stateName;
    
        return $this;
    }

    /**
     * Get state_name
     *
     * @return string 
     */
    public function getStateName()
    {
        return $this->state_name;
    }

    /**
     * Set country_name
     *
     * @param string $countryName
     * @return Product
     */
    public function setCountryName($countryName)
    {
        $this->country_name = $countryName;
    
        return $this;
    }

    /**
     * Get country_name
     *
     * @return string 
     */
    public function getCountryName()
    {
        return $this->country_name;
    }

    /**
     * Set domestic_region_name
     *
     * @param string $domesticRegionName
     * @return Product
     */
    public function setDomesticRegionName($domesticRegionName)
    {
        $this->domestic_region_name = $domesticRegionName;
    
        return $this;
    }

    /**
     * Get domestic_region_name
     *
     * @return string 
     */
    public function getDomesticRegionName()
    {
        return $this->domestic_region_name;
    }

    /**
     * Set product_description
     *
     * @param string $productDescription
     * @return Product
     */
    public function setProductDescription($productDescription)
    {
        $this->product_description = $productDescription;
    
        return $this;
    }

    /**
     * Get product_description
     *
     * @return string 
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * Set max_star_rating
     *
     * @param integer $maxStarRating
     * @return Product
     */
    public function setMaxStarRating($maxStarRating)
    {
        $this->max_star_rating = $maxStarRating;
    
        return $this;
    }

    /**
     * Get max_star_rating
     *
     * @return integer 
     */
    public function getMaxStarRating()
    {
        return $this->max_star_rating;
    }

    /**
     * Set product_classification_match
     *
     * @param integer $productClassificationMatch
     * @return Product
     */
    public function setProductClassificationMatch($productClassificationMatch)
    {
        $this->product_classification_match = $productClassificationMatch;
    
        return $this;
    }

    /**
     * Get product_classification_match
     *
     * @return integer 
     */
    public function getProductClassificationMatch()
    {
        return $this->product_classification_match;
    }

    /**
     * Set product_classifications
     *
     * @param integer $productClassifications
     * @return Product
     */
    public function setProductClassifications($productClassifications)
    {
        $this->product_classifications = $productClassifications;
    
        return $this;
    }

    /**
     * Get product_classifications
     *
     * @return integer 
     */
    public function getProductClassifications()
    {
        return $this->product_classifications;
    }

    /**
     * Set service_classification_match
     *
     * @param integer $serviceClassificationMatch
     * @return Product
     */
    public function setServiceClassificationMatch($serviceClassificationMatch)
    {
        $this->service_classification_match = $serviceClassificationMatch;
    
        return $this;
    }

    /**
     * Get service_classification_match
     *
     * @return integer 
     */
    public function getServiceClassificationMatch()
    {
        return $this->service_classification_match;
    }

    /**
     * Set service_classifications
     *
     * @param integer $serviceClassifications
     * @return Product
     */
    public function setServiceClassifications($serviceClassifications)
    {
        $this->service_classifications = $serviceClassifications;
    
        return $this;
    }

    /**
     * Get service_classifications
     *
     * @return integer 
     */
    public function getServiceClassifications()
    {
        return $this->service_classifications;
    }

    /**
     * Set product_attribute_match
     *
     * @param integer $productAttributeMatch
     * @return Product
     */
    public function setProductAttributeMatch($productAttributeMatch)
    {
        $this->product_attribute_match = $productAttributeMatch;
    
        return $this;
    }

    /**
     * Get product_attribute_match
     *
     * @return integer 
     */
    public function getProductAttributeMatch()
    {
        return $this->product_attribute_match;
    }

    /**
     * Set product_attributes
     *
     * @param integer $productAttributes
     * @return Product
     */
    public function setProductAttributes($productAttributes)
    {
        $this->product_attributes = $productAttributes;
    
        return $this;
    }

    /**
     * Get product_attributes
     *
     * @return integer 
     */
    public function getProductAttributes()
    {
        return $this->product_attributes;
    }

    /**
     * Set service_attribute_match
     *
     * @param integer $serviceAttributeMatch
     * @return Product
     */
    public function setServiceAttributeMatch($serviceAttributeMatch)
    {
        $this->service_attribute_match = $serviceAttributeMatch;
    
        return $this;
    }

    /**
     * Get service_attribute_match
     *
     * @return integer 
     */
    public function getServiceAttributeMatch()
    {
        return $this->service_attribute_match;
    }

    /**
     * Set service_attributes
     *
     * @param integer $serviceAttributes
     * @return Product
     */
    public function setServiceAttributes($serviceAttributes)
    {
        $this->service_attributes = $serviceAttributes;
    
        return $this;
    }

    /**
     * Get service_attributes
     *
     * @return integer 
     */
    public function getServiceAttributes()
    {
        return $this->service_attributes;
    }

    /**
     * Set relevance
     *
     * @param integer $relevance
     * @return Product
     */
    public function setRelevance($relevance)
    {
        $this->relevance = $relevance;
    
        return $this;
    }

    /**
     * Get relevance
     *
     * @return integer 
     */
    public function getRelevance()
    {
        return $this->relevance;
    }

    /**
     * Set total_criteria
     *
     * @param integer $totalCriteria
     * @return Product
     */
    public function setTotalCriteria($totalCriteria)
    {
        $this->total_criteria = $totalCriteria;
    
        return $this;
    }

    /**
     * Get total_criteria
     *
     * @return integer 
     */
    public function getTotalCriteria()
    {
        return $this->total_criteria;
    }

    /**
     * Set percent_relevance
     *
     * @param integer $percentRelevance
     * @return Product
     */
    public function setPercentRelevance($percentRelevance)
    {
        $this->percent_relevance = $percentRelevance;
    
        return $this;
    }

    /**
     * Get percent_relevance
     *
     * @return integer 
     */
    public function getPercentRelevance()
    {
        return $this->percent_relevance;
    }

    /**
     * Set attribute_id_address
     *
     * @param string $attributeIdAddress
     * @return Product
     */
    public function setAttributeIdAddress($attributeIdAddress)
    {
        $this->attribute_id_address = $attributeIdAddress;
    
        return $this;
    }

    /**
     * Get attribute_id_address
     *
     * @return string 
     */
    public function getAttributeIdAddress()
    {
        return $this->attribute_id_address;
    }

    /**
     * Set attribute_id_address_description
     *
     * @param string $attributeIdAddressDescription
     * @return Product
     */
    public function setAttributeIdAddressDescription($attributeIdAddressDescription)
    {
        $this->attribute_id_address_description = $attributeIdAddressDescription;
    
        return $this;
    }

    /**
     * Get attribute_id_address_description
     *
     * @return string 
     */
    public function getAttributeIdAddressDescription()
    {
        return $this->attribute_id_address_description;
    }

    /**
     * Set attribute_id_address_description_mv
     *
     * @param string $attributeIdAddressDescriptionMv
     * @return Product
     */
    public function setAttributeIdAddressDescriptionMv($attributeIdAddressDescriptionMv)
    {
        $this->attribute_id_address_description_mv = $attributeIdAddressDescriptionMv;
    
        return $this;
    }

    /**
     * Get attribute_id_address_description_mv
     *
     * @return string 
     */
    public function getAttributeIdAddressDescriptionMv()
    {
        return $this->attribute_id_address_description_mv;
    }

    /**
     * Set address_line_1
     *
     * @param string $addressLine1
     * @return Product
     */
    public function setAddressLine1($addressLine1)
    {
        $this->address_line_1 = $addressLine1;
    
        return $this;
    }

    /**
     * Get address_line_1
     *
     * @return string 
     */
    public function getAddressLine1()
    {
        return $this->address_line_1;
    }

    /**
     * Set suburb_name
     *
     * @param string $suburbName
     * @return Product
     */
    public function setSuburbName($suburbName)
    {
        $this->suburb_name = $suburbName;
    
        return $this;
    }

    /**
     * Get suburb_name
     *
     * @return string 
     */
    public function getSuburbName()
    {
        return $this->suburb_name;
    }

    /**
     * Set area_name
     *
     * @param string $areaName
     * @return Product
     */
    public function setAreaName($areaName)
    {
        $this->area_name = $areaName;
    
        return $this;
    }

    /**
     * Get area_name
     *
     * @return string 
     */
    public function getAreaName()
    {
        return $this->area_name;
    }

    /**
     * Set address_postal_code
     *
     * @param string $addressPostalCode
     * @return Product
     */
    public function setAddressPostalCode($addressPostalCode)
    {
        $this->address_postal_code = $addressPostalCode;
    
        return $this;
    }

    /**
     * Get address_postal_code
     *
     * @return string 
     */
    public function getAddressPostalCode()
    {
        return $this->address_postal_code;
    }

    /**
     * Set same_postal_address_flag
     *
     * @param string $samePostalAddressFlag
     * @return Product
     */
    public function setSamePostalAddressFlag($samePostalAddressFlag)
    {
        $this->same_postal_address_flag = $samePostalAddressFlag;
    
        return $this;
    }

    /**
     * Get same_postal_address_flag
     *
     * @return string 
     */
    public function getSamePostalAddressFlag()
    {
        return $this->same_postal_address_flag;
    }

    /**
     * Set override_domestic_region_flag
     *
     * @param string $overrideDomesticRegionFlag
     * @return Product
     */
    public function setOverrideDomesticRegionFlag($overrideDomesticRegionFlag)
    {
        $this->override_domestic_region_flag = $overrideDomesticRegionFlag;
    
        return $this;
    }

    /**
     * Get override_domestic_region_flag
     *
     * @return string 
     */
    public function getOverrideDomesticRegionFlag()
    {
        return $this->override_domestic_region_flag;
    }

    /**
     * Set geocode_gda_latitude
     *
     * @param string $geocodeGdaLatitude
     * @return Product
     */
    public function setGeocodeGdaLatitude($geocodeGdaLatitude)
    {
        $this->geocode_gda_latitude = $geocodeGdaLatitude;
    
        return $this;
    }

    /**
     * Get geocode_gda_latitude
     *
     * @return string 
     */
    public function getGeocodeGdaLatitude()
    {
        return $this->geocode_gda_latitude;
    }

    /**
     * Set geocode_gda_longitude
     *
     * @param string $geocodeGdaLongitude
     * @return Product
     */
    public function setGeocodeGdaLongitude($geocodeGdaLongitude)
    {
        $this->geocode_gda_longitude = $geocodeGdaLongitude;
    
        return $this;
    }

    /**
     * Get geocode_gda_longitude
     *
     * @return string 
     */
    public function getGeocodeGdaLongitude()
    {
        return $this->geocode_gda_longitude;
    }

    /**
     * Set attribute_id_geocode_proj_sys
     *
     * @param string $attributeIdGeocodeProjSys
     * @return Product
     */
    public function setAttributeIdGeocodeProjSys($attributeIdGeocodeProjSys)
    {
        $this->attribute_id_geocode_proj_sys = $attributeIdGeocodeProjSys;
    
        return $this;
    }

    /**
     * Get attribute_id_geocode_proj_sys
     *
     * @return string 
     */
    public function getAttributeIdGeocodeProjSys()
    {
        return $this->attribute_id_geocode_proj_sys;
    }

    /**
     * Set attribute_id_geocode_proj_sys_description
     *
     * @param string $attributeIdGeocodeProjSysDescription
     * @return Product
     */
    public function setAttributeIdGeocodeProjSysDescription($attributeIdGeocodeProjSysDescription)
    {
        $this->attribute_id_geocode_proj_sys_description = $attributeIdGeocodeProjSysDescription;
    
        return $this;
    }

    /**
     * Get attribute_id_geocode_proj_sys_description
     *
     * @return string 
     */
    public function getAttributeIdGeocodeProjSysDescription()
    {
        return $this->attribute_id_geocode_proj_sys_description;
    }

    /**
     * Set attribute_id_geocode_proj_sys_description_mv
     *
     * @param string $attributeIdGeocodeProjSysDescriptionMv
     * @return Product
     */
    public function setAttributeIdGeocodeProjSysDescriptionMv($attributeIdGeocodeProjSysDescriptionMv)
    {
        $this->attribute_id_geocode_proj_sys_description_mv = $attributeIdGeocodeProjSysDescriptionMv;
    
        return $this;
    }

    /**
     * Get attribute_id_geocode_proj_sys_description_mv
     *
     * @return string 
     */
    public function getAttributeIdGeocodeProjSysDescriptionMv()
    {
        return $this->attribute_id_geocode_proj_sys_description_mv;
    }

    /**
     * Add productimages
     *
     * @param \Como\AccommodationBundle\Entity\ProductImage $productimages
     * @return Product
     */
    public function addProductimage(\Como\AccommodationBundle\Entity\ProductImage $productimages)
    {
        $this->productimages[] = $productimages;
    
        return $this;
    }

    /**
     * Remove productimages
     *
     * @param \Como\AccommodationBundle\Entity\ProductImage $productimages
     */
    public function removeProductimage(\Como\AccommodationBundle\Entity\ProductImage $productimages)
    {
        $this->productimages->removeElement($productimages);
    }

    /**
     * Get productimages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductimages()
    {
        return $this->productimages;
    }
    
//    public function getShowProductImage()
//    {
//        return $this->productimages[0];
//    }

    public function __toString()
    {
        return $this->getProductAttrId();
    }
}