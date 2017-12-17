
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?> <a href="<?php echo site_url('admin/catring');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a></h2>
                          
                        </div>
						
				
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                               
                                 <!--<div class="form-group form-float">
                                    <label>Hotel</label>
                                    <div class="form-line">
                                <select class="form-control" name ="hotel_id" required>
                                  <option value="" disabled selected>Choose your hotel</option>
                                  <?php foreach($hotels as $hotel){ ?>
                                  <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['name'] ; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>-->
                                 <div class="form-group form-float">
                                <label>Name In English</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" placeholder="enter name in english" required>
                                       
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                 <label>Name In Arabic</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name1" placeholder="enter name in arebic" required>
                                       
                                    </div>
                                </div>
                                
                                 <div class="form-group form-float">
                                <label>Loction In English</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location" id="locationss" placeholder="enter location in english" autocomplete="off" required>
                                       
                                    </div>
                                </div>
                               
                                <div class="clearfix"></div>
                                 <div class="form-group form-float">
                                 <label>Loction In Arabic</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location1" id="location1" placeholder="enter location in arebic" required>
                                       
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                              <div class="form-group form-float">
                                 <label>Phone Number</label>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="enter phone number" required>
                                       
                                    </div>
                                </div>
                               
                             <div class="form-group form-float">
                                    <div class="form-line">
                                    <input name="image[]" type="file" multiple required />
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
   
  

   <script

    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCTr1IxkHCOTyqF7CAFuutxntj-IkZeAVU&libraries=places"> 
    </script>
    <script type="text/javascript">
function initialize() {
  
var input = document.getElementById('locationss');
var autocomplete = new google.maps.places.Autocomplete(input);
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
 <script>
function initialize() {
  
var inputs = document.getElementById('location2');
var autocomplete = new google.maps.places.Autocomplete(inputs);
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
    