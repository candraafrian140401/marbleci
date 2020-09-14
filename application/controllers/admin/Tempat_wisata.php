<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat_wisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("wisata_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["tempat_wisata"] = $this->wisata_model->getAll();
        $this->load->view("admin/tempat_wisata/list", $data);
    }

    public function add()
    {
        $tempat_wisata = $this->wisata_model;
        $validation = $this->form_validation;
        $validation->set_rules($tempat_wisata->rules());

        if ($validation->run()) {
            $tempat_wisata->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/tempat_wisata/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tempat_wisata');
       
        $tempat_wisata = $this->wisata_model;
        $validation = $this->form_validation;
        $validation->set_rules($tempat_wisata->rules());

        if ($validation->run()) {
            $tempat_wisata->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["tempat_wisata"] = $tempat_wisata->getById($id);
        if (!$data["tempat_wisata"]) show_404();
        
        $this->load->view("admin/tempat_wisata/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->wisata_model->delete($id)) {
            redirect(site_url('admin/tempat_wisata'));
        }
    }
}
    