<div class="row">
                    <div class="col-md-2 col-sm-12">
                       
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box" style="text-align: center;">
                            <div class="r-icon-stats">
                                <?php  
										
							     $students =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
								 $approve =$students[0]['status'];		
                                ?>
								<?php 
								if($approve == 2)
								{
								?>
                               <div class="bodystate">
                                    <h4 style="padding: 100px 0 100px 90px; color: green; font-size: x-large;">Hey <?php echo $students[0]['name']; ?> you are approved Successfully.</h4>                                   
                                </div>
								<?php
								}
								else
								{
								?>								 
								 <div class="bodystate">
                                    <h4 style="padding: 100px 0 100px 90px; color: red; font-size: x-large;">Hey <?php echo $students[0]['name']; ?> you are not approved yet.</h4>                                   
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