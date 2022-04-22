 <div class="panel-body table-responsive">


                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <!-- <th><div><?php //echo get_phrase('Image');?></div></th> -->                           
                            <th><div><?php echo get_phrase('name');?></div></th>							
                    		<th><div><?php echo get_phrase('category');?></div></th>
                            <th><div><?php echo get_phrase('gender');?></div></th>                            
                            <th><div><?php echo get_phrase('mobile_number');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('branch');?></div></th>                          
                            <th><div><?php echo get_phrase('general_rank');?></div></th>
                            <th><div><?php echo get_phrase('category_rank');?></div></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 1; $students =  $this->db->get_where('student_data', array('status' => $enrolled_type_id))->result_array();
                    foreach($students as $key => $student):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
                            <!-- <td><img src="<?php //echo $this->crud_model->get_image_url('student', $student['student_id']);?>" class="img-circle" width="30"></td> -->
                            <td><?php echo $student['name'];?></td>							
                            <td><?php echo $student['category'];?></td>
                            <td><?php echo $student['gender'];?></td>                            
                            <td><?php echo $student['mobile_number'];?></td>
                            <td><?php echo $student['email'];?></td>
							<td><?php echo $student['branch'];?></td>
                            <td><?php echo $student['general_rank'];?></td>
							<td><?php echo $student['category_rank'];?></td>
							
							<!---
							<td><?php echo $student['blood_group'];?></td>
							<td><?php echo $student['permanent_address'];?></td>
                            <td><?php echo $student['birth_place'];?></td>
                            <td><?php echo $student['inter_passing_year'];?></td>
                            <td><?php echo $student['fatheroccupation'];?></td>
                            <td><?php echo $student['date_of_birth'];?></td>
                            <td><?php echo $student['highschool_passing_year'];?></td>
                            <td><?php echo $student['father_name'];?></td>							
                            <td><?php echo $student['jee_rollnumber'];?></td>
                            <td><?php echo $student['motheroccupation'];?></td>
							<td><?php echo $student['adhar_number'];?></td>
							<td><?php echo $student['mother_name'];?></td>                            
							 <td><?php echo $student['state'];?></td>
                            <td><?php echo $student['city'];?></td>
                            <td><?php echo $student['country'];?></td>
							<td><?php echo $student['student_id'];?></td>
							--->
							<td>
							<?php if($student['status'] != 2) 
							{
							?>
							 <a href="#" onclick="confirm_update_modal('<?php echo base_url();?>admin/enrolled_student/update/<?php echo $student['student_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs" ><i class="fa fa-check"></i></button></a>
					        <?php
                            }
							?>
							 <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/enrolled_student/delete/<?php echo $student['student_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                     		<!--				 
							 <section>							
							<div class="row">
								<div class="col-sm-12" style="width: 400px;">
									<div class="panel panel-info">
										<div class="panel-heading row">	
                                             <a href="#" onclick="confirm_update_modal('<?php echo base_url();?>admin/enrolled_student/update/<?php echo $student['student_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs" ><i class="fa fa-check"></i></button></a>
					                         <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/enrolled_student/delete/<?php echo $student['student_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                     						 <div>
											 <a href="#" onclick="<?php $this->session->set_userdata('temp_id', $student['student_id']);?>" data-perform="panel-collapse"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-eye"></i></button></a>
					 						<a href="#" data-perform="panel-dismiss"></a> </div>
                                        
										</div>
										<div class="panel-wrapper collapse out" aria-expanded="true">
											<div class="panel-body">
												<?php echo form_open(base_url() . 'admin/alumni/insert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

												<?php 
												    $temp = $this->session->userdata('temp_id');
													$studentdata =  $this->db->get_where('student_data', array('student_id' => $temp))->result_array();
                                                    $path= base_url()."/application/views/backend/enrolleduserdocument/".$studentdata[0]['jee_rollnumber'];
												

												?>								
												<div class="form-group">
													
												<img  title="Adhar Card" id="myImg" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg1" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg2" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg3" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg4" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px; " >
												<img  title="Adhar Card" id="myImg5" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg6" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
                                                <img  title="Adhar Card" id="myImg7" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg8" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
												<img  title="Adhar Card" id="myImg9" src="<?php echo base_url(); ?>/uploads/iiitv.png" alt="Snow" style="width: 90px; height: 40px;border: 3px solid green; border-radius: 10px; margin-bottom: 7px;" >
                                                
													<div id="myModal" class="modal">
													  <span class="close">&times;</span>
													  <img class="modal-content" id="img01">
													  <div id="caption"></div>
													</div>
													<div id="myModal1" class="modal">
													  <span class="close1">&times;</span>
													  <img class="modal-content" id="img011">
													  <div id="caption"></div>
													</div>
													<div id="myModal2" class="modal">
													  <span class="close2">&times;</span>
													  <img class="modal-content" id="img012">
													  <div id="caption"></div>
													</div>
													<div id="myModal3" class="modal">
													  <span class="close3">&times;</span>
													  <img class="modal-content" id="img013">
													  <div id="caption"></div>
													</div>
													<div id="myModal4" class="modal">
													  <span class="close4">&times;</span>
													  <img class="modal-content" id="img014">
													  <div id="caption"></div>
													</div>
													<div id="myModal5" class="modal">
													  <span class="close5">&times;</span>
													  <img class="modal-content" id="img015">
													  <div id="caption"></div>
													</div>
                                                    <div id="myModal6" class="modal">
													  <span class="close6">&times;</span>
													  <img class="modal-content" id="img016">
													  <div id="caption"></div>
													</div>
													<div id="myModal7" class="modal">
													  <span class="close7">&times;</span>
													  <img class="modal-content" id="img017">
													  <div id="caption"></div>
													</div>
													<div id="myModal8" class="modal">
													  <span class="close8">&times;</span>
													  <img class="modal-content" id="img018">
													  <div id="caption"></div>
													</div>
													<div id="myModal9" class="modal">
													  <span class="close9">&times;</span>
													  <img class="modal-content" id="img019">
													  <div id="caption"></div>
													</div>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg");													
													var modalImg = document.getElementById("img01");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													
													<script>
													// Get the modal
													var modal = document.getElementById("myModal1");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg1");													
													var modalImg = document.getElementById("img011");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close1")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal2");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg2");													
													var modalImg = document.getElementById("img012");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close2")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal3");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg3");													
													var modalImg = document.getElementById("img013");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close3")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal4");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg4");													
													var modalImg = document.getElementById("img014");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close4")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal5");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg5");													
													var modalImg = document.getElementById("img015");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close5")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal6");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg6");													
													var modalImg = document.getElementById("img016");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close6")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal7");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg7");													
													var modalImg = document.getElementById("img017");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close7")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
													<script>
													// Get the modal
													var modal = document.getElementById("myModal8");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg8");													
													var modalImg = document.getElementById("img018");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close8")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
												    <script>
													// Get the modal
													var modal = document.getElementById("myModal9");

													// Get the image and insert it inside the modal - use its "alt" text as a caption
													var img = document.getElementById("myImg9");													
													var modalImg = document.getElementById("img019");
													var captionText = document.getElementById("caption");
													img.onclick = function(){
													  modal.style.display = "block";
													  modalImg.src = this.src;
													  captionText.innerHTML = this.alt;
													}

													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close9")[0];

													// When the user clicks on <span> (x), close the modal
													span.onclick = function() { 
													  modal.style.display = "none";
													}
													</script>
												</div><br>
												<?php echo form_close();?>										
											</div>
										</div>
									</div>
								</div>
							</div> 
							</section>
					 	     !-->
				     	
                           
        					</td>
                           
						
                        </tr>
						
    <?php endforeach;?>

                    </tbody>
                </table>



            </div>