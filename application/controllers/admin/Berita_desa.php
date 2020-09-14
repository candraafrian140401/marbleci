<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["berita_desa"] = $this->berita_model->getAll();
        $this->load->view("admin/berita_desa/list", $data);
    }

    public function add()
    {
        $berita_desa = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita_desa->rules());

        if ($validation->run()) {
            $berita_desa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/berita_desa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/berita_desa');
       
        $berita_desa = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita_desa->rules());

        if ($validation->run()) {
            $berita_desa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berita_desa"] = $berita_desa->getById($id);
        if (!$data["berita_desa"]) show_404();
        
        $this->load->view("admin/berita_desa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->berita_model->delete($id)) {
            redirect(site_url('admin/berita_desa'));
        }
    }
}
    