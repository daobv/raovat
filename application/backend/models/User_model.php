<?php
require_once('Abstract_model.php');
class User_model extends Abstract_Model
{
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
        $this->load->library('session');
    }

    public function tableName()
    {
        return 'user';
    }

    public function authenticate($username, $password)
    {
        $this->db->from($this->tableName());
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $login = $this->db->get()->result();

        if (is_array($login) && count($login) == 1) {
            $this->setData($login[0]);
            $this->setSession();
            return true;
        }

        return false;
    }

    public function setSession()
    {
        $this->session->set_userdata(array(
                'username' => $this->username,
                'name' => $this->first_name . ' ' . $this->last_name,
                'email' => $this->email,
                'isLoggedIn' => true,
                'isMod' => $this->role == 1 ? true : false,
                'isAdmin' => $this->role == 2 ? true : false,
            )
        );
    }
}