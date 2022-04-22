<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A complete and most powerful school system management system for all. Purchase and enjoy">
    <meta name="author" content="OPTIMUM LINKUP COMPUTERS">
		<?php 
		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////
		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
		?>

    <link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
    <title><?php echo $page_title;?>&nbsp;|&nbsp;<?php echo $system_title;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>optimum/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet" >
    <!-- Menu CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet" >
    <!-- morris CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/morrisjs/morris.css" rel="stylesheet" >
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet" >
    <!-- Custom CSS -->
<?php if ($text_align == 'right-to-left') { ?>
  <link href="<?php echo base_url(); ?>optimum/css/style-rtl.css" rel="stylesheet" >
<?php } else { ?>
  <link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet" >
<?php } ?>

    
    <!-- color CSS -->
	 <link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/dropify/dist/css/dropify.min.css" >
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" / >
	

    <link href="<?php echo base_url(); ?>optimum/css/colors/<?php echo $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description; ?>.css" id="theme" rel="stylesheet" >
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" / >
	
	 <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" / >
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" / >
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" / >
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
		
		
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>optimum/plugins/bower_components/gallery/css/animated-masonry-gallery.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>optimum/plugins/bower_components/fancybox/ekko-lightbox.min.css" />

    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
	
	
	 <!--Owl carousel CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>js/font-awesome-icon-picker/fontawesome-four-iconpicker.min.css" type="text/css" />
<!--	
	<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */

  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close1 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close1:hover,
.close1:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close2 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close2:hover,
.close2:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close3 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close3:hover,
.close3:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close4 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close4:hover,
.close4:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close5 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close5:hover,
.close5:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close6 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close6:hover,
.close6:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close7 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close7:hover,
.close7:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close8 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close8:hover,
.close8:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.close9 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close9:hover,
.close9:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
									
-->
	
	
	<script src="<?php echo base_url(); ?>optimum/js/jquery-1.11.0.min.js"></script>


	<!--<link href="<?php echo base_url(); ?>optimum/fullcalendar/css/style.css" rel="stylesheet">-->

<!--Amcharts-->
<script src="<?php echo base_url(); ?>optimum/js/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/pie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/gauge.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/funnel.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/radar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/amexport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/canvg.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/jspdf.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/filesaver.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

        
