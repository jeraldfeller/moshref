    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                  <a href="<?php echo site_url('admin/moshref/add');?>"><button type="button" class="btn bg-red waves-effect- pull-right">Add</button></a>  
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
                                       <th>Phone</th>
                                        <th>Email</th>
                                       <th>Image</th>
										<th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
								<?php 
								$i=1;
								foreach($datas as $data){ ?>
                                    <tr>
									<td><?php echo $i; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                       
                                        <td><?php echo $data['phone']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                      <?php if(!empty($user['image'])){ ?>
                                        <td><img  width="65px" clas="img-responsive" src="<?php echo base_url();?>uploads/user/<?php echo $user['image']; ?>"/></td>
                                        <?php }else{ ?>
                                        <td><img  width="100px" height="100px" clas="img-responsive" src="<?php echo base_url();?>webroot/admin/images/user_icon.png"/></td>
                                        <?php } ?>
										 
										 <td><a href="<?php echo site_url();?>admin/moshref/edit/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/edit.png" height="30"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/moshref/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
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
