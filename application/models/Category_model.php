<?php
require_once('Abstract_model.php');
class Category_model extends Abstract_Model{

    public $id;
    public $root;
    public $name;
    public $slug;
    public $description;
    public $page_title;
    public $content_tag;
    public $category_type;
    public $order;

    function __construct()
    {
        parent::__construct();
    }

    public function tableName()
    {
        return 'category';
    }

    /**
     * Render a category tree
     */
    public function getCategories($categories, $parentId, $CssClass = "")
    {
        if ($this->getChildCount($parentId) == 0) return;
        if (empty($CssClass)) echo '<ul>';
        else echo '<ul class="' . $CssClass . '">';
        foreach ($categories as $cate) {
            if ($cate['root'] == $parentId) {
                echo '<li><a href="' . $cate['slug'] . '">' . $cate['name'] . '</a>';
                if ($this->getChildCount($cate['id']) > 0) {
                    $this->getCategories($categories, $cate['id']);
                }
                echo '</li>';
            }
        }
        echo '</ul>';
    }

    public function getChildCount($parentId)
    {
        return $this->record_count(array('root' => $parentId));
    }
}