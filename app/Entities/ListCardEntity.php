<?php

namespace App\Entities;

class ListCardEntity
{
    private $idProduct;
    private $nameProduct;
    private $sku;
    private $price;
    private $value;
    private $code;
    private $description;

    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed $idProduct
     */
    public function setIdProduct($idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return mixed
     */
    public function getNameProduct()
    {
        return $this->nameProduct;
    }

    /**
     * @param mixed $nameProduct
     */
    public function setNameProduct($nameProduct): void
    {
        $this->nameProduct = $nameProduct;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
}