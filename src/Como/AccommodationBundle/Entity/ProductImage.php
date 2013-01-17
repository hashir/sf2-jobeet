<?php

namespace Como\AccommodationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImage
 */
class ProductImage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $market_variant_name;

    /**
     * @var string
     */
    private $multimedia_id;

    /**
     * @var string
     */
    private $server_path;

    /**
     * @var string
     */
    private $attribute_id_multimedia_file;

    /**
     * @var string
     */
    private $attribute_id_multimedia_content;

    /**
     * @var string
     */
    private $attribute_id_size_orientation;

    /**
     * @var string
     */
    private $width;

    /**
     * @var string
     */
    private $height;

    /**
     * @var string
     */
    private $alt_text;

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
    
    public function __toString()
    {
        return "<img src=".$this->getServerPath().">";
//        return $this->getServerPath();
    }

    /**
     * Set market_variant_name
     *
     * @param string $marketVariantName
     * @return ProductImage
     */
    public function setMarketVariantName($marketVariantName)
    {
        $this->market_variant_name = $marketVariantName;
    
        return $this;
    }

    /**
     * Get market_variant_name
     *
     * @return string 
     */
    public function getMarketVariantName()
    {
        return $this->market_variant_name;
    }

    /**
     * Set multimedia_id
     *
     * @param string $multimediaId
     * @return ProductImage
     */
    public function setMultimediaId($multimediaId)
    {
        $this->multimedia_id = $multimediaId;
    
        return $this;
    }

    /**
     * Get multimedia_id
     *
     * @return string 
     */
    public function getMultimediaId()
    {
        return $this->multimedia_id;
    }

    /**
     * Set server_path
     *
     * @param string $serverPath
     * @return ProductImage
     */
    public function setServerPath($serverPath)
    {
        $this->server_path = $serverPath;
    
        return $this;
    }

    /**
     * Get server_path
     *
     * @return string 
     */
    public function getServerPath()
    {
        return $this->server_path;
    }

    /**
     * Set attribute_id_multimedia_file
     *
     * @param string $attributeIdMultimediaFile
     * @return ProductImage
     */
    public function setAttributeIdMultimediaFile($attributeIdMultimediaFile)
    {
        $this->attribute_id_multimedia_file = $attributeIdMultimediaFile;
    
        return $this;
    }

    /**
     * Get attribute_id_multimedia_file
     *
     * @return string 
     */
    public function getAttributeIdMultimediaFile()
    {
        return $this->attribute_id_multimedia_file;
    }

    /**
     * Set attribute_id_multimedia_content
     *
     * @param string $attributeIdMultimediaContent
     * @return ProductImage
     */
    public function setAttributeIdMultimediaContent($attributeIdMultimediaContent)
    {
        $this->attribute_id_multimedia_content = $attributeIdMultimediaContent;
    
        return $this;
    }

    /**
     * Get attribute_id_multimedia_content
     *
     * @return string 
     */
    public function getAttributeIdMultimediaContent()
    {
        return $this->attribute_id_multimedia_content;
    }

    /**
     * Set attribute_id_size_orientation
     *
     * @param string $attributeIdSizeOrientation
     * @return ProductImage
     */
    public function setAttributeIdSizeOrientation($attributeIdSizeOrientation)
    {
        $this->attribute_id_size_orientation = $attributeIdSizeOrientation;
    
        return $this;
    }

    /**
     * Get attribute_id_size_orientation
     *
     * @return string 
     */
    public function getAttributeIdSizeOrientation()
    {
        return $this->attribute_id_size_orientation;
    }

    /**
     * Set width
     *
     * @param string $width
     * @return ProductImage
     */
    public function setWidth($width)
    {
        $this->width = $width;
    
        return $this;
    }

    /**
     * Get width
     *
     * @return string 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     * @return ProductImage
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set alt_text
     *
     * @param string $altText
     * @return ProductImage
     */
    public function setAltText($altText)
    {
        $this->alt_text = $altText;
    
        return $this;
    }

    /**
     * Get alt_text
     *
     * @return string 
     */
    public function getAltText()
    {
        return $this->alt_text;
    }

    /**
     * Set product
     *
     * @param \Como\AccommodationBundle\Entity\Product $product
     * @return ProductImage
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
}