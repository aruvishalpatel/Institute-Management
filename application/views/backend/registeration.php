<?php 
// $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
// $system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="OPTIMUM LINKUP COMPUTERS">
<title><?php echo $system_title;?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<link href="<?php echo base_url();?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

	
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>

		
<section id="wrapper" >

    <div class="white-box">
	 
					<div align="center" class="panel-heading">Create Account </a></div>
                    <br>
                    <form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php echo base_url();?>login/createregisteration">
                    <div class="row">
                    <div class="col-sm-6">
				   <div class="form-group ">
				   <label class="col-md-12" for="example-text"><?php echo get_phrase('Enter your name');?></label>

				   <div class="col-sm-12">
										<input class="form-control"  name="name" required="" placeholder="<?php echo get_phrase('name');?>" style="width:100%">
									</div>
					</div>

                    <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Enter your email');?></label>

                        <div class="col-sm-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>" style="width:100%">
                        </div>
                    </div>
                    

                    <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Create Password');?></label>

                        <div class="col-sm-12" >
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('create password');?>" style="width:100%">
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Name of the School');?></label>

                        <div class="col-sm-12" >
                            <input class="form-control"  name="school_name" required="" placeholder="<?php echo get_phrase('School Name');?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('managment types');?></label>
                    <div class="col-sm-12">
							<select name="managment_types" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="School Managment"><?php echo get_phrase('School Managment');?></option>
                              <option value="Collage Managment"><?php echo get_phrase('Collage Managment');?></option>
                              <option value="Coaching Managment"><?php echo get_phrase('Coaching Managment');?></option>
                          </select>
						</div> 
                    </div>
                    

                    <div class="form-group">

                        <div class="col-sm-12" >
                        </div>
                    </div>
					
                    <div class="col-sm-12">
	<div class="panel panel-info">
    <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Which sections  you want ');?></div>
        <div class="panel-body table-responsive">
        <!-- <table class="display nowrap" cellspacing="0" width="100%">
                <tr>
                    <td>dashboard</td>
                    <td>Manage Academics </td>
                    <td>Manage Employee </td>
                    <td>Manage Student </td>
                </tr>
                <tr>
                    <td><input class="check" name="dashboard" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->dashboard) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_academics" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_academics) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_employee" value="1"  <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_employee) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_student" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_student) echo 'checked';?> type="checkbox"></td>
                </tr>
                <tr>
                    <td>Manage Attendance</td>
                    <td>Library</td>
                    <td>Manage Parent</td>
                    <td>Manage Alumni </td>
                </tr>
                <tr>
                    <td><input class="check" name="manage_attendance" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_attendance) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="library" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->download_page) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_parent" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_parent) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_alumni" value="1" <?php //if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_alumni) echo 'checked';?> type="checkbox"></td> 
                </tr>
                
            </table> -->
            <label class="col-md-6" for="example-text"><?php echo get_phrase('dashboard');?></label>
            <div class="col-sm-12">
                    <select name="dashboard" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Academics');?></label>
            <div class="col-sm-12">
                    <select name="manage_academics" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Employee');?></label>
            <div class="col-sm-12">
                    <select name="manage_employee" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Student');?></label>
            <div class="col-sm-12">
                    <select name="manage_student" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Attendance');?></label>
            <div class="col-sm-12">
                    <select name="manage_attendance" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('E-Learning');?></label>
            <div class="col-sm-12">
                    <select name="learning_material" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Parent');?></label>
            <div class="col-sm-12">
                    <select name="manage_parent" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Alumni');?></label>
            <div class="col-sm-12">
                    <select name="manage_alumni" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Class Information');?></label>
            <div class="col-sm-12">
                    <select name="class_information" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div> 


                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Subject');?></label>
            <div class="col-sm-12">
                    <select name="manage_subject" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>  


                     <label class="col-md-6" for="example-text"><?php echo get_phrase('Manage Exam');?></label>
            <div class="col-sm-12">
                    <select name="manage_exams" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div> 

                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Report Card');?></label>
            <div class="col-sm-12">
                    <select name="report_card" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>


                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Fee Collection');?></label>
            <div class="col-sm-12">
                    <select name="fee" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div> 

                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Human Resources');?></label>
            <div class="col-sm-12">
                    <select name="hrm" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                     <label class="col-md-6" for="example-text"><?php echo get_phrase('Hostel Information');?></label>
            <div class="col-sm-12">
                    <select name="hostel" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>

                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Communications');?></label>
            <div class="col-sm-12">
                    <select name="communications" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>     


                    <label class="col-md-6" for="example-text"><?php echo get_phrase('Transportation');?></label>
            <div class="col-sm-12">
                    <select name="transportation" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>      


                    <label class="col-md-6" for="example-text"><?php echo get_phrase('System Settings');?></label>
            <div class="col-sm-12">
                    <select name="setting" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>   

                     <label class="col-md-6" for="example-text"><?php echo get_phrase('Generate Reports');?></label>
            <div class="col-sm-12">
                    <select name="generate_report" class="form-control select2" style="width:100%" required>
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="1"><?php echo get_phrase('yes');?></option>
                        <option value="0"><?php echo get_phrase('No');?></option>
                    </select>
                </div>

                <div class="form-group">
                        <div class="col-xs-12" >
                        </div>
                    </div>      

               
        </div>
	</div>
</div>
      
		  
<button class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
<?php echo get_phrase('Submit');?>
</button>



                   
					<br><br><br><br><br><br><br><br><br><br>
                 <?php echo form_close();?>
					
					
	<!-- <form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php //echo base_url();?>login/check_login">

       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="<?php //echo get_phrase('email');?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12" >
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php //echo get_phrase('passord');?>" style="width:100%">
                        </div>
                    </div>
					
        <div class="form-group">
          <div class="col-md-12">
            
        </div>
       <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
		
		  
<button class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
<?php //echo get_phrase('submit');?>
</button>



                    <div align="center"><img id="install_progress" src="<?php //echo base_url() ?>assets/images/preloader.gif" style="margin-left: 20px; display: none"/></div>

                        </div>
                    </div>
					<br><br><br><br><br><br><br><br><br><br>
                 <?php //echo form_close();?>

                

        			
            	<form method="post" role="form" id="recoverform" class="form-horizontal form-material"  action="<?php echo base_url();?>login/reset_password">
                <input type="email" name="email" class="form-control" placeholder="<?php //echo get_phrase('email');?>" style="width:100%" required>

<div class="form-group text-center m-t-20">
                        <div class="col-xs-6">
		<a href="<?php //echo base_url();?>"><button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button" style="color:white"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('Login');?></button></a>
		<button class="btn btn-success btn-rounded btn-sm  text-uppercase" type="submit" style="color:white"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('Reset Password');?></button>
                        </div>
                    </div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php //echo form_close();?> -->
            
        </div>
	        </div>
			    </form>
			        </div>
    </section> 
<script src="js/index.js"></script>	


<!-- jQuery -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>


<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>


<?php if (($this->session->flashdata('error_message')) != ""): ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
           
            text: '<?php echo $this->session->flashdata('error_message'); ?>',
            position: 'top-right',
            loaderBg: '#f56954',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
    <?php endif; ?>



</body>

</html>
