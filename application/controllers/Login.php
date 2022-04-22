<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
		 $this->load->model('dynamic_dependent_model');
       
    }
    
 
    public function index() {
		if($this->session->userdata('rollnumber'))redirect(base_url(). 'login/complete_form', 'refresh');
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
        if ($this->session->userdata('hrm_login')== 1) redirect (base_url(). 'hrm/dashboard'); 
        if ($this->session->userdata('hostel_login')== 1) redirect (base_url(). 'hostel/dashboard');
        if ($this->session->userdata('accountant_login')== 1) redirect (base_url(). 'accountant/dashboard');
        if ($this->session->userdata('librarian_login')== 1) redirect (base_url(). 'librarian/dashboard'); 
        if ($this->session->userdata('teacher_login')== 1) redirect (base_url(). 'teacher/dashboard');   
        if ($this->session->userdata('parent_login')== 1) redirect (base_url(). 'parent/dashboard'); 
        if ($this->session->userdata('student_login')== 1) redirect (base_url(). 'student/dashboard'); 
        $this->load->view('backend/login');
    }

    function check_login() {
        // $this->login_model->adminLoginFunction();
        // $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
        // redirect(base_url() . 'admin/dashboard', 'refresh');

        $login_check_model = $this->login_model->loginFunctionForAllUsers(); 
        $login_user = $this->session->userdata('login_type');
        if(!$login_check_model){
          // Here, if the above conditions are not meant, the user will be redirected to login page again.
          $this->session->set_flashdata('error_message', get_phrase('Wrong email or password'));
          redirect(base_url() . 'login', 'refresh');
        }
        if($login_user == 'admin') {
          $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(base_url() . 'admin/dashboard', 'refresh');
        }

        if($login_user == 'hrm') {
          $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(base_url() . 'hrm/dashboard', 'refresh');
        }
        if($login_user == 'hostel') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'hostel/dashboard', 'refresh');
          }
  
          if($login_user == 'accountant') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'accountant/dashboard', 'refresh');
          }
          if($login_user == 'librarian') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'librarian/dashboard', 'refresh');
          }
          if($login_user == 'parent') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'parents/dashboard', 'refresh');
          }
          if($login_user == 'student') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'student/dashboard', 'refresh');
          }
          if($login_user == 'teacher') {
            $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
            redirect(base_url() . 'teacher/dashboard', 'refresh');
          }
     }
  function enrolledlogout(){  
              
              $this->login_model->logout_model_for_enrolledstudent();
			  
        }


     function logout(){

        $login_user = $this->session->userdata('login_type');
        if($login_user == 'admin'){
          $this->login_model->logout_model_for_admin();
        }
        if($login_user == 'hrm'){
        $this->login_model->logout_model_for_hrm();
      }
      if($login_user == 'hostel'){
        $this->login_model->logout_model_for_hostel();
      }
      if($login_user == 'accountant'){
        $this->login_model->logout_model_for_accountant();
      }
      if($login_user == 'librarian'){
        $this->login_model->logout_model_for_librarian();
      }
      if($login_user == 'parent'){
        $this->login_model->logout_model_for_parent();
      }
      if($login_user == 'student'){
        $this->login_model->logout_model_for_student();
      }
      if($login_user == 'teacher'){
        $this->login_model->logout_model_for_teacher();
      }
      $this->session->sess_destroy();
      redirect('login', 'refresh');

     }

     function registeration() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
      $this->load->view('backend/registeration');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
   function enrolled_registeration() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
	  $data['countries'] = $this->dynamic_dependent_model->fetch_country();
   
      $this->load->view('backend/enrolled/enrolled_registeration', $data);

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
   function enrolled_login() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
      $this->load->view('backend/enrolled/login');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
  
      function document_form() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
      $this->load->view('backend/enrolled/document');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
   function review_form() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
      $this->load->view('backend/enrolled/review');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
   function success_form() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
      $this->load->view('backend/enrolled/success');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
