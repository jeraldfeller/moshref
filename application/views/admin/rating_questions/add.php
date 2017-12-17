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
                            <h2><?php echo $title; ?> <a href="<?php echo site_url('admin/rating_questions');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a></h2>
                          
                        </div>
						
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                     
                              <div class="form-group form-float">
                                <label>Question</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="question" placeholder="enter question" required>
                                       
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
      
 