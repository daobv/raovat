<?php
require_once('Abstract_model.php');
class Product_model extends Abstract_Model{
    public $id;
    public $name;
    public $slug;
    public $price;
    public $manufacturer;
    public $image;
    public $description;
    public $page_title;
    public $content_tag;
    public $date;
    public $city_id;
    public $author_id;
    public $status;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'product';
    }
}