<?php
require_once('Controller.php');
class Index_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $temp['title']="Admin Template";
        $temp['template']='index/index';
        $temp['data']['info']='Test Data';
        $this->load->view('layout/layout',$temp);
    }
}