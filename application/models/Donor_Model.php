<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_Model extends CI_Model{

    public function index(){}

    public function get_all(){
        $query = $this->db->get('donor');
        return $query->result_array();
    }

    public function get_by_id($id){
        $query = $this->db->get_where('donor',array('id'=>$id));
        return $query->result_array();
    }

    public function get_id_names(){
        // $query = $this->db->get()
    }

    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('donor',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('donor',$data);
    }

    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('donor');
    }


}
?>