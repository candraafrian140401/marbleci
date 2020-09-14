<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
    private $_table = "kecamatan";

    public $id_kecamatan;
    public $nama_kecamatan;
    public $jumlah_kelurahan;
    public $nama_camat;
    public $link;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'nama_kecamatan',
            'label' => 'Nama_kecamatan',
            'rules' => 'required'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kecamatan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kecamatan = uniqid();
        $this->nama_kecamatan = $post["nama_kecamatan"];
        $this->jumlah_kelurahan = $post["jumlah_kelurahan"];
        $this->nama_camat = $post["nama_camat"];
        $this->link = $post["link"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kecamatan = $post["id"];
        $this->nama_kecamatan = $post["nama_kecamatan"];
        $this->jumlah_kelurahan = $post["jumlah_kelurahan"];
        $this->nama_camat = $post["nama_camat"];
        $this->link = $post["link"];

        if (!empty($_FILES["image"]["name"])) {
        $this->image = $this->_uploadImage();
        } else {
        $this->image = $post["old_image"];
        }
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('id_kecamatan' => $post['id']));
    }

    public function delete($id)
    { 
      
        return $this->db->delete($this->_table, array("id_kecamatan" => $id));
    }

    private function _uploadImage()
    {
    $config['upload_path']          = 'C:\xampp\htdocs\marbleci\assets\kecamatan';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['file_name']            = $this->;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
   }

   private function _deleteImage($id)
   {
    $kecamatan = $this->getById($id);
    if ($kecamatan->image != "default.jpg") {
        $filename = explode(".", $kecamatan->image)[0];
        return array_map('unlink', glob(FCPATH."upload/kecamatan/$filename.*"));
   }
}
}