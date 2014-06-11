<?php
require_once('Abstract_model.php');
class Category_model extends Abstract_Model{

    public $id;
    public $root;
    public $name;
    public $slug;
    public $description;
    public $page_title;
    public $content_tag;
    public $category_type;
    public $order;

    function __construct()
    {
        parent::__construct();
    }

    public function tableName()
    {
        return 'category';
    }
}