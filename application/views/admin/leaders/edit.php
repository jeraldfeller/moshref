


    <section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/leaders');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a> </h2>
                        
                        </div>
						
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                              <div class="form-group form-float">
                                <label>City</label>
                                    <div class="form-line">
                                <select class="form-control" name ="city" id="city" required>
                                  <option value="" disabled selected>Choose your city</option>
                                  <?php foreach($city as $citys){ ?>
                                  <option <?php if($school_det['city'] == $citys['city']){ echo 'selected';} ?> value="<?php echo $citys['city']; ?>"><?php echo $citys['city']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                                 <div class="form-group form-float">
                            <label>Level</label>
                                    <div class="form-line">
                                <select class="form-control" name ="level" id="level" required>
                                  <option value="" disabled selected>Choose your level</option>
                                  <?php foreach($level as $levels){ ?>
                                  <option <?php if($school_det['level'] == $levels['level']){ echo 'selected';} ?> value="<?php echo $levels['level']; ?>"><?php echo $levels['level']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                                 <div class="form-group form-float">
                            <label>Gender</label>
                                    <div class="form-line">
                                <select class="form-control" name ="gender" id="gender" required>
                                  <option value="" disabled selected>Choose your gender</option>
                                  <?php foreach($gender as $genders){ ?>
                                  <option <?php if($school_det['gender'] == $genders['gender']){ echo 'selected';} ?> value="<?php echo $genders['gender']; ?>"><?php echo $genders['gender']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                                <div class="form-group form-float" id="schoolss">
                            <label>School</label>
                                    <div class="form-line">
                                <select class="form-control" name ="school_id" required> 
                                  <option value="" disabled selected>Choose your school</option>
                                  <?php foreach($schools as $school){ ?>
                                  <option <?php if($school['id'] == $data['school_id']){ echo 'selected';} ?> value="<?php echo $school['id']; ?>"><?php echo $school['name']; ?></option>
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
                                  <div class="form-group form-float">
                                 <label>Email</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
                                       
                                    </div>
                                </div>
                                  <div class="form-group form-float">
                                 <label>Phone</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" required>
                                       
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
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
       <script>          
$(document).ready(function(){              
  $('#gender').change(function(){    
  //alert('asd');            
    var level= $("#level").val();
    var city= $("#city").val();
    var gender= $("#gender").val();                 
       
    $.ajax({type :  'POST',                   
            url  : '<?php echo base_url();?>index.php/admin/leaders/get_schools',                
            data :  {level:level,city:city,gender:gender},                              
            success: function(result){                  
              if(result){  
                //alert(result);
               $('#schoolss').replaceWith(result);

              }
                                                     
                }              
                });             
                });
                         
                });            </script>