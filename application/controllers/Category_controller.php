<?php
require_once('Controller.php');
class Category_controller extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        var_dump($this->request());
    }
}