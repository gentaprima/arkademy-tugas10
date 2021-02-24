<?php

    class ModelProduk extends CI_Model{
        public function addData($data){
            return $this->db->insert('produk',$data);
        }
        public function updateData($data,$id){
            return $this->db->update('produk',$data,array('id' => $id));
        }
        
        public function readAll(){
            return $this->db->get_where('produk')->result_array();
        }

        public function deleteData($id){
            return $this->db->delete('produk',array('id' => $id));
        }
    }