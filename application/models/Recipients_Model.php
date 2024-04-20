<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipients_Model extends CI_Model{

    public function index(){
        
    }

// Searching
    public function get_all(){
        $query = $this->db->get('recipients');
        return $query->result_array();
    }

    public function get_by_id($id){
        $query = $this->db->get_where('recipients',array('id'=>$id));
        return $query->result_array();
    }

    public function get_all_sponsored(){
        $this->db->order_by('updated_at',"DESC");
        $query = $this->db->get_where('recipients',array('sponsored'=>1));
        return $query->result_array();
    }

    public function get_all_non_spoonsored(){
        $query = $this->db->get_where('recipients',array('sponsored'=>0));
        return $query->result_array();
    }

    public function get_all_celebrated(){
        $this->db->order_by('updated_at',"DESC");
        $query = $this->db->get_where('recipients',array('celebrated'=>1));
        return $query->result_array();
    }

// Searching

// Editing
    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('recipients',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('recipients',$data);
    }


    // Updating
    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('recipients');
    }

    public function sponsor_true($id){
        
        date_default_timezone_set("Asia/Calcutta");

        $array = array(
            'sponsored'=>1,
            'sponsored_by'=>69,
            'updated_at'=> date('Y-m-d H:i:s',time()),
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('recipients');
    }
    // Updating
// Editing


}
?>