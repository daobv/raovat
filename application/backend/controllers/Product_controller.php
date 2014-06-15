<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');

class Product_controller extends Controller
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

        $crud->set_table('product');
        $crud->columns('name', 'slug', 'price', 'manufacturer', 'image', 'description', 'page_title', 'content_tag', 'date', 'city_id', 'author_id', 'status');
        $crud->required_fields('name', 'slug', 'price', 'manufacturer', 'description', 'page_title', 'content_tag', 'city_id', 'author_id', 'status');
        $crud->add_fields('name', 'slug', 'price', 'manufacturer', 'image', 'gallery', 'description', 'page_title', 'content_tag', 'city_id', 'author_id', 'status');
        $crud->edit_fields('name', 'slug', 'price', 'manufacturer', 'image', 'gallery', 'description', 'page_title', 'content_tag', 'city_id', 'author_id', 'status');
        $crud->unique_fields('slug');
        $crud->display_as('name', 'Tên sản phẩm')
            ->display_as('slug', 'Đường dẫn')
            ->display_as('price', 'Giá')
            ->display_as('manufacturer', 'Hãng sản xuất')
            ->display_as('image', 'Ảnh chính')
            ->display_as('gallery', 'Ảnh phụ')
            ->display_as('description', 'Mô tả')
            ->display_as('page_title', 'Tiêu đề trang')
            ->display_as('content_tag', 'Meta Content')
            ->display_as('date', 'Ngày tạo')
            ->display_as('city_id', 'Tỉnh thành')
            ->display_as('author_id', 'Người tạo')
            ->display_as('status', 'Trạng thái')
            ->set_field_upload('image', '../assets/uploads/')
            ->set_rules('price', 'Giá', 'numeric')
            ->set_subject('Sản phẩm')
            ->callback_field('gallery', array($this, 'multiple_upload'));

        $crud->set_relation('author_id', 'user', 'first_name');
        $crud->set_relation('city_id', 'city', 'name');

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function _example_output($output = null)
    {
        $data['title'] = 'Quản lý sản phẩm';
        $data['template'] = 'grid_view';
        $data['data'] = $output;

        $this->load->view('layout/layout', $data);
    }

    function multiple_upload($value = '', $primary_key = null)
    {
        return '<iframe style="border:none;overflow-x:hidden" scrolling-x="no" width="680" height="300" border="0" src="' . base_url() . 'admin/upload/index/' . $primary_key . '"></iframe>';
    }
}