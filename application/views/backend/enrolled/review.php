<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="OPTIMUM LINKUP COMPUTERS">
<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
<title><?php echo $system_title;?></title>
<!-- Bootstrap Core CSS -->

<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<link href="<?php echo base_url();?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<meta charset="utf-8">

<link href="<?php echo base_url(); ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<link href="<?php echo base_url();?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<meta charset="utf-8">
<link href="<?php echo base_url(); ?>optimum/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

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

<!-- MultiStep Form -->
<?php
			if (empty($this->session->userdata('rollnumber')))
			{
				redirect(base_url(). 'login/enrolled_registeration', 'refresh');
			}
			else

			{
				
				$roll=$this->session->userdata('rollnumber');
			
			    $students =  $this->db->get_where('student_data', array('jee_rollnumber' => $roll))->result_array();
			     //echo $student['student_name'];
                if(($students[0]['personal_status']==1) && ($students[0]['document_status']==1) && ($students[0]['review']==1) && ($students[0]['success']==1))
				  {
					redirect(base_url(). 'login/complete_form', 'refresh');
				  }
				else if(($students[0]['personal_status']==1) && ($students[0]['document_status']==1) && ($students[0]['review']==1) && ($students[0]['success']==0))
				  {
					redirect(base_url(). 'login/success_form', 'refresh');
				  }
				else if(($students[0]['personal_status']==1) && ($students[0]['document_status']==1) && ($students[0]['review']==0) && ($students[0]['success']==0))
				  {
					   include 'header.php';
					
				  }
				
			    else if(($students[0]['personal_status']==1) && ($students[0]['document_status']==0) && ($students[0]['review']==0) && ($students[0]['success']==0))
				  {
					 redirect(base_url(). 'login/document_form', 'refresh');
				  }
				  
				else 
				 {
					redirect(base_url(). 'login', 'refresh');
				  }
			  
			  
			  
			}


