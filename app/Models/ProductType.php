<?php

namespace App\Models;

use App\Entities\ListRichAttributesEntity;
use App\Entities\ProductTypeEntity;
use App\Statics\DatabaseStatic;

class ProductType extends \App\Core\BaseModel
{
    protected $nameTable = "Product_Type";
    protected $id = "id_product_type";
    protected $allowField = ['name'];

    public function getListRichAttributes()
    {
        $listRichAttributesArray = $this->db->executeQuery(DatabaseStatic::$SQL_LIST_RICH_ATTRIBUTES);
        $arrayList = array();
        foreach ($listRichAttributesArray as $card) {
            $richModel = new ListRichAttributesEntity();
            $richModel->setIdProductType($card['id_product_type']);
            $richModel->setCodeAttribute($card['code_attributes']);
            $richModel->setDescription($card['description']);
            $richModel->setUnitAttribute($card['unit_attributes']);
            array_push($arrayList, $richModel);
        }
        return $arrayList;
    }

    public function getAttributeInfo($idProductType)
    {
        $sql = DatabaseStatic::$SQL_LIST_DATA_TO_INSERT;
        $sql = str_replace('?', $idProductType, $sql);
        return $this->db->executeQuery($sql);
    }

    public function getAllObject()
    {
        $array = $this->findAll();
        $arrayList = array();
        foreach ($array as $element) {
            $richModel = new ProductTypeEntity();
            $richModel->setIdProductType($element['id_product_type']);
            $richModel->setName($element['name']);
            array_push($arrayList, $richModel);
        }
        return $arrayList;
    }
}
