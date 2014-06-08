<?php
require_once('Abstract_model.php');
class Post_model extends Abstract_Model{
    public $id;
    public $title;
    public $slug;
    public $description;
    public $content;
    public $date;
    public $author;
    public $category_id;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'post';
    }
}