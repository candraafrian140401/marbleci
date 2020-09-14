<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakdesa_model extends CI_Model
{
    private $_table = "kontak_desa";

    public $id;
    public $maps;
    public $email;
    public $alamat;
    public $telepon;

    public function rules()
    {
        return [
             ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required']
        ];
    }
    

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->maps = $post["maps"];
        $this->email = $post["email"];
        $this->alamat = $post["alamat"];
    
        $this->telepon = $post["telepon"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->maps = $post["maps"];
        $this->email = $post["email"];
        $this->alamat = $post["alamat"];
       

        $this->telepon = $post["telepon"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    { 
      
        return $this->db->delete($this->_table, array("id" => $id));
    }

   
}