<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Email_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    public function send_email($message = null, $receiverEmail = null, $from = null, $attachmentFiles = null){

        $schoolWebsite =    "<a href=\"https://codeigniter.com/\">Developed with Love by CodeIgniter Community</a>";
        $from          =    $this->get_where('settings', array('type' => 'system_email'))->row()->description;

        $headers        =     "From: " . $from . "\r\n";
        $headers        .=    "Reply-To: " . $receiverEmail . "\r\n";
        $headers        .=    "Return-Path: " . $receiverEmail . "\r\n";
        $headers        .=    "Website: " . $schoolWebsite . "\r\n";

        if($attachmentFiles != null){
            $message    .= "\r\nAttachment-Files: " . $attachmentFiles; 
        }

        if(mail($receiverEmail, $message, $headers)){

        }

        else {
            echo "Email not sent!!!";
        }


    }
	


	
	
}

