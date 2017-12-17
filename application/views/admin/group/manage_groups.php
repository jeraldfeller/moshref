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
                                        <th>Group Name</th>
                                        <th>Group Image</th>                                  
										<th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
								<?php 
								$i=1;
								foreach($groups as $group){ ?>
                                    <tr>
									<td><?php echo $i; ?></td>
                                        <td><?php echo $group['group_name']; ?></td>
                                        <?php if(!empty($group['group_image'])){ ?>
                                        <td><img  width="65px" clas="img-responsive" src="<?php echo base_url();?>uploads/buzzme/group/<?php echo $group['group_image']; ?>"/></td>
                                        <?php }else{ ?>
                                        <td><img  width="65px" clas="img-responsive" src="<?php echo base_url();?>webroot/buzzme/admin/images/group_icon.png"/></td>
                                        <?php } ?>
										 <td><a href="<?php echo base_url();?>index.php/buzzme/admin/groups/view/<?php  echo $group['id']; ?>"><img src="<?php echo base_url();?>webroot/buzzme/admin/images/view.png" height="30"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo base_url();?>index.php/buzzme/admin/groups/delete/<?php  echo $group['id']; ?>"><img src="<?php echo base_url();?>webroot/buzzme/admin/images/delete.png" height="20"/></td>
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
