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
<link href="<?php echo base_url(); ?>optimum/css/bootstrap.min.css" rel="stylesheet">
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
				redirect(base_url(). 'login/enrolled_login', 'refresh');
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
					redirect(base_url(). 'login/review_form', 'refresh');
				  }
				
			    else if(($students[0]['personal_status']==1) && ($students[0]['document_status']==0) && ($students[0]['review']==0) && ($students[0]['success']==0))
				  {
					 include 'header.php';
				  }
				  
				else 
				 {
					redirect(base_url(). 'login/enrolled_login', 'refresh');
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
						
					
                        <form  method="post"   role="form" enctype="multipart/form-data" action="<?php echo base_url();?>login/document/" id="msform" >
						
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active1" id="account"><strong>Personal Information</strong></li>
                                <li class="active" id="personal"><strong>Document Varification</strong></li> 
								<li id="listDetail"><strong>Review</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul> <!-- fieldsets -->
							<fieldset>
								<div class="form-card">                                  					
									<div class="col-sm-12">
										<div class="panel panel-info">
										
										
										
											<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('User Details ');?>
											</div>
										
											<div class="panel-body table-responsive" >	
											
											
												 <div>
												 <?php echo form_error('admitcard', '<div class="error" style="color: red;text-align: end;">', '</div>');  ?>
												  <label style="font-size: 15px;" for="admitcard"><?php echo get_phrase('Entrance exam admit card pdf, jpg, jpeg, png');?></label>
												 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="demoInputBox1" style="border-bottom: 0px;" value="<?php echo set_value('admitcard');?>" type="file" id="admitcard" name="admitcard" title="file should not upto 1MB" required></div>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="demoInputBox2"  id="file_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div> 
												 </div>
                                  
								                <div>
												  <label style="font-size: 15px;" for="entranceresult"><?php echo get_phrase('Entrance exam result pdf, jpg, jpeg, png');?></label>
												 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="entranceresultInputBox1" style="border-bottom: 0px;" value="<?php echo set_value('entranceresult');?>" type="file" id="entranceresult" name="entranceresult" title="file should not upto 1MB" required></div><br><br>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="entranceresultInputBox2"  id="entranceresult_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>												 
												</div>
                                  
								                <div>	
												  <label style="font-size: 15px;" for="highschoolmarksheet"><?php echo get_phrase('10th marksheet pdf, jpg, jpeg, png');?></label>
												  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="highschoolmarksheetInputBox1" style="border-bottom: 0px;"  type="file" id="highschoolmarksheet" value="<?php echo set_value('highschoolmarksheet');?>" name="highschoolmarksheet" title="file should not upto 1MB" required></div><br><br>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="highschoolmarksheetInputBox2"  id="highschoolmarksheet_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>
												  </div>
                                  
								                <div>
												  <label style="font-size: 15px;" for="myfile"><?php echo get_phrase('12th marksheet pdf, jpg, jpeg, png');?></label>
												  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="intermarksheetInputBox1" style="border-bottom: 0px;" type="file" id="intermarksheet" name="intermarksheet" value="<?php echo set_value('intermarksheet');?>" title="file should not upto 1MB" required></div><br><br>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="intermarksheetInputBox2"  id="intermarksheet_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>
												  </div>
                                  
								                <div>
												  <label style="font-size: 15px;" for="myfile"><?php echo get_phrase('Adhar card pdf, jpg, jpeg, png');?></label>
												  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="adharcardInputBox1" style="border-bottom: 0px;" type="file" id="adharcard" name="adharcard" value="<?php echo set_value('adharcard');?>" title="file should not upto 1MB" required></div><br><br>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="adharcardInputBox2"  id="adharcard_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>
												  </div>
                                  
								                <div>
												  <label style="font-size: 15px;" for="myfile"><?php echo get_phrase('caste certificate pdf, jpg, jpeg, png');?></label>
												  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="castecertificateInputBox1" style="border-bottom: 0px;" type="file" id="castecertificate" name="castecertificate" value="<?php echo set_value('castecertificate');?>" title="file should not upto 1MB" required></div><br><br>
												 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="castecertificateInputBox2"  id="castecertificate_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>
												 </div>
                                  
								                <div>
												  <label style="font-size: 15px;" for="myfile"><?php echo get_phrase('domiciale certificate pdf, jpg, jpeg, png');?></label>
												  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><input class="domicialeInputBox1" style="border-bottom: 0px;" type="file" id="domiciale" name="domiciale" value="<?php echo set_value('domiciale');?>"  title="file should not upto 1MB" required></div><br><br>
												  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><span class="domicialeInputBox2"  id="domiciale_error1" style="font-size: 15px; font-style: oblique; font-weight: 600;  font-variant: diagonal-fractions;"></div><br><br>
												 </div>
												</div>
                                  
								                
												     <div >
													    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
														 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
														  <label style="font-size: 15px;" for="photo"><?php echo get_phrase('passport size photo jpg, jpeg');?></label>
														  <input style="border-bottom: 0px;" type="file" id="photo" value="<?php echo set_value('photo'); ?>" class="photoInputBox1" name="photo" onchange="photoUpload(this);" max-size="1024" title="file should not upto 1MB" required><br><br>
														 </div >													  
														  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" class="d-grid text-center" style="width: 332px;">
														  <img class="mb-3"  id="ajaxPhotoUpload" alt="User Photo" style=" border: 1px solid #ddd; border-radius: 4px; padding: 15px;  height: 150px; color: #c51111; font-size: 16px; border-color: teal;"/>
														 </div>	
														 </div>
												    </div>	
													
													<div >
													    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
														 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
														  <label style="font-size: 15px;" for="signature"><?php echo get_phrase('student signature jpg, jpeg');?></label>
														  <input style="border-bottom: 0px;" type="file" value="<?php echo set_value('signature'); ?>" id="signature" class="signatureInputBox1" onchange="signatureUpload(this);" name="signature"  max-size="1024"  title="file should not upto 1MB" required><br><br>
														 </div >												  
														 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" class="d-grid text-center" style="width: 332px;">
														  <img class="mb-3" id="ajaxSignatureUpload" alt="User Signature" style=" border: 1px solid #ddd; border-radius: 4px; padding: 15px;  height: 150px; color: #c51111; font-size: 16px; border-color: teal;"/>
														 </div>	
														 </div>
												    </div>	
													
                                                    
												   <div>
													 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
													 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
													  <label style="font-size: 15px;" for="fathersignature"><?php echo get_phrase('father signature jpg, jpeg');?></label>
													  <input style="border-bottom: 0px;" type="file" value="<?php echo set_value('fathersignature'); ?>" id="fathersignature" class="fathersignatureInputBox1" onchange="fatherSignatureUpload(this);" name="fathersignature"  max-size="1024" title="file should not upto 1MB" required><br><br>
														</div>	
														<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" class="d-grid text-center" style="width: 332px;">
														<img class="mb-3" id="ajaxFatherSignatureUpload" alt="Father Signature" style=" border: 1px solid #ddd; border-radius: 4px; padding: 15px;  height: 150px; color: #c51111; font-size: 16px; border-color: teal;"/>
													 </div>	
													</div>
												   </div>                                               											   
                                                									
											</div>									
											
										</div>
									</div>
								<button   class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" style="width:100%; color:white">
								<?php echo get_phrase('Submit');?>
								</button>										
								</div><br><br><br><br><br><br><br><br><br><br>
							</fieldset>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
        function photoUpload(input, id) {
            
	    const photo = document.getElementById('photo'); 
		
		var fileName = photo.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	     if(ext =="jpg" || ext=="jpeg")
		 {
           if (photo.files.length > 0) {
                const fsize = photo.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
				$("#photo_error1").html
				$(".photoInputBox1").css("color","red");
                $(".photoInputBox1").css("border","1px solid #00ad2d");  
				$(".photoInputBox1").css("border-color","red");
				$(".photoInputBox1").css("padding","5px 10px");
				if (file >= 1024) {
							id = id || '#ajaxPhotoUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
						$("#photo_error1").html("File size is greater than 1MB");
						$(".photoInputBox1").css("color","red");
						$(".photoInputBox2").css("color","red");
						$(".photoInputBox1").css("border-color","red");
						document.getElementById("photo").value = null;
                } else if (file < 60) {
						    id = id || '#ajaxPhotoUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
					    $("#photo_error1").html("File size is less than 60KB");
						$(".photoInputBox1").css("color","red");
						$(".photoInputBox2").css("color","red");
						$(".photoInputBox1").css("border-color","red");
						document.getElementById("photo").value = null;
                } else {
					    $("#photo_error1").html("");						
						$(".photoInputBox2").css("color","blue");
		                $(".photoInputBox1").css("color","#4F8A10");						
						$(".photoInputBox1").css("border-color","#4F8A10");
					   id = id || '#ajaxPhotoUpload';
                       var reader = new FileReader();
						reader.onload = function (e) {
							$(id).attr('src', e.target.result).width(300)
						};

					reader.readAsDataURL(input.files[0]);
		   }
		}
		 }
		 else{
			   id = id || '#ajaxPhotoUpload';
				var reader = new FileReader();
				reader.onload = function (e) {
					$(id).attr('src', '')
				};
				reader.readAsDataURL(input.files[0]);
			    $(".photoInputBox1").css("border","1px solid red");  
				$("#photo_error1").html("enter in correct format");
				$(".photoInputBox1").css("color","red");
				$(".photoInputBox2").css("color","red");
				$(".photoInputBox1").css("border-color","red");
				$(".photoInputBox1").css("padding","5px 10px");
				document.getElementById("photo").value = null;
		 }
        }
		
		
		
		
		   function signatureUpload(input, id) {
            const signature = document.getElementById('signature'); 
			
			
			var fileName = signature.value;
            var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext =="jpg" || ext=="jpeg" )
		  {
              if (signature.files.length > 0) {
                const fsize = signature.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
				$("#signature_error1").html
				$(".signatureInputBox1").css("color","red");
                $(".signatureInputBox1").css("border","1px solid #00ad2d");  
				$(".signatureInputBox1").css("border-color","red");
				$(".signatureInputBox1").css("padding","5px 10px");
				if (file >= 1024) {
							id = id || '#ajaxSignatureUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
						$("#signature_error1").html("File size is greater than 1MB");
						$(".signatureInputBox1").css("color","red");
						$(".signatureInputBox2").css("color","red");
						$(".signatureInputBox1").css("border-color","red");
						document.getElementById("signature").value = null;
                } else if (file < 60) {
						    id = id || '#ajaxSignatureUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
					    $("#signature_error1").html("File size is less than 60KB");
						$(".signatureInputBox1").css("color","red");
						$(".signatureInputBox2").css("color","red");
						$(".signatureInputBox1").css("border-color","red");
						document.getElementById("signature").value = null;
                } else {
					    $("#signature_error1").html("");						
						$(".signatureInputBox2").css("color","blue");
		                $(".signatureInputBox1").css("color","#4F8A10");						
						$(".signatureInputBox1").css("border-color","#4F8A10");
					   id = id || '#ajaxSignatureUpload';
                       var reader = new FileReader();
						reader.onload = function (e) {
							$(id).attr('src', e.target.result).width(300)
						};

					reader.readAsDataURL(input.files[0]);
                }   

		   }
		   }
		 else{
			   id = id || '#ajaxSignatureUpload';
				var reader = new FileReader();
				reader.onload = function (e) {
					$(id).attr('src', '')
				};
				reader.readAsDataURL(input.files[0]);
					
				 $(".signatureInputBox1").css("border","1px solid red");  
				$(".photoInputBox1").css("color","red");
				$(".photoInputBox2").css("color","red");
				$(".photoInputBox1").css("border-color","red");
				$(".signatureInputBox1").css("padding","5px 10px");
				document.getElementById("signature").value = null;
		 }
        }
		
		   function fatherSignatureUpload(input, id) {
           const fathersignature = document.getElementById('fathersignature');
           var fileName = fathersignature.value;
            var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext =="jpg" || ext=="jpeg" )
		  {		   
           if (fathersignature.files.length > 0) {
                const fsize = fathersignature.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
				$("#fathersignature_error1").html
				$(".fathersignatureInputBox1").css("color","red");
                $(".fathersignatureInputBox1").css("border","1px solid #00ad2d");  
				$(".fathersignatureInputBox1").css("border-color","red");
				$(".fathersignatureInputBox1").css("padding","5px 10px");
				if (file >= 1024) {
							id = id || '#ajaxFatherSignatureUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
						$("#fathersignature_error1").html("File size is greater than 1MB");
						$(".fathersignatureInputBox1").css("color","red");
						$(".fathersignatureInputBox2").css("color","red");
						$(".fathersignatureInputBox1").css("border-color","red");
						document.getElementById("fathersignature").value = null;
                } else if (file < 60) {
						    id = id || '#ajaxFatherSignatureUpload';
							var reader = new FileReader();
							reader.onload = function (e) {
								$(id).attr('src', '')
							};
							reader.readAsDataURL(input.files[0]);
							
					    $("#fathersignature_error1").html("File size is less than 60KB");
						$(".fathersignatureInputBox1").css("color","red");
						$(".fathersignatureInputBox2").css("color","red");
						$(".fathersignatureInputBox1").css("border-color","red");
						document.getElementById("fathersignature").value = null;
                } else {
					  $("#fathersignature_error1").html("");						
						$(".fathersignatureInputBox2").css("color","blue");
		                $(".fathersignatureInputBox1").css("color","#4F8A10");						
						$(".fathersignatureInputBox1").css("border-color","#4F8A10");
					   id = id || '#ajaxFatherSignatureUpload';
                       var reader = new FileReader();
						reader.onload = function (e) {
							$(id).attr('src', e.target.result).width(300)
						};

					reader.readAsDataURL(input.files[0]); 
                }   

		   }
		   }
		 else{
			   id = id || '#ajaxFatherSignatureUpload';
				var reader = new FileReader();
				reader.onload = function (e) {
					$(id).attr('src', '')
				};
				reader.readAsDataURL(input.files[0]);
				 $(".fathersignatureInputBox1").css("border","1px solid red");  
				
				$(".photoInputBox1").css("color","red");
				$(".photoInputBox2").css("color","red");
				$(".photoInputBox1").css("border-color","red");
				$(".fathersignatureInputBox1").css("padding","5px 10px");
				document.getElementById("fathersignature").value = null;
		 }
        }
        
    </script>






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



 
});





