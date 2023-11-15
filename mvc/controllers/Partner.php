<?php 
    class Partner extends Controller{
        public $partner;
        public function __construct(){
            $this->partner = $this->model('PartnerModel');
        }

        public function index(){
            $list_partner = json_decode($this->partner->getList());
            $this->view('backend/layout/master',[
                'page'          => 'backend/Partner/index',
                'list_partner' => $list_partner,
                // 'total_page_number' => $total_page_number,
                // 'page_index'    => $page_index
            ]);
        }
    }
?>