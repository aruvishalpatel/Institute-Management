<div class="navbar-default sidebar" role="navigation" style="background-color: initial; position: none; z-index: 10; width: 200px; padding-top: 60px; height: 100%; font-family: 'Open Sans';font-size: 14px;">
	 
	<div class="sidebar-nav navbar-collapse slimscrollsidebar" >
		<ul class="nav" id="side-menu" style="padding-top: 180px; ">
			
			
			
             <li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none; color: white; background-color: #000246; border: 1px solid #01a3c8;" href="#" class="waves-effect"  class="waves-effect"><i class="ti-user p-r-10" ></i> <span class="hide-menu" ><?php echo get_phrase('Personal Information') ;?></span > </i> </a> </li>
             <li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none; color: white; background-color: #000246; border: 1px solid #01a3c8;" href="#" class="waves-effect" class="waves-effect"><i class="ti-folder p-r-10" > </i> <span class="hide-menu" ><?php echo get_phrase('Documents') ;?></span></a> </li>
             <li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none; color: white; background-color: #4f5467; border: 1px solid #01a3c8;" href="<?php echo base_url().'login/fpdf'?>" class="waves-effect" href="<?php echo base_url().'login/fpdf'?>"  class="waves-effect"><i class="ti-download p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Registration form') ;?></span></a> </li>
			<?php  					
			 $students =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
			 
             if($students[0]['status'] == 2)
			 {			 
			?>
			 <li> <a style="padding: 15px 30px 15px 15px; display: block; color: white; text-decoration: none; background-color: #000246; border: 1px solid #01a3c8;" href="<?php echo base_url();?>admin/approve" class="waves-effect" href="<?php echo base_url();?>admin/approve" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Approval') ;?></span></a> </li>
            <?php
             }
            else
			 {
			?>
			<li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none;" href="<?php echo base_url();?>admin/approve" class="waves-effect" href="<?php echo base_url();?>admin/approve" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Approval') ;?></span></a> </li>
            <?php
			 }
			 if($students[0]['payment'] == 1 && $students[0]['status'] == 2)
			 {				 
			?>
			  <li> <a style="padding: 15px 30px 15px 15px; display: block; color: white; text-decoration: none; background-color: #000246; border: 1px solid #01a3c8;" href="<?php echo base_url();?>admin/payment" class="waves-effect" href="<?php echo base_url();?>admin/payment" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Payment') ;?></span></a> </li>
			<?php
			 }
			else if($students[0]['status'] == 2)
			 {				 
			?>
			  <li> <a style="padding: 15px 30px 15px 15px; display: block; color: white; text-decoration: none; background-color: #682d20; border: 1px solid #01a3c8;" href="<?php echo base_url();?>admin/payment" class="waves-effect" href="<?php echo base_url();?>admin/payment" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Payment') ;?></span></a> </li>
			<?php
             }
             
			 else
			 {
			?>
			<li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none;" href="<?php echo base_url();?>admin/payment" class="waves-effect" href="<?php echo base_url();?>admin/payment" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Payment') ;?></span></a> </li>
		    <?php
             }
			 if( $students[0]['payment'] == 1)
			 {
			?>
             <li> <a style="padding: 15px 30px 15px 15px; display: block; color: white; text-decoration: none; background-color: #000246; border: 1px solid #01a3c8; " href="<?php echo base_url();?>admin/idpassword" class="waves-effect" href="<?php echo base_url();?>admin/idpassword" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Institute Id Password') ;?></span></a> </li>
            <?php
             }
			 else
			 {
			?> 
			<li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none;" href="#" class="waves-effect" href="#" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Institute Id Password') ;?></span></a> </li>
            <?php
             }
			 if($students[0]['payment'] == 1)
			 {
			?>			
            <li> <a style="padding: 15px 30px 15px 15px; display: block; color: white; text-decoration: none; background-color: #4f5467; border: 1px solid #01a3c8;" href="<?php echo base_url();?>admin/paymentreceipt" class="waves-effect" href="<?php echo base_url();?>admin/paymentreceipt" class="waves-effect"><i class="ti-download p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Payment Receipt') ;?></span></a> </li>
            <?php 
             }
			 else
			 {
            ?> 	
             <li> <a style="padding: 15px 30px 15px 15px; display: block; text-decoration: none;" href="#" class="waves-effect" href="#" class="waves-effect"><i class="ti-download p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Payment Receipt') ;?></span></a> </li>
            <?php 
			 }
			?>			
		</ul>
	</div>
	
	
</div>