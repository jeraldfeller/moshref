<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/bookings');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a></h2>
	                            
						<div class="user_detail body">
							<div class="row">
								<div class="col-sm-7">							   
									<div class="form-group form-float">
										<label class="col-sm-3">Transaction Id:</label>
										<div class="col-sm-9">
										   <?php echo $booking['booking_id']; ?>
										   
										</div>
									</div>
								 
									<div class="form-group form-float">
										<label class="col-sm-3">Chalet:</label>
										<div class="col-sm-9">
										  <?php echo $booking['chalet_name']; ?>
											
										</div>
									</div>
							
								
									
									  <div class="form-group form-float">
										<label class="col-sm-3">User:</label>
										<div class="col-sm-9">
										  <?php echo $booking['user_name']; ?>
											
										</div>
									</div>
									  <div class="form-group form-float">
										<label class="col-sm-3">User Phone:</label>
										<div class="col-sm-9">
										  <?php echo $booking['user_phone']; ?>
											
										</div>
									</div>

									<div class="form-group form-float">
										<label class="col-sm-3">Hotel:</label>
										<div class="col-sm-9">
										  <?php echo $booking['name']; ?>
											
										</div>
									</div>

									<div class="form-group form-float">
										<label class="col-sm-3">Amount:</label>
										<div class="col-sm-9">
										  <?php echo $booking['current_price']; ?>
											
										</div>
									</div>
									<div class="form-group form-float">
										<label class="col-sm-3">Status:</label>
										 <?php if($booking['booking_status'] == '0'){ ?>
                                       <div class="col-sm-9" style="color: green;">
										  <?php echo 'Booked'; ?>
											
										</div>
                                         <?php } else{ ?>  
                                        <div class="col-sm-9" style="color: red;">
										  <?php echo 'Canceled'; ?>
											
										</div>
                                         <?php } ?>
									</div>

									<div class="form-group form-float">
										<label class="col-sm-3">Created:</label>
										<div class="col-sm-9">
										  <?php echo $booking['created']; ?>
											
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