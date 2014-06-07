<?php
class Controller extends CI_Controller {
    public $pageTitle;
    public $metaTag;
    public $contentTag;
    public $description;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
}