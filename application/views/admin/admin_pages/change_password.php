<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Change Password</h2>
                          
                        </div>
						<?php if($this->session->flashdata('message')){ ?>
						 <div class="alert alert-success">
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
						<?php } ?>
				     <?php if($this->session->flashdata('error')){ ?>
						
							 <div class="alert alert-danger">
                             <?php echo $this->session->flashdata('error'); ?>
                            </div>
						<?php } ?>
                        <div class="body">
                            <form id="change_password" method="POST" enctype="multipart/form-data" >
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="old_password" id="old_password" required>
                                          <label class="form-label">Old Password</label>
                                    </div>
                                </div>
                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="new_password" id="new_password" required>  
                                  <label class="form-label">New Password</label>										
                                    </div>
                                </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>  
                                  <label class="form-label">Confirm Password </label>										
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
	 <script>$("#change_password").validate({	rules: 	{		"old_password": "required",		"new_password": "required",	"confirm_password": {
				required: true,
				equalTo: "#new_password"
			},	
	},	messages: 	{		"old_password": { required:"Enter your current password"},		"new_password": { required:"Enter your new password"},		"confirm_password": { required:"Confirm new password"}, equalTo: "Password must be equal"	}});
</script>