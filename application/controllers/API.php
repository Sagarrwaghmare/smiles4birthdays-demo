<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  API  extends CI_Controller {
    public function __construct(){
        parent::__construct();
        header("Content-Type:application/json");

        
        $this->load->model('Recipients_Model');
        $this->load->model('Donor_Model');
        $this->load->model('Donations_Model');


        $this->load->helper('hash_helper');
        $this->load->helper('date_helper');
        $this->load->helper('view_helper');

    }
    public function index(){}

    public function fetch_recipients_desc(){
        $recipients = $this->Recipients_Model->get_all_desc();
        print_r(json_encode($recipients));   
    }
    public function fetch_donors(){
        $data = $this->Donor_Model->get_all();
        print_r(json_encode($data));
    }
    public function fetch_donations_by_year(){
        $donations =$this->Donations_Model->get_donations_by_months();
        
        print_r(json_encode($donations));
    }

    public function fetch_donations_by_year_filter(){        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $gender = $this->input->post('gender');
        $city = $this->input->post('city');
        
        $curYear = $this->input->post('currYear');
        $curMonth = $this->input->post('currMonth');

        $var = $this->Donations_Model->get_donations_by_months_filter($start,$end,$gender,$city,$curYear,$curMonth);

        print_r(json_encode($var));
    }

    public function total_recipients(){
        $total = $this->Recipients_Model->get_total_number();
        print_r($total);
    }
    
    public function fetch_upcoming(){
        // fetching data from database 

        $recipients = $this->Recipients_Model->get_all();

        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);
        print_r(json_encode($upcoming_birthdays));
    }
    

    public function fetch_celebrated(){
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);

        $celebrated = $this->Recipients_Model->get_all_celebrated();
        // celebrated birthdays
        $celebrated_birthdays = combinedDatesArrayDesc($celebrated,$today_in_sec);

        print_r(json_encode($celebrated_birthdays));

    }

    public function delete_recipient($id,$unique_key){

        if($id == null || $unique_key == null){
        }else{
            
            $dirname = (explode(".",$unique_key))[0];
            delete_files("./assets/images/recipients/$dirname", TRUE);
            rmdir("./assets/images/recipients/$dirname");
            
            unlink("./assets/images/profile_pictures/$unique_key"); 
            
            $this->Recipients_Model->delete($id);
            echo "DELETE RECORD $id, $unique_key";

        }
        
    }

    public function delete_photo($unique_key = null,$value = null,$type = null,$id = null){
        if($unique_key != null && $value != null && $type != null){

            // smiles4birthdays-demo\assets\images\recipients\ID394DATE1714374088\celebration_photos
            // assets\images\recipients\ID394DATE1714374088\personal_photos
            var_dump($unique_key,$value,$type);
            unlink("./assets/images/recipients/$unique_key/$type/$value"); 
            echo "Deleted";
            
            // redirect("admin/recipients/$id");

        }
    }
}


?>