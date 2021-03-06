<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $_table = "berita_desa";

    public $id_berita;
    public $name;
    public $kategori;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
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
        return $this->db->get_where($this->_table, ["id_berita" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_berita = uniqid();
        $this->name = $post["name"];
        $this->kategori = $post["kategori"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_berita = $post["id"];
        $this->name = $post["name"];
        $this->kategori = $post["kategori"];

        if (!empty($_FILES["image"]["name"])) {
        $this->image = $this->_uploadImage();
        } else {
        $this->image = $post["old_image"];
        }
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('id_berita' => $post['id']));
    }

    public function delete($id)
    { 
      
        return $this->db->delete($this->_table, array("id_berita" => $id));
    }

    private function _uploadImage()
    {
    $config['upload_path']          = 'C:\xampp\htdocs\marbleci\assets\berita_desa';
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
    $berita_desa = $this->getById($id);
    if ($berita_desa->image != "default.jpg") {
        $filename = explode(".", $berita_desa->image)[0];
        return array_map('unlink', glob(FCPATH."upload/berita_desa/$filename.*"));
   }
}
}