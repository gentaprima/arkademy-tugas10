<?php

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProduk');
    }

    public function addProduk()
    {
        $namaProduk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $jumlah = $this->input->post('jumlah');

        if ($namaProduk != null && $harga != null && $keterangan != null && $jumlah != null) {
            $data = [
                'nama_produk'   => $namaProduk,
                'harga'         => $harga,
                'keterangan'    => $keterangan,
                'jumlah'        => $jumlah
            ];
            $this->ModelProduk->addData($data);
            $this->session->set_flashdata('type','success');
            $this->session->set_flashdata('message','Data Produk berhasil ditambahkan');
            redirect(base_url());
        }else{
            $this->session->set_flashdata('type','danger');
            $this->session->set_flashdata('message','Data Tidak Boleh Kosong');
            redirect(base_url());
        }
    }

    public function updateProduk(){
        $namaProduk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $jumlah = $this->input->post('jumlah');
        $idProduk = $this->input->post('id_produk');

        if ($namaProduk != null && $harga != null && $keterangan != null && $jumlah != null) {
            $data = [
                'nama_produk'   => $namaProduk,
                'harga'         => $harga,
                'keterangan'    => $keterangan,
                'jumlah'        => $jumlah
            ];
            $this->ModelProduk->updateData($data,$idProduk);
            $this->session->set_flashdata('type','success');
            $this->session->set_flashdata('message','Data Produk berhasil diedit');
            redirect(base_url());
        }else{
            $this->session->set_flashdata('type','danger');
            $this->session->set_flashdata('message','Data Tidak Boleh Kosong');
            redirect(base_url());
        }
    }

    public function deleteProduk(){
        $id = $this->uri->segment(3);
        $this->ModelProduk->deleteData($id);
        $this->session->set_flashdata('type','success');
        $this->session->set_flashdata('message','Data Produk berhasil dihapus');
        redirect(base_url());
    }
}
