  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
   <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">   
   <script langauage="javascript">
      function showMessage(value){
         document.getElementById("message").innerHTML = value;
      }   
   </script>

<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?> <a href="<?php echo site_url('admin/teachers');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a></h2>
                          
                        </div>
						
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                         <div class="form-group form-float">
                                <label>City</label>
                                    <div class="form-line">
                                <select class="form-control" name ="city" id="city" required>
                                  <option value="" disabled selected>Choose your city</option>
                                  <?php foreach($city as $citys){ ?>
                                  <option value="<?php echo $citys['city']; ?>"><?php echo $citys['city']; ?></option>
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
                                  <option value="<?php echo $levels['level']; ?>"><?php echo $levels['level']; ?></option>
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
                                  <option value="<?php echo $genders['gender']; ?>"><?php echo $genders['gender']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                            <div class="form-group form-float" id="schoolss">
                            <label>School</label>
                                    <div class="form-line">
                                <select class="form-control" id="school_id" name ="school_id" required>
                                  <option value="" disabled selected>Choose your school</option>
                                
                                </select>
                               
                              </div>
                                </div>
                                    <div class="form-group form-float">
                                      <label>Leaders</label>
                                    <div class="form-line">
                                <select class="form-control" name ="leader_id" required>
                                  <option value="" disabled selected>Choose your leader</option>
                                  <?php foreach($leaders as $leader){ ?>
                                  <option value="<?php echo $leader['id']; ?>"><?php echo $leader['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>
                                 <div class="form-group form-float">
                                   <label>Classes</label>
                                    <div class="form-line">
                                  <select class="form-control" name ="class_id" id="class_id" required>
                                  <option value="" disabled selected>Choose your class</option>
                                  <?php foreach($classes as $class){ ?>
                                  <option   value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                                </div>
                                </div>
                                 <div class="form-group form-float" id="subject">
                                   <label>subjects</label>
                                    <div class="form-line">
                                  <select class="form-control" name ="subject_id" required>
                                  <option value="" disabled selected>Choose your subject</option>
                                  <?php foreach($subjects as $subject){ ?>
                                  <option   value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                                </div>
                                </div>
                              <div class="form-group form-float">
                                <label>Teacher Name</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" placeholder="enter teacher name" required>
                                       
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <label>Teacher Phone</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control"  name="phone" placeholder="enter teacher phone" required>
                                       
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
           <script>          
$(document).ready(function(){              
  $('#class_id').change(function(){ 
 // alert('asd');              
    var id= $("#class_id").val();               
       
    $.ajax({type :  'POST',                   
            url  : '<?php echo site_url();?>admin/teachers/get_subject',                
            data :  {id : id},                              
            success: function(result){                  
              if(result){  
               $('#subject').html(result);

              }
                                                     
                }              
                });             
                });
                         
                });
              </script>


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
  
 