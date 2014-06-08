<?php
require_once('Abstract_model.php');
class Product_model extends Abstract_Model{
    public $id;
    public $name;
    public $price;
    public $manufacturer;
    public $image;
    public $description;
    public $date;
    public $city_id;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'product';
    }
}