<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Controller.php');
class Category_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'AutoMarket';

        $data['content'] = "test";
        $this->load->view('category',$data);
    }
}