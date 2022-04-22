<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('enrolled student list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div style="padding: 0" class="panel-body table-responsive">
                    
                                <div class="form-group">
                    <div class="col-sm-12">
                    <select id="enrolled_type_id" class="form-control">
                    <option value=""><?php echo get_phrase('select_type');?></option>

                    <?php $class =  $this->db->get('enrolled_type')->result_array();
                    foreach($class as $key => $class):?>
                    <option value="<?php echo $class['enrolled_type_id'];?>"
                    <?php if($enrolled_type_id == $class['enrolled_type_id']) echo 'selected';?>><?php echo get_phrase($class['name']); ?></option>
                    <?php endforeach;?>
                   </select>

                  </div>
                 </div>
                 <button type="button" id="find" class="btn btn-success btn-rounded btn-sm btn-block">Get List</button>
                 <hr>
				
 				<!-- PHP that includes table for subject starts here  ------>
                <div id="data">
                <?php include 'showEnrolledStudentClasswise.php';?>
                </div> 
                <!-- PHP that includes table for subject ends here  ------>


				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#enrolled_type_id').select2();
		$('#find').on('click', function() 
		{
			var enrolled_type_id = $('#enrolled_type_id').val();
			 if (enrolled_type_id == "") {
           $.toast({
            text: 'Please select class before clicking get student button',
            position: 'top-right',
            loaderBg: '#f56954',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
            return false;
        }
			$.ajax({
				url: '<?php echo site_url('admin/getEnrolledStudentClasswise/');?>' + enrolled_type_id
			}).done(function(response) {
				$('#data').html(response);
			});
		});

	});


</script>