

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>webroot/admin/css/bootstrap-select.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/animate.css" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/md-preloader.css" rel="stylesheet" />
   
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/all-themes.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>webroot/admin/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/waves.js"></script>

    <!-- Editable Table Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/mindmup-editabletable.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/editable-table.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/demo.js"></script>
	<script src="<?php echo base_url(); ?>webroot/admin/js/jquery.validate.js"></script>
	 <script src="<?php echo base_url(); ?>webroot/admin/js/form-validation.js"></script>
	
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/buttons.print.min.js"></script>

    <!-- Custom Js -->
 
    <script src="<?php echo base_url(); ?>webroot/admin/js/jquery-datatable.js"></script>
    <Style>
    .goog-te-banner-frame.skiptranslate {display: none !important;} 
body { top: 0px !important; }
.pac-container {    background-color: #fff;    position: absolute!important;    z-index: 1000;    border-radius: 2px;    border-top: 1px solid #d9d9d9;    font-family: Arial,sans-serif;    box-shadow: 0 2px 6px rgba(0,0,0,0.3);    -moz-box-sizing: border-box;    -webkit-box-sizing: border-box;    box-sizing: border-box;    overflow: hidden;    top: 380px !important;}
    </Style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">

     
        
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo site_url();?>admin/admin/dashboard"> <img  src="<?php echo base_url();?>webroot/admin/images/logo_b.png" alt="logo" /> Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <!-- Notifications -->
                   <div class="info-container">
                   <div class="btn-group user-helper-dropdown">
                         <i class="admin_name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Notifications <spam class="notify-badge"><?php echo '0'; ?></spam></i>
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right notify-ul">
                       <?php  
                          //  if(!empty($cancel_bookings)){
                           // foreach($cancel_bookings as $cancel_booking){
                        ?>
                           <!-- <li class = "notify"><a href="<?php echo site_url();?>admin/bookings/cancel_booking_detail/<?php echo $cancel_booking['id']; ?>"><?php echo $cancel_booking['user_name'];?> canceled a <?php echo $cancel_booking['name']; ?> booking.</a></li>
                            <li role="seperator" class="divider"></li>-->
                            <?php //}}else{ ?>
                            <li class="notify"> No Notification Found</li>
                            <?php //} ?>
                           </ul>
                            </div>
                     <div class="btn-group user-helper-dropdown">
                <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</div>
                         <div class="btn-group user-helper-dropdown">
                         <i class="admin_name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo $admin['username']; ?></i>
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo site_url();?>admin/admin/edit_profile"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo site_url();?>admin/admin/change_password"><i class="material-icons">person</i>Change Password</a></li>
                            
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo site_url();?>admin/admin/logout"><i class="material-icons">input</i>Log Out</a></li>
                            </div>
                        </ul>
                    </div>
                            
                            
                        
                        </ul>

                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                 
                    <!-- #END# Tasks -->
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>uploads/admin/<?php echo $admin['image']; ?>" width="55" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $admin['username']; ?></div>
                    <div class="email"><?php echo $admin['email']; ?></div>
                   
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/admin/admin/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
				
					 <li>
                        <a href="<?php echo site_url();?>admin/moshref">
                            <i class="material-icons">person</i>
                            <span>Moshref</span>
                        </a>
                    </li>

                     <li>
                        <a href="<?php echo site_url();?>admin/leaders">
                            <i class="material-icons">person</i>
                            <span>Leaders</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url();?>admin/teachers">
                            <i class="material-icons">person</i>
                            <span>Teachers</span>
                        </a>
                    </li>
                     <!--<li>
                        <a href="<?php echo site_url();?>admin/areas">
                            <i class="material-icons">person</i>
                            <span>Areas</span>
                        </a>
                    </li>-->
                     <li>
                        <a href="<?php echo site_url();?>admin/schools">
                            <i class="material-icons">person</i>
                            <span>Schools</span>
                        </a>
                    </li>
                      <li>
                        <a href="<?php echo site_url();?>admin/classes">
                            <i class="material-icons">person</i>
                            <span>Classes</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url();?>admin/subject">
                            <i class="material-icons">person</i>
                            <span>Subjects</span>
                        </a>
                    </li>
                      <li>
                        <a href="<?php echo site_url();?>admin/rating_questions">
                            <i class="material-icons">person</i>
                            <span>Rating Questions</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url();?>admin/contactus">
                            <i class="material-icons">person</i>
                            <span>Contact Us</span>
                        </a>
                    </li>
  
                    
                    
                  
                          </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">omninos solution</a>.
                </div>
                
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
              
            </ul>
            <div class="tab-content">
            
                
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
