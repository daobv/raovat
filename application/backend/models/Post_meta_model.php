<?php
require_once('Abstract_model.php');
class Post_meta_model extends Abstract_Model{
    public $id;
    public $post_id;
    public $name;
    public $value;
    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'post_meta';
    }
}