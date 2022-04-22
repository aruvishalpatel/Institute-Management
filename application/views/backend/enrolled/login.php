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
<?php
			if (empty($this->session->userdata('rollnumber')))
			{
				
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
					 redirect(base_url(). 'login/document_form', 'refresh');
				  }
				  
				else 
				 {
					
					
				  }
			  
			  
			  
			}


?>

<!-- MultiStep Form -->
<section class="headertop">
    <div class="container">
        <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
               <img src="<?php echo base_url() ?>uploads/iiitv.png" alt="" class="img-fluid mx-auto logoleft" /></div>
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
			<h1 class="headerH1">
                    Indian Institute of Information Technology Vadodara
                </h1>
                <h4 class="headerH4">(Institute of National Importance under Act of Parliament)</h4>
                
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <img src="<?php echo base_url() ?>uploads/iiitdiu.png" alt="" class="img-fluid mx-auto logoright" /></div>
            </div>
			</div>
        </div>
    </div>
</section>
<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
   <div >
	
	<a href="<?php echo base_url();?>login/" type="button" class="btn btn-outline-danger" style="color: #020928; background-color: #b1a5a5;">Home</a>
	</div>
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-12 col-md-10 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form  method="post" role="form" action="<?php echo base_url();?>login/checkuserexist/" id="msform" >
                            <!-- progressbar -->
                            
							<fieldset>
							<form >
								<div class="form-card">                                  					
									<div class="col-sm-12">
										<div class="panel panel-info">
											<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('User Details ');?>
											</div>
									
											<div class="panel-body table-responsive">
												
												
												<section class="h-100 gradient-form" style="background-color: #eee;">
												  <div class="container py-5 h-100">
													<div class="row d-flex justify-content-center align-items-center h-100">
													  <div class="col-xl-10">
														<div class="card rounded-3 text-black" style="font-size: 16px;">
														  <div class="row g-0">
														  <div class="col-lg-6 d-flex align-items-center gradient-custom-2" >
															 
															  <img src="<?php echo base_url() ?>uploads/student.jpg"  alt="logo" style="width: 100%; height: 100%;">
																
															</div>
															<div class="col-lg-6">
															  <div class="card-body p-md-5 mx-md-4" >

																<div class="text-center">
																  <img src="<?php echo base_url() ?>uploads/iiitsmart.png" style="width: 185px;" alt="logo">
																  <h4 class="mt-1 mb-5 pb-1">Wellcome to IIIT Vadodara</h4>
																</div>

																<form >
															

																  <div class="form-outline mb-4">																    
																	<input type="number" name="jee_rollnumber" class="form-control" placeholder="Enter Your Jee Roll Number"/ required>																	
																  </div>

																  
																  <div class="text-center pt-1 mb-5 pb-1">
																	<button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" >Sent OTP</button>																
																  </div>

																 
																  <div class="d-flex align-items-center justify-content-center pb-4">
																	<p class="mb-0 me-2">Don't Register?</p>
																	<a href="<?php echo base_url();?>login/enrolled_registeration/" type="button" class="btn btn-outline-danger" style="color: #020928; background-color: #b1a5a5;">Register</a>
																  </div>

																</form>

															  </div>
															</div>
															
														  </div>
														</div>
													  </div>
													</div>
												  </div>
												</section>
												
											</div>
									
										</div>
									</div>
								
								</div><br><br><br><br><br><br><br><br><br><br>
								</form>
							</fieldset>
                            
                        </form>
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

</body>

</html>
