<?php

namespace App\Traits;

use App\Entities\ListCardEntity;
use App\Statics\DatabaseStatic;

trait ListCard
{
    public function getListCard(){
        $listCardArray =$this->db->executeQuery(DatabaseStatic::$SQL_LIST_CARD);
        $arrayCard = array();
        $listCardModel = new ListCardEntity();
        foreach ($listCardArray as $card){
            $listCardModel = new ListCardEntity();
            $listCardModel->setIdProduct($card["id_product"]);
            $listCardModel->setNameProduct($card["name"]);
            $listCardModel->setSku($card["sku"]);
            $listCardModel->setPrice($card["price"]);
            $listCardModel->setCode($card["attr_code"]);
            $listCardModel->setValue($card["attr_value"]);
            $listCardModel->setDescription($card["attr_desc"]);
            array_push($arrayCard,$listCardModel);
        }
        return $arrayCard;
    }
}