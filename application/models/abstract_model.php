<?php

abstract class Abstract_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @return mixed
     */
    abstract function getTable();

    /**
     * @return array
     */
    public function getFields()
    {
        $fields = $this->db->list_fields($this->getTable());
        return array_diff($fields, array('id'));
    }


    /**
     * @param $id
     * @return $this|bool
     */
    public function load($id)
    {
        $query = $this->db->get_where($this->getTable(), array('id' => $id), 1, null);
        $data = $query->row_array();
        if ($data) {
            return $this->setData($data);
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
            $this->db->update($this->getTable(), $data, array('id' => $this->id));
        } else {
            $this->db->insert($this->getTable(), $data);
        }

        return $this;
    }

    public function del()
    {
        $this->db->delete($this->getTable(), array('id' => $this->id));
    }
}