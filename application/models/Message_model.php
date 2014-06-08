<?php
require_once('Abstract_model.php');
class Message_model extends Abstract_Model{
    public $id;
    public $sender;
    public $recipient;
    public $title;
    public $content;
    public $date;
    public $is_read;

    function __construct()
    {
        parent::__construct();
    }
    public function tableName()
    {
        return 'message';
    }
}