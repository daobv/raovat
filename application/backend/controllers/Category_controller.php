<?php
require_once('Controller.php');

class Category_controller extends Controller
{
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

        $crud->set_table('category');
        $crud->columns('name', 'slug', 'description', 'root', 'page_title', 'content_tag', 'category_type', 'order');
        $crud->required_fields('name', 'slug', 'description', 'root', 'page_title', 'content_tag', 'category_type', 'order');
        $crud->unique_fields('slug');
        $crud->display_as('name', 'Tên danh mục')
            ->display_as('slug', 'Đường dẫn')
            ->display_as('description', 'Mô tả')
            ->display_as('root', 'Danh mục cha')
            ->display_as('page_title', 'Tiêu đề trang')
            ->display_as('content_tag', 'Meta Content')
            ->display_as('category_type', 'Kiểu danh mục')
            ->display_as('order', 'Thứ tự');

        $crud->field_type('root', 'dropdown', $this->getDropdownRoot());
        $crud->field_type('category_type', 'dropdown', $this->getDropdownCategoryType());
        $crud->field_type('order', 'integer');
        $crud->set_subject('Danh mục');
        $output = $crud->render();
        $this->_example_output($output);
    }

    public function _example_output($output = null)
    {
        $data['title'] = 'Quản lý danh mục';
        $data['template'] = 'grid_view';
        $data['data'] = $output;

        $this->load->view('layout/layout', $data);
    }

    public function getDropdownRoot()
    {
        $id = (int)$this->uri->segment(4);

        $data = $this->getModel('category_model')->listAll(array('id', 'name'), array('id !=' => $id));
        $result = array('0' => 'Danh mục Root');
        foreach ($data as $item) {
            $result[$item['id']] = $item['name'];
        }

        return $result;
    }

    public function getDropdownCategoryType()
    {
        return array(
            '0' => 'Danh mục sản phẩm',
            '1' => 'Danh mục từ thiện'
        );
    }
}