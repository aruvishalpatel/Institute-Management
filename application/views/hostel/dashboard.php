 <!--row -->
            <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Hostel');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel_room');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Rooms');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel_category');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Hostel Category');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-inverse"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('dormitory');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Dormitory');?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    

            </div>
                <!--/row -->
                <!-- .row -->
                
               
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Recently Added Teachers');?></h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                            <?php $get_teacher_from_model = $this->crud_model->list_all_teacher_and_order_with_teacher_id();
                                    foreach ($get_teacher_from_model as $key => $teacher):?>
                                            <!-- <td><img src="<?php //echo $teacher['face_file'];?>" class="img-circle" width="40px"></td> -->
                                            <td><?php echo $teacher['name'];?></td>
                                            <td><?php echo $teacher['email'];?></td>
                                            <td><?php echo $teacher['phone'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Recently Added Students');?></h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                            <?php $get_student_from_model = $this->crud_model->list_all_student_and_order_with_student_id();
                                    foreach ($get_student_from_model as $key => $student):?>
                                            <!-- <td><img src="<?php //echo $student['face_file'];?>" class="img-circle" width="40px"></td> -->
                                            <td><?php echo $student['name'];?></td>
                                            <td><?php echo $student['email'];?></td>
                                            <td><?php echo $student['phone'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->