<?php
    class User_Meta_model extends CI_Model{
        public $id;
        public $user_id;
        public $name;
        public $value;

        function __construct($id, $name, $value, $user_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->value = $value;
            $this->user_id = $user_id;
        }
        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $user_id
         */
        public function setUserId($user_id)
        {
            $this->user_id = $user_id;
        }

        /**
         * @return mixed
         */
        public function getUserId()
        {
            return $this->user_id;
        }

        /**
         * @param mixed $value
         */
        public function setValue($value)
        {
            $this->value = $value;
        }

        /**
         * @return mixed
         */
        public function getValue()
        {
            return $this->value;
        }

    }