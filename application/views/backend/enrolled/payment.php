<div class="row">
                    <div class="col-md-2 col-sm-12">
                       
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box" style="text-align: center;">
                            <div class="r-icon-stats">
                                <?php  
										
							     $students =  $this->db->get_where('student_data', array('jee_rollnumber' =>$this->session->userdata('rollnumber')))->result_array();
								 $payment =$students[0]['payment'];		
                                ?>
								<?php 
								if($payment == 0)
								{
								?>
								 <div class="bodystate">
                                    <h4 style="padding: 100px 0 100px 0px; color: red;  text-align: center; font-size: x-large;">Hey <?php echo $students[0]['name']; ?> make sure you want to pay your Institute fees.</h4>                                   
                                </div>
                              <div> <a target="_blank"  style="  width: 150px; background-color: #1CA953; text-align: center; font-weight: 800; padding: 11px 0px; color: white; font-size: 12px; display: inline-block; text-decoration: none; " href='https://pmny.in/rICqlr1IjltS' > Pay Now </a> </div>
							  <?php
								}
								else
								{
								?>
								 <div class="bodystate">
                                    <h4 style="padding: 100px 0 100px 90px; color: green; font-size: x-large;">Hey <?php echo $students[0]['name']; ?> your payment has been Successfull ! </h4>                                   
                                </div>								
								<?php
								}
								?>
								
                            </div>
                        </div>
                    </div>
                   
					 <div class="col-md-2 col-sm-12">
                        
                    </div>
					  
                   
					
</div>