    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                 <a href="<?php echo site_url('admin/teachers/add');?>"><button type="button" class="btn bg-red waves-effect- pull-right">Add</button></a>  
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
                                      <th>School Name</th>
                                      <th>Leader Name</th>
                                      <th>Class Name</th>
                                      <th>Subject Name</th>
                                      <th>Teacher Name</th>
                                      <th>Phone</th>
                                   
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
                                <?php 
                                $i=1;
                               foreach($datas as $data){ 
                               $school = $this->Common_model->get_data_by_id('schools','id', $data['school_id']); 
                               $class = $this->Common_model->get_data_by_id('classes','id', $data['class_id']); 
                               $leader = $this->Common_model->get_data_by_id('users','id', $data['leader_id']); 
                               $subject = $this->Common_model->get_data_by_id('subjects','id', $data['subject_id']);
                                    ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
            
                                        <td><?php echo $school['name']; ?></td>
                                         <td><?php echo $leader['name']; ?></td>
                                         <td><?php echo $class['name']; ?></td>
                                          <td><?php echo $subject['name']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['phone']; ?></td>
                                    
                                     
                                         <td><a href="<?php echo site_url();?>admin/teachers/edit/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/edit.png" height="25"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/teachers/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
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
