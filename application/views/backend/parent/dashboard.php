 <!--row -->
 <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('student');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Students');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('teacher');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Teachers');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('parent');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('parents');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-inverse"></i>
                                <div class="bodystate">
                                    <h4>
                                    <?php 
                                    $parent_student_logic = $this->db->get_where('student', array('parent_id'=> $this->session->userdata('parent_id')))->row()->student_id;
                                    $check_daily_attendance = array('date' => date('Y-m-d'), 'status' => '1');
                                    $get_attendance_information = $this->db->get_where('attendance', $check_daily_attendance, 'student_id', $parent_student_logic);
                                    $display_attendance_here = $get_attendance_information->num_rows();
                                    echo $display_attendance_here;
                                    ?>
                                    </h4>
                                    <span class="text-muted"><?php echo get_phrase('Attendance');?></span>
                                </div>
                            </div>
                        </div>
                    </div>

               
          
                <!--/row -->
                <!-- .row -->
               
                    
</div>