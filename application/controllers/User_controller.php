<?php
require_once('Controller.php');
class User_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

    }
    public function profile(){
        $data['title'] = 'AutoMarket';
        $data['content'] = "test";
        $this->load->view('user',$data);
    }
}