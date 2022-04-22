<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Enrolled_student_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }



    // The function below insert into student house //
    function createStudentHouse(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'description'      => html_escape($this->input->post('description'))
	    );

        $this->db->insert('house', $page_data);
    }

// The function below update student house //
    function updateStudentHouse($param2){
        $page_data = array(
            'name'         => html_escape($this->input->post('name')),
            'description'  => html_escape($this->input->post('description'))
	    );

        $this->db->where('house_id', $param2);
        $this->db->update('house', $page_data);
    }

    // The function below delete from student house table //
    function deleteStudentHouse($param2){
        $this->db->where('house_id', $param2);
        $this->db->delete('house');
    }



    // The function below insert into student category //
    function createstudentCategory(){

        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );
        $this->db->insert('student_category', $page_data);
    }

// The function below update student category //
    function updatestudentCategory($param2){
        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );

        $this->db->where('student_category_id', $param2);
        $this->db->update('student_category', $page_data);
    }

    // The function below delete from student category table //
    function deletestudentCategory($param2){
        $this->db->where('student_category_id', $param2);
        $this->db->delete('student_category');
    }




    //  the function below insert into student table
    function createNewStudent(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'birthday'      => html_escape($this->input->post('birthday')),
            'age'           => html_escape($this->input->post('age')),
            'place_birth'   => html_escape($this->input->post('place_birth')),
            'sex'           => html_escape($this->input->post('sex')),
            'm_tongue'      => html_escape($this->input->post('m_tongue')),
            'religion'      => html_escape($this->input->post('religion')),
            'blood_group'   => html_escape($this->input->post('blood_group')),
            'address'       => html_escape($this->input->post('address')),
            'city'          => html_escape($this->input->post('city')),
            'state'         => html_escape($this->input->post('state')),
            'nationality'   => html_escape($this->input->post('nationality')),
            'phone'         => html_escape($this->input->post('phone')),
            'email'         => html_escape($this->input->post('email')),
            'ps_attended'   => html_escape($this->input->post('ps_attended')),
            'ps_address'    => html_escape($this->input->post('ps_address')),
            'ps_purpose'    => html_escape($this->input->post('ps_purpose')),
            'class_study'   => html_escape($this->input->post('class_study')),
            'date_of_leaving' => html_escape($this->input->post('date_of_leaving')),
            'am_date'         => html_escape($this->input->post('am_date')),
            'tran_cert'       => html_escape($this->input->post('tran_cert')),
            'dob_cert'        => html_escape($this->input->post('dob_cert')),
            'mark_join'        => html_escape($this->input->post('mark_join')),
            'physical_h'      => html_escape($this->input->post('physical_h')),
            'password'        => sha1($this->input->post('password')),
            'class_id'        => html_escape($this->input->post('class_id')),
            'section_id'      => html_escape($this->input->post('section_id')),
            'parent_id'       => html_escape($this->input->post('parent_id')),
            'roll'            => html_escape($this->input->post('roll')),
            'transport_id'    => html_escape($this->input->post('transport_id')),
            'dormitory_id'    => html_escape($this->input->post('dormitory_id')),
            'house_id'        => html_escape($this->input->post('house_id')),
            'student_category_id' => html_escape($this->input->post('student_category_id')),
            'club_id'             => html_escape($this->input->post('club_id')),
            'session'             => html_escape($this->input->post('session'))
        );
        
  
    $this->db->insert('student', $page_data); 
    $student_id = $this->db->insert_id();
   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');			// image with user ID

    }


    //the function below update student
    function updateNewStudent($param2){
		
		   
			$user_id= $this->db->get_where('student_data', array('student_id'=> $param2))->result_array();
			
	        $tempsession=$this->db->get_where('settings', array('type' => 'session'))->row()->description;
			$pass= rand(100000000,999999999);
			
		$page_data = array(
            'name'          => $user_id[0]['name'],
            'birthday'      => $user_id[0]['date_of_birth'],

            'place_birth'   => $user_id[0]['birth_place'],
            'sex'           => $user_id[0]['gender'],
            'm_tongue'      => $user_id[0]['name'],
            'religion'      => $user_id[0]['country'],
            'blood_group'   => $user_id[0]['blood_group'],
            'address'       => $user_id[0]['permanent_address'],
            'city'          => $user_id[0]['city'],
            'state'         => $user_id[0]['state'],
            'nationality'   => $user_id[0]['country'],
            'phone'         => $user_id[0]['mobile_number'],
            'email'         => $user_id[0]['email'],
			
          
            'father_name'   => $user_id[0]['father_name'],
            'mother_name'   => $user_id[0]['mother_name'],            
            'password'      => sha1($pass),
            'session'       => $tempsession
        );       
  
    $this->db->insert('student', $page_data); 
    $student_id1 = $this->db->insert_id();
   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');			// image with user ID
  
		
		
		
		
        $page_data = [
            'status' => '2',
			'password'      => $pass,
        ];
        $this->db->where('student_id', $param2);
        $this->db->update('student_data', $page_data);
       // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2 . '.jpg');

    }

    // the function below deletes from student table
    function deleteNewStudent($param2){
        $this->db->where('student_id', $param2);
        $this->db->delete('student_data');
    }

	


	
	
}
