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

<div style="padding-bottom: 8px;">

<!-- ============= COMPONENT ============== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <div class="container-fluid">
 	 
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="main_nav" style="font-size: 16px; ">
	<ul class="navbar-nav space">
		<li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
		<li class="nav-item"><a class="nav-link" href="#"> About </a></li>
		<li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
		<li class="nav-item dropdown">
			<a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">  Hover me  </a>
		    <ul class="dropdown-menu"  style="font-size: 15px; background-color: #212529;">
			  <li><a class="dropdown-item" style="color: white;" href="#"> Submenu item 1</a></li>
			  <li><a class="dropdown-item" style="color: white;" href="#"> Submenu item 2 </a></li>
			  <li><a class="dropdown-item" style="color: white;" href="#"> Submenu item 3 </a></li>
		    </ul>
		</li>
	</ul>
	
	<ul class="navbar-nav ms-auto">
		<li data-toggle="modal" data-target="#exampleModal" class="nav-item"><a class="nav-link fa fa-sign-in" href="#"> LogIn </a></li>
		<!-- Button trigger modal -->


					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Login Model</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div >
						<div class="white-box">
						 <h4 class="box-title m-b-20" align="center">
						 <br><br><br>
										<img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="70" height="70"/></h4>
										<h5 align="center"><a href=""><?php echo $system_name;?></a></h5>
										<br>
										
										
						<form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php echo base_url();?>login/check_login">

						   <div class="form-group ">
											<div class="col-xs-12">
												<input class="form-control" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>" style="width:100%">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12" >
												<input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('passord');?>" style="width:100%">
											</div>
										</div>
										
							<div class="form-group">
							  <div class="col-md-12">
								<div class="checkbox checkbox-primary pull-left p-t-0">
								  <input id="checkbox-signup" type="checkbox">
								  <label for="checkbox-signup"> <?php echo get_phrase('Remember Me');?> </label>

								</div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> <?php echo get_phrase('Forgot Password');?></a> </div>
							</div>
						   <div class="form-group text-center m-t-20">
							<div class="col-xs-12">
							
							  
							<button class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
							<?php echo get_phrase('Login');?>
							</button>
							<a href="<?php echo base_url();?>login/registeration/"  class="btn btn-info  style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light  m-t-20" style="width:100%; color:white; text-align: center; margin-top:5px;">Create Account</i></a>


							<div align="center"><img id="install_progress" src="<?php echo base_url() ?>assets/images/preloader.gif" style="margin-left: 20px; display: none"/></div>

								</div>
							</div>
					
							 <?php echo form_close();?>
								
							<form method="post" role="form" id="recoverform" class="form-horizontal form-material"  action="<?php echo base_url();?>login/reset_password" style="height: 250px">
							<input type="email" name="email" class="form-control" placeholder="<?php echo get_phrase('email');?>" style="width:100%" required>

						<div class="form-group text-center m-t-20">
							<div class="col-xs-6">
								<a href="<?php echo base_url();?>"><button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button" style="color:white"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('Login');?></button></a>
								<button class="btn btn-success btn-rounded btn-sm  text-uppercase" type="submit" style="color:white"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('Reset Password');?></button>
							</div>
						</div>
					
            <?php echo form_close();?>
            </div>
        </div>
	
     
    </div>
  </div>
</div>
		
	</ul>
	
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			 <div class="boxdesignImpLinks">

                <h5 class="impHeading" style="background: #2f2d2d; color: white;">
                    Student Admission Application
                    <i class="fa fa-street-view pull-right circle-icon-importantlink"></i>
                </h5>
            <nav id="sidebar">
                <ul class="list-unstyled components">
                                <li>
                                    <a class="fa fa-registered" href="<?php echo base_url();?>login/enrolled_registeration/" class="parentLink"> Registration  </a>
                                </li>
								<li>
                                    <a class="fa fa-registered" href="<?php echo base_url();?>login/enrolled_login/" class="parentLink"> Login  </a>
                                </li>
		
                </ul>
            </nav>
			</div>
			
			<div class="boxdesignImpLinks">

                <h5 class="impHeading" style="background: #2f2d2d; color: white;">
                    Useful Links
                    <i class="fa fa-link pull-right circle-icon-importantlink"></i>
                </h5>
            <nav id="sidebar">
                <ul class="list-unstyled components">
                                <li>


                                    <a href="https://jeeadv.ac.in" target='_blank' class="parentLink"> JEE (Advanced) 2021 </a>
                                </li>
                                <li>


                                    <a href="https://jeemain.nta.nic.in" target='_blank' class="parentLink"> JEE (Main) 2021 </a>
                                </li>
                                <li>


                                    <a href="https://csab.nic.in" target='_blank' class="parentLink"> CSAB 2021 </a>
                                </li>
                </ul>
            </nav>
			</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
               <img src="<?php echo base_url() ?>optimum/plugins/images/iiitstudent.jpg" alt="" style="height: 400px; width: 746px;" >
            
       
<div class="mt-2">

            <nav id="sidebar">
                <ul class="list-unstyled components">
                                <li class="centerLinkBtn">
                                    <a target="_blank" class="btn btn-primary btn-block btn-lg text-white" href="http://www.iiitvadodara.ac.in/" target='_self'> Go main website of IIITV <img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new'/> </a>
                                </li> 
                                <li class="centerLinkBtn">
                                    <a target="_blank" class="btn btn-primary btn-block btn-lg text-white" href="https://www.collegepravesh.com/engineering-colleges/iiit-vadodara/" target='_self'> To check new features <img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new'/> </a>
                                </li> 

                </ul>

            </nav>
            <br />
</div>					

      




		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="boxdesignNews">
					<h5 class="newsHeading">
						News 
						<i class="fa fa-bullhorn circle-icon-newsevent  pull-right"></i>

					</h5>
						<nav id="sidebar">
							<ul class="list-unstyled components">
											<li>

												<span class="newspara" style="font-weight:bold">
												
													<a href="#" target='_self'>SSIP Gujarat Industrial Hackathon 2019 Grand Finale Result: "3rd Position" (Medium Scale Industry)Team:Dr. Kamal K. Jha (Mentor)Kshitij Palghane (Team Leader)Heet Sankesara (Member)Khilan Ravani (Member)Harshendra Shah (Member) <img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new' class='pull-right'/></a>
												    <a href="#" target='_self'>IIIT Vadodara held its 3rd Convocation on 07 Nov. 2020 <img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new' class='pull-right'/></a>
											
												</span>
											</li>

							</ul>

						</nav>
			</div>
			<div class="boxdesignNews"  style="min-height: 0px;">
					<h5 class="newsHeading">
						Events
						<i class="fa fa-bullhorn circle-icon-newsevent  pull-right"></i>

					</h5>
						<nav id="sidebar">
							<ul class="list-unstyled components">
											<li>

												<span class="newspara" style="font-weight:bold">
												
													<a href="#" target='_self'>21 June Internation Day of Yoga 2021<img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new' class='pull-right'/></a>
												    <a href="#" target='_self'>15-19, June FDP on Blockchain<img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new' class='pull-right'/></a>
													<a href="#" target='_self'>25-29, May FDP on Data Analytics<img src='https://josaa.nic.in/webinfo/Content/img/newicon.gif' alt='new' class='pull-right'/></a>
												   
												</span>
											</li>

							</ul>

						</nav>
			</div>
		</div>
</div>

<footer class="footer text-center"  style="left: 0px; font-size: 14px; background-color: #520000; color: #fff!important;"><i class="fa fa-globe" ></i>Footer. All Right Reserved (2021)</footer>





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
