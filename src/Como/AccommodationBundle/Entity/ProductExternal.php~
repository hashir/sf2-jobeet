<?php

namespace Como\AccommodationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductExternal
 */
class ProductExternal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $txa_attribute;

    /**
     * @var string
     */
    private $provider_short_name;

    /**
     * @var \Como\AccommodationBundle\Entity\Product
     */
    private $product;


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
     * Set txa_attribute
     *
     * @param string $txaAttribute
     * @return ProductExternal
     */
    public function setTxaAttribute($txaAttribute)
    {
        $this->txa_attribute = $txaAttribute;
    
        return $this;
    }

    /**
     * Get txa_attribute
     *
     * @return string 
     */
    public function getTxaAttribute()
    {
        return $this->txa_attribute;
    }

    /**
     * Set provider_short_name
     *
     * @param string $providerShortName
     * @return ProductExternal
     */
    public function setProviderShortName($providerShortName)
    {
        $this->provider_short_name = $providerShortName;
    
        return $this;
    }

    /**
     * Get provider_short_name
     *
     * @return string 
     */
    public function getProviderShortName()
    {
        return $this->provider_short_name;
    }

    /**
     * Set product
     *
     * @param \Como\AccommodationBundle\Entity\Product $product
     * @return ProductExternal
     */
    public function setProduct(\Como\AccommodationBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Como\AccommodationBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    public function __toString()
    {
        return $this->getProviderShortName();
    }    
}