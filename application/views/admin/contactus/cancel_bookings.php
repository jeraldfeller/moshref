    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                            </h2>
                           
                        </div>
                        <div class="body">
							<?php if($this->session->flashdata('message')){ ?>
						 <div class="alert alert-success">
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
						<?php } ?>
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
									 <th>Sr No</th>
                                        <th>Transaction Id</th>
                                        <th>Chalet</th>
                                        <th>User</th>
                                        <th>hotel</th>
                                         <th>Amount</th>
                                         <th>Status</th>
                                        <th>Created</th>                                  
										
										<th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
								<?php 
								$i=1;
								foreach($bookings as $booking){ ?>
                                    <tr>
									<td><?php echo $i; ?></td>
                                        <td><?php echo substr($booking['booking_id'],0,15); ?>....</td>
                                        <td><?php echo $booking['chalet_name']; ?></td>
                                        <td><?php echo $booking['user_name']; ?></td>
                                        <td><?php echo $booking['name']; ?></td>
                                         <td><?php echo $booking['current_price']; ?></td>
                                        
                                          <?php if($booking['booking_status'] == '0'){ ?>
                                        <td style="color:green;">Booked</td>
                                         <?php } else{ ?>  
                                        <td style="color:red;">Canceled</td>
                                         <?php } ?>
                                          <td><?php echo $booking['created']; ?></td>
                                          
										 <td><a href="<?php echo site_url();?>admin/bookings/cancel_booking_detail/<?php  echo $booking['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/view.png" height="30"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/bookings/delete/<?php  echo $booking['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
                                    </tr>
								<?php $i++; } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
