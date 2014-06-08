<?php
require_once('Controller.php');
class Category_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/category/index');
        $config['total_rows'] = $this->getModel('category_model')->record_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $temp['links'] = $this->pagination->create_links();

        $temp['title'] = "List danh mục";
        $temp['template'] = 'category/index';
        $temp['data'] = $this->getModel('category_model')->fetch($config['per_page'], $page);
        $this->load->view('layout/layout', $temp);
    }

    public function form()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) $isnew = false;
        else $isnew = true;

        $this->form_validation->set_rules('name', 'Tên danh mục', 'required');
        $this->form_validation->set_rules('root', 'Danh mục cha', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('page_title', 'Tiêu đề trang', 'required');
        $this->form_validation->set_rules('description', 'Mô tả', 'required');
        $this->form_validation->set_rules('content_tag', 'Tags', 'required');
        $this->form_validation->set_rules('category_type', 'Kiểu danh mục', 'required');

        if ($isnew)
            $temp['title'] = "Tạo mới danh mục";
        else
            $temp['title'] = "Cập nhật danh mục";

        $temp['template'] = 'category/form';
        $categories = $this->getModel('category_model')->listAll(array('id', 'name'), array('category_type' => 0));
        $list = array("" => "", "0" => "Danh mục Root");
        foreach ($categories as $cate) {
            if (!$isnew && $cate['id'] == $_GET['id']) continue;
            $list[$cate['id']] = $cate['name'];
        }
        $temp['data']['dropdownlist'] = $list;

        if (!$isnew)
            $temp['data']['form_data'] = $this->getModel('category_model')->load($_GET['id']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout', $temp);
        } else {
            try {
                $this->getModel('category_model')->setData($_POST)->save();
                redirect(base_url('admin/category'));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    public function del()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->getModel('category_model')->del($id);
            redirect(base_url('admin/category'));
        }
    }
}