function complete_form() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');
	   $page_data['page_name'] = 'enrolled_dashboard';
       $page_data['page_title'] =  get_phrase('Dashboard ');
       $this->load->view('backend/enrolled/complete', $page_data);	
    

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
   function otp_varification() {
      // $page_data['page_name']     = 'registeration';
      // $page_data['page_title']    = get_phrase('Registeration');

      $this->load->view('backend/enrolled/otpvarification');

      // $this->login_model->registerationFunction();
      // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
      // redirect(base_url() . 'admin/dashboard', 'refresh');
   }
/*   
   function check_name_avalibility()
   {
	   if(!filter_val($_POST["name"], 'required'))
	   //if(!filter_val($_POST["name"], FILTER_VALIDATE_EMAIL))
	   {
	   echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid name</span></label>';
       }
	   else{
		   $this->load->model("main_model");
		   if($this->main_model->is_name_available($_POST["name"]))
		   {
			   echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid name</span></label>';
      
		   }
		   else{
			    echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Name Available</span></label>';
      
		   }
	   }
   }
 */
 
 function checkotp(){
	 
	  $page_data['userotp']  = html_escape($this->input->post('userotp'));
	  $otpuser=$this->session->userdata('otpuser');
	  if($page_data['userotp'] == $otpuser)
	  {
		$this->session->set_userdata('rollnumber', $this->session->userdata('privateroll'));
		$this->session->set_flashdata('flash_message', get_phrase('Login Successfully!! '));
		redirect(base_url(). 'login/complete_form', 'refresh'); 
	  }
	  else
	  {
		$this->session->unset_userdata('rollnumber');
		$this->session->unset_userdata('privateroll');
		$this->session->unset_userdata('otpuser');
		$this->session->set_flashdata('error_message', get_phrase('Incorrect OTP!! '));
		redirect(base_url(). 'login/enrolled_login', 'refresh');   
	  }
	 
}
function checkuserexist() {           
			
			$page_data['jee_rollnumber']  = html_escape($this->input->post('jee_rollnumber'));
			$user_data= $this->db->get_where('student_data', array('jee_rollnumber' => $page_data['jee_rollnumber']))->result_array();
			$check_exist = $this->db->get_where('student_data', array('jee_rollnumber' => $page_data['jee_rollnumber']))->row()->jee_rollnumber;	// checking if email exists in database
			if($check_exist != null) 
			{				
             $useremail=$user_data[0]['email'];
			 $rndno=rand(10000, 99999);
			 $to = $useremail;
			 $subject = "Login";
			 $message .= "<h1>".$rndno."</h1>";
			 $message = "<b> is your one time password(OTP) for IIITV login verification.</b>";			 
			 $header = "From:registrar@iiitvadodara.ac.in \r\n";			
			 $header .= "MIME-Version: 1.0\r\n";
			 $header .= "Content-type: text/html\r\n";			 
			 $retval = mail ($to,$subject,$message,$header);			 
			 if( $retval == true ) {
				$this->session->set_userdata('privateroll', $user_data[0]['jee_rollnumber']);
				$this->session->set_flashdata('flash_message', get_phrase('OTP sent Successfully!! '));
				$this->session->set_userdata('otpuser', $rndno);
				redirect(base_url(). 'login/otp_varification', 'refresh');	
			 }else {
				$this->session->set_flashdata('error_message', get_phrase('Some error!!'));
				redirect(base_url(). 'login/enrolled_login', 'refresh');	
			 }			 
			}			
			else{			
				$this->session->set_flashdata('error_message', get_phrase('You are not registered'));
				redirect(base_url(). 'login/enrolled_login', 'refresh');	
			}
   }
   
   
   function createregisteration() {

    $page_data['name']  = html_escape($this->input->post('name'));
    $page_data['email']  = html_escape($this->input->post('email'));
    $page_data['password']  = sha1($this->input->post('password'));
    $page_data['school_name']   = html_escape($this->input->post('school_name'));
    $page_data['managment_types']    = html_escape($this->input->post('managment_types'));

    $page_data['dashboard']  = html_escape($this->input->post('dashboard'));
    $page_data['manage_academics']  = html_escape($this->input->post('manage_academics'));
    $page_data['manage_employee']   = html_escape($this->input->post('manage_employee'));
    $page_data['manage_student']    = html_escape($this->input->post('manage_student'));
    $page_data['manage_attendance']     = html_escape($this->input->post('manage_attendance'));
    $page_data['learning_material']     = html_escape($this->input->post('learning_material'));
    $page_data['manage_parent']     = html_escape($this->input->post('manage_parent'));
    $page_data['manage_alumni']     = html_escape($this->input->post('manage_alumni'));
    $page_data['class_information']     = html_escape($this->input->post('class_information'));
    $page_data['manage_subject']     = html_escape($this->input->post('manage_subject'));
    $page_data['manage_exams']     = html_escape($this->input->post('manage_exams'));
    $page_data['report_card']     = html_escape($this->input->post('report_card'));
    $page_data['fee']     = html_escape($this->input->post('fee'));
    $page_data['hrm']     = html_escape($this->input->post('hrm'));
    $page_data['hostel']     = html_escape($this->input->post('hostel'));
    $page_data['communications']     = html_escape($this->input->post('communications'));
    $page_data['transportation']     = html_escape($this->input->post('transportation'));
    $page_data['setting']     = html_escape($this->input->post('setting'));
    $page_data['generate_report']     = html_escape($this->input->post('generate_report'));
   // $page_data['class_information']     = html_escape($this->input->post('class_information'));

    $check_email = $this->db->get_where('admin', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
        if($check_email != null) 
        {
        $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        redirect(base_url() . 'login/registeration/', 'refresh');
        }
        else
        {
        $this->db->insert('admin', $page_data);
        $admin_id = $this->db->insert_id();
        $this->session->set_flashdata('flash_message', get_phrase('Account is created successfully'));
        redirect(base_url(). 'login', 'refresh');
        
        }

    //$this->load->view('backend/registeration');

    // $this->login_model->registerationFunction();
    // $this->session->set_flashdata('flash_message', get_phrase('Your Account is succesfully created'));
    // redirect(base_url() . 'admin/dashboard', 'refresh');
 }

   
  function newenrollment() {

    $page_data['name']  = html_escape($this->input->post('name'));
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
	$this->form_validation->set_rules('name', 'Username', 'required|trim|max_length[30]|xss_clean');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student_data.email]');
	$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
	$this->form_validation->set_rules('gender', 'Gender', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('birth_place', 'Birth Place', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('adhar_number', 'Adhar Number', 'required|xss_clean|min_length[12]|max_length[16]');	
	$this->form_validation->set_rules('father_name', 'Father Name', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('mother_name', 'Mother Name', 'required|trim|max_length[50]|xss_clean');	
	$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|xss_clean|min_length[10]|max_length[10]');
	$this->form_validation->set_rules('jee_rollnumber', 'JEE Rollnumber', 'required|xss_clean|min_length[7]|max_length[7]');
	$this->form_validation->set_rules('branch', 'Branch', 'required');

	$this->form_validation->set_rules('highschool_passing_year', 'High School Passing Year', 'numeric|required|greater_than[2017]|less_than[2020]');
	$this->form_validation->set_rules('inter_passing_year', '12th Passing Year', 'numeric|required|greater_than[2019]|less_than[2022]');
	$this->form_validation->set_rules('fatheroccupation', 'Father Occupation', 'required');
	$this->form_validation->set_rules('motheroccupation', 'Mother Occupation', 'required');
	$this->form_validation->set_rules('country', 'Country', 'required');
	$this->form_validation->set_rules('state', 'Country', 'required');
	$this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('category_rank', 'Category Rank', 'numeric|required|greater_than[0]|less_than[5000]');
	$this->form_validation->set_rules('general_rank', 'General Rank', 'numeric|required|greater_than[0]|less_than[30000]');
	$this->form_validation->set_rules('blod_group', 'Blood Group', 'required');
	
	
	$page_data['name']  = html_escape($this->input->post('name'));
    $page_data['email']  = html_escape($this->input->post('email'));
    $page_data['date_of_birth']   = html_escape($this->input->post('date_of_birth'));
    $page_data['gender']    = html_escape($this->input->post('gender'));

    $page_data['category']  = html_escape($this->input->post('category'));
    $page_data['permanent_address']  = html_escape($this->input->post('permanent_address'));
    $page_data['birth_place']   = html_escape($this->input->post('birth_place'));
    $page_data['adhar_number']    = html_escape($this->input->post('adhar_number'));
	
    $page_data['father_name']     = html_escape($this->input->post('father_name'));
    $page_data['mother_name']     = html_escape($this->input->post('mother_name'));
    $page_data['mobile_number']     = html_escape($this->input->post('mobile_number'));
	
    $page_data['jee_rollnumber']     = html_escape($this->input->post('jee_rollnumber'));
    $page_data['branch']     = html_escape($this->input->post('branch'));
    $page_data['highschool_passing_year']     = html_escape($this->input->post('highschool_passing_year'));
	
    $page_data['inter_passing_year']     = html_escape($this->input->post('inter_passing_year'));
    $page_data['fatheroccupation']     = html_escape($this->input->post('fatheroccupation'));
    $page_data['motheroccupation']     = html_escape($this->input->post('motheroccupation'));
	$page_data['general_rank']     = html_escape($this->input->post('general_rank'));
    $page_data['category_rank']     = html_escape($this->input->post('category_rank'));
    $page_data['state']     = html_escape($this->input->post('state'));
	
    $page_data['country']     = html_escape($this->input->post('country'));
    $page_data['city']     = html_escape($this->input->post('city'));
	$page_data['blood_group']     = html_escape($this->input->post('blod_group'));
	$page_data['password']     = html_escape($this->input->post('date_of_birth'));
    $page_data['personal_status']     = 1;
	
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	if ($this->form_validation->run() == FALSE)
	{      
	        unset($this->_field_data);
			$this->load->view('backend/enrolled/enrolled_registeration');
          
	}
	else
	{    
	        unset($this->_field_data);
			$check_rollnumber = $this->db->get_where('student_data', array('jee_rollnumber' => $page_data['jee_rollnumber'] ))->row()->jee_rollnumber;	// checking if email exists in database
			if($check_rollnumber != null) 
			{
				$this->session->set_flashdata('error_message', get_phrase('This user already exist! Please Login '));				
				$this->load->view('backend/enrolled/login');
			}
			else
			{				
				$this->db->insert('student_data', $page_data);
				$admin_id = $this->db->insert_id();
				$this->session->set_flashdata('flash_message', get_phrase('You Registerd succesfully further submit your related data as per requirment'));
				$this->session->set_userdata('rollnumber', $page_data['jee_rollnumber']);
				redirect(base_url(). 'login/document_form', 'refresh');			
			}

	}
	
	
	
 }
 
   
   
  function enrolledupdate() {
	  
	$page_data['name']  = html_escape($this->input->post('name'));
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
	$this->form_validation->set_rules('name', 'Username', 'required|trim|max_length[30]|xss_clean');
	$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
	$this->form_validation->set_rules('gender', 'Gender', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('birth_place', 'Birth Place', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('adhar_number', 'Adhar Number', 'required|xss_clean|min_length[12]|max_length[16]');	
	$this->form_validation->set_rules('father_name', 'Father Name', 'required|trim|max_length[50]|xss_clean');
	$this->form_validation->set_rules('mother_name', 'Mother Name', 'required|trim|max_length[50]|xss_clean');	
	$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|xss_clean|min_length[10]|max_length[10]');
	$this->form_validation->set_rules('jee_rollnumber', 'JEE Rollnumber', 'required|xss_clean|min_length[7]|max_length[7]');
	$this->form_validation->set_rules('branch', 'Branch', 'required');
	
	$this->form_validation->set_rules('highschool_passing_year', 'High School Passing Year', 'numeric|required|greater_than[2017]|less_than[2020]');
	$this->form_validation->set_rules('inter_passing_year', '12th Passing Year', 'numeric|required|greater_than[2019]|less_than[2022]');
	$this->form_validation->set_rules('fatheroccupation', 'Father Occupation', 'required');
	$this->form_validation->set_rules('motheroccupation', 'Mother Occupation', 'required');
	$this->form_validation->set_rules('country', 'Country', 'required');
	$this->form_validation->set_rules('state', 'Country', 'required');
	$this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('category_rank', 'Category Rank', 'numeric|required|greater_than[0]|less_than[5000]');
	$this->form_validation->set_rules('general_rank', 'General Rank', 'numeric|required|greater_than[0]|less_than[30000]');
	$this->form_validation->set_rules('blod_group', 'Blood Group', 'required');
	
	$page_data['name']  = html_escape($this->input->post('name'));
    $page_data['date_of_birth']   = html_escape($this->input->post('date_of_birth'));
    $page_data['gender']    = html_escape($this->input->post('gender'));

    $page_data['category']  = html_escape($this->input->post('category'));
    $page_data['permanent_address']  = html_escape($this->input->post('permanent_address'));
    $page_data['birth_place']   = html_escape($this->input->post('birth_place'));
    $page_data['adhar_number']    = html_escape($this->input->post('adhar_number'));
	
    $page_data['father_name']     = html_escape($this->input->post('father_name'));
    $page_data['mother_name']     = html_escape($this->input->post('mother_name'));
    $page_data['mobile_number']     = html_escape($this->input->post('mobile_number'));
	
    $page_data['jee_rollnumber']     = html_escape($this->input->post('jee_rollnumber'));
    $page_data['branch']     = html_escape($this->input->post('branch'));
    $page_data['highschool_passing_year']     = html_escape($this->input->post('highschool_passing_year'));
	
    $page_data['inter_passing_year']     = html_escape($this->input->post('inter_passing_year'));
    $page_data['fatheroccupation']     = html_escape($this->input->post('fatheroccupation'));
    $page_data['motheroccupation']     = html_escape($this->input->post('motheroccupation'));
	$page_data['general_rank']     = html_escape($this->input->post('general_rank'));
    $page_data['category_rank']     = html_escape($this->input->post('category_rank'));
    $page_data['state']     = html_escape($this->input->post('state'));
	
    $page_data['country']     = html_escape($this->input->post('country'));
    $page_data['city']     = html_escape($this->input->post('city'));
	$page_data['blood_group']     = html_escape($this->input->post('blod_group'));
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
	if ($this->form_validation->run() == FALSE)
	{      
	        unset($this->_field_data);
			$this->load->view('backend/enrolled/review');          
	}
	else
	{    
	unset($this->_field_data);
	$user_id= $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
	 $update_rows = array('name' => $page_data['name'],'jee_rollnumber' => $page_data['jee_rollnumber'],
	                      'gender' => $page_data['gender'],'category' => $page_data['category'],'permanent_address' => $page_data['permanent_address'],
						  'birth_place' => $page_data['birth_place'],'adhar_number' => $page_data['adhar_number'],'father_name' => $page_data['father_name'],
						  'highschool_passing_year' => $page_data['highschool_passing_year'],'inter_passing_year' => $page_data['inter_passing_year'],'fatheroccupation' => $page_data['fatheroccupation'],
						  'motheroccupation' => $page_data['motheroccupation'],'general_rank' => $page_data['general_rank'],'category_rank' => $page_data['category_rank'],
	                      'state' => $page_data['state'],'country' => $page_data['country'],'city' => $page_data['city'],'blood_group' => $page_data['blood_group'],
	                      'mother_name' => $page_data['mother_name'],'mobile_number' => $page_data['mobile_number'],'branch' => $page_data['branch'],	
	 
	 );
	 
		$this->db->where('student_id',$user_id[0]['student_id'] );
		$this->db->update('student_data', $update_rows);	
		$this->db->trans_complete();

		
      if($this->db->trans_status() === FALSE) 
        {
			$this->session->set_flashdata('error_message', get_phrase('Have Some Problem! '));
			redirect(base_url(). 'login/review_form', 'refresh');
			
        }
        else
        {
			
        $this->session->set_flashdata('flash_message', get_phrase('Your form is submite succesfully! '));        
		$this->session->unset_userdata('rollnumber');
		$this->session->unset_userdata('updatekey');
		$this->session->set_userdata('rollnumber', $page_data['jee_rollnumber']);
		redirect(base_url(). 'login/review_form', 'refresh');
        		
        
        }

	}

 }
 
   
  function review() {
	
    $update_rows = array('review' => '1',);
	$this->db->where('jee_rollnumber',$roll=$this->session->userdata('rollnumber') );
	$this->db->update('student_data', $update_rows);	
	$this->db->trans_complete();

		
      if($this->db->trans_status() === FALSE) 
        {
			$this->session->set_flashdata('error_message', get_phrase('Have Some Problem! '));
			
			redirect(base_url() . 'login/review_form', 'refresh');
        }
        else
        {
        $this->session->set_flashdata('flash_message', get_phrase('Your form is submite succesfully! '));        
		redirect(base_url(). 'login/success_form', 'refresh');
        
        }

 }
 public function fpdf() {	
        $this->load->library('fpdf_master');
		
		   $user_data= $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
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
	       $this->fpdf->Cell(0,35,'COMPLETE APPLICATION FORM: IIITV B-Tech.-2021',0,0,'C');
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
	       $this->fpdf->Cell(0,146,'B - Personal Details');          	   
		   $this->fpdf->Ln(1);	
            //personal details
           //1			   
		   $this->fpdf->Rect(5,126, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,158,'Gender',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,126, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,156,$user_data[0]['gender'],0,0,'R');		   		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,126, 60, 7, 's');	
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(127,154,'Cast Certificate ',0,0,'R');		   		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,126, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);
           if($user_data[0]['document_status']==1){$documnetstatus='YES';}		   
           $this->fpdf->Cell(170,152,$documnetstatus,0,0,'R');		   
		   $this->fpdf->Ln(1);	
           //2
           $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,133, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,162,'10th Marksheet',0,0,'L');				   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,133, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,160,$documnetstatus,0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,133, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(126,158,'12th Marksheet',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,133, 40, 7, 's');	
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(170,156,$documnetstatus,0,0,'R');		   
		   $this->fpdf->Ln(1);
           //3
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,140, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,165,'Jee Admit Card',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,140, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,165,$documnetstatus,0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,140, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(128,162,'Entrance Result',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,140, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(170,160,$documnetstatus,0,0,'R');		   
		   $this->fpdf->Ln(1);
		   
		   
		   //4
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,147, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,169,'Candidate Photo',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,147, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,168,'YES',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,147, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(135,165,'Candidate Signature',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,147, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(171,164,'YES ',0,0,'R');		   
		   $this->fpdf->Ln(1);
		   
		   //5
		   $this->fpdf->Ln(1);		   
		   $this->fpdf->Rect(5,154, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,174,'Father Signature',0,0,'L');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(65,154, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(80,172,'YES',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(105,154, 60, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(120,170,'Adhar Card',0,0,'R');		   
		   $this->fpdf->Ln(1);
           $this->fpdf->Rect(165,154, 40, 7, 's');
           $this->fpdf->SetFont('Arial','B',10);		   
           $this->fpdf->Cell(171,167,'YES ',0,0,'R');		   
		   $this->fpdf->Ln(1);
		   
		   
		   
		   //communication address
		   $this->fpdf->SetFillColor('150','205','205');
		   $this->fpdf->Rect(5,166, 200, 7, 'FD');
		   $this->fpdf->SetFont('Arial','B',10);                   
	       $this->fpdf->Cell(0,190,'C - Permanent Address');           		   
		   $this->fpdf->Ln(1);		
           //personal details
           //1		   
		   $this->fpdf->Rect(5,173, 200, 13, 's');
           $this->fpdf->SetFont('Arial','B',8);                   
	       $this->fpdf->Cell(0,200,$user_data[0]['permanent_address']); 		   
		  
           
		   
		echo $this->fpdf->Output('Registeration.pdf','D');
		   }
		   else{
			   redirect(base_url(). 'login/complete_form', 'refresh');
		   }
		
	}
  function done_form() {
	
    $update_rows = array('success' => '1',);
	$this->db->where('jee_rollnumber',$roll=$this->session->userdata('rollnumber') );
	$this->db->update('student_data', $update_rows);	
	$this->db->trans_complete();

		
      if($this->db->trans_status() === FALSE) 
        {
			$this->session->set_flashdata('error_message', get_phrase('Have Some Problem! '));
			
			redirect(base_url() . 'login/done_form', 'refresh');
        }
        else
        {
        $this->session->set_flashdata('flash_message', get_phrase('Your have done succesfully! ')); 
       	
		redirect(base_url(). 'login/complete_form', 'refresh');
        
        }

 }
 
	
    
 
  function document() {
	  
	if (!is_dir('enrolleddata/'.($roll=$this->session->userdata('rollnumber')) )) 
	{
		mkdir('enrolleddata/'.($roll=$this->session->userdata('rollnumber')), 0777, true );
	}
		
				$image_path = 'D:/xampp/htdocs/btp/enrolleddata/'.($roll=$this->session->userdata('rollnumber'));				
                $cpt = '10';      
			  
                for($i=1; $i <= $cpt; $i++)
                {
					if($i==1)
					{
						$new_name = 'fathersignature'.$_FILES["userfiles"]['fathersignature'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('fathersignature');						
					}
					if($i==2)
					{
						$new_name = 'signature'.$_FILES["userfiles"]['signature'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpg|jpeg';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('signature');						
					}
					if($i==3)
					{
						$new_name = 'domiciale'.$_FILES["userfiles"]['domiciale'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('domiciale');						
					}
					if($i==4)
					{
						$new_name = 'castecertificate'.$_FILES["userfiles"]['castecertificate'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('castecertificate');						
					}
					if($i==5)
					{
						$new_name = 'photo'.$_FILES["userfiles"]['photo'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpg|jpeg';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('photo');						
					}
					if($i==6)
					{
						$new_name = 'adharcard'.$_FILES["userfiles"]['adharcard'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('adharcard');						
					}
					if($i==7)
					{
						$new_name = 'intermarksheet'.$_FILES["userfiles"]['intermarksheet'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('intermarksheet');						
					}
					if($i==8)
					{
						$new_name = 'highschoolmarksheet'.$_FILES["userfiles"]['highschoolmarksheet'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        ='jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('highschoolmarksheet');						
					}
					if($i==9)
					{
						$new_name = 'entranceresult'.$_FILES["userfiles"]['entranceresult'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						$this->upload->do_upload('entranceresult');						
					}
					if($i==10)
					{
						$new_name = 'admitcard'.$_FILES["userfiles"]['admitcard'];
						$config['file_name'] = $new_name;								
						$config['upload_path']          = $image_path;
						$config['allowed_types']        = 'jpeg|jpg|pdf|png';
						$config['max_size']             = 10000;
						$config['max_width']            = 10240;
						$config['max_height']           = 76800;
						$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);							
						if(!($this->upload->do_upload('admitcard')))
						{
							$succ=1;
						}
                        						
					}
                }					
				
				$update_rows = array('document_status' => '1',);
				$this->db->where('jee_rollnumber',$roll=$this->session->userdata('rollnumber') );
				$this->db->update('student_data', $update_rows);	
				$data = array('upload_data' => $this->upload->data());
				$this->session->set_flashdata('flash_message', get_phrase('Your have done succesfully! '));  
				redirect(base_url(). 'login/review_form', 'refresh'); 				
                        	    
 }
    
 
 

 
}
