<?php
require_once('Controller.php');
class User_controller extends Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }
    public function _example_output($output = null)
    {
        $this->load->view('example.php',$output);
    }

    public function index()
    {
        $crud = new Grocery_CRUD();

        $crud->set_table('user');
        $crud->columns('username','gender','first_name','last_name','dob','email','phone');
        $crud->display_as('username','Tài Khoản')
             ->display_as('password','Mật Khẩu')
            ->display_as('gender','Giới Tính')
            ->display_as('first_name','Tên')
            ->display_as('last_name','Họ')
            ->display_as('dob','Ngày Sinh')
            ->display_as('email','Email')
            ->display_as('phone','Điện Thoại')
            ->display_as('avatar','Ảnh đại diện')
            ->field_type('password','password')
            ->set_field_upload('avatar','../assets/uploads/');
        $crud->set_subject('user');

        $output = $crud->render();
        $this->_example_output($output);
    }
}