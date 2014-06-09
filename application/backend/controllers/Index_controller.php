<?php
require_once('Controller.php');
class Index_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function  index(){
        $temp['title'] = "Trình Quản lí";
        $temp['template'] = 'index/index';
        $temp['data'] = "Index";
        $this->load->view('layout/layout', $temp);
    }
}