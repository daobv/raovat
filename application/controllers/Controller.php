<?php
class Controller extends CI_Controller {
    public $pageTitle;
    public $metaTag;
    public $contentTag;
    public $description;

    public function getModel($modelName)
    {
        if (!property_exists(get_class($this), $modelName))
            $this->load->model($modelName);
        return $this->$modelName;
    }
}