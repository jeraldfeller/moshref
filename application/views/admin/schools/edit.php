


    <section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/schools');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a> </h2>
                        
                        </div>
						
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                 <label>School Name</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>
                                       
                                    </div>
                                </div>
                                  <div class="form-group form-float">
                                <label>Gender</label>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="gender" value="<?php echo $data['gender']; ?>" placeholder="enter gender" required>
                                       
                                    </div>
                                </div>
                                  <div class="form-group form-float">
                                <label>Level</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="level" value="<?php echo $data['level']; ?>" placeholder="enter level" required>
                                       
                                    </div>
                                </div>
                                   <div class="form-group form-float">
                                <label>Area</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="city" value="<?php echo $data['city']; ?>" placeholder="enter Area" required>
                                       
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                 <label>School Image</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="image">
                                       
                                    </div>
                                </div>
                           
                               <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                             
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
          
        </div>
    </section>