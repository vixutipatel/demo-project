<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->view('includes/header');
        $this->load->model('User_model');
        $this->load->library("pagination");

    }
	
	public function index()
	{ 
	    $count = $this->User_model->count_all();
        $this->load->view('includes/header');

        // Set up pagination        
        $perpage = 4;
        if ($count > $perpage) 
        {
        	//$config ['base_url'] = 'http://localhost/codeigniter/index.php/user/';
        	echo $this->uri->segment(2);
        	$config['base_url'] = base_url().'index.php/user/';
        	echo $config['base_url'];
        	echo $this->uri->segment(2);
        	
           // $config['base_url'] = base_url($this->uri->segment(1) . '/');
            $config['total_rows'] = $count;
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 2;
            //$config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
    		   $page = $config ['per_page']; 
		       $segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		   //  echo $segment;
			//$offset = ($page_num - 1) * $config['per_page'];
		 //fetch user data
	    	$data['user'] = $this->User_model->pagination($page,$segment);	
            //$data['links'] = $this->pagination->create_links();
          // $data['subview'] = 'includes/header';
	   		$this->load->view('admin/users/index',$data);

        }
        else 
        {
           $this->data['pagination'] = '';
           $offset = 0;
        }          
		
	   //checking checkbox selected row for deleting
		if(isset($_POST['delete_selected']))
	    {
	       	    $checkbox = $_POST['user'];  
	            if($this->User_model->delete_all($checkbox))
	            {
	             return true;
	            }
	            else
	            {
	            log_message('error', 'error in delete_all function');
	            return false;
	            }
	    
		}
	    $this->load->view('includes/footer');
    }

     /**
     *
     *function to insert data
     *
     */
    public function add()
	{
		//load insert view form
		
 		$this->load->library('form_validation');
	    $this->form_validation->set_rules('firstname', 'firstname', 'required|min_length[3]');
	    $this->form_validation->set_rules('lastname', 'lastname', 'required|min_length[3]');
	    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
	    $this->form_validation->set_rules('city', 'city', 'required');
	    $this->form_validation->set_rules('dob', 'DOB', 'trim|required');

			if ($this->form_validation->run() == FALSE)
	        { 
	         $this->load->view('admin/users/add');
	        }	        
	        else
	        {
	        	 //Check submit button 
                if($this->input->post('submit'))
                {
                //get form's data and store in to array
                $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'dob' =>$this->input->post('dob'),
                'password' =>md5(123)
                          );  
                //removing html tags
                $data = array_map( 'strip_tags', $data);

                //calling inbuilt insert function to insert data

                $add = $this->User_model->insert($data);
                        if($add)
                        {             
                                //error_log("$add", 3, "");         
                                $_SESSION['flash_success_msg'] = 'A record has been added successfully';
                                redirect("user");
                        }
                        else
                        {
                                log_message('error', 'their is problem in insertion');
                                $_SESSION['flash_success_msg'] = 'A record not added ';
                                redirect("user");
                        }
                }      
                else
                {
                  $_SESSION['flash_success_msg'] = 'A record not submitted ';
                } 	
			    $this->load->view('admin/users/index');
		        
	        }

     $this->load->view('includes/footer');

	}

 /**
     *
     *function to edit data
     *calling getOnerecord function 
     *@param {int} $id
     *@return {array} $data [firstname,lastname,email,city,dob]

     */
    public function edit()
	{
		$id = $this->input->get('id');

 		$this->load->library('form_validation');
	    $this->form_validation->set_rules('firstname', 'firstname', 'required|min_length[3]');
	    $this->form_validation->set_rules('lastname', 'lastname', 'required|min_length[3]');
	    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
	    $this->form_validation->set_rules('city', 'city', 'required');
	    $this->form_validation->set_rules('dob', 'DOB', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	        	$data['user'] = $this->User_model->get_many($id);
	        	$this->load->view('admin/users/edit',$data);			
		        
	        }	        	        
	        else
	        {

	        	if($this->input->post('submit'))
                {
                //get form's data and store in to array
                $data = array(				
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'is_admin' =>$this->input->post('is_admin'),
                'dob' =>$this->input->post('dob')
                                );  
                //removing html tags
                $data = array_map( 'strip_tags', $data);
			  			$edit = $this->User_model->update($id,$data,$skip_validation = FALSE);
						ini_set('display_errors', 1);	
						if($edit)
                        {             
                                //error_log("$add", 3, "");         
                                $_SESSION['flash_success_msg'] = 'A record has been updated successfully';
                                redirect("user");
                        }
                        else
                        {
                                log_message('error', 'their is problem in insertion');
                                $_SESSION['flash_success_msg'] = 'A record not updated ';
                                redirect("user");
                        }	        
	           } 
	           else
               {
                echo "not submitted data";
               }   
			$this->load->view('includes/footer');

			}
	}

    /**
     *
     *function to delete record 
     *
     */
    public function delete()
	{
		$id=$this->input->get('id');
		//echo $id;			 
		    $value = $this->User_model->delete($id);
			if($value)
			{
 			$_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
            redirect("user");
			}
			else
			{                               
 			log_message('error', 'their is problem in deletion');
            $_SESSION['flash_success_msg'] = 'A record not deleted';
            redirect("user");
			}		 		  

	}	

}
