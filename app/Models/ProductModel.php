<?php

namespace App\Models;

use App\Traits\ListCard;

class ProductModel extends \App\Core\BaseModel
{
    use ListCard;

    protected $nameTable = "Product";
    protected $id = "id_product";
    protected $allowField = ['sku', 'name', 'price', 'id_product_type'];

    public function skuIsUnique($sku)
    {
        $data = $this->findWhere('sku', $sku);
        if ($data != null) {
            return false;
        } else {
            return true;
        }
    }
}
