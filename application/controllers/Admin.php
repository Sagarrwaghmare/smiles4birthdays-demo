<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Admin  extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');

        $this->load->library('session');


        $auth = $this->session->userdata("auth");
        // var_dump($auth,isset($auth));

        
    }

// PAGES
    public function index(){
        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Dashboard"));
        $this->load->view('admin/content/dashboard');


        // echo "<a href='admin/process_login'>Login</a>";
        // echo "<a href='admin/logout'>Logout</a>";
    }
    public function login(){
        echo "Login<br>";

    }
// PAGES

    public function process_login(){
        $this->session->set_userdata("auth","Admin");
        redirect("admin");
    }
    public function logout(){
        $this->session->unset_userdata('auth');
        redirect("admin");
    }

}


?>