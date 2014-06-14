<?php
require_once('Controller.php');
class Post_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        var_dump($this->request());
    }
    public  function view(){
        $data['title'] = 'AutoMarket';

        $data['content'] = "test";
        $this->load->view('detail',$data);
    }
}