
<div class="row">
  <div class="col-sm-12">
  	<div class="panel panel-info"> 
  		<div class="panel-body"> 

    <?php
        $class_name= $this->db->get_where('class', array('class_id'=>$class_id))->row()->name;
    ?>
 
    <?php
        $select_student_from_model= $this->crud_model->get_students($class_id);
        foreach($select_student_from_model as $key => $student_selected):
            $student_id=$student_selected['student_id'];
            $student_roll=$student_selected['roll'];
            $student_sex= $student_selected['sex'];
            $student_name=$student_selected['name'];
            $student_class=$student_selected['class_id'];
           // $class_name
            $total_marks=0;
            $total_class_score =0;
            $total_grade_point=0;

    ?>



					<div class="print" style="border:1px solid #000; padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px;">   
						<div class="printableArea">     
		
								<table width="1000" border="0">
								  <tr>
									<td>
										<div class="col-md-2">
                                        
										</div>
											<div class="col-md-8" style="text-align: center;">
												<div class="tile-stats tile-white tile-white-primary">
													<span style="text-align: center;font-size: 29px;">
														<?php echo $system_name; ?>
													</span>
													<br/>
													<span style="text-align: center;font-size: 18px;">
                                                    <?php echo $system_address; ?>
													</span>
													<br/>
													<span style="text-align: center;font-size: 22px;">
															TERMINAL REPORT
													</span>                
												</div>
											</div>
											<div class="col-md-2 logo" >
												
											</div>
										</div>
									</td>
								  </tr>
								</table>
				
								<table width="1000" border="0">
								  <tr>
									<td style="background:black">&nbsp;</td>
								  </tr>
								</table>
				
								<table width="1000" border="1">
				
								  <tr>
									<td>TERM FOR:</td>
									<td><?php echo $running_year;?></td>
									<td>ACADEMIC YEAR:</td>
									<td><?php echo $running_year;?></td>
									<td>SEX:</td>
									<td><?php echo $student_sex;?></td>
									<td>ATTENDANCE:</td>
									<td><?php echo $this->db->get_where('attendance', array('session'=>$running_year, 'student_id'=>$student_id))->num_rows();?></td>
								  </tr>
				  
								   <tr>
									<td>NAME OF PUPIL:</td>
									<td><?php echo $student_name;?></td>
									<td>ADMISSION NO:</td>
									<td><?php echo $student_roll;?></td>
									<td>CLASS:</td>
									<td><?php echo $class_name;?></td>
									<td>DAYS OUT OF:</td>
                                    <td><?php echo $this->db->get_where('attendance', array('session'=>$running_year))->num_rows();?></td>

								  </tr>
								</table>
						<br />
						        <table width="1000" style="border:1px solid #CCCCCC">
								   <tr style="background:#CCCCCC">
										<td ><strong>STUDENT SUBJECTS:</strong></td>
										<td ><strong>1ST SCORE</strong></td>
										<td ><strong>2ND SCORE</strong></td>
										<td ><strong>3RD SCORE</strong></td>
										<td ><strong>EXAM SCORE</strong></td>
										<td ><strong>TOTAL SCORE</strong></td>
										<!-- <td ><strong>AVERAGE SCORE</strong></td> -->
										<td ><strong>GRADE SCORE</strong></td>
										<td ><strong>SUBJECT REMARKS</strong></td>
								   </tr>
                                   <?php $select_subject=$this->db->get_where('subject', array('class_id' => $class_id))->result_array();
                                    
                                        foreach($select_subject as $key => $subject):?>
                                  
                                   <tr>
                                        <td><?php echo $subject['name'];?></td>
                                        <?php $obtained_mark_query = $this->db->get_where('mark',
                                                                            array('class_id'=> $class_id, 'exam_id'=>$exam_id,
                                                                            'subject_id' =>$subject['subject_id'], 'student_id'=>$student_id));
                                            //$total_exam_score=0;
                                            if($obtained_mark_query->num_rows()>0)
                                            {
                                                $class_score_one=$obtained_mark_query->row()->class_score1;
                                                $class_score_two=$obtained_mark_query->row()->class_score2;
                                                $class_score_three=$obtained_mark_query->row()->class_score3;
                                                $exam_score=$obtained_mark_query->row()->exam_score;
                                                $total_score =$class_score_one + $class_score_two +$class_score_three +$exam_score;
                                               // $total_exam_score+=$total_score;
                                            }
                                   ?>
										<td><?php echo $class_score_one;?></td>
										<td><?php echo $class_score_two;?></td>
										<td><?php echo $class_score_three;?></td>
										<td><?php echo $exam_score;?></td>
										<td><?php echo $total_score;?></td>
										<!-- <td></td> -->
										<td>
                                            <?php if ($total_score >= "70"):?>
                                            <p style="color:green"><?php echo 'A';?></p>
                                            <?php endif;?>
                                            <?php if ($total_score < "70" && $total_score >= '60'):?>
                                            <p style="color:green"><?php echo 'B';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score < "60" && $total_score >="50"):?>
                                            <p style="color:green"><?php echo 'C';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score < "50" && $total_score >='45'):?>
                                            <p style="color:green"><?php echo 'D';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score < "45" && $total_score >='40'):?>
                                            <p style="color:green"><?php echo 'E';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score < "40"):?>
                                            <p style="color:red"><?php echo 'F';?></p>
                                            <?php endif;?> 
                                           
                                         
                                        
                                        
                                        </td>
										<td>
                                        <?php if ($total_score <= "29.99" && $total_score>='0'):?>
                                            <p style="color:red"><?php echo 'Failed';?></p>
                                            <?php endif;?>
                                            <?php if ($total_score <= "39.99" && $total_score >= '30'):?>
                                            <p style="color:red"><?php echo 'Poor';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score <= "44.99" && $total_score >="40"):?>
                                            <p style="color:green"><?php echo 'Fair';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score <= "59.99" && $total_score >='45'):?>
                                            <p style="color:green"><?php echo 'Good';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score <= "89.99" && $total_score >='60'):?>
                                            <p style="color:green"><?php echo 'Very Good';?></p>
                                            <?php endif;?> 
                                            <?php if($total_score <= "100" && $total_score >='90'):?>
                                            <p style="color:green"><?php echo 'Excellent';?></p>
                                            <?php endif;?> 
                                        </td>
										
								    </tr>
                                        <?php endforeach;?>
							    </table>
				
                                <table width="1000" style="border:1px solid #CCCCCC">
                                    <tr>
                                        <td style="background:#CCCCCC">&nbsp;</td>
                                    </tr>
                                </table>
						    <br>
						
						
                                 <table width="1000" style="border:1px solid #CCCCCC">
                    
                                    <tr>
                                        <td width="100">TOTAL MARKS:</td>
                                        <td width="100" align="center"><div  style="border-bottom: 1px dotted #D2CBCB"><?php echo $total_exam_score; ?></div></td>
                                        </tr>
                                    <!--    <td width="150">SCORE OBTAINABLE:</td>
                                        <td width="150" align="center"><div  style="border-bottom: 1px dotted #D2CBCB">Sum</div></div></td>
                                        <td width="150">AVERAGE SCORE:</td>
                                        <td width="300"><div  style="border-bottom: 1px dotted #D2CBCB">Average</div></td>
                            
                                    </tr> -->
                        
                                    <tr>
                                        <td width="150">NUMBER IN CLASS:</td>
                                        <?php $number_in_class=$this->db->get_where('student', array('class_id'=>$class_id))->num_rows(); ?>
                                        <td align="center"><div  style="border-bottom: 1px dotted #D2CBCB"><?php echo $number_in_class; ?></div></td>
                                        <td>CLASS POSITION:</td>
                                        <td align="center"><div  style="border-bottom: 1px dotted #D2CBCB">&nbsp;</div></td>
                                    </tr>
                                </table>
                    
                                <table width="1000" style="border:1px solid #CCCCCC">
                                    <tr>
                                        <td>CLASS TEACHER'S COMMENT:</td>
                                        <td><div  style="border-bottom: 1px dotted #D2CBCB">&nbsp;</div></td>
                                    </tr>
                                </table>
                            
                            
                    
                                <table width="1000" style="border:1px solid #CCCCCC">
                                    <tr>
                                        <td>HEAD TEACHER'S COMMENT:</td>
                                        <td><div style="border:1 px solid">&nbsp;</div></td>
                        
                                    </tr>
                                </table>
						
						
						
							<table width="1000" style="border:1px solid #CCCCCC">
								<tr>
									<td>RESUMPTION DATE:</td>
									<td><div  >___________________</div></td>
									<td>OUTSTANDING FEE:</td>
									<td><div  style="border-bottom: 1px dotted #D2CBCB"><strong style="color:red">Due</strong></div></td>
									
						
								</tr>
								<tr>
									<td>SIGNATURE:</td>
									<td><div >___________________</div></td>
									<td>DATE:</td>
									<td><div  ><?php echo date('Y-m-d') ;?></div></td>
					   
								</tr>
							</table>
						</div>
					</div>
        <?php endforeach;?>
				<hr />
				<button id="print" class="btn btn-info btn-rounded btn-block btn-sm pull-right" type="button"> <span><i class="fa fa-print"></i>&nbsp;Print</span> </button>

			</div>
		</div>
	</div>
</div>