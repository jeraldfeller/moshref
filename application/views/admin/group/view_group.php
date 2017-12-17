<?php 
$member = $this->Admin_model->get_data($group['id']); 
?>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?></h2>
	                             <a href="<?php echo base_url('index.php/buzzme/admin/groups');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a>
						<div class="user_detail body">
							<div class="row">
								<div class="col-sm-7">							   
									<div class="form-group form-float">
										<label class="col-sm-3">Group Name:</label>
										<div class="col-sm-9">
										   <?php echo $group['group_name']; ?>
										   
										</div>
									</div>
								 
								
									 <div class="form-group form-float">
										<label class="col-sm-3">Members:</label>
											<div class="col-sm-9">
										  <?php foreach($member as $members){ 
                                            $name[] = $members['first_name'];
                                           }                            
											echo $list = implode(" , ",$name);
										?>
										</div>
									 </div>  
									
								 <!--<div class="col-sm-5">
								 
										 <?php if(!empty($group['group_image'])){ ?>
								 
										<div class="user_img">
										<img class=" img-responsive" src="<?php echo base_url();?>uploads/buzzme/group/<?php echo $group['group_image']; ?>"/>
									  
									</div>
								
								 <?php } else{ ?>
								 <div class="user_img">
										<img class="img-circle img-responsive" src="<?php echo base_url();?>webroot/buzzme/admin/images/group_icon.png"/>
								 <?php } ?>
                                </div> -->								 
							</div>
						</div>
                    </div>
                </div>
            </div>         
        </div>

 
    </section>