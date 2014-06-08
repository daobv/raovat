<?php
require_once('Abstract_model.php');
class Friend_model extends Abstract_Model{
    public $id;
    public $user;
    public $friend;
    public $status;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'friend';
    }
}