</script>

 <script type="text/javascript">
   function validate() {
	$("#file_error").html("");
	$(".demoInputBox").css("border-color","#F0F0F0");
	var file_size = $('#file')[0].files[0].size;
	if(file_size>2097152) {
		$("#file_error").html("File size is greater than 2MB");
		$(".demoInputBox").css("border-color","#FF0000");
		return false;
	} 
	return true;
}
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#admitcard").change(function(){
        const fi = document.getElementById('admitcard'); 
		var fileName = fi.value;
		var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext1 =="jpg" || ext1=="jpeg"  || ext1 =="pdf" || ext1 =="png"  )
		  {			
        if (fi.files.length > 0) {                
                const fsize = fi.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#file_error1").html
				$(".demoInputBox1").css("color","red");
                $(".demoInputBox1").css("border","1px solid #00ad2d");  
				$(".demoInputBox1").css("border-color","red");
				$(".demoInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#file_error1").html("File size is greater than 1MB");
						$(".demoInputBox1").css("color","red");
						$(".demoInputBox2").css("color","red");
						$(".demoInputBox1").css("border-color","red");
						document.getElementById("admitcard").value = null;
                } else if (file < 60) {
					    $("#file_error1").html("File size is less than 60KB");
						$(".demoInputBox1").css("color","red");
						$(".demoInputBox2").css("color","red");
						$(".demoInputBox1").css("border-color","red");
						document.getElementById("admitcard").value = null;
                } else {
                        $("#file_error1").html("Success ! ");
		                $(".demoInputBox1").css("color","#4F8A10");
						$(".demoInputBox2").css("color","#4F8A10");
						$(".demoInputBox1").css("border-color","#4F8A10");
                }            
        }
		
		}
		 else{
		
				$("#file_error1").html("Enter in correct formate! ");	
				$(".demoInputBox1").css("border","1px solid #00ad2d");  
				$(".demoInputBox1").css("color","red");
				$(".demoInputBox2").css("color","red");
				$(".demoInputBox1").css("border-color","red");
				$(".demoInputBox1").css("padding","5px 10px");
				document.getElementById("admitcard").value = null;
		 }
		});
		
		$("#entranceresult").change(function(){
        const entranceresult = document.getElementById('entranceresult');
         var fileName = entranceresult.value;
            var ext2 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext2 =="jpg" || ext2=="jpeg" || ext2 =="pdf" || ext2 =="png" )
		  {			
        if (entranceresult.files.length > 0) {                
                const fsize = entranceresult.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#entranceresult_error1").html
				$(".entranceresultInputBox1").css("color","red");
                $(".entranceresultInputBox1").css("border","1px solid #00ad2d");  
				$(".entranceresultInputBox1").css("border-color","red");
				$(".entranceresultInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#entranceresult_error1").html("File size is greater than 1MB");
						$(".entranceresultInputBox1").css("color","red");
						$(".entranceresultInputBox2").css("color","red");
						$(".entranceresultInputBox1").css("border-color","red");
						document.getElementById("entranceresult").value = null;
                } else if (file < 60) {
					    $("#entranceresult_error1").html("File size is less than 60KB");
						$(".entranceresultInputBox1").css("color","red");
						$(".entranceresultInputBox2").css("color","red");
						$(".entranceresultInputBox1").css("border-color","red");
						document.getElementById("entranceresult").value = null;
                } else {
                        $("#entranceresult_error1").html("Success ! ");
		                $(".entranceresultInputBox1").css("color","#4F8A10");
						$(".entranceresultInputBox2").css("color","#4F8A10");
						$(".entranceresultInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{
			  
				$("#entranceresult_error1").html("Enter in correct formate! ");	
				$(".entranceresultInputBox1").css("border","1px solid #00ad2d");  
				$(".entranceresultInputBox1").css("color","red");
				$(".entranceresultInputBox2").css("color","red");
				$(".entranceresultInputBox1").css("border-color","red");
				$(".entranceresultInputBox1").css("padding","5px 10px");
				document.getElementById("entranceresult").value = null;
		 }
		});
		
		$("#highschoolmarksheet").change(function(){
        const highschoolmarksheet = document.getElementById('highschoolmarksheet');  
         var fileName = highschoolmarksheet.value;
            var ext3 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext3 =="jpg" || ext3=="jpeg" || ext3 =="pdf" || ext3 =="png")
		  {			
        if (highschoolmarksheet.files.length > 0) {                
                const fsize = highschoolmarksheet.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#highschoolmarksheet_error1").html
				$(".highschoolmarksheetInputBox1").css("color","red");
                $(".highschoolmarksheetInputBox1").css("border","1px solid #00ad2d");  
				$(".highschoolmarksheetInputBox1").css("border-color","red");
				$(".highschoolmarksheetInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#highschoolmarksheet_error1").html("File size is greater than 1MB");
						$(".highschoolmarksheetInputBox1").css("color","red");
						$(".highschoolmarksheetInputBox2").css("color","red");
						$(".highschoolmarksheetInputBox1").css("border-color","red");
						document.getElementById("highschoolmarksheet").value = null;
                } else if (file < 60) {
					    $("#highschoolmarksheet_error1").html("File size is less than 60KB");
						$(".highschoolmarksheetInputBox1").css("color","red");
						$(".highschoolmarksheetInputBox2").css("color","red");
						$(".highschoolmarksheetInputBox1").css("border-color","red");
						document.getElementById("highschoolmarksheet").value = null;
                } else {
                        $("#highschoolmarksheet_error1").html("Success ! ");
		                $(".highschoolmarksheetInputBox1").css("color","#4F8A10");
						$(".highschoolmarksheetInputBox2").css("color","#4F8A10");
						$(".highschoolmarksheetInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{
			  
				$("#highschoolmarksheet_error1").html("Enter in correct formate! ");	
				 $(".highschoolmarksheetInputBox1").css("border","1px solid #00ad2d");  
				$(".highschoolmarksheetInputBox1").css("color","red");
				$(".highschoolmarksheetInputBox2").css("color","red");
				$(".highschoolmarksheetInputBox1").css("border-color","red");
				$(".highschoolmarksheetInputBox1").css("padding","5px 10px");
				document.getElementById("highschoolmarksheet").value = null;
		 }
		});
		
		$("#intermarksheet").change(function(){
        const intermarksheet = document.getElementById('intermarksheet'); 
         var fileName = intermarksheet.value;
            var ext4 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext4 =="jpg" || ext4=="jpeg" || ext4 =="pdf" || ext4 =="png")
		  {			
        if (intermarksheet.files.length > 0) {                
                const fsize = intermarksheet.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#intermarksheet_error1").html
				$(".intermarksheetInputBox1").css("color","red");
                $(".intermarksheetInputBox1").css("border","1px solid #00ad2d");  
				$(".intermarksheetInputBox1").css("border-color","red");
				$(".intermarksheetInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#intermarksheet_error1").html("File size is greater than 1MB");
						$(".intermarksheetInputBox1").css("color","red");
						$(".intermarksheetInputBox2").css("color","red");
						$(".intermarksheetInputBox1").css("border-color","red");
						document.getElementById("intermarksheet").value = null;
                } else if (file < 60) {
					    $("#intermarksheet_error1").html("File size is less than 60KB");
						$(".intermarksheetInputBox1").css("color","red");
						$(".intermarksheetInputBox2").css("color","red");
						$(".intermarksheetInputBox1").css("border-color","red");
						document.getElementById("intermarksheet").value = null;
                } else {
                        $("#intermarksheet_error1").html("Success ! ");
		                $(".intermarksheetInputBox1").css("color","#4F8A10");
						$(".intermarksheetInputBox2").css("color","#4F8A10");
						$(".intermarksheetInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{

				$("#intermarksheet_error1").html("Enter in correct formate! ");	
				 $(".intermarksheetInputBox1").css("border","1px solid #00ad2d");  
				$(".intermarksheetInputBox1").css("color","red");
				$(".intermarksheetInputBox2").css("color","red");
				$(".intermarksheetInputBox1").css("border-color","red");
				$(".intermarksheetInputBox1").css("padding","5px 10px");
				document.getElementById("intermarksheet").value = null;
		 }
		});
		
		$("#adharcard").change(function(){
        const adharcard = document.getElementById('adharcard');   
		  var fileName = adharcard.value;
            var ext5 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext5 =="jpg" || ext5=="jpeg" || ext5 =="pdf" || ext5 =="png")
		  {	
        if (adharcard.files.length > 0) {                
                const fsize = adharcard.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#adharcard_error1").html
				$(".adharcardInputBox1").css("color","red");
                $(".adharcardInputBox1").css("border","1px solid #00ad2d");  
				$(".adharcardInputBox1").css("border-color","red");
				$(".adharcardInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#adharcard_error1").html("File size is greater than 1MB");
						$(".adharcardInputBox1").css("color","red");
						$(".adharcardInputBox2").css("color","red");
						$(".adharcardInputBox1").css("border-color","red");
						document.getElementById("adharcard").value = null;
                } else if (file < 60) {
					    $("#adharcard_error1").html("File size is less than 60KB");
						$(".adharcardInputBox1").css("color","red");
						$(".adharcardInputBox2").css("color","red");
						$(".adharcardInputBox1").css("border-color","red");
						document.getElementById("adharcard").value = null;
                } else {
                        $("#adharcard_error1").html("Success ! ");
		                $(".adharcardInputBox1").css("color","#4F8A10");
						$(".adharcardInputBox2").css("color","#4F8A10");
						$(".adharcardInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{
			  
				$("#adharcard_error1").html("Enter in correct formate! ");	
				 $(".adharcardInputBox1").css("border","1px solid #00ad2d");  
				$(".adharcardInputBox1").css("color","red");
				$(".adharcardInputBox2").css("color","red");
				$(".adharcardInputBox1").css("border-color","red");
				$(".adharcardInputBox1").css("padding","5px 10px");
				document.getElementById("adharcard").value = null;
		 }
		});
		
		$("#castecertificate").change(function(){
        const castecertificate = document.getElementById('castecertificate'); 
         var fileName = castecertificate.value;
            var ext6 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext6 =="jpg" || ext6=="jpeg" || ext6 =="pdf" || ext6 =="png")
		  {			
        if (castecertificate.files.length > 0) {                
                const fsize = castecertificate.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#castecertificate_error1").html
				$(".castecertificateInputBox1").css("color","red");
                $(".castecertificateInputBox1").css("border","1px solid #00ad2d");  
				$(".castecertificateInputBox1").css("border-color","red");
				$(".castecertificateInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#castecertificate_error1").html("File size is greater than 1MB");
						$(".castecertificateInputBox1").css("color","red");
						$(".castecertificateInputBox2").css("color","red");
						$(".castecertificateInputBox1").css("border-color","red");
						document.getElementById("castecertificate").value = null;
                } else if (file < 60) {
					    $("#castecertificate_error1").html("File size is less than 60KB");
						$(".castecertificateInputBox1").css("color","red");
						$(".castecertificateInputBox2").css("color","red");
						$(".castecertificateInputBox1").css("border-color","red");
						document.getElementById("castecertificate").value = null;
                } else {
                        $("#castecertificate_error1").html("Success ! ");
		                $(".castecertificateInputBox1").css("color","#4F8A10");
						$(".castecertificateInputBox2").css("color","#4F8A10");
						$(".castecertificateInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{
			  
				$("#castecertificate_error1").html("Enter in correct formate! ");	
				$(".castecertificateInputBox1").css("border","1px solid #00ad2d");  
				$(".castecertificateInputBox1").css("color","red");
				$(".castecertificateInputBox2").css("color","red");
				$(".castecertificateInputBox1").css("border-color","red");
				$(".castecertificateInputBox1").css("padding","5px 10px");
				document.getElementById("castecertificate").value = null;
		 }
		});
		
		$("#domiciale").change(function(){
        const domiciale = document.getElementById('domiciale');  
         var fileName = domiciale.value;
            var ext7 = fileName.substring(fileName.lastIndexOf('.') + 1);
	        if(ext7 =="jpg" || ext7=="jpeg" || ext7 =="pdf" || ext7 =="png")
		  {			
        if (domiciale.files.length > 0) {                
                const fsize = domiciale.files.item(0).size;				
                const file = Math.round((fsize / 1024)); 
                $("#domiciale_error1").html
				$(".domicialeInputBox1").css("color","red");
                $(".domicialeInputBox1").css("border","1px solid #00ad2d");  
				$(".domicialeInputBox1").css("border-color","red");
				$(".domicialeInputBox1").css("padding","5px 10px");
                if (file >= 1024) {
						$("#domiciale_error1").html("File size is greater than 1MB");
						$(".domicialeInputBox1").css("color","red");
						$(".domicialeInputBox2").css("color","red");
						$(".domicialeInputBox1").css("border-color","red");
						document.getElementById("domiciale").value = null;
                } else if (file < 60) {
					    $("#domiciale_error1").html("File size is less than 60KB");
						$(".domicialeInputBox1").css("color","red");
						$(".domicialeInputBox2").css("color","red");
						$(".domicialeInputBox1").css("border-color","red");
						document.getElementById("domiciale").value = null;
                } else {
                        $("#domiciale_error1").html("Success ! ");
		                $(".domicialeInputBox1").css("color","#4F8A10");
						$(".domicialeInputBox2").css("color","#4F8A10");
						$(".domicialeInputBox1").css("border-color","#4F8A10");
                }            
        }
		}
		 else{
			
				$("#domiciale_error1").html("Enter in correct formate! ");	
			    $(".domicialeInputBox1").css("border","1px solid #00ad2d");  
				$(".domicialeInputBox1").css("color","red");
				$(".domicialeInputBox2").css("color","red");
				$(".domicialeInputBox1").css("border-color","red");
				$(".domicialeInputBox1").css("padding","5px 10px");
				document.getElementById("domiciale").value = null;
		 }
		});
		
			
    });
</script>
<?php if (($this->session->flashdata('flash_message')) != ""): ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
           
            text: '<?php echo $this->session->flashdata('flash_message'); ?>',
            position: 'top-right',
            loaderBg: 'green',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
    <?php endif; ?>

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
