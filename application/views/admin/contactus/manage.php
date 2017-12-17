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
                                        <th>Name</th>
                                      
                                        <th>Message</th>
                                       <th>Created</th>
										<th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
								<?php 
								$i=1;
								foreach($datas as $data){ ?>
                                    <tr>
									<td><?php echo $i; ?></td>
                                        <td><?php echo $data['name']; ?>....</td>
                                     
                                        <td><?php echo $data['message']; ?></td>
                                        <td><?php echo $data['created']; ?></td>
										 <td><a href="<?php echo site_url();?>admin/contactus/view/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/view.png" height="30"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/contactus/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
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
