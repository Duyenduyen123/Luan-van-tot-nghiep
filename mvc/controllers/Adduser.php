<?php 
    class Adduser extends Controller{
        public $order;
        public $order_detail;
        public $slider;
        public $product;
        public $category;
        public $blog;
        public $categoryofblog;
        public $tags;
        public $blog_categoryofblog;
        public $blog_tags;

        public function __construct(){
           $this->order = $this->model('OrderModel');
           $this->order_detail = $this->model('Order_DetailModel');
           $this->slider = $this->model('SliderModel');
           $this->product = $this->model('ProductModel');
           $this->category = $this->model('CategoryModel');
           $this->blog = $this->model('BlogModel');
           $this->categoryofblog = $this->model('CategoryBlogModel');
           $this->tags = $this->model('TagsModel');
           $this->blog_categoryofblog = $this->model('Blog_CategoryOfBlogModel');
           $this->blog_tags = $this->model('Blog_TagsModel');
        }

        public function index(){
            $this->view('backend/layout/master',[
                'page'          => 'backend/adduser/index',
            ]);
        }
    }
?>