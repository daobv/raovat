<?php
require_once('Abstract_model.php');
class Product_Meta_model extends Abstract_Model{
    public $id;
    public $product_id;
    public $name;
    public $value;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'product_meta';
    }
}