    <style type="text/css">
        ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
    </style>
    <section class="content">
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title; ?>
                                  <a href="<?php echo site_url('admin/schools/add');?>"><button type="button" class="btn bg-red waves-effect- pull-right">Add</button></a>  
                            </h2>

                           
                        </div>
                        <div class="body">
							<?php if($this->session->flashdata('message')){ ?>
						 <div class="alert alert-success">
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
						<?php } ?>
                            <table class="table">
                                <thead>
                                    <tr>
									 <th>Sr No</th>
                                        <th>Name</th>
                                        
                                         <th>Area</th>
                                         <th>Gender</th>
                                         <th>Level</th>
                                         <th>Image</th>
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
                                        <td><?php echo $data['city']; ?></td>
                                        <td><?php echo $data['gender']; ?></td>
                                        <td><?php echo $data['level']; ?></td>
                                         <td><img  width="65px" clas="img-responsive" src="<?php echo base_url();?>uploads/schools/<?php echo $data['image']; ?>"/></td>
										 <td><a href="<?php echo site_url();?>admin/schools/edit/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/edit.png" height="30"/></a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/schools/delete/<?php  echo $data['id']; ?>"><img src="<?php echo base_url();?>webroot/admin/images/delete.png" height="20"/></td>
                                    </tr>
								<?php $i++; } ?>
                                </tbody>
                            </table>
                          
                    </div>

<div class="pagination">
                <?php generate_pagination($total_rows, $url, $limit, $page, $extraparams); ?>
            </div>

                        </div>
                </div>

            </div>
            <!-- #END# Exportable Table -->

        </div>
    </section>
