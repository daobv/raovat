<?php
require_once('Abstract_model.php');
class Config_model extends Abstract_Model{
    public $id;
    public $name;
    public $value;
    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'config';
    }
}