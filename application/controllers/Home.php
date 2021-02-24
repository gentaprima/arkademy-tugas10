<?php

    class Home extends CI_Controller{

        public function __construct()
        {
            parent::__construct(); 
            $this->load->model('ModelProduk');   
        }

        public function index(){
            $data = [
                'data_produk'   => $this->ModelProduk->readAll()
            ];
            $this->load->view('v_home',$data);
        }
    }