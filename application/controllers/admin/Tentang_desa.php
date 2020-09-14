<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tentangdesa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["tentang_desa"] = $this->tentangdesa_model->getAll();
        $this->load->view("admin/tentang_desa/list", $data);
    }

    public function add()
    {
        $tentang_desa = $this->tentangdesa_model;
        $validation = $this->form_validation;
        $validation->set_rules($tentang_desa->rules());

        if ($validation->run()) {
            $tentang_desa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/tentang_desa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tentang_desa');
       
        $tentang_desa = $this->tentangdesa_model;
        $validation = $this->form_validation;
        $validation->set_rules($tentang_desa->rules());

        if ($validation->run()) {
            $tentang_desa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tentang_desa"] = $tentang_desa->getById($id);
        if (!$data["tentang_desa"]) show_404();
        
        $this->load->view("admin/tentang_desa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->tentangdesa_model->delete($id)) {
            redirect(site_url('admin/tentang_desa'));
        }
    }
}
    