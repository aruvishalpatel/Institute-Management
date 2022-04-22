 <!-- Navigation -->
 
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="#"><b><img src="<?php echo base_url();?>uploads/logo.png" width="50" height="50" alt="home" /></b><span class="hidden-xs"> ERP System</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                 
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            
                            <li>
                                <div class="message-center">
                                   
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                      
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                    <?php
                            
                                $face_file = 'uploads/1.png';                                 
                          
                            
                            ?>

                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"  > <img src="<?php echo base_url() . $face_file;?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">


                                <?php 
                                $account_type   =   $this->session->userdata('login_type');
                                $account_id     =   $account_type.'_id';
                                $name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
                                echo $name;
                                ?>


                        </b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo base_url();?>admin/manage_profile"><i class="ti-user"></i> Edit Profile</a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>