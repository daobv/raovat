<?php
require_once('Abstract_model.php');
class Online_model extends Abstract_Model{
    public $id;
    public $user;
    public $ip;
    public $time;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'online';
    }
}