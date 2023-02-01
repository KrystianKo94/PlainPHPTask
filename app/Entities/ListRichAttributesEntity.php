<?php

namespace App\Entities;

class ListRichAttributesEntity
{
    private $idProductType;
    private $codeAttribute;
    private $description;
    private $unitAttribute;

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
    public function setIdProductType($idProductType): void
    {
        $this->idProductType = $idProductType;
    }

    /**
     * @return mixed
     */
    public function getCodeAttribute()
    {
        return $this->codeAttribute;
    }

    /**
     * @param mixed $codeAttribute
     */
    public function setCodeAttribute($codeAttribute): void
    {
        $this->codeAttribute = $codeAttribute;
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

    /**
     * @return mixed
     */
    public function getUnitAttribute()
    {
        return $this->unitAttribute;
    }

    /**
     * @param mixed $unitAttribute
     */
    public function setUnitAttribute($unitAttribute): void
    {
        $this->unitAttribute = $unitAttribute;
    }
}