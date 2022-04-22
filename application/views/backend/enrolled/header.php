 

 <!-- Navigation -->
 <nav class="headertop" >
    <div class="container">
        <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
               <img src="<?php echo base_url() ?>uploads/iiitv.png" alt="" class="img-fluid mx-auto logoleft" /></div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<h1 class="headerH1">
                    Indian Institute of Information Technology Vadodara
                </h1>
                <h4 class="headerH4">(Institute of National Importance under Act of Parliament)</h4>
                
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="float: right;">
                <img src="<?php echo base_url() ?>uploads/iiitdiu.png" alt="" class="img-fluid mx-auto logoright" /></div>
            </div>
			</div>
        </div>
    
	 </nav>
        <nav class="navbar navbar-default navbar-static-top m-b-0" >
		
            <div class="navbar-header"  > <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"></a>
                <div class="navbar-header" style="background: #08185d!important;"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse" ><i class="ti-menu"></i></a>
               
                <ul class="nav navbar-top-links navbar-right pull-right" >
                   
                    <li class="dropdown">
                    <?php
                                $face_file = 'uploads/1.png';                                 
                            	$students =  $this->db->get_where('student_data', array('jee_rollnumber' => $roll))->result_array();
			
                            
                            ?>

                        <a  class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
							<img src="<?php echo base_url() . $face_file;?>" alt="user-img" width="36" class="img-circle">
							<b  style="font-size: 15px;"><?php echo $students[0]['name'] ?></b>
						</a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">                            
                            <li><a style="color: #00229d; white-space: nowrap; font-size: 14px;" href="<?php echo base_url();?>login/enrolledlogout"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
				 </div>
            </div>
            
        </nav>