?>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-12 col-md-10 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Registeration Form</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
					<?php
					
								if($roll=$this->session->userdata('updatekey'))
								{ ?>
                        <form method="post" role="form" action="<?php echo base_url();?>login/enrolledupdate/" id="msform" >
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active1" id="account"><strong>Personal Information</strong></li>
                                <li class="active1" id="personal"><strong>Document Varification</strong></li> 
								<li class="active" id="listDetail"><strong>Review</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul> <!-- fieldsets -->
							<fieldset >
							
							<form >
									<?php
									$autofil =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata(rollnumber)))->result_array();
									?>
								<div class="form-card">                                  					
									<div class="col-sm-12" style="font-size:14px;">
										<div class="panel panel-info">
											<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('User Details ');?>
											</div>
									
											<div class="panel-body table-responsive">	
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('Enter your fullname');?></label>
													<div class="col-sm-12">
														<?php echo form_error('name', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input  class="form-control" value="<?php echo $autofil[0]['name']?>"  <?php echo set_value('name'); ?>" type="text" name="name"  placeholder="<?php echo get_phrase('fullname');?>" style="width:100%">
													</div>
												</div>
												
												
												
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('date_of_birth');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('date_of_birth', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input type="date" value="<?php echo $autofil[0]['date_of_birth']?>"  <?php echo set_value('date_of_birth'); ?>" name="date_of_birth"  placeholder="<?php echo get_phrase('dd-mm-yyyy');?>"  min="1997-01-01" max="2022-12-31" style="width:100%">
													</div>
												</div>
											
                                                <div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('gender');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('gender', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['gender']?>"  <?php echo set_value('gender'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="gender" class="form-control select2"  >
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="Male"><?php echo get_phrase('male');?></option>
															<option value="Female"><?php echo get_phrase('female');?></option>
															<option value="Transe Gender"><?php echo get_phrase('transe_gender');?></option>
														</select>
													</div>
												</div>	
													
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('category');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('category', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['category']?>"  <?php echo set_value('category'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="category" class="form-control select2" >
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="OBC"><?php echo get_phrase('OBC');?></option>
															<option value="GENERAL"><?php echo get_phrase('GENERAL');?></option>
															<option value="SC"><?php echo get_phrase('SC');?></option>
															<option value="ST"><?php echo get_phrase('ST');?></option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('Permanent_address');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('permanent_address', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['permanent_address']?>"  <?php echo set_value('permanent_address'); ?>" class="form-control"  name="permanent_address"  placeholder="<?php echo get_phrase('address');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('student place of birth');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('birth_place', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['birth_place']?>"  <?php echo set_value('birth_place'); ?>" class="form-control"  name="birth_place"  placeholder="<?php echo get_phrase('birth place');?>" style="width:100%">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('adhar_number');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('adhar_number', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['adhar_number']?>"  <?php echo set_value('adhar_number'); ?>"   class="form-control"  name="adhar_number" placeholder="<?php echo get_phrase('adhar number ex: 4444555577774444');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('Father name');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('father_name', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['father_name']?>"  <?php echo set_value('father_name'); ?>"    class="form-control"  name="father_name"  placeholder="<?php echo get_phrase('father name');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('mother name');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('mother_name', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['mother_name']?>"  <?php echo set_value('mobile_number'); ?>"  class="form-control"  name="mother_name"  placeholder="<?php echo get_phrase('mother name');?>" style="width:100%">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('mobile_number');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('mobile_number', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['mobile_number']?>"  <?php echo set_value('mobile_number'); ?>"  " class="form-control"  name="mobile_number" placeholder="<?php echo get_phrase('mobile number');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('JEE Rollnumber');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('jee_rollnumber', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['jee_rollnumber']?>"  <?php echo set_value('jee_rollnumber'); ?>" " class="form-control"  name="jee_rollnumber" placeholder="<?php echo get_phrase('JEE Rollnumber');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('branch');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('branch', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['branch']?>"  <?php echo set_value('branch'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="branch" class="form-control select2" >
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="CSE"><?php echo get_phrase('CSE');?></option>
															<option value="IT"><?php echo get_phrase('IT');?></option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('year of passing 10th class');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('highschool_passing_year', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['highschool_passing_year']?>"  <?php echo set_value('highschool_passing_year'); ?>"  type="number"   class="form-control"  name="highschool_passing_year" placeholder="<?php echo get_phrase('year of passing high school');?>" style="width:100%">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('year of passing 12th class');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('inter_passing_year', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['inter_passing_year']?>"  <?php echo set_value('inter_passing_year'); ?>" type="number"  class="form-control"  name="inter_passing_year" placeholder="<?php echo get_phrase('year of passing inter');?>" style="width:100%">
													</div>
												</div>
												
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('father occupation');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('fatheroccupation', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['fatheroccupation']?>"  <?php echo set_value('fatheroccupation'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="fatheroccupation" class="form-control select2"  >
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="Butcher"><?php echo get_phrase('butcher');?></option>
															<option value="Farmer"><?php echo get_phrase('farmer');?></option>
															<option value="Judge"><?php echo get_phrase('judge');?></option>
															<option value="Fireman"><?php echo get_phrase('fireman');?></option>
															<option value="Policeman"><?php echo get_phrase('policeman');?></option>
															<option value="Pilot"><?php echo get_phrase('pilot');?></option>
															<option value="Bussinesman"><?php echo get_phrase('bussinesman');?></option>
															<option value="Doctor"><?php echo get_phrase('doctor');?></option>
															<option value="Engineer"><?php echo get_phrase('engineer');?></option>
															<option value="Teacher"><?php echo get_phrase('teacher');?></option>
															<option value="Other"><?php echo get_phrase('other');?></option>
															
														</select>
													</div>
												</div>
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('mother occupation');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('motheroccupation', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['motheroccupation']?>"  <?php echo set_value('motheroccupation'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="motheroccupation" class="form-control select2" >
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="House Wife"><?php echo get_phrase('house wife');?></option>
															<option value="Market Research Analyst"><?php echo get_phrase('Market Research Analyst');?></option>
															<option value="Sonographer"><?php echo get_phrase('Sonographer');?></option>
															<option value="Teacher"><?php echo get_phrase('teacher');?></option>
															<option value="Other"><?php echo get_phrase('other');?></option>
															
														</select>
													</div>
												</div>
												
												
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('country');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('country', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['country']?>"  <?php echo set_value('country'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="country" class="form-control select2" >
															<option value=""><?php echo get_phrase('select');?></option>
															<?php 
															 $this->db->order_by("name", "ASC");                                                          														 
															 $countries =  $this->db->get('countries')->result_array();
															?>
                                                            <?php
															foreach($countries as $key => $countries)
															{
															 echo '<option value="'.$countries['name'].'">'.$countries['name'].'</option>';
															}
															?>
                                                            
														</select>
													</div>
												</div>
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></label>
													<div class="col-sm-12" >
													     <?php echo form_error('state', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['state']?>"  <?php echo set_value('state'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="state" class="form-control select2"  >
															<option value=""><?php echo get_phrase('select');?></option>
															<?php 
															 $this->db->order_by("name", "ASC");                                                          														 
															 $states =  $this->db->get('states')->result_array();
															?>
                                                            <?php
															foreach($states as $key => $states)
															{
															 echo '<option value="'.$states['name'].'">'.$states['name'].'</option>';
															}
															?>																										
														</select>
													</div>
												</div>
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('city');?></label>
													<div class="col-sm-12" >
													     <?php echo form_error('city', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['city']?>"  <?php echo set_value('city'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="city" class="form-control select2"  >
															<option value=""><?php echo get_phrase('select');?></option>
															<?php 
															 $this->db->order_by("name", "ASC");                                                          														 
															 $cities =  $this->db->get('cities')->result_array();
															?>
                                                            <?php
															foreach($cities as $key => $cities)
															{
															 echo '<option value="'.$cities['name'].'">'.$cities['name'].'</option>';
															}
															?>																												
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('JEE General Rank');?></label>
													<div class="col-sm-12" >
													     <?php echo form_error('general_rank', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['general_rank']?>"  <?php echo set_value('general_rank'); ?>" class="form-control" type="number"   name="general_rank" placeholder="<?php echo get_phrase('JEE General Rank');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12" for="example-text"><?php echo get_phrase('JEE Category Rank');?></label>
													<div class="col-sm-12" >
													     <?php echo form_error('category_rank', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<input value="<?php echo $autofil[0]['category_rank']?>"  <?php echo set_value('category_rank'); ?>" class="form-control" type="number"   name="category_rank"  placeholder="<?php echo get_phrase('JEE Category Rank');?>" style="width:100%">
													</div>
												</div>
												<div class="form-group">
													 <label class="col-md-12" for="example-text"><?php echo get_phrase('Blod Group');?></label>
													<div class="col-sm-12" >
													    <?php echo form_error('blod_group', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
														<select value="<?php echo $autofil[0]['blood_group']?>"  <?php echo set_value('blod_group'); ?>" style="padding: 0px 8px 4px 8px; border: none; border-bottom: 1px solid #ccc; border-radius: 0px; margin-bottom: 25px; margin-top: 2px; width: 100%; box-sizing: border-box; font-family: montserrat; color: #2C3E50; font-size: 16px; letter-spacing: 1px;" name="blod_group" class="form-control select2" >
															<option value="<?php echo $autofil[0]['blood_group']?>"  ><?php echo get_phrase('select');?></option>
															
															<option value="O-"><?php echo get_phrase('O-');?></option>
															<option value="O+"><?php echo get_phrase('O+');?></option>	
															<option value="A-"><?php echo get_phrase('A-');?></option>
															<option value="A+"><?php echo get_phrase('A+');?></option>	
															<option value="B-"><?php echo get_phrase('B-');?></option>
															<option value="B+"><?php echo get_phrase('B+');?></option>	
															<option value="AB-"><?php echo get_phrase('AB-');?></option>
															<option value="AB+"><?php echo get_phrase('AB+');?></option>	
														</select>
													</div>
												</div>
												
												
											</div>
									
										</div>
									</div>
								<button   class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" style="width:100%; color:white">
								<?php echo get_phrase('Update');?>
								</button>										
								</div><br><br><br><br><br><br><br><br><br><br>
								</form>
								
							
								
							</fieldset>
                            
                        </form>
						<?php
								}
								else
								{
							?>
							<form  method="post" role="form" action="<?php echo base_url();?>login/review/" id="msform" >
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <ul id="progressbar">
                                <li class="active1" id="account"><strong>Personal Information</strong></li>
                                <li class="active1" id="personal"><strong>Document Varification</strong></li> 
								<li class="active" id="listDetail"><strong>Review</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul> 
                            </ul> <!-- fieldsets -->
							<fieldset>
							<form >						
								<div class="form-card">                                  					
									<div class="col-sm-12" style="font-size:14px;">
										<div class="panel panel-info">
											<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('User Details ');?>
											
											</div>	
											<?php
											$student =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
											?>
											<div class="">
											   <div class="table-responsive">          
											  <table class="table">												
												<tbody>
												  <tr >													
													<td><?php echo get_phrase('name');?></td>
													<td><?php echo $student[0]['name'];?></td>													
												  </tr>
												  <tr>													
													<td><?php echo get_phrase('eamil');?></td>
													<td><?php echo $student[0]['email'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('date_of_birth');?></td>
													<td><?php echo $student[0]['date_of_birth'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('gender');?></td>
													<td><?php echo $student[0]['gender'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('category');?></td>
													<td><?php echo $student[0]['category'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('permanent_address');?></td>
													<td><?php echo $student[0]['permanent_address'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('birth place');?></td>
													<td><?php echo $student[0]['birth_place'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('adhar number');?></td>
													<td><?php echo $student[0]['adhar_number'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('father name');?></td>
													<td><?php echo $student[0]['father_name'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('mother name');?></td>
													<td><?php echo $student[0]['mother_name'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('mobile_number');?></td>
													<td><?php echo $student[0]['mobile_number'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('jee_rollnumber');?></td>
													<td><?php echo $student[0]['jee_rollnumber'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('branch');?></td>
													<td><?php echo $student[0]['branch'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('highschool_passing_year');?></td>
													<td><?php echo $student[0]['highschool_passing_year'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('inter_passing_year');?></td>
													<td><?php echo $student[0]['inter_passing_year'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('father_occupation');?></td>
													<td><?php echo $student[0]['fatheroccupation'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('mother_occupation');?></td>
													<td><?php echo $student[0]['motheroccupation'];?></td>													
												  </tr>
												  <tr ">													
													<td><?php echo get_phrase('state');?></td>
													<td><?php echo $student[0]['state'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('country');?></td>
													<td><?php echo $student[0]['country'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('city');?></td>
													<td><?php echo $student[0]['city'];?></td>													
												  </tr>
												  <tr ">													
													<td><?php echo get_phrase('general_rank');?></td>
													<td><?php echo $student[0]['general_rank'];?></td>													
												  </tr>
												  <tr >													
													<td><?php echo get_phrase('category_rank');?></td>
													<td><?php echo $student[0]['category_rank'];?></td>													
												  </tr>
												</tbody>
											  </table>
											  </div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
									   <div class="col-md-6">
										<a href="<?php echo base_url();?>admin/edit_enrolledstudent" ><button type="button" class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" style="width:100%; color:white"><i class="fa fa-pencil"></i></button></a>
										</div>
										<div class="col-md-6">
										<button   class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" style="width:100%; color:white">
										<?php echo get_phrase('Submit');?>
										</button>
										</div>
									</div>							
								
								</div><br><br><br><br><br><br><br><br><br><br>
								</form>
							</fieldset>
                            
                        </form>
							
							
						<?php
								}
								?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








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

<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});
</script>
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
