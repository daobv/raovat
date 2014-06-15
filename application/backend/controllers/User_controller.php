<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');
class User_controller extends Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

        $this->load->library('grocery_CRUD');
        $this->setArea('admin+mod');
    }
    public function index()
    {
        $crud = new Grocery_CRUD();

        $crud->set_table('user');
        $crud->columns('username','gender','first_name','last_name','dob','email','phone');
        $crud->required_fields('username', 'password', 'gender','first_name','last_name','email');
        $crud->unique_fields('username','email');
        $crud->unset_read();
        $crud->display_as('username','Tài Khoản')
             ->display_as('password','Mật Khẩu')
            ->display_as('gender','Giới Tính')
            ->display_as('first_name','Tên')
            ->display_as('middle_name','Tên Đệm')
            ->display_as('last_name','Họ')
            ->display_as('dob','Ngày Sinh')
            ->display_as('email','Email')
            ->display_as('phone','Điện Thoại')
            ->display_as('avatar','Ảnh đại diện')
            ->field_type('password','password')
            ->field_type('gender', 'dropdown', $this->getDropdownGender())
            ->field_type('role', 'dropdown', $this->getDropdownRole())
            ->set_field_upload('avatar','../assets/uploads/');
        $crud->set_subject('user');

        $crud->callback_edit_field('password', array($this, 'set_password_input_to_empty'));
        $crud->callback_add_field('password', array($this, 'set_password_input_to_empty'));
        $crud->callback_before_insert(array($this, 'encrypt_password'));
        $crud->callback_before_update(array($this, 'encrypt_password'));
        $output = $crud->render();
        $this->_example_output($output);
    }
    public function _example_output($output = null)
    {
        $data['title'] = 'Quản lý User';
        $data['template'] = 'grid_view';
        $data['data'] = $output;

        $this->load->view('layout/layout', $data);
    }

    public function getDropdownGender()
    {
        return array(
            '0' => 'Nữ',
            '1' => 'Nam'
        );
    }

    public function getDropdownRole()
    {
        return array(
            '0' => 'Người dùng thường',
            '1' => 'Moderator',
            '2' => 'Administrator'
        );
    }

    public function encrypt_password($post_array) {
        $post_array['password'] = sha1($post_array['password']);
        return $post_array;
    }

    public function set_password_input_to_empty() {
        return '<input id="field-password" name="password" type="password" value="" maxlength="255">';
    }
}