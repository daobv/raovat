<?php
require_once('Abstract_model.php');
class User_model extends Abstract_Model{
    public $id;
    public $username;
    public $password;
    public $gender;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $dob;
    public $email;
    public $phone;
    public $address;
    public $avatar;
    public $role;
    public $is_activate;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'user';
    }
}