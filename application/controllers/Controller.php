<?php
class Controller extends CI_Controller {
    public $pageTitle;
    public $metaTag;
    public $contentTag;
    public $description;
    public $category;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->category = $this->getModel('Category_model')->listAll("*",array('root'=>0),"order DESC");
    }

    public function getModel($modelName)
    {
        if (!property_exists(get_class($this), $modelName))
            $this->load->model($modelName);
        return $this->$modelName;
    }
}