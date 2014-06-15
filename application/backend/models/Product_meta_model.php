<?php
require_once('Abstract_model.php');
class Product_meta_model extends Abstract_Model{
    public $id;
    public $product_id;
    public $name;
    public $value;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'product_meta';
    }

    public function getGallery($id)
    {
        $this->db->select('value');
        $this->db->from($this->tableName());
        $this->db->where(array('product_id' => $id, 'name' => 'gallery'));
        $rows = $this->db->get()->result_array();
        $result = array();
        foreach ($rows as $row) {
            $result[] = $row['value'];
        }
        return array_unique($result);
    }

    public function addGallery($image, $id)
    {
        if ($this->record_count(array('product_id' => $id, 'name' => 'gallery', 'value' => $image)) == 0) {
            $this->db->insert($this->tableName(), array('value' => $image, 'product_id' => $id, 'name' => 'gallery'));
        }
    }

    public function rmGallery($image, $id)
    {
        if ($this->record_count(array('product_id' => $id, 'name' => 'gallery', 'value' => $image)) > 0) {
            $this->db->delete($this->tableName(), array('value' => $image, 'product_id' => $id, 'name' => 'gallery'));
        }
    }
}