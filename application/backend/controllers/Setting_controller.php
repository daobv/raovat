<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');

class Setting_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('form_validation');

        $data['title'] = 'Cài đặt hệ thống';
        $data['template'] = 'setting';
        $data['data']['db'] = $this->getModel('config_model')->getConfigArray();
        $data['data']['config'] = $this->getConfigFields();

        foreach ($data['data']['config'] as $key => $config) {
            if (!empty($config['validate']))
                $this->form_validation->set_rules($key, $config['label'], $config['validate']);
        }

        $this->form_validation->set_error_delimiters('<div id="report-error" class="report-div error"><p>', '</p></div>');

        if ($_POST && $this->form_validation->run()) {
            //Save config to database:
            $this->save($_POST);
        }
        $this->load->view('layout/layout', $data);
    }

    public function save($data)
    {
        $configModel = $this->getModel('config_model');
        foreach ($data as $key => $value) {
            if ($configModel->record_count(array('name' => $key)) > 0) {
                //Update:
                $this->db->update($configModel->tableName(), array('value' => $value), array('name' => $key));
            } else {
                //Insert:
                $configModel->setData(array('name' => $key, 'value' => $value))->save();
            }

            //Setting config:
            if ($this->config->item($key)) {
                $this->config->set_item($key, $value);
            }
        }
        redirect(base_url('admin/setting'));
    }

    public function getConfigFields()
    {
        return array(
            'test_field' => array(
                'label' => 'Integer field',
                'validate' => 'integer'
            ),
            'test3' => array(
                'label' => 'Test',
                'validate' => ''
            ),
        );
    }
}