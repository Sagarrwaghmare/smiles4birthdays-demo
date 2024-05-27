<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Variable_Model extends CI_Model{

    public function index(){}

    public function get_all(){
        $query = $this->db->get('variables');
        return $query->result_array();
    }

    public function get_by_id($id){
        $query = $this->db->get_where('variables',array('id'=>$id));
        return $query->result_array();
    }

    public function get_date_buffer(){
        $query = $this->db->get_where('variables',array('name'=>'date_buffer'));
        $data =  $query->result_array();

        return $data[0]['value'];
    }


    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('variables',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('variables',$data);
    }

    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('variables');
    }


}
?>