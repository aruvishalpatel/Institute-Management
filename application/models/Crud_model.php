<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


	 function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        $this->db->where($type . '_id', $type_id); 
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $row)
        return $row[$field];
    }



     function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg' ;
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;

    }

    function get_subject_name_by_id ($subject_id){
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
            return $query->name;
    }

    function get_class_name ($class_id){
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $result = $query->result_array();
        foreach ($result as $key => $row)
                return $row['name'];

    }



    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }


    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

    /***********  Exams  *******************/
    function get_exams() {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    /***********  Grades  *******************/
    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_students($class_id){
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }





    function list_all_teacher_and_order_with_teacher_id(){

        $data = array();
        $sql = "select * from teacher order by teacher_id desc limit 0, 5";
        $all_teacher_selected = $this->db->query($sql)->result_array();

        foreach($all_teacher_selected as $key => $selected_teachers_from_teacher_table){
            $teacher_id = $selected_teachers_from_teacher_table['teacher_id'];
            // $face_file = 'uploads/teacher_image/'. $teacher_id . '.jpg';
            // if(!file_exists($face_file)){
            //     $face_file = 'uploads/teacher_image/default_image.jpg/';
            // }

           // $selected_teachers_from_teacher_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_teachers_from_teacher_table);
        }

        return $data;
    }


    function list_all_student_and_order_with_student_id(){

        $data = array();
        $sql = "select * from student order by student_id desc limit 0, 5";
        $all_student_selected = $this->db->query($sql)->result_array();

        foreach($all_student_selected as $key => $selected_students_from_student_table){
            $student_id = $selected_students_from_student_table['student_id'];
            // $face_file = 'uploads/student_image/'. $student_id . '.jpg';
            // if(!file_exists($face_file)){
            //     $face_file = 'uploads/student_image/default_image.jpg/';
            // }

            // $selected_students_from_student_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_students_from_student_table);
        }

        return $data;
    }


    function get_settings($type){
        $get_settings = $this->db->get_where('settings', array('type' => $type))->row()->description;
        return $get_settings;
    }


    function stripe_settings (){
        $stripe_info = array();

        $stripe['stripe_active']    = html_escape($this->input->post('stripe_active'));
        $stripe['testmode']         = html_escape($this->input->post('testmode'));
        $stripe['secret_key']       = html_escape($this->input->post('secret_key'));
        $stripe['public_key']       = html_escape($this->input->post('public_key'));
        $stripe['secret_live_key']  = html_escape($this->input->post('secret_live_key'));
        $stripe['public_live_key']  = html_escape($this->input->post('public_live_key'));

        array_push($stripe_info, $stripe);

        $data['description'] = json_encode($stripe_info);
        $this->db->where('type', 'stripe_setting');
        $this->db->update('settings', $data);

    }

    function paypal_settings(){
        $paypal_info = array();

        $stripe['paypal_active']    = html_escape($this->input->post('paypal_active'));
        $stripe['paypal_mode']         = html_escape($this->input->post('paypal_mode'));
        $stripe['sandbox_client_id']       = html_escape($this->input->post('sandbox_client_id'));
        $stripe['production_client_id']       = html_escape($this->input->post('production_client_id'));
        
        array_push($paypal_info, $stripe);

        $data['description'] = json_encode($paypal_info);
        $this->db->where('type', 'paypal_setting');
        $this->db->update('settings', $data);


    }


    function send_student_score_model(){

        $exam_id = $this->input->post('exam_id');
        $class_id = $this->input->post('class_id');
        $receiver = $this->input->post('receiver');

        $select_all_student_from_student_table = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
        foreach ($select_all_student_from_student_table as $key => $all_selected_student_from_student_table){

            if($receiver == 'student')
                $recieverPhoneNumber = $all_selected_student_from_student_table['phone'];
            if($receiver == 'parent' && $all_selected_student_from_student_table['parent_id'] != NULL)
            $select_from_parent_table = $this->db->get_where('parent', array('parent_id' => $all_selected_student_from_student_table['parent_id']))->row()->phone;

            $this->db->where('exam_id', $exam_id);
            $this->db->where('student_id', $all_selected_student_from_student_table['student_id']);
            $select_student_score_from_mark_table = $this->db->get('mark')->result_array();

            foreach($select_student_score_from_mark_table as $key => $all_selected_student_scores_from_mark_table){
                $message = '';
            
                $selelect_all_subject_from_subject_table = $this->db->get_where('subject', array('subject_id' => $all_selected_student_scores_from_mark_table['subject_id']))->row()->name;
                $student_mark_obtained_in_class_score_and_exam = $all_selected_student_scores_from_mark_table['class_score1'] + $all_selected_student_scores_from_mark_table['class_score2'] + $all_selected_student_scores_from_mark_table['class_score3'] + $all_selected_student_scores_from_mark_table['exam_score'];
                $message .= $all_selected_student_scores_from_mark_table['student_id'] . ' ' . $selelect_all_subject_from_subject_table . ':' . $student_mark_obtained_in_class_score_and_exam . 'Over 100';

                // Sending sms 
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }
     

        }

    }







	
	
}

