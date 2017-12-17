    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                 <a href="<?php echo site_url('admin/catring/add');?>"><button type="button" class="btn bg-red waves-effect- pull-right">Add</button></a>  
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
                                       <th>Hotel</th>
                                   
                                      <th> Name In English</th>
                                      <th> Name In Arabic</th>
                                      <th> Location In English</th>
                                     <th> Location In Arabic</th>
                                     <th>Phone</th>
                                    <th>Action</th>
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($datas as $data){ 
                                $hotel = $this->Common_model->get_data_by_id('hotels','id',$data['hotel_id']);
                                    ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                      <td><?php echo $hotel['name']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                          <td><?php echo $data['name1']; ?></td>
                                        <td><?php echo $data['location']; ?></td>
                                          <td><?php echo $data['location1']; ?></td>
                                          <td><?php echo $data['phone']; ?></td>
                                       
                                         <td><a href="<?php echo site_url();?>admin/catring/edit/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/edit.png" height="25"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/catring/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
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
