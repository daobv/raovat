<?php
require_once('Abstract_model.php');
class Product_category_model extends Abstract_Model
{
    public $id;
    public $product_id;
    public $category_id;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'product_category';
    }
}