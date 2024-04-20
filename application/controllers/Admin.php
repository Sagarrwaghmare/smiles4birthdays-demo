<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Admin  extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');

        $this->load->library('session');
        $auth = $this->session->userdata("auth");
        // var_dump($auth,isset($auth));        

        $this->load->model('Recipients_Model');


    }

// PAGES
    public function login(){
        echo "Login<br>";
    }

    public function index(){

        $this->load->view('admin/template/header',array('page_title'=>"Admin Dashboard"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        $this->load->view('admin/content/dashboard');

        $this->load->view('admin/template/footer');
        // echo "<a href='admin/process_login'>Login</a>";
        // echo "<a href='admin/logout'>Logout</a>";
    }

    public function donations(){
        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donations"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        $this->load->view('admin/content/donations');

        $this->load->view('admin/template/footer');
    }

    
    public function donors($id=null){
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donors"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        
        if($id==null){
            $this->load->view('admin/content/donors');
        }else{
            $this->load->view('admin/content/donors-inner');   
        }

        $this->load->view('admin/template/footer');
    }

    public function recipients($id = null){
        $this->load->view('admin/template/header',array('page_title'=>"Admin Recipients"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        if($id == null){
            $data = array(
                'recipients'=> $recipients = $this->Recipients_Model->get_all()
            );
            $this->load->view('admin/content/recipients',$data);
        }else{
            $data = array(
                'recipient'=> $recipients = $this->Recipients_Model->get_by_id($id)
            );
            $this->load->view('admin/content/recipient-inner',$data);
        }

        $this->load->view('admin/template/footer');
    }


    public function users(){
        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Users"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        $this->load->view('admin/content/users');

        $this->load->view('admin/template/footer');
    }
    
// PAGES


// Functions
    public function process_login(){
        $this->session->set_userdata("auth","Admin");
        redirect("admin");
    }
    public function logout(){
        $this->session->unset_userdata('auth');
        redirect("admin");
    }
// Functions

}


?>