<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller { 
    function __construct() {
        parent::__construct();
        		$this->load->database();                        
                $this->load->library('session');					  
                $this->load->model('vacancy_model');                    // Load vacancy Model Here
                $this->load->model('application_model');                // Load Apllication Model Here
                $this->load->model('leave_model');                     // Load Leave Model Here
                $this->load->model('award_model');                      // Load Award Model Here
                $this->load->model('student_model');                    // Load Student Model Here
                $this->load->model('enrolled_student_model');		    // Load Enrolled Student Model Here
                $this->load->model('event_model');                      // Load Event Model Here
                $this->load->model('language_model');                   // Load Language Model Here
                $this->load->model('exam_question_model');              // Load Exam Question Model Here
                $this->load->model('student_payment_model');            // Load Student Payment Model Here
    }
    public function index() 
	{
        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
    
    }

    function dashboard() {
        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');   
		
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] =  get_phrase('Admin Dashboard');
        $this->load->view('backend/index', $page_data);
    }
	function approve() {
        
	   $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->row()->jee_rollnumber;	// checking if email exists in database
	   if($check_exist != null)
       {			
       	$page_data['page_name'] = 'approval';
        $page_data['page_title'] =  get_phrase('Approval Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'login', 'refresh');     
	   }
    }
	
	function payment() {
        
	   $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2 ))->row()->jee_rollnumber;	// checking if email exists in database
	   if($check_exist != null)
       {			
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'Admin/approve', 'refresh');     
	   }
    }
	function paymentsuccess() {
        
	  	
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	  
		     

    }


