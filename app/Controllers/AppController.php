<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\AttributeProductModel;
use App\Models\ProductModel;
use App\Models\ProductType;
use App\Core\Validation;

class AppController extends Controller
{
    private $model;
    public function __construct()
    {
            $this->model = new ProductModel();
    }

    public function index()
    {
        $data = $this->model->getListCard();
        $this->view('index', ['list' => $data]);
    }


    public function addProduct()
    {
        $this->model = new ProductType();
        $list_product = $this->model->getAllObject();
        $list_attributes = $this->model->getListRichAttributes();
        $this->view('add_product', array('list_product' => $list_product,
                                            'list_attributes' => $list_attributes));
    }
    public function addProductPost()
    {
        $validator = new Validation();
        $rule = array(
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required|numeric'
        );
        $message = array(
            'sku' => [
                'required' => 'Please, submit required data'
            ],
            'name' => [
                'required' => 'Please, submit required data'
            ],
            'price' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide numeric'
            ],
            'MB' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide size'
            ],
            'KG' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide weight'
            ],
            'Height' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide dimensions'
            ],
            'Width' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide dimensions'
            ],
            'Length' => [
                'required' => 'Please, submit required data',
                'numeric' => 'Please, provide dimensions'
            ],
        );
        $sku = $this->getPOST("sku");
        $name = $this->getPOST("name");
        $price = $this->getPOST("price");
        $idProductType = $this->getPOST("id_product_type");
        $dataToInsert = array(
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'id_product_type' => $idProductType);
        $this->model = new ProductType();
        $attributeListInfo = $this->model->getAttributeInfo($idProductType);
        foreach ($attributeListInfo as $attributeInfo) {
            $value = $this->getPOST($attributeInfo["code_attributes"]);
            $rule[$attributeInfo["code_attributes"]] = 'required|numeric';
        }
        if (!$validator->validate($rule, $message)) {
            echo json_encode(array('is_ok' => false, 'error' => $validator->getError()));
        } else {
            $this->model = new ProductModel();
            if ($this->model->skuIsUnique($sku)) {
                $this->model = new ProductModel();
                $idProduct = $this->model->create($dataToInsert);
                foreach ($attributeListInfo as $attributeInfo) {
                    $value = $this->getPOST($attributeInfo["code_attributes"]);
                    if ($value != null) {
                        $dataToInsert = array(
                            'id_product' => $idProduct,
                            'id_attribute' => $attributeInfo["id_attributes"],
                            'value' => $value);
                        $this->model = new AttributeProductModel();
                        $this->model->create($dataToInsert);
                    }
                }
                echo json_encode(['is_ok' => true, 'error' => $validator->getError()]);
            } else {
                $error = $validator->getError();
                $error["sku"] = ["This field must be unique"];
                echo json_encode(['is_ok' => false, 'error' => $error]);
            }
        }
    }

    public function removeProducts()
    {
        $model = new AttributeProductModel();
        $list = $this->getJSON();
        foreach ($list->listProducts as $element) {
            $model = new AttributeProductModel();
            $model->deleteWhere("id_product", $element);
            $model = new ProductModel();
            $model->delete($element);
        }
        echo json_encode("OK");
    }
}
