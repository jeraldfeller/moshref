<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Profile</h2>
                          
                        </div>
						<?php if($this->session->flashdata('message')){ ?>
						 <div class="alert alert-success">
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
						<?php } ?>
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" value="<?php echo $admin['username']; ?>" required>
                                       
                                    </div>
                                </div>
                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" value="<?php echo $admin['email']; ?>" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $admin['phone']; ?>" required>
                                        
                                    </div>
                                </div>
                             <div class="form-group form-float">
                                    <div class="form-line">
                                    <input name="image" type="file" multiple />
                                </div>
                             </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
          
        </div>
    </section>