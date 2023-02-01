<?php

namespace App\Statics;

class DatabaseStatic
{
    public static $SQL_FIND_ALL = "Select * from %table_name%";
    public static $SQL_FIND_ONE_ID = "Select * from %table_name% where %id% = :id";
    public static $SQL_FIND_ONE_WHERE = "Select * from %table_name% where %col% = %val%";
    public static $SQL_INSERT_INTO_ID = "Insert into %table_name% (%col%) values (%val%)";
    public static $SQL_DELETE_BY_ID = "DELETE FROM %table_name% where %id% = :id ";
    public static $SQL_DELETE_BY_COL_NAME = "DELETE FROM %table_name% where %col% = :id ";
    public static $SQL_LIST_CARD = "SELECT 
	p.id_product ,
	p.name,
	p.sku,
	p.price,
	pt.name name_type,
	(Select GROUP_CONCAT(pav.value separator 'x') 
	from 
	Product_Attributes_Value pav where pav.id_product = p.id_product) attr_value,
	(Select GROUP_CONCAT(a.code_attributes  separator ',') 
	from 
	Product_Attributes_Value pav join 
	`Attributes` a on a.id_attributes = pav.id_attribute  
	where pav.id_product = p.id_product) attr_code,
	(SELECT 
GROUP_CONCAT( tmp.description)
from ( 
Select DISTINCT 
	pt.id_product_type id,
	a.description 
from
	Product_Type pt join
	Product_Type_Atributes pta on pta.id_product_type = pt.id_product_type JOIN 
	`Attributes` a  on a.id_attributes = pta.id_attributes
 ) tmp
 where
tmp.id = pt.id_product_type) attr_desc
FROM 
Product p join
Product_Type pt on pt.id_product_type =p.id_product_type ";

    public static $SQL_LIST_RICH_ATTRIBUTES ="SELECT 	
	pt.id_product_type,
	a.code_attributes,
	a.description,
	a.unit_attributes 
from
	Product_Type pt join
	Product_Type_Atributes pta on pta.id_product_type = pt.id_product_type JOIN 
	`Attributes` a  on a.id_attributes = pta.id_attributes";

    public static $SQL_LIST_DATA_TO_INSERT = "SELECT 	
	pt.id_product_type,
	a.code_attributes,
	a.id_attributes 
from
	Product_Type pt join
	Product_Type_Atributes pta on pta.id_product_type = pt.id_product_type JOIN 
	`Attributes` a  on a.id_attributes = pta.id_attributes
WHERE 
	pt.id_product_type =?";

}