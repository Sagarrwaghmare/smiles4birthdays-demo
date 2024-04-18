<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Main  extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');
        $this->load->model('Recipients_Model');

        $this->load->helper('hash_helper');
        $this->load->helper('date_helper');
        $this->load->helper('view_helper');
    
        // class="mx-5 my-10"
    }


// Pages
    public function index(){

        // Data Fetching
        $recipients = $this->Recipients_Model->get_all();
        
        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);

        // celebrated birthdays
        $celebrated_birthdays = $this->Recipients_Model->get_all_sponsored();


        $data = array(
            'upcoming_birthdays'=>$upcoming_birthdays,
            'celebrated_birthdays'=>$celebrated_birthdays,
        );       


        $this->load->view("main/template/header",array("page_title"=>"Home"));
        $this->load->view("main/content/home",$data);
        $this->load->view("main/template/footer");
    }
    
    public function upcoming_birthdays(){
        // fetching data from database 
        $recipients = $this->Recipients_Model->get_all();

        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);

        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);
        
        $data=array(
            'upcoming_birthdays'=>$upcoming_birthdays
        );
    
        
        // Dates are fetched from database
        // new columns are added in database with birthdate with current year, and the new birthdate in seconds
        // today's date is converted into seconds. and compared with the birthdays.
        // lesser seconds are added behind the combined array and more seconds after.
        // The combined array data is similar but sorted based of current date
        // $comArr = combinedDatesArray($data,$today_in_sec);

        $this->load->view("main/template/header",array("page_title"=>"Upcoming Birthdays"));
        $this->load->view("main/content/upcoming",$data);
        $this->load->view("main/template/footer");
    }
    
    public function celebrated_birthdays(){
      
        // celebrated birthdays
        $celebrated_birthdays = $this->Recipients_Model->get_all_sponsored();

        $data = array(
            'celebrated_birthdays'=>$celebrated_birthdays,
        );

        // CHANGE PAGINTAION IN UPCOMING AND CELEBRATED// REMOVE IT OUT OF GRID OR IT'S CONSIDERED GRID ELEMENT AND CHANGES POSITON

        $this->load->view("main/template/header",array("page_title"=>"Celebrated Birthdays"));
        $this->load->view("main/content/celebrated",$data);
        $this->load->view("main/template/footer");
    }

    public function donate($id = null){
        
        if($id == null){
            // DEFAULT DONATION PAGE
            $non_sponsoreds = $this->Recipients_Model->get_all_non_spoonsored();
            $data = array(
                'default'=>1,
                'non_sponsoreds'=>$non_sponsoreds
            );

            $this->load->view('main/template/header',array('page_title'=>"Donation Form"));
            $this->load->view('main/content/donation-form',$data);
            
        }else{
            // RECIPIENT DONATION PAGE
            $decrypt_id = numhash($id);
            $data = array(
                'default'=>0,
                'recipient'=>$this->Recipients_Model->get_by_id($decrypt_id),
            );

            $this->load->view('main/template/header',array('page_title'=>"Donate $id"));
            $this->load->view('main/content/donation-form',$data);

        }


    }

    public function child($id = null){
        
        if($id != null){
            $decrypt_id = numhash($id);
            $data = $this->Recipients_Model->get_by_id($decrypt_id);

            $name = $data[0]['name'];
            $sponsored = $data[0]['sponsored'];

            $data = array(
                "data"=>$data[0]
            );
            
            $this->load->view("main/template/header",array('page_title'=>"$name"));

            // add a new column, (flag) celebrated

            //  if not sponsored go to upcoming page
            // if sponsored but not celebrated, upcoming page
            // if celebrated == true go to celebrated page
            // 
            // celebrated would only become true if it's sponsored.
            print_r($sponsored);
            if($sponsored == 1){
                
                $this->load->view("main/content/celebrated-inner",$data);

            }else{
                $this->load->view("main/content/upcoming-inner",$data);
            }
            // $this->load->view("main/content/profile",$data);


            $this->load->view("main/template/footer");            
        }else{

        }

    }
// Pages


// Functions
    public function sponsor($id){
        $this->Recipients_Model->sponsor_true($id);
        redirect("");
    }


    public function process_donation_form(){
        $data = $this->input->post();

        echo "<pre>";
        print_r($data);
    }

// Functions

}


?>