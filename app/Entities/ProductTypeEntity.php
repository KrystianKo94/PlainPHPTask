<?php

namespace App\Entities;

class ProductTypeEntity
{
    private $idProductType;
    private $name;

    /**
     * @return mixed
     */
    public function getIdProductType()
    {
        return $this->idProductType;
    }

    /**
     * @param mixed $idProductType
     */
    public function setIdProductType($idProductType)
    {
        $this->idProductType = $idProductType;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}