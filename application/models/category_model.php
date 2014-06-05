<?php
class Category_model extends CI_Model{

    public $id;
    public $root;
    public $name;
    public $slug;
    public $description;
    public $page_title;
    public $content_tag;

    function __construct($content_tag, $description, $id, $name, $page_title, $root, $slug)
    {
        $this->content_tag = $content_tag;
        $this->description = $description;
        $this->id = $id;
        $this->name = $name;
        $this->page_title = $page_title;
        $this->root = $root;
        $this->slug = $slug;
    }

    /**
     * @param mixed $content_tag
     */
    public function setContentTag($content_tag)
    {
        $this->content_tag = $content_tag;
    }

    /**
     * @return mixed
     */
    public function getContentTag()
    {
        return $this->content_tag;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param mixed $page_title
     */
    public function setPageTitle($page_title)
    {
        $this->page_title = $page_title;
    }

    /**
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->page_title;
    }

    /**
     * @param mixed $root
     */
    public function setRoot($root)
    {
        $this->root = $root;
    }

    /**
     * @return mixed
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

}