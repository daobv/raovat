<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');
class Index_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $this->setArea('admin+mod');
        $temp['title'] = "Trình Quản lí";
        $temp['template'] = 'index/index';
        $temp['data'] = "Index";
        $this->load->view('layout/layout', $temp);
    }

    public function login()
    {
        if ($this->session->userdata('isLoggedIn') &&
            ($this->session->userdata('isMod') || $this->session->userdata('isAdmin'))) {
            redirect(base_url('admin'));
        }

        $data['title'] = "Đăng nhập hệ thống";
        $this->load->view('user/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }

    public function loginpost()
    {
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])) {
            if ($this->getModel('user_model')->authenticate($_POST['username'], $_POST['password'])) {
                if ($this->_getReferer()) {
                    redirect($this->_getReferer());
                }

                redirect(base_url('admin'));
            }
        }

        redirect(base_url('admin/login'));
    }
}