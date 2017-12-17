<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/contactus');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a></h2>
	                            
						<div class="user_detail body">
							<div class="row">
								<div class="col-sm-7">							   
									<div class="form-group form-float">
										<label class="col-sm-3">Name:</label>
										<div class="col-sm-9">
										   <?php echo $data['name']; ?>
										   
										</div>
									</div>
								 
									<div class="form-group form-float">
										<label class="col-sm-3">Message:</label>
										<div class="col-sm-9">
										  <?php echo $data['message']; ?>
											
										</div>
									</div>
							
								
									
									  <div class="form-group form-float">
										<label class="col-sm-3">Created:</label>
										<div class="col-sm-9">
										  <?php echo $data['created']; ?>
											
										</div>
									</div>

									
									
								 <!--<div class="col-sm-5">
								 
										 <?php if(!empty($user['image'])){ ?>
								 
										<div class="user_img">
										<img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/buzzme/user/<?php echo $user['image']; ?>"/>
									  
									</div>
								
								 <?php } ?>
                                </div>--> 								 
							</div>
						</div>
                    </div>
                </div>
            </div>         
        </div>

 
    </section>