<?php
require_once('Abstract_model.php');
class User_Meta_model extends Abstract_Model{
    public $id;
    public $user_id;
    public $name;
    public $value;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'user_meta';
    }
}