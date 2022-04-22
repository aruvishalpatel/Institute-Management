

<div class="row">
                    <div class="col-md-2 col-sm-12">
                       
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box" style="text-align: center;">
                            <div class="r-icon-stats">
                               <?php										
							     $students =  $this->db->get_where('student_data', array('jee_rollnumber' => $this->session->userdata('rollnumber')))->result_array();
								 $payment =$students[0]['payment'];	
                                
                                ?>
								<?php 
								if($payment == 0)
								{
								?>
                                <div class="bodystate">
                                    <h4 style="padding: 100px 0 100px 90px; color: red; font-size: x-large;">First you need to done the payment process.</ h4>                                   
                                </div>
								<?php
								}
								else
								{
								?>
								<div class="alert" style="font-size: initial;">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  <strong>Warning!</strong> It is valide before your password Update once
								</div>
								 <div class="bodystate">
                                    <form class="row">
									  <div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 30px; color: #08185d!important;">Email</label>
										<div class="col-sm-10" style="font-size: 30px;">
										  <input type="text" style="text-align: center; border: solid #08185d 1px;" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $students[0]['email'] ?>" >
										</div>
									  </div>
									   <div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 30px; color: #08185d!important;">Password</label>
										<div class="col-sm-10" style="font-size: 30px;">
										  <input type="text" style="text-align: center; border: solid #08185d 1px;" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $students[0]['password'] ?>">
										</div>
									  </div>
								    </form>                                   
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