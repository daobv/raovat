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
        $temp['title'] = "List danh mục";
        $temp['template'] = 'category/index';
        $temp['data'] = $this->getModel('category_model')->record_count();
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

    public function datatable()
    {
        $this->load->library('SSP');
        $table = $this->getModel('category_model')->tableName();

        $primaryKey = 'id';

        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'name', 'dt' => 1),
            array('db' => 'root', 'dt' => 2),
            array('db' => 'description', 'dt' => 3),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }
}