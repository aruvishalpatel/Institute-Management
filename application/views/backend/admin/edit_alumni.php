<?php 
$select_alumni = $this->db->get_where('alumni' , array('alumni_id' => $param2) )->result_array();
foreach ( $select_alumni as $key => $row):
?>
	 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_alumni');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                    <?php echo form_open(base_url() . 'admin/alumni/update/'.$row['alumni_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                <!-- <div class="form-group"> 
					 <label class="col-sm-12"><?php //echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile"/>
       				 <img id="blah" src="<?php// echo $this->crud_model->get_image_url('alumni',$row['alumni_id']);?>" alt="" height="200" width="200"/>

					</div>
					</div>	 -->
                            
                          	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" autofocus>
						</div>
					</div>
					
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('gender');?></label>
                    <div class="col-sm-12">
							<select name="sex" class="form-control select2">
                              <option value="<?php echo $row ['sex'];?>"><?php echo $row['sex'];?></option>
                              <option value="male"><?php echo get_phrase('male');?></option>
                              <option value="female"><?php echo get_phrase('female');?></option>
                          </select>
						</div> 
					</div> 					
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>" >
						</div> 
					</div> 
                    
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
							<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>">
						</div>
					</div>
					
					
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-12">
							<textarea type="text" class="form-control" name="address"><?php echo $row['address'];?></textarea>
						</div> 
					</div>
					
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('profession');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="profession" value="<?php echo $row['profession'];?>">
						</div> 
					</div>
                    
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('marital_status');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="marital_status" value="<?php echo $row['marital_status'];?>">
						</div>
					</div>
					
								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('graduation_date');?></label>
                    <div class="col-sm-12">
         				<input type="text" class="datepicker form-control" name="g_year" value="<?php echo $row ['g_year']; ?>"/>
                                </div>
                            </div>
							

						
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('club');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="club" value="<?php echo $row['club'];?>" >
						</div> 
					</div>
					 
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('interest');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="interest" value="<?php echo $row['interest'];?>" >
						</div> 
					</div>
                            
                            
                        <div class="form-group">
                                <button type="submit" class="btn btn-info btn-rounded btn-block btn-sm"><i class="fa fa-pencil"></i>&nbsp;<?php echo get_phrase('edit_alumni');?></button>
                        </div>
                <?php echo form_close();?>
    </div>
	</div>
 </div>
</div>
</div>

<?php
endforeach;
?>