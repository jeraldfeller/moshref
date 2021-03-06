    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                 <a href="<?php echo site_url('admin/amenties/add');?>"><button type="button" class="btn bg-red waves-effect- pull-right">Add</button></a>  
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
                                      <th> Name In English</th>
                                      <th> Name In Arebic</th>
                                      <th> Icon</th>
                                     
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($datas as $data){ 
                                
                                    ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
            
                                        <td><?php echo $data['name']; ?></td>
                                          <td><?php echo $data['name1']; ?></td>
                                     <td><img style="background-color: black;" width="65px" clas="img-responsive" src="<?php echo base_url();?>uploads/amenties/<?php echo $data['image']; ?>"/></td>
                                    
                                         <td><a href="<?php echo site_url();?>admin/amenties/edit/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/edit.png" height="25"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/amenties/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
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
