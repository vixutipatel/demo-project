<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{ 
    protected $soft_delete = TRUE;                             
    protected $soft_delete_key = 'is_deleted';

	public function __construct()
    {
        parent::__construct();            
                // Your own constructor code
    }
/*
*
*function to delete checkbox selected data
*
*/
     public  function delete_all($checkbox)
     {
        for($i=0;$i<count($checkbox);$i++)
        {
        
            $del_id = $checkbox[$i];                               
            $sql = $this->delete($del_id);       
           
            if($sql)
            {
                $_SESSION['flash_success_msg'] = 'A record has been deleted successfully';
               // redirect("user");
            } 
            else
            { 
                ini_set('error_log', 1); 
            }
        }
    }


    public  function pagination($page,$segment)
    {
   
        $this->limit($page,$segment);
        $query = $this->get_all();
        return $query;        
    }
    /**
        *
        *function to get all the data
        * @return {array} all the data into query result
        **/
        /*

        public function getData()
        {
             $query = $this->db->get('user');
             if($query)
             {
               return $query->result_array();
             }            
            else
             {
             echo "data is not fetched";     
             }
        }
        /**
        *
        *function to get one records
        * @return {array} all the data into query result
        **/
        /*
        public function getOnerecord($id)
        {
                $query = $this->db->get_where('users', array('id' => $id));
                if($query)
                {
                return $query->result();
                }
                else
                {
                 echo "data is not fetched";     
                }
        }


        /**
        *
        *function  addData [to insert records]
        *@param {array} $data [firstname,lastname,email,city,dob]
        *
        */
        /*
        public function addData()
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
                'dob' =>$this->input->post('dob')
                          );  
                //removing html tags
                $data = array_map( 'strip_tags', $data);

                //calling inbuilt insert function to insert data

                $add = $this->insert($data);
                        if($add)
                        {             
                                //error_log("$add", 3, "");         
                                $_SESSION['flash_success_msg'] = 'A record has been added successfully';
                                redirect("admin/users/home");
                        }
                        else
                        {
                                log_message('error', 'their is problem in insertion');
                                $_SESSION['flash_success_msg'] = 'A record not added ';
                                redirect("admin/users/home");
                        }
                }      
                else
                {
                  $_SESSION['flash_success_msg'] = 'A record not submitted ';
                } 

        }

         /**
        *
        *function  addData [to insert records]
        *@param {array} $data [firstname,lastname,email,city,dob]
        *
        */
         /*
        public function editData($id)
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
                'dob' =>$this->input->post('dob')
                                );  
                //removing html tags
                $data = array_map( 'strip_tags', $data);
               // $edit = $this->db->where('id', 2);
                //calling inbuilt insert function to insert data
                        $edit = $this->db->update('users', $data, array('id' => $id));               
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
        }

 /**
        *
        *function  deleteData [deleted by id]
        *@param {id} $id [user id]
        *
        */
 /*
        public function deleteData($id)
        {
               
                 $delete = $this->db->delete('users', array('id' => $id)); 
                        if($delete)
                        {             
                                //error_log("$add", 3, "");         
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
        
*/
}

?>