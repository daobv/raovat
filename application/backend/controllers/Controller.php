<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Controller extends CI_Controller
{
    public $pageTitle;
    public $metaTag;
    public $contentTag;
    public $description;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function getModel($modelName)
    {
        if (!property_exists(get_class($this), $modelName))
            $this->load->model($modelName);
        return $this->$modelName;
    }

    public function setArea($key)
    {
        switch ($key) {
            case 'admin+mod':
                $condition = $this->session->userdata('isLoggedIn') &&
                    ($this->session->userdata('isMod') || $this->session->userdata('isAdmin'));
                break;
            case 'admin':
                $condition = $this->session->userdata('isLoggedIn') &&
                    $this->session->userdata('isAdmin');
                break;
            case 'mod':
                $condition = $this->session->userdata('isLoggedIn') &&
                    $this->session->userdata('isMod');
                break;
        }

        if (!$condition) {
            $this->_setReferer();
            redirect(base_url('admin/login'));
        }
    }

    protected function _setReferer()
    {
        $this->session->set_userdata(array(
                '_referer' => base_url('admin') . '/' . uri_string(),
            )
        );
        return;
    }

    protected function _getReferer()
    {
        return $this->session->userdata('_referer');
    }
}