function idpassword() {
        
	    $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2, 'payment' =>1 ))->row()->jee_rollnumber;
        $check_exist1 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2,))->row()->jee_rollnumber;
         $check_exist2 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->row()->jee_rollnumber;		// checking if email exists in database
	   if($check_exist != null)
       {			
       	$page_data['page_name'] = 'idPassword';
        $page_data['page_title'] =  get_phrase('IdPassword Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist1 != null)
       {			
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist2 != null)
       {			
        $page_data['page_name'] = 'approval';
        $page_data['page_title'] =  get_phrase('Approval Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'Admin/approve', 'refresh');     
	   }
    }
	
	
	function successmassage() {
        
	    $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2, 'payment' =>1 ))->row()->jee_rollnumber;
        $check_exist1 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2,))->row()->jee_rollnumber;
         $check_exist2 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->row()->jee_rollnumber;		// checking if email exists in database
	   if($check_exist != null)
       {			
       	$page_data['page_name'] = 'idPassword';
        $page_data['page_title'] =  get_phrase('IdPassword Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist1 != null)
       {
         $user_id= $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
		 $update_rows = array('payment' => 1,		 
		 );
		 
		$this->db->where('student_id',$user_id[0]['student_id'] );
		$this->db->update('student_data', $update_rows);	
		$this->db->trans_complete();
		$this->session->set_flashdata('flash_message', get_phrase('Your payment have done succesfully! '));        
			
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist2 != null)
       {			
        $page_data['page_name'] = 'approval';
        $page_data['page_title'] =  get_phrase('Approval Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'Admin/approve', 'refresh');     
	   }
    }
	
	function errormassage() {
        
	    $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2, 'payment' =>1 ))->row()->jee_rollnumber;
        $check_exist1 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2,))->row()->jee_rollnumber;
         $check_exist2 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->row()->jee_rollnumber;		// checking if email exists in database
	   if($check_exist != null)
       {			
       	$page_data['page_name'] = 'idPassword';
        $page_data['page_title'] =  get_phrase('IdPassword Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist1 != null)
       {

		$this->session->set_flashdata('error_message', get_phrase('Your payment have been cancelled! '));  
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist2 != null)
       {			
        $page_data['page_name'] = 'approval';
        $page_data['page_title'] =  get_phrase('Approval Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'Admin/approve', 'refresh');     
	   }
    }


function paymentreceipt() {
	
  
	    $check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2, 'payment' =>1 ))->row()->jee_rollnumber;
        $check_exist1 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber'), 'status' =>2,))->row()->jee_rollnumber;
         $check_exist2 = $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->row()->jee_rollnumber;		// checking if email exists in database
	  
       if($check_exist!= null)
       {			
           $this->load->library('fpdf_master');		
		   $user_data= $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
		   $feedetails= $this->db->get('feepayment')->result_array();
		 
		   if($this->session->userdata('rollnumber'))
		   {
			   $documnetstatus='NO';
	       $this->fpdf->SetFillColor('35','142','104');
		   $this->fpdf->Rect(5, 5, 200, 33, 'FD');
		   $this->fpdf->Ln();
		   $this->fpdf->Image(base_url().'uploads/iiitv.png',10,10,23,23,'png','iiitvadodara.com');
		   $this->fpdf->Ln();		          
	       $this->fpdf->SetFont('Arial','B',12);                   
	       $this->fpdf->Cell(0,15,'INDIAN INSTITUTE OF INFORMATION TECHNOLOGY',0,0,'C');
		   $this->fpdf->Ln();
           $this->fpdf->SetFont('Arial','B',12);		   
		   $this->fpdf->Cell(0,3,'VADODARA GUJARAT (INDIA)',0,0,'C');
		   $this->fpdf->Ln();
           $this->fpdf->Image(base_url().'uploads/iiitdiu.png',177,10,23,23,'png','iiitvadodara.com');
           $this->fpdf->Ln();		   
		   $this->fpdf->SetFillColor('99','184','255');
		   $this->fpdf->Rect(5,43, 200, 10, 'FD');
		   $this->fpdf->SetFont('Arial','B',12);                   
	       $this->fpdf->Cell(0,35,'PAYMENT RECEIPT: IIITV B-Tech.-2021',0,0,'C');
		   $this->fpdf->Ln(1);
            //registration details			   
		   $this->fpdf->SetFillColor('150','205','205');		   
		   $this->fpdf->Rect(5,58, 150, 7, 'DF');
		   $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(0,60,'A - Registeration Details');         	   
		   $this->fpdf->Ln(1);
            //1		   
		   $this->fpdf->Rect(5,65, 75, 7, '');	
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(80,71,'Registeration Number',0,0,'L');		   
		   $this->fpdf->Ln(2);
           $this->fpdf->Rect(80,65, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,67,$user_data[0]['jee_rollnumber'],0,0,'R');		   
		   $this->fpdf->Ln(2);		   
		   $this->fpdf->Rect(5,72, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(80,77,'Candidate Name',0,0,'L');		   
		   $this->fpdf->Ln(1);	
           $this->fpdf->Rect(80,72, 75, 7, 's');
            $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,75,$user_data[0]['name'],0,0,'R');		   
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,79, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(80,88,'Father Name',0,0,'L');			   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(80,79, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,86,$user_data[0]['father_name'],0,0,'R');		   
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,86, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,97,'Mother Name',0,0,'L');				   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(80,86, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,95,$user_data[0]['mother_name'],0,0,'R');		   
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,93, 75, 7, 's');	
		   $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,107,'Date Of Birth',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(80,93, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,105,$user_data[0]['date_of_birth'],0,0,'R');   
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,100, 75, 7, 's');
		   $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,117,'Email Address',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(80,100, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,115,$user_data[0]['email'],0,0,'R');   
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,107, 75, 7, 's');
		   $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,127,'Mobile Number',0,0,'L');   
		   $this->fpdf->Ln(1);
		   $this->fpdf->Rect(80,107, 75, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(130,125,$user_data[0]['mobile_number'],0,0,'R');     
		   $this->fpdf->Ln(1);
           
		   //photo space		   
		   $this->fpdf->Rect(155,58, 50, 56, 's');
           $this->fpdf->Image(base_url().'enrolleddata/'.$user_data[0]['jee_rollnumber'].'/photo.jpg',160,64,40,40,'jpg','iiitvadodara.com'); 
		   $this->fpdf->Ln(1);
		   
		   $this->fpdf->SetFillColor('150','205','205');
		   $this->fpdf->Rect(5,119, 200, 7, 'FD');
		   $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(0,146,'B - Amount');          	   
		   $this->fpdf->Ln(1);	
            //personal details
           //1			   
		   $this->fpdf->Rect(5,126, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,158,'Total Payable Amount',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,126, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,156,$feedetails[0]['registration_fee'],0,0,'R');		   		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,126, 60, 7, 's');	
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(127,154,'Payment ',0,0,'R');		   		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,126, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);
           	   
           $this->fpdf->Cell(170,152,'Done',0,0,'R');		   
		   $this->fpdf->Ln(1);	
          
           
		   
		echo $this->fpdf->Output('PaymentReceipt.pdf','D');
		   }
		   else{
			   
			$page_data['page_name'] = 'enrolled_dashboard';
			$page_data['page_title'] =  get_phrase('Enrolled Dashboard');
			$this->load->view('backend/enrolled/complete', $page_data); 
		   }
	   }
	   
	    else if($check_exist1 != null)
       {			
       	$page_data['page_name'] = 'payment';
        $page_data['page_title'] =  get_phrase('Payment Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	    else if($check_exist2 != null)
       {			
        $page_data['page_name'] = 'approval';
        $page_data['page_title'] =  get_phrase('Approval Page');
        $this->load->view('backend/enrolled/complete', $page_data);
	   }
	   else
	   {
		 redirect(base_url(). 'Admin/approve', 'refresh');     
	   }
    }







    function manage_profile($param1=null, $param2=null, $param3=null){
       if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
    
            $data['name']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . 'jpg');
            $this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
            redirect(base_url() . 'admin/manage_profile', 'refresh');
           
        }
    
        if ($param1 == 'change_password') {
    
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('admin_id', $this->session->userdata('admin_id'));
               $this->db->update('admin', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
            }
    
            else{
                $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
            }
    
            redirect(base_url() . 'admin/manage_profile', 'refresh');
           
        }
    
    
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('Manage Profile');
            $page_data['edit_profile']  = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->result_array();
            $this->load->view('backend/index', $page_data);

  

    }



    function enquiry_category($param1 = '', $param2 ='', $param3 =''){

        if($param1 == 'insert'){
       
            $page_data['category']  =   $this->input->post('category');
            $page_data['purpose']   =   $this->input->post('purpose');
            $page_data['whom']      =   $this->input->post('whom');
    
            $this->db->insert('enquiry_category', $page_data);
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'admin/enquiry_category', 'refresh');
        }
    
        if($param1 == 'update'){    
            $page_data['category']  =   $this->input->post('category');
            $page_data['purpose']   =   $this->input->post('purpose');
            $page_data['whom']      =   $this->input->post('whom');
    
            $this->db->where('enquiry_category_id', $param2);
            $this->db->update('enquiry_category', $page_data);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/enquiry_category', 'refresh');    
            }
    
        if($param1 == 'delete'){    
            $this->db->where('enquiry_category_id', $param2);
            $this->db->delete('enquiry_category');
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/enquiry_category', 'refresh');    
            }
         
            $page_data['page_name']     = 'enquiry_category';
            $page_data['page_title']    = get_phrase('Manage Category');
            $page_data['enquiry_category']  = $this->db->get('enquiry_category')->result_array();
            $this->load->view('backend/index', $page_data);
    
         }
    
    

        function list_enquiry ($param1 = '', $param2 = '', $param3 = ''){


            if($param1 == 'delete')
            {
                $this->db->where('enquiry_id', $param2);
                $this->db->delete('enquiry');
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/list_enquiry', 'refresh');
        
            }
    
            $page_data['page_name']     = 'list_enquiry';
            $page_data['page_title']    = get_phrase('All Enquiries');
            $page_data['select_enquiry']  = $this->db->get('enquiry')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }


        function club ($param1 = '', $param2 ='', $param3 =''){

            if($param1 == 'insert'){
       
                $page_data['club_name']  =   $this->input->post('club_name');
                $page_data['desc']   =   $this->input->post('desc');
                $page_data['date']      =   $this->input->post('date');
        
                $this->db->insert('club', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/club', 'refresh');
            }
    
            if($param1 == 'update'){
       
                $page_data['club_name']  =   $this->input->post('club_name');
                $page_data['desc']   =   $this->input->post('desc');
                $page_data['date']      =   $this->input->post('date');
        
                $this->db->where('club_id', $param2);
                $this->db->update('club', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/club', 'refresh');
            }
    
    
            if($param1 == 'delete'){
    
                $this->db->where('club_id', $param2);
                $this->db->delete('club');
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/club', 'refresh');
        
                }
    
    
            $page_data['page_name']     = 'club';
            $page_data['page_title']    = get_phrase('Manage Club');
            $page_data['select_club']  = $this->db->get('club')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }
        function circular($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
    
                $page_data['title']         =   $this->input->post('title');
                $page_data['reference']     =   $this->input->post('reference');
                $page_data['content']       =   $this->input->post('content');
                $page_data['date']          =   $this->input->post('date');

                $this->db->insert('circular', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/circular', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data['title']         =   $this->input->post('title');
                $page_data['reference']     =   $this->input->post('reference');
                $page_data['content']       =   $this->input->post('content');
                $page_data['date']          =   $this->input->post('date');

                $this->db->where('circular_id', $param2);
                $this->db->update('circular', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/circular', 'refresh');
    
            }
    
    
            if($param1 == 'delete'){
                $this->db->where('circular_id', $param2);
                $this->db->delete('circular');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/circular', 'refresh');
    
    
            }
    
    
            $page_data['page_name']         = 'circular';
            $page_data['page_title']        = get_phrase('Manage Circular');
            $page_data['select_circular']   = $this->db->get('circular')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }

        function parent($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
    
                $page_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'profession' => $this->input->post('profession'),
                    );
        
                $this->db->insert('parent', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/parent', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'profession' => $this->input->post('profession'),
                    );
        
                $this->db->where('parent_id', $param2);
                $this->db->update('parent', $page_data);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/parent', 'refresh');
    
            }
    
    
            if($param1 == 'delete'){
                $this->db->where('parent_id', $param2);
                $this->db->delete('parent');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/parent', 'refresh');
    
    
            }
    
    
            $page_data['page_name']         = 'parent';
            $page_data['page_title']        = get_phrase('Manage Parent');
            $page_data['select_parent']   = $this->db->get('parent')->result_array();
            $this->load->view('backend/index', $page_data);
    
    
        }

        function librarian($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
                // array data that postulate the input fileds
                $page_data = array(		
                    'name' 				=> $this->input->post('name'),
                    'librarian_number' 	=> $this->input->post('librarian_number'),
                    'birthday' 			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status'	=> $this->input->post('marital_status'),
                    'password' 			=> sha1($this->input->post('password'))
                    );
                    
               // $data['file_name'] = $_FILES["file_name"]["name"];
               // $page_data['email'] = $this->input->post('email');
                $check_email = $this->db->get_where('librarian', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
                if($check_email != null) 
                {
                    $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
                    redirect(base_url() . 'admin/librarian/', 'refresh');
                }
                else
                {
                    $this->db->insert('librarian', $page_data);
                    $librarian_id = $this->db->insert_id();
                   // move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
                    //$this->email_model->account_opening_email('librarian', $data['email']); //Send email to receipient email adddrress upon account opening
                }
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/librarian', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data = array(			// array starts from here
                    'name'				=> $this->input->post('name'),
                    'birthday'			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status' 	=> $this->input->post('marital_status')
                    );
        
                    $this->db->where('librarian_id', $param2);
                    $this->db->update('librarian', $page_data);
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $param2 . '.jpg');            
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/librarian', 'refresh');
    
            }
    
            if($param1 == 'delete'){
                $this->db->where('librarian_id', $param2);
                $this->db->delete('librarian');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/librarian', 'refresh');
    
            }
    
            $page_data['page_name']         = 'librarian';
            $page_data['page_title']        = get_phrase('Manage Librarian');
            $page_data['select_librarian']   = $this->db->get('librarian')->result_array();
            $this->load->view('backend/index', $page_data);
        }
    

        function accountant($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
                // array data that postulate the input fileds
                $page_data = array(		
                    'name' 				=> $this->input->post('name'),
                    'accountant_number' => $this->input->post('accountant_number'),
                    'birthday' 			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status'	=> $this->input->post('marital_status'),
                    'password' 			=> sha1($this->input->post('password'))
                    );
                    
               // $data['file_name'] = $_FILES["file_name"]["name"];
               // $page_data['email'] = $this->input->post('email');
                $check_email = $this->db->get_where('accountant', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
                if($check_email != null) 
                {
                    $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
                    redirect(base_url() . 'admin/accountant/', 'refresh');
                }
                else
                {
                    $this->db->insert('accountant', $page_data);
                    $librarian_id = $this->db->insert_id();
                   // move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
                }
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/accountant', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data = array(			// array starts from here
                    'name'				=> $this->input->post('name'),
                    'birthday'			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status' 	=> $this->input->post('marital_status')
                    );
        
                    $this->db->where('accountant_id', $param2);
                    $this->db->update('accountant', $page_data);
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $param2 . '.jpg');            
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/accountant', 'refresh');
    
            }
    
            if($param1 == 'delete'){
                $this->db->where('accountant_id', $param2);
                $this->db->delete('accountant');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/accountant', 'refresh');
    
            }
    
            $page_data['page_name']         = 'accountant';
            $page_data['page_title']        = get_phrase('Manage Accountant');
            $page_data['select_accountant']   = $this->db->get('accountant')->result_array();
            $this->load->view('backend/index', $page_data);
        }
    
    
        function hostel($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
                // array data that postulate the input fileds
                $page_data = array(		
                    'name' 				=> $this->input->post('name'),
                    'hostel_number' => $this->input->post('hostel_number'),
                    'birthday' 			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status'	=> $this->input->post('marital_status'),
                    'password' 			=> sha1($this->input->post('password'))
                    );
                    
               // $data['file_name'] = $_FILES["file_name"]["name"];
               // $page_data['email'] = $this->input->post('email');
                $check_email = $this->db->get_where('hostel', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
                if($check_email != null) 
                {
                    $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
                    redirect(base_url() . 'admin/hostel/', 'refresh');
                }
                else
                {
                    $this->db->insert('hostel', $page_data);
                    $librarian_id = $this->db->insert_id();
                   // move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
                }
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/hostel', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data = array(			// array starts from here
                    'name'				=> $this->input->post('name'),
                    'birthday'			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status' 	=> $this->input->post('marital_status')
                    );
        
                    $this->db->where('hostel_id', $param2);
                    $this->db->update('hostel', $page_data);
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $param2 . '.jpg');            
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/hostel', 'refresh');
    
            }
    
            if($param1 == 'delete'){
                $this->db->where('hostel_id', $param2);
                $this->db->delete('hostel');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/hostel', 'refresh');
    
            }
    
            $page_data['page_name']         = 'hostel';
            $page_data['page_title']        = get_phrase('Manage Hostel');
            $page_data['select_hostel']   = $this->db->get('hostel')->result_array();
            $this->load->view('backend/index', $page_data);
        }

        function hrm($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
                // array data that postulate the input fileds
                $page_data = array(		
                    'name' 				=> $this->input->post('name'),
                    'hrm_number' => $this->input->post('hrm_number'),
                    'birthday' 			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status'	=> $this->input->post('marital_status'),
                    'password' 			=> sha1($this->input->post('password'))
                    );
                    
               // $data['file_name'] = $_FILES["file_name"]["name"];
               // $page_data['email'] = $this->input->post('email');
                $check_email = $this->db->get_where('hrm', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
                if($check_email != null) 
                {
                    $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
                    redirect(base_url() . 'admin/hrm/', 'refresh');
                }
                else
                {
                    $this->db->insert('hrm', $page_data);
                    $librarian_id = $this->db->insert_id();
                   // move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
                   // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
                }
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/hrm', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $page_data = array(			// array starts from here
                    'name'				=> $this->input->post('name'),
                    'birthday'			=> $this->input->post('birthday'),
                    'sex' 				=> $this->input->post('sex'),
                    'religion' 			=> $this->input->post('religion'),
                    'blood_group' 		=> $this->input->post('blood_group'),
                    'address' 			=> $this->input->post('address'),
                    'phone' 			=> $this->input->post('phone'),
                    
                    'email' 			=> $this->input->post('email'),
                    'facebook' 			=> $this->input->post('facebook'),
                    'twitter' 			=> $this->input->post('twitter'),
                    'googleplus' 		=> $this->input->post('googleplus'),
                    'linkedin' 			=> $this->input->post('linkedin'),
                    'qualification' 	=> $this->input->post('qualification'),
                    'marital_status' 	=> $this->input->post('marital_status')
                    );
        
                    $this->db->where('hrm_id', $param2);
                    $this->db->update('hrm', $page_data);
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/hrm', 'refresh');
    
            }
    
            if($param1 == 'delete'){
                $this->db->where('hrm_id', $param2);
                $this->db->delete('hrm');
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/hrm', 'refresh');
    
            }
    
            $page_data['page_name']         = 'hrm';
            $page_data['page_title']        = get_phrase('Manage Human Resource');
            $page_data['select_hrm']   = $this->db->get('hrm')->result_array();
            $this->load->view('backend/index', $page_data);
        }

        function alumni($param1 = '', $param2 = '', $param3 = ''){

            if ($param1 == 'insert'){
    
                $this->alumni_model->insert_alumni();
    
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
                redirect(base_url(). 'admin/alumni', 'refresh');
            }
    
    
            if($param1 == 'update'){
    
                $this->alumni_model->update_alumni($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
                redirect(base_url(). 'admin/alumni', 'refresh');
    
            }
    
            if($param1 == 'delete'){
                $this->alumni_model->delete_alumni($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
                redirect(base_url(). 'admin/alumni', 'refresh');
    
            }
    
            $page_data['page_name']         = 'alumni';
            $page_data['page_title']        = get_phrase('Manage Alumni');
            $page_data['select_alumni']        = $this->db->get('alumni')->result_array();
            $this->load->view('backend/index', $page_data);
        }

        function teacher ($param1 = '', $param2 ='', $param3 =''){

            if($param1 == 'insert'){
                $this->teacher_model->insetTeacherFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/teacher', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->teacher_model->updateTeacherFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/teacher', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->teacher_model->deleteTeacherFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/teacher', 'refresh');
        
                }
    
            $page_data['page_name']     = 'teacher';
            $page_data['page_title']    = get_phrase('Manage Teacher');
            $page_data['select_teacher']  = $this->db->get('teacher')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }
    
        function get_designation($department_id = null){
    
            $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
            foreach($designation as $key => $row)
            echo '<option value="'.$row['designation_id'].'">' . $row['name'] . '</option>';
        }
    
    
        function vacancy ($param1 = '', $param2 ='', $param3 =''){

            if($param1 == 'insert'){
                $this->vacancy_model->insetVacancyFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/vacancy', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->vacancy_model->updateVacancyFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/vacancy', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->vacancy_model->deleteVacancyFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/vacancy', 'refresh');
        
                }
    
            $page_data['page_name']     = 'vacancy';
            $page_data['page_title']    = get_phrase('Manage Vacancy');
            $page_data['select_vacancy']  = $this->db->get('vacancy')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }

        function application ($param1 = 'applied', $param2 ='', $param3 =''){

            if($param1 == 'insert'){
                $this->application_model->insertApplicantFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/application', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->application_model->updateApplicantFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/application', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->application_model->deleteApplicantFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/application', 'refresh');
        
                }
    
            if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interviewed' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 ='applied';
    
            
            
            $page_data['status']        = $param1;
            $page_data['page_name']     = 'application';
            $page_data['page_title']    = get_phrase('Job Applicant');
            $this->load->view('backend/index', $page_data);
    
        }

        function leave ($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'update'){
                $this->leave_model->updateLeaveFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/leave', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->leave_model->deleteLeaveFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/leave', 'refresh');
        
                }
    
            
            $page_data['page_name']     = 'leave';
            $page_data['page_title']    = get_phrase('Manage Leave');
            $this->load->view('backend/index', $page_data);
    
        }

        function award ($param1 = null, $param2 = null, $param3 = null){


            if($param1 == 'create'){
                $this->award_model->createAwardFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/award', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->award_model->updateAwardFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/award', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->award_model->deleteAwardFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/award', 'refresh');
        
            }
    
            $page_data['page_name']     = 'award';
            $page_data['page_title']    = get_phrase('Manage Award');
            $this->load->view('backend/index', $page_data);
    
        }
        function classes ($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'create'){
                $this->class_model->createClassFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/classes', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->class_model->updateClassFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/classes', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->class_model->deleteClassFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/classes', 'refresh');
        
            }
    
            $page_data['page_name']     = 'class';
            $page_data['page_title']    = get_phrase('Manage Class');
            $this->load->view('backend/index', $page_data);
    
        }

        function section ($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'create'){
            $this->section_model->createSectionFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/section', 'refresh');
            }
    
            if($param1 == 'update'){
            $this->section_model->updateSectionFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/section', 'refresh');
            }
    
            if($param1 == 'delete'){
            $this->section_model->deleteSectionFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/section', 'refresh');
            }
    
            $page_data['page_name']     = 'section';
            $page_data['page_title']    = get_phrase('Manage Section');
            $this->load->view('backend/index', $page_data);
        }

        function sections ($class_id = null){

            if($class_id == '')
            $class_id = $this->db->get('class')->first_row()->class_id;
            
            $page_data['page_name']     = 'section';
            $page_data['class_id']      = $class_id;
            $page_data['page_title']    = get_phrase('Manage Section');
            $this->load->view('backend/index', $page_data);

        }
    
        function class_routine ($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'create'){
            $this->class_routine_model->createTimetableFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
            }
    
            if($param1 == 'update'){
            
            $this->class_routine_model->updateTimetableFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
            }
    
            if($param1 == 'delete'){
            
            $this->db->where('class_routine_id', $param2);
            $this->db->delete('class_routine');
            //$this->class_routine_model->deleteTimetableFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
            }
        }

        function listStudentTimetable(){

            $page_data['page_name']     = 'listStudentTimetable';
            $page_data['page_title']    = get_phrase('School Timetable');
            $this->load->view('backend/index', $page_data);
        }

        function class_routine_add(){

            $page_data['page_name']     = 'class_routine_add';
            $page_data['page_title']    = get_phrase('School Timetable');
            $this->load->view('backend/index', $page_data);
        }
    
        function get_class_section_subject($class_id){
            $page_data['class_id']  =   $class_id;
            $this->load->view('backend/admin/class_routine_section_subject_selector', $page_data);
    
        }
        function studentTimetableLoad($class_id){

            $page_data['class_id']  =   $class_id;
            $this->load->view('backend/admin/studentTimetableLoad', $page_data);
    
        }
    
        function class_routine_print_view($class_id, $section_id){
    
            $page_data['class_id']      =   $class_id;
            $page_data['section_id']    =   $section_id;
            $this->load->view('backend/admin/class_routine_print_view', $page_data);
        }
    
    
        function section_subject_edit($class_id, $class_routine_id){
    
        $page_data['class_id']          =   $class_id;
        $page_data['class_routine_id']  =   $class_routine_id;
        $this->load->view('backend/admin/class_routine_section_subject_edit', $page_data);
    
        }
    
        function dormitory ($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'create'){
                $this->dormitory_model->createDormitoryFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/dormitory', 'refresh');
            }
        
            if($param1 == 'update'){
                $this->dormitory_model->updateDormitoryFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/dormitory', 'refresh');
            }
        
        
            if($param1 == 'delete'){
                $this->dormitory_model->deleteDormitoryFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/dormitory', 'refresh');
        
            }
        
            $page_data['page_name']     = 'dormitory';
            $page_data['page_title']    = get_phrase('Manage Dormitory');
            $this->load->view('backend/index', $page_data);
        
            }
        
        
            /***********  The function manages hostel room  ***********************/
            function hostel_room ($param1 = null, $param2 = null, $param3 = null){
        
            if($param1 == 'create'){
                $this->dormitory_model->createHostelRoomFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/hostel_room', 'refresh');
            }
        
            if($param1 == 'update'){
                $this->dormitory_model->updateHostelRoomFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/hostel_room', 'refresh');
            }
        
        
            if($param1 == 'delete'){
                $this->dormitory_model->deleteHostelRoomFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/hostel_room', 'refresh');
        
            }
        
            $page_data['page_name']     = 'hostel_room';
            $page_data['page_title']    = get_phrase('Hostel Room');
            $this->load->view('backend/index', $page_data);
        
            }
        
        
            /***********  The function manages hostel category  ***********************/
            function hostel_category ($param1 = null, $param2 = null, $param3 = null){
        
            if($param1 == 'create'){
                $this->dormitory_model->createHostelCategoryFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/hostel_category', 'refresh');
            }
        
            if($param1 == 'update'){
                $this->dormitory_model->updateHostelCategoryFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/hostel_category', 'refresh');
            }
        
        
            if($param1 == 'delete'){
                $this->dormitory_model->deleteHostelCategoryFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/hostel_category', 'refresh');
        
            }
        
            $page_data['page_name']     = 'hostel_category';
            $page_data['page_title']    = get_phrase('Hostel Category');
            $this->load->view('backend/index', $page_data);
            }
        

            function academic_syllabus ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'create'){
                $this->academic_model->createAcademicSyllabus();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'admin/academic_syllabus', 'refresh');
            }
        
            if($param1 == 'update'){
                $this->academic_model->updateAcademicSyllabus($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'admin/academic_syllabus', 'refresh');
            }
        
        
            if($param1 == 'delete'){
                $this->academic_model->deleteAcademicSyllabus($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'admin/academic_syllabus', 'refresh');
        
                }
        
                $page_data['page_name']     = 'academic_syllabus';
                $page_data['page_title']    = get_phrase('Academic Syllabus');
                $this->load->view('backend/index', $page_data);
        
            }

            function get_class_subject($class_id){
                $subjects = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
                    foreach($subjects as $key => $subject)
                    {
                        echo '<option value="'.$subject['subject_id'].'">'.$subject['name'].'</option>';
                    }
            }
        
            function get_class_section($class_id){
                $sections = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
                    foreach($sections as $key => $section)
                    {
                        echo '<option value="'.$section['section_id'].'">'.$section['name'].'</option>';
                    }
            }

            function get_academic_syllabus ($class_id = null){

                if($class_id == '')
                $class_id = $this->db->get('class')->first_row()->class_id;
        
                $page_data['page_name']     = 'academic_syllabus';
                $page_data['class_id']      = $class_id;
                $page_data['page_title']    = get_phrase('Academic Syllabus');
                $this->load->view('backend/index', $page_data);
        
            }

            function download_academic_syllabus($academic_syllabus_code){ 
                $get_file_name = $this->db->get_where('academic_syllabus', array('academic_syllabus_code' => $academic_syllabus_code))->row()->file_name;
                // Loading download from helper.
                $this->load->helper('download');
                $get_download_content = file_get_contents('uploads/syllabus' . $get_file_name);
                $name = $file_name;
                force_download($name, $get_download_content);
            }

            function new_student ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'create'){
                    $this->student_model->createNewStudent();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/student_information', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->student_model->updateNewStudent($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/student_information', 'refresh');
                }
        
                if($param1 == 'delete'){
                    $this->student_model->deleteNewStudent($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/student_information', 'refresh');
        
                }
        
                $page_data['page_name']     = 'new_student';
                $page_data['page_title']    = get_phrase('Manage Student'); 
                $this->load->view('backend/index', $page_data);
        
            }
        
            function enrolled_student ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'create'){
                    $this->enrolled_student_model->createNewStudent();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/new_enrolled_student', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->enrolled_student_model->updateNewStudent($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/new_enrolled_student', 'refresh');
                }
				
				
                if($param1 == 'delete'){
                    $this->enrolled_student_model->deleteNewStudent($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/new_enrolled_student', 'refresh');
        
                }
        
                $page_data['page_name']     = 'enrolled_student';
                $page_data['page_title']    = get_phrase('Manage Enrolled Student'); 
                $this->load->view('backend/index', $page_data);
        
            }
			
			function enrolled_dashboard(){
        
                $page_data['page_name']     = 'enrolled_dashboard';
                $page_data['page_title']    = get_phrase('Dashboard');
                $this->load->view('backend/enrolled/complete.php', $page_data);
            }
			
			function new_enrolled_student(){
        
                $page_data['page_name']     = 'new_enrolled_student';
                $page_data['page_title']    = get_phrase('Manage Enrolled Student');
                $this->load->view('backend/index', $page_data);
            }
			
            function student_information(){
        
                $page_data['page_name']     = 'student_information';
                $page_data['page_title']    = get_phrase('List Student');
                $this->load->view('backend/index', $page_data);
            }
        
        
            /**************************  search student function with ajax starts here   ***********************************/
            function getStudentClasswise($class_id){
        
                $page_data['class_id'] = $class_id;
                $this->load->view('backend/admin/showStudentClasswise', $page_data);
            }
			
			 function getEnrolledStudentClasswise($enrolled_type_id){
        
                $page_data['enrolled_type_id'] = $enrolled_type_id;
                $this->load->view('backend/admin/showEnrolledStudentClasswise', $page_data);
            }
            /**************************  search student function with ajax ends here   ***********************************/
        
        
            function edit_student($student_id){
        
                $page_data['student_id']      = $student_id;
                $page_data['page_name']     = 'edit_student';
                $page_data['page_title']    = get_phrase('Edit Student');
                $this->load->view('backend/index', $page_data);
            }
			function edit_enrolledstudent(){
        
                $this->session->set_userdata('updatekey', 'enrolledupdate');
                $page_data['page_name']     = 'edit_enrolledstudent';
                $page_data['page_title']    = get_phrase('Update Registration Detail');
                $this->load->view('backend/enrolled/review', $page_data);
            }
        
        
            function resetStudentPassword ($student_id) {
                $password['password']               =   sha1($this->input->post('new_password'));
                $confirm_password['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
                if ($password['password'] == $confirm_password['confirm_new_password']) {
                   $this->db->where('student_id', $student_id);
                   $this->db->update('student', $password);
                   $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
                }
                else{
                    $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
                }
                redirect(base_url() . 'admin/student_information', 'refresh');
            }


            function noticeboard ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'create'){
                    $this->event_model->createNoticeboardFunction();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/noticeboard', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->event_model->updateNoticeboardFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/noticeboard', 'refresh');
                }
        
                if($param1 == 'delete'){
                    $this->event_model->deleteNoticeboardFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/noticeboard', 'refresh');
                }
        
                $page_data['page_name']     = 'noticeboard';
                $page_data['page_title']    = get_phrase('School Event');
                $this->load->view('backend/index', $page_data);
            }

            function manage_language ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'edit_phrase'){
                    $page_data['edit_profile']  =   $param2;
                }
        
                if($param1 == 'add_language'){
                    $this->language_model->createNewLanguage();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/manage_language', 'refresh');
                }
        
                if($param1 == 'add_phrase'){
                    $this->language_model->createNewLanguagePhrase();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/manage_language', 'refresh');
                }
        
                if($param1 == 'delete_language'){
                    $this->language_model->deleteLanguage($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/manage_language', 'refresh');
                }
        
                $page_data['page_name']     = 'manage_language';
                $page_data['page_title']    = get_phrase('Manage Language');
                $this->load->view('backend/index', $page_data);
            }


            function updatePhraseWithAjax(){

                $checker['phrase_id']   =   $this->input->post('phraseId');
                $updater[$this->input->post('currentEditingLanguage')]  =   $this->input->post('updatedValue');
        
                $this->db->where('phrase_id', $checker['phrase_id'] );
                $this->db->update('language', $updater);
        
                echo $checker['phrase_id']. ' '. $this->input->post('currentEditingLanguage'). ' '. $this->input->post('updatedValue');
        
            }

            function examQuestion ($param1 = null, $param2 = null, $param3 = null){

                if($param1 == 'create'){
                    $this->exam_question_model->createexamQuestion();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/examQuestion', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->exam_question_model->updateexamQuestion($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/examQuestion', 'refresh');
                }
        
                if($param1 == 'delete'){
                    $this->exam_question_model->deleteexamQuestion($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/examQuestion', 'refresh');
                }
        
                $page_data['page_name']     = 'examQuestion';
                $page_data['page_title']    = get_phrase('Exam Question');
                $this->load->view('backend/index', $page_data);
            }
             /***********  The function below add, update and delete exam question table ends here ***********************/
        
        
            /***********  The function below add, update and delete examination table ***********************/
            function createExamination ($param1 = null, $param2 = null, $param3 = null){
        
                if($param1 == 'create'){
                    $this->exam_model->createExamination();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/createExamination', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->exam_model->updateExamination($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/createExamination', 'refresh');
                }
        
                if($param1 == 'delete'){
                    $this->exam_model->deleteExamination($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/createExamination', 'refresh');
                }
        
                $page_data['page_name']     = 'createExamination';
                $page_data['page_title']    = get_phrase('Create Exam');
                $this->load->view('backend/index', $page_data);
            }
        
            //single_invoice
            function student_payment ($param1 = null, $param2 = null, $param3 = null){ 

                if($param1 == 'single_invoice'){ 
                    $this->student_payment_model->createStudentSinglePaymentFunction();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'admin/student_invoice', 'refresh'); 
                }
        
                // if($param1 == 'mass_invoice'){
                //     $this->student_payment_model->createStudentMassPaymentFunction();
                //     $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                //     redirect(base_url(). 'admin/student_invoice', 'refresh');
                // }
        
                if($param1 == 'update_invoice'){
                    $this->student_payment_model->updateStudentPaymentFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/student_invoice', 'refresh');
                }
        
                if($param1 == 'take_payment'){
                    $this->student_payment_model->takeNewPaymentFromStudent($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'admin/student_invoice', 'refresh');
                }
        
        
                if($param1 == 'delete_invoice'){
                    $this->student_payment_model->deleteStudentPaymentFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'admin/student_invoice', 'refresh');
                }
        
                $page_data['page_name']     = 'student_payment';
                $page_data['page_title']    = get_phrase('Student Payment');
                $this->load->view('backend/index', $page_data);
            }   

            function get_class_student($class_id){
                $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                    foreach($students as $key => $student)
                    {
                        echo '<option value="'.$student['student_id'].'">'.$student['name'].'</option>';
                    }
            }
        
        
            function get_class_mass_student($class_id){
        
                $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                foreach($students as $key => $student)
                {
                    echo '<div class="">
                    <label><input type="checkbox" class="check" name="student_id[]" value="' . $student['student_id'] . '">' . '&nbsp;'. $student['name'] .'</label></div>';
                }
        
                echo '<br><button type ="button" class="btn btn-success btn-sm btn-rounded" onClick="select()">'.get_phrase('Select All').'</button>';
                echo '<button type ="button" class="btn btn-primary btn-sm btn-rounded" onClick="unselect()">'.get_phrase('Unselect All').'</button>';
            }
        
            function student_invoice(){
        
                $page_data['page_name']     = 'student_invoice';
                $page_data['page_title']    = get_phrase('Manage Invoice');
                $this->load->view('backend/index', $page_data);
        
            }


            function manage_attendance($date = null, $month= null, $year = null, $class_id = null, $section_id = null ){
                
                if ($_POST) {
            
                    // Loop all the students of $class_id
                    $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                    foreach ($students as $key => $student) {
                    $attendance_status = $this->input->post('status_' . $student['student_id']);
                    $full_date = $year . "-" . $month . "-" . $date;
                    $this->db->where('student_id', $student['student_id']);
                    $this->db->where('date', $full_date);
            
                    $this->db->update('attendance', array('status' => $attendance_status));
            
               
                }
            
                    $this->session->set_flashdata('flash_message', get_phrase('Updated Successfully'));
                    redirect(base_url() . 'admin/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id . '/' . $section_id, 'refresh');
                }
        
                $page_data['date'] = $date;
                $page_data['month'] = $month;
                $page_data['year'] = $year;
                $page_data['class_id'] = $class_id;
                $page_data['section_id'] = $section_id;
                $page_data['page_name'] = 'manage_attendance';
                $page_data['page_title'] = get_phrase('Manage Attendance');
                $this->load->view('backend/index', $page_data);
        
            }
        
            function attendance_selector(){
                $date = $this->input->post('timestamp');
                $date = date_create($date);
                $date = date_format($date, "d/m/Y");
                redirect(base_url(). 'admin/manage_attendance/' .$date. '/' . $this->input->post('class_id'). '/' . $this->input->post('section_id'), 'refresh');
            }
        
        
            function attendance_report($class_id = NULL, $section_id = NULL, $month = NULL, $year = NULL) {
                
                $active_sms_gateway = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;
                
                
                if ($_POST) {
                redirect(base_url() . 'admin/attendance_report/' . $class_id . '/' . $section_id . '/' . $month . '/' . $year, 'refresh');
                }
                
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $key => $class) {
                    if (isset($class_id) && $class_id == $class['class_id'])
                        $class_name = $class['name'];
                    }
                            
                $sections = $this->db->get('section')->result_array();
                    foreach ($sections as $key => $section) {
                        if (isset($section_id) && $section_id == $section['section_id'])
                            $section_name = $section['name'];
                }
                
                $page_data['month'] = $month;
                $page_data['year'] = $year;
                $page_data['class_id'] = $class_id;
                $page_data['section_id'] = $section_id;
                $page_data['page_name'] = 'attendance_report';
                $page_data['page_title'] = "Attendance Report:" . $class_name . " : Section " . $section_name;
                $this->load->view('backend/index', $page_data);
            }
        
        
            /******************** Load attendance with ajax code starts from here **********************/
            function loadAttendanceReport($class_id, $section_id, $month, $year)
            {
                $page_data['class_id'] 		= $class_id;					// get all class_id
                $page_data['section_id'] 	= $section_id;					// get all section_id
                $page_data['month'] 		= $month;						// get all month
                $page_data['year'] 			= $year;						// get all class year
                
                $this->load->view('backend/admin/loadAttendanceReport' , $page_data);
            }
            
        
            /******************** print attendance report **********************/
            function printAttendanceReport($class_id=NULL, $section_id=NULL, $month=NULL, $year=NULL)
            {
                $page_data['class_id'] 		= $class_id;					// get all class_id
                $page_data['section_id'] 	= $section_id;					// get all section_id
                $page_data['month'] 		= $month;						// get all month
                $page_data['year'] 			= $year;						// get all class year
                
                $page_data['page_name'] = 'printAttendanceReport';
                $page_data['page_title'] = "Attendance Report";
                $this->load->view('backend/index', $page_data);
            }

            
            function marks ($exam_id = null, $class_id = null, $student_id = null){

                if($this->input->post('operation') == 'selection'){
    
                    $page_data['exam_id']       =  $this->input->post('exam_id'); 
                    $page_data['class_id']      =  $this->input->post('class_id');
                    $page_data['student_id']    =  $this->input->post('student_id');
    
                    if($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['student_id'] > 0){
    
                        redirect(base_url(). 'admin/marks/'. $page_data['exam_id'] .'/' . $page_data['class_id'] . '/' . $page_data['student_id'], 'refresh');
                    }
                    else{
                        $this->session->set_flashdata('error_message', get_phrase('Pleasen select something'));
                        redirect(base_url(). 'admin/marks', 'refresh');
                    }
                }
    
                if($this->input->post('operation') == 'update_student_subject_score'){
    
                    $select_subject_first = $this->db->get_where('subject', array('class_id' => $class_id ))->result_array();
                        foreach ($select_subject_first as $key => $dispay_subject_from_subject_table){
    
                            $page_data['class_score1']  =   $this->input->post('class_score1_' . $dispay_subject_from_subject_table['subject_id']);
                            $page_data['class_score2']  =   $this->input->post('class_score2_' . $dispay_subject_from_subject_table['subject_id']);
                            $page_data['class_score3']  =   $this->input->post('class_score3_' . $dispay_subject_from_subject_table['subject_id']);
                            $page_data['exam_score']    =   $this->input->post('exam_score_' . $dispay_subject_from_subject_table['subject_id']);
                            $page_data['comment']       =   $this->input->post('comment_' . $dispay_subject_from_subject_table['subject_id']);
    
                            $this->db->where('mark_id', $this->input->post('mark_id_' . $dispay_subject_from_subject_table['subject_id']));
                            $this->db->update('mark', $page_data);  
                        }
    
                        $this->session->set_flashdata('flash_message', get_phrase('Data Updated Successfully'));
                        redirect(base_url(). 'admin/marks/'. $this->input->post('exam_id') .'/' . $this->input->post('class_id') . '/' . $this->input->post('student_id'), 'refresh');
                }
    
            $page_data['exam_id']       =   $exam_id;
            $page_data['class_id']      =   $class_id;
            $page_data['student_id']    =   $student_id;
            $page_data['subject_id']   =    $subject_id;
            $page_data['page_name']     =   'marks';
            $page_data['page_title']    = get_phrase('Student Marks');
            $this->load->view('backend/index', $page_data);
        }
        /***********  The function that manages school marks ends here ***********************/
    
    
    
        /***********  The function below manages school marks ***********************/
         function student_marksheet_subject ($exam_id = null, $class_id = null, $subject_id = null){
    
            if($this->input->post('operation') == 'selection'){
    
                $page_data['exam_id']       =  $this->input->post('exam_id'); 
                $page_data['class_id']      =  $this->input->post('class_id');
                $page_data['subject_id']    =  $this->input->post('subject_id');
    
                if($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0){
    
                    redirect(base_url(). 'admin/student_marksheet_subject/'. $page_data['exam_id'] .'/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
                }
                else{
                    $this->session->set_flashdata('error_message', get_phrase('Pleasen select something'));
                    redirect(base_url(). 'admin/student_marksheet_subject', 'refresh');
                }
            }
    
            if($this->input->post('operation') == 'update_student_subject_score'){
    
                $select_student_first = $this->db->get_where('student', array('class_id' => $class_id ))->result_array();
                    foreach ($select_student_first as $key => $dispay_student_from_student_table){
    
                        $page_data['class_score1']  =   $this->input->post('class_score1_' . $dispay_student_from_student_table['student_id']);
                        $page_data['class_score2']  =   $this->input->post('class_score2_' . $dispay_student_from_student_table['student_id']);
                        $page_data['class_score3']  =   $this->input->post('class_score3_' . $dispay_student_from_student_table['student_id']);
                        $page_data['exam_score']    =   $this->input->post('exam_score_' . $dispay_student_from_student_table['student_id']);
                        $page_data['comment']       =   $this->input->post('comment_' . $dispay_student_from_student_table['student_id']);
    
                        $this->db->where('mark_id', $this->input->post('mark_id_' . $dispay_student_from_student_table['student_id']));
                        $this->db->update('mark', $page_data);  
                    }
    
                    $this->session->set_flashdata('flash_message', get_phrase('Data Updated Successfully'));
                    redirect(base_url(). 'admin/student_marksheet_subject/'. $this->input->post('exam_id') .'/' . $this->input->post('class_id') . '/' . $this->input->post('subject_id'), 'refresh');
            }
    
        $page_data['exam_id']       =   $exam_id;
        $page_data['class_id']      =   $class_id;
        $page_data['student_id']    =   $student_id;
        $page_data['subject_id']   =    $subject_id;
        $page_data['page_name']     =   'student_marksheet_subject';
        $page_data['page_title']    = get_phrase('Student Marks');
        $this->load->view('backend/index', $page_data);
        }
        /***********  The function that manages school marks ends here ***********************/
    
        /***********  The function below manages school event ***********************/
        function exam_marks_sms ($param1 = null, $param2 = null, $param3 = null){
    
            if($param1 == 'send'){
                $this->crud_model->send_student_score_model();
                $this->session->set_flashdata('flash_message', get_phrase('Data Sent successfully'));
                redirect(base_url(). 'admin/exam_marks_sms', 'refresh');
            }
    
            $page_data['page_name']     = 'exam_marks_sms';
            $page_data['page_title']    = get_phrase('Send Student Scores');
            $this->load->view('backend/index', $page_data);
        }

        function tabulation_sheet ($exam_id = null, $class_id = null, $student_id = null){

            if($this->input->post('operation') == 'selection'){
    
                $page_data['exam_id']       =  $this->input->post('exam_id'); 
                $page_data['class_id']      =  $this->input->post('class_id');
                $page_data['student_id']    =  $this->input->post('student_id');
    
                if($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['student_id'] > 0){
    
                    redirect(base_url(). 'admin/tabulation_sheet/'. $page_data['exam_id'] .'/' . $page_data['class_id'] . '/' . $page_data['student_id'], 'refresh');
                }
                else{
                    $this->session->set_flashdata('error_message', get_phrase('Pleasen select something'));
                    redirect(base_url(). 'admin/tabulation_sheet', 'refresh');
                }
            }
        $page_data['exam_id']       =   $exam_id;
        $page_data['class_id']      =   $class_id;
        $page_data['student_id']    =   $student_id;
        $page_data['subject_id']   =    $subject_id;
        $page_data['page_name']     =   'tabulation_sheet';
        $page_data['page_title']    = get_phrase('Student Marks');
        $this->load->view('backend/index', $page_data);
    }

    function print_mass_report_card($class_id, $exam_id)
    {
        $page_data['exam_id']       =   $exam_id;
        $page_data['class_id']      =   $class_id;
        $page_data['page_name']     =   'print_mass_report_card';
        $page_data['page_title']    = get_phrase('Terminal Report');
        $this->load->view('backend/index', $page_data);
    }

            
        
        
        

}
