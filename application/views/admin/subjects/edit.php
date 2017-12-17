<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/subject');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a> </h2>
                        
                        </div>
						
				
                        <div class="body"> 
                            <form id="form_validation" method="POST" enctype="multipart/form-data">

                            <div class="form-group form-float">
                            <label>class</label>
                                    <div class="form-line">
                                <select class="form-control" name ="class_id" required> 
                                  <option value="" disabled selected>Choose your class</option>
                                  <?php foreach($classes as $class){ ?>
                                  <option <?php if($class['id'] == $data['class_id']){ echo 'selected';} ?> value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                                <div class="form-group form-float">
                                <label>Name</label>
                                    <div class="form-line">

                                        <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>
                                       
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