<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kontakdesa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kontak_desa"] = $this->kontakdesa_model->getAll();
        $this->load->view("admin/kontak_desa/list", $data);
    }

    public function add()
    {
        $kontak_desa = $this->kontakdesa_model;
        $validation = $this->form_validation;
        $validation->set_rules($kontak_desa->rules());

        if ($validation->run()) {
            $kontak_desa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kontak_desa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kontak_desa');
       
        $kontak_desa = $this->kontakdesa_model;
        $validation = $this->form_validation;
        $validation->set_rules($kontak_desa->rules());

        if ($validation->run()) {
            $kontak_desa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kontak_desa"] = $kontak_desa->getById($id);
        if (!$data["kontak_desa"]) show_404();
        
        $this->load->view("admin/kontak_desa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kontakdesa_model->delete($id)) {
            redirect(site_url('admin/kontak_desa'));
        }
    }
}
