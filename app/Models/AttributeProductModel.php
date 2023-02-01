<?php

namespace App\Models;

class AttributeProductModel extends \App\Core\BaseModel
{
    protected $nameTable = "Product_Attributes_Value";
    protected $id = "id_product_attributes_value";
    protected $allowField = ['id_product', 'id_attribute', 'value'];
}
