<?php
require_once('Abstract_model.php');
class Category_Approver_model extends Abstract_Model
{
    public $id;
    public $category_id;
    public $user_id;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'category_approver';
    }
}