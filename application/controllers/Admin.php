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
        $this->load->model('Donations_Model');
        $this->load->model('Donor_Model');

        $this->load->helper('date_helper');

        
        if($this->session->userdata("Auth") != "Admin"){
            redirect("login");
        }

        // print_r($_SERVER['QUERY_STRING']);
        // print_r($_SERVER['REQUEST_URI']);
        // print_r($_SERVER['PATH_INFO']);
    }

// PAGES    

    public function index(){

        $this->load->view('admin/template/header',array('page_title'=>"Admin Dashboard"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        // FETHCING DATA
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        
        $recipients = $this->Recipients_Model->get_all();
        $upcoming_birthdays   = combinedDatesArray($recipients,$today_in_sec);

        $donations = $this->Donations_Model->get_all_desc();
        $data = array(
            'upcoming_birthdays'=>$upcoming_birthdays,
            'donations'=>$donations
        );
        
        $this->load->view('admin/content/dashboard',$data);


        // $this->load->view('admin/template/footer');
        // echo "<a href='admin/process_login'>Login</a>";
        // echo "<a href='admin/logout'>Logout</a>";
    }

    public function donations($year = null,$month = null){

        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donations"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        if($year == null && $month == null){
            $data = array(
                'donations'=>$this->Donations_Model->get_donations_by_months()
            );
            $this->load->view('admin/content/donations',$data);

        }else{
            $data = array(
                'donation'=>$this->Donations_Model->get_months_donations($year,$month),
            );
            $this->load->view('admin/content/donations-inner',$data);
        }

        // $this->load->view('admin/template/footer');
    }

    
    public function donors($id=null){
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donors"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        
        if($id==null){
            $data = array(
                'donors'=>$this->Donor_Model->get_all(),
            );
            $this->load->view('admin/content/donors',$data);
        }else{
            $data = array(
                'donor'=>$this->Donor_Model->get_by_id($id),
            );
            $this->load->view('admin/content/donors-inner',$data);   
        }

        // $this->load->view('admin/template/footer');
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
            $rep = $this->Recipients_Model->get_by_id($id);

            $photos_folder = "assets/images/recipients/".$rep[0]['photos_folder']."/personal_photos"; //personal_photos
            $birthday_photos = "assets/images/recipients/".$rep[0]['birthday_photos']."/celebration_photos"; //celebration_photos
            
            function returnFileArray($photo_dir){
                $dir = $photo_dir;
                $file_array = array();
                
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            // echo "filename:" . $file ."<br>";
                                array_push($file_array,$file);
                            
                        }
                    closedir($dh);
                    }
                }

                $file_array = array_slice($file_array,2);
                return $file_array;
            }

            $photos_folder_array = returnFileArray($photos_folder);
            $birthday_photos_array = returnFileArray($birthday_photos);

            $donations = $this->Donations_Model->get_all();

            $data = array(
                'recipient'=> $recipients = $this->Recipients_Model->get_by_id($id),
                "photos_folder_array"=>$photos_folder_array,
                "birthday_photos_array"=>$birthday_photos_array,
                "donations"=>$donations,
            );
            $this->load->view('admin/content/recipient-inner',$data);
        }

        // $this->load->view('admin/template/footer');
    }

    public function addrecipient(){

        $this->load->view('admin/template/header',array('page_title'=>"Admin Recipients"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        
        $this->load->view('admin/content/recipient-add');
    }


    public function users(){
        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Users"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        $this->load->view('admin/content/users');

        // $this->load->view('admin/template/footer');
    }
    
// PAGES


// Functions
    
    public function logout(){
        $this->session->unset_userdata('auth');
        redirect("admin");
    }

    public function export(){
        // echo "Export Excel";
        // $html = "<table><tr><td>Id</td><td>Name</td></tr></table>";
        // echo $html;
        // header("Content-Type:application/xls");
        // header("Content-Disposition:attachment;filename=results.xls");
        


        // // date_default_timezone_set('America/Los_Angeles');
        date_default_timezone_set("Asia/Calcutta");


        // $table = array(
        //     array(
        //     'a1 data',
        //     'b1 data',
        //     'c1 data',
        //     'd1 data',
        //     )
        // );

        // $table = '<table><tbody><tr><td>A1</ td><td>B1</td><td>C1</td><td>D1</td></tr>';
        // foreach ($sheet as $row) {
        //     $table.= '<tr><td>'.  implode('</td><td>', $row) . '</td></tr>';
        // }
        // $table.= '</tbody></table>';

        // header('Content-Encoding: UTF-8');
        // header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        // header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        // header ("Cache-Control: no-cache, must-revalidate");
        // header ("Pragma: no-cache");
        // header ("Content-type: application/x-msexcel;charset=UTF-8");
        // header ("Content-Disposition: attachment; filename=productsExport.xls" );

        // echo $table;    
    }

    public function add_recipient(){
        // print_r($this->input->post());
        // Insert into database and create directory's for future uploads
        $name =  $this->input->post('name');
        $address = $this->input->post('address');
        $email =  $this->input->post('email');
        $gender = $this->input->post('gender');
        $father_occputation =   $this->input->post('father_occputation');
        $mother_occupation = $this->input->post('mother_occupation');
        $household_income = $this->input->post('household_income');
        $contact = $this->input->post('contact');
        $birthdate = $this->input->post('birthdate');
        $wish =  $this->input->post('wish');

        
        // Photos
        $profile_pic = $this->input->post('profile_pic');
        // $profile_pic = ""; // photo uploaded


        // $photos_folder = "";  //folder name by unique key generation directory name
        // $birthday_photos = ""; //folder name by unique key generation directory name
        // $video_link = ""; // should be done when celebrated is changed

        // $sponsored = 0; //default
        // $celebrated = 0; //default
        // $sponsored_by = NULL; //default
        // $display = 1 //default

        


        // var_dump("<br><pre>",$name,
        // $address,
        // $email,
        // $father_occputation,
        // $mother_occupation,
        // $household_income,
        // $contact,
        // $birthdate,
        // $wish,"<br>",$_FILES['profile_pic'],"<br>",$profile_pic);

        

        // Adding...
        $this->Recipients_Model->add($name,$address,$email,$gender,$father_occputation,$mother_occupation,$household_income,$contact,$birthdate,$wish);

        // Getting Last ID, ie the record just inserted
        $last_id = $this->Recipients_Model->get_last_id();
        $unique_key = "ID".$last_id."DATE".time();
        print_r($unique_key);


        // update the unique key in record
        
        $imageExtention = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
        $images_name = $unique_key.".".$imageExtention;
        $this->Recipients_Model->update_unique_key_photos($last_id,$unique_key,$unique_key,$images_name);


        
        $config['upload_path']          = './assets/images/profile_pictures/';
        $config['file_name']            = $unique_key;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2024;
        $config['max_height']           = 2024;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('profile_pic'))
        {
            $error = array('error' => $this->upload->display_errors());

            // $this->load->view('upload_form', $error);
            // 
            // echo "Error<br>";
            // print_r($error);
            $this->Recipients_Model->delete($last_id);
            $this->session->set_flashdata('FileForm',"$error[error]");

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            // $this->load->view('upload_success', $data);
            // echo "success<br>";
            // print_r($data);       
            $this->session->set_flashdata('FileForm','File uploaded');


                
            // Making Directory based of unique_key
            // Directory Path:   website/assets/images/recipients/ID1DATE20240420/celebration_photos,personal_photos
            // mkdir makes directory in the root folder here.
            // if directory structure not found then shows error
            // so first make path by path
            $path = "assets/images/recipients/$unique_key";
            mkdir($path);
            mkdir($path."/celebration_photos");
            mkdir($path."/personal_photos");

            $indexFile = "<!DOCTYPE html>
            <html>
            <head>
                <title>403 Forbidden</title>
            </head>
            <body>
            <p>Directory access is forbidden.</p>
            </body>
            </html>";
            
            write_file($path.'/index.html', $indexFile);
            write_file($path.'/celebration_photos/index.html', $indexFile);
            write_file($path.'/personal_photos/index.html', $indexFile);

        }
        redirect("/admin/recipients");
    }
    public function update_recipient(){
        $id = $this->input->post('id');
        $fullname  = $this->input->post('fullname');
        $birthdate = $this->input->post('birthdate');
        $address  = $this->input->post('address');
        $Contact  = $this->input->post('Contact');
        $email = $this->input->post('email');
        $income  = $this->input->post('income');
        $fatheroccupation  = $this->input->post('fatheroccupation');
        $motheroccupation  = $this->input->post('motheroccupation');
        $wish  = $this->input->post('wish');
        $sponsored  = $this->input->post('sponsored');
        $celebrated = $this->input->post('celebrated');
        $sponsoredby  = $this->input->post('sponsoredby');
        $videolink  = $this->input->post('videolink');
        $display = $this->input->post('display');
        echo "<pre>";

        // print_r($this->input->post());
        var_dump($fullname,
        $birthdate,
        $address,
        $Contact,
        $email,
        $income,
        $fatheroccupation,
        $motheroccupation,
        $wish,
        $sponsored,
        $celebrated,
        $sponsoredby,
        $videolink,
        $display
        );

        $this->Recipients_Model->update_recipients($id,$fullname,$birthdate,$address,$Contact,$email,$income,$fatheroccupation,$motheroccupation,$wish,$sponsored,$celebrated,$sponsoredby,$videolink,$display);

        print_r("Recipient Updated");

        redirect("admin/recipients/$id");

    }
    public function delete_recipient($id,$unique_key){
        // API
        // echo "DELETE RECORD $id, $unique_key";
        
    }


    public function change_photo($id,$imgName){
        if($id == null || $imgName == null){
            // redirect('admin/recipients');
        }else{
            var_dump($id,$imgName);
            print_r($this->input->post());

            
        $config['upload_path']          = './assets/images/profile_pictures/';
        $config['file_name']            = $imgName;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;


        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('changeProfilePic')){
            $error = array('error' => $this->upload->display_errors());
            echo "Error<br>";
            print_r($error);
            
            $this->session->set_flashdata('changeProfilePic',"Error: $error[error]");
        }else{
            $data = array('upload_data' => $this->upload->data());
            echo "success<br>";
            print_r($data);
            $this->session->set_flashdata('changeProfilePic',"File Uploaded Successfully");            
        }


        redirect("admin/recipients/$id");
        }
    }

    public function add_photo($id = null,$unique_key = null,$type = null){
        // 0 = photos folder
        // 1 = celebration folder
        
        if($id == null || $unique_key == null || $type == null){
        }else{

            if($type == 1){
                // celebration
                $this->session->set_flashdata('type',1);            
                $type = "celebration_photos";
            }else{
                // normal
                $this->session->set_flashdata('type',0);            
                $type = "personal_photos";
            }

            $unique_key_id = (explode(".",$unique_key))[0];

            $imageExtention = pathinfo($_FILES["uploadImg"]["name"], PATHINFO_EXTENSION);
            
            $config['upload_path']          = "./assets/images/recipients/$unique_key_id/$type/";
            $config['file_name']            = $unique_key_id."".time().".".$imageExtention;
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            // var_dump($config['upload_path'],$unique_key_id);
            // print_r($_FILES);

            
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('uploadImg')){
            $error = array('error' => $this->upload->display_errors());
            echo "Error<br>";
            print_r($error);
            
            $this->session->set_flashdata('addPhoto',"Error: $error[error]");
        }else{
            $data = array('upload_data' => $this->upload->data());
            echo "success<br>";
            print_r($data);
            
            $this->session->set_flashdata('addPhoto',"File Uploaded Successfully");            
        }

        redirect("admin/recipients/$id");
        }
        
    }
    public function photo_delete($unique_key = null,$value = null){
        // API
    }
// Functions

}


?>