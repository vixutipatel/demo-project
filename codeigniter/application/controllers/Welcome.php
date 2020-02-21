<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

		public function __construct()
        {
                parent::__construct();
                $this->load->model('auth_model');
                $this->load->library('form_validation');
                // Your own constructor code
        }


    public function index()
    {
        $this->load->view('index');
    }


       public function post_login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('index');
        }
        else
        {      
            $this->auth_model->logged_in();
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->auth_model->login($email, $password);
           
            if($user)
            {
                $userdata = array(
                    'id' => $user->id,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    //'authenticated' => TRUE
                );
            $data['userdata'] = $this->session->set_userdata($userdata);

             $this->load->view('includes/header',$data);
 
           //  redirect( base_url('index.php/dashboard') ); 
            }
  
            else 
            {
                $this->session->set_flashdata('message', 'Invalid email or password or role');
                redirect(base_url('index.php/login'));
            }
        }
         
    }

   
    public function logout()
    {
    $this->session->sess_destroy();
    redirect(base_url('index.php/welcome'));
    }

   //forgot password
    public function forgot_password()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('admin/forgot_password');
        }
        else
        {      
            $this->auth_model->logged_in();
            $email = $this->input->post('email');        
            $user = $this->auth_model->check_email($email);
           
            if($user)
            {

                $config = array();
                $config['protocol'] = 'smtp';
               // $config['charset'] = 'iso-8859-1';
               // $config['wordwrap'] = TRUE;                
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_user'] = 'vixutipatel129@gmail.com';
                $config['smtp_pass'] = 'vrp@1209';
                $config['smtp_port'] = 465;

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                 $from_email = "vixutipatel129@gmail.com"; 
                 $to_email = $email;            
                 $this->email->from($from_email, 'vixuti patel'); 
                 $this->email->to($to_email);
                 $this->email->subject('Email Test'); 
                 $this->email->message('Testing the email class.');            
                 //Send mail 
                if($this->email->send()) 
                {
                    echo "send successfully";
                    //$this->session->set_flashdata("email_sent","Email sent successfully."); 
                }
                else 
                {
                       echo "Error in sending Email.";
                    //$this->session->set_flashdata("email_sent","Error in sending Email."); 
                     $this->load->view('index');      //  redirect( base_url('index.php/dashboard') ); 
                }
            }
  
            else 
            {
                $this->session->set_flashdata('message', 'Invalid email');
                redirect(base_url('index.php/welcome/forgot_password'));
            }
        }
    }
    



}