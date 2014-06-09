<?php
require_once('Controller.php');
class Category_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('category');
        $crud->set_subject('Category');
        $crud->required_fields('name','description','root','slug','page_title','content_tag','category_type');
        $crud->columns('id','name','description','root','slug','page_title','content_tag','category_type');

        $output = $crud->render();

        $this->_output($output);
    }

    public function _output($output = null)
    {
        $this->load->view('example.php',$output);
    }
}