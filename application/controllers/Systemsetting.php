<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Systemsetting extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();							// load database library
        		$this->load->library('session');					//Load library for session
    }

/**default functin, redirects to login page if no admin logged in yet***/
    public function index() {
        	if ($this->session->userdata('admin_login') != 1) 
            redirect(base_url() . 'login', 'refresh');
        	if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');
    }

   

   /************** Manage system setings  ********************/

	function system_settings($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
    redirect(base_url() . 'login', 'refresh');


        if ($param1 == 'do_update') {
           
        
        $data['description']    =   $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('address');
        $this->db->where('type', 'address');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('phone');
        $this->db->where('type', 'phone');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('paypal_email');
        $this->db->where('type', 'paypal_email');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('currency');
        $this->db->where('type', 'currency');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('language');
        $this->db->where('type', 'language');
        $this->db->update('settings', $data);

        // $data['description']    =   $this->input->post('text_align');
        // $this->db->where('type', 'text_align');
        // $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('running_session');
        $this->db->where('type', 'session');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('footer');
        $this->db->where('type', 'footer');
        $this->db->update('settings', $data);

        $this->session->set_flashdata('flash_message', get_phrase('Data Updated'));
        redirect(base_url(). 'systemsetting/system_settings', 'refresh');
    }

    // if ($param1 == 'upload_logo') 
	// {
    //     move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
    //    $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
    //    redirect(base_url() . 'systemsetting/system_settings', 'refresh');
    // }


    if ($param1 == 'themeSettings') 
	{
        $data['description']    =   $this->input->post('skin_colour');
        $this->db->where('type', 'skin_colour');
        $this->db->update('settings', $data);
        $this->session->set_flashdata('flash_message', get_phrase('Theme Selected'));
        redirect(base_url() . 'systemsetting/system_settings', 'refresh');
    }


    $page_data['page_name'] = 'system_settings';
    $page_data['page_title'] = get_phrase('system_settings');
    $page_data['settings'] = $this->db->get('settings')->result_array();
    $this->load->view('backend/index', $page_data);
    }
	


	
	
} 
