<?php
require_once('Controller.php');
class User_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('user/index');
    }
    public function login(){
        $this->load->view('user/login');
    }
}