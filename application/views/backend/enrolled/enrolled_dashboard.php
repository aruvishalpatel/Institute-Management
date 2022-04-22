<div class="row" >
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4>Total Registration</h4>
									  <?php  
										
										$query = $this->db->get('student_data');
										
										?>
										
                                    <span class="text-muted" style="font-size: medium;"><?php  echo $query->num_rows(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4>Total Approval</h4>
									 <?php  
										$this->db->where('status >=', 2);
										$query = $this->db->get('student_data');
										
                                     ?>
                                    <span class="text-muted" style="font-size: medium;"><?php echo $query->num_rows();?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4>Final Submission</h4>
									<?php  
										$this->db->where('finalsubmission >=', 1);
										$query = $this->db->get('student_data');
										
                                     ?>
                                    <span class="text-muted" style="font-size: medium;"><?php echo $query->num_rows();?></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <div class="col-md-12 col-sm-12">
                        <div class="white-box" style="text-align: center;">
                            <div class="r-icon-stats">
                                
                                <div class="bodystate">
								    <?php  
										
										$students =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
										
                                     ?>
                                    <h4 style="padding-bottom: 10px; font-size: x-large; color: green;">Hey <?php echo $students[0]['name']; ?> you have successfully done all the steps for registration.</h4>
									<h5>Now, you have to wait for admin approval.<h5>
									
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
					
</div>