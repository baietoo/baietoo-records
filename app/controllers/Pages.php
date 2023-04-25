<?php  
    class Pages extends Controller{
        public function __construct(){
        }
        public function index(){
            $data = [
                'title' => 'Baietoo Records',
                'description' => 'Cea mai faimoasa casa de discuri de la adresa https://baietoo-records.herokuapp.com/pages/about'
            ];

            $this->view('pages/index', $data);
        }
        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'Fa din muzica un stil de viata'
            ];
            $this->view('pages/about', $data);
        }
    }
?>