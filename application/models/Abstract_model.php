<?php

abstract class Abstract_Model extends CI_Model
{
    private $_loaded = false;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @return string
     */
    abstract function tableName();

    /**
     * @return array
     */
    public function getFields()
    {
        $fields = $this->db->list_fields($this->tableName());
        return array_diff($fields, array('id'));
    }


    /**
     * @param $id
     * @return $this|bool
     */
    public function load($id)
    {
        $query = $this->db->get_where($this->tableName(), array('id' => $id), 1, null);
        $data = $query->row_array();
        if ($data) {
            $model = $this->_loaded ? (clone $this) : $this;
            $this->_loaded = true;
            return $model->setData($data);
        } else {
            return false;
        }
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function save()
    {
        $data = array();
        foreach ($this->getFields() as $field) {
            $data = array_merge($data, array($field => $this->$field));
        }

        if ($this->id) {
            $this->db->update($this->tableName(), $data, array('id' => $this->id));
        } else {
            $this->db->insert($this->tableName(), $data);
        }

        return $this;
    }

    public function del($id)
    {
        $this->db->delete($this->tableName(), array('id' => $id));
    }

    public function listAll($fields = array())
    {
        if (count($fields)) {
            $this->db->select(implode(',', $fields));
        }

        $query = $this->db->get($this->tableName());
        return $query->result_array();
    }
}