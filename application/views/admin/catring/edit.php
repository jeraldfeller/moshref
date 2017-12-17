<style type="text/css">
    
.ctr-outer {
    display: flex;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    justify-content: left;
    -webkit-justify-content: left;
    flex-wrap: wrap;
    -webkit-flex-wrap: wrap;

}
.ctr-inn {    
    width: 120px;    
    height: 120px;
    margin: 15px;
    position: relative;
}
.ctr-inn img {   
 width: 100%;    
 height: 100%;
}
span.red-cr {    position: absolute;    
    top: 10px;    
    right: 3px;    
    font-size: 20px;    
    line-height: 0;    
    color: #f00;    
    cursor: pointer;    
    font-weight: 600;
}
</style>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $title; ?>  <a href="<?php echo site_url('admin/catring');?>"><button type="button" class="btn bg-red waves-effect- pull-right">GO BACK</button></a> </h2>
                        
                        </div>
						
				
                        <div class="body col-md-6 col-sm-6 col-xs-12">
                          <?php if($this->session->flashdata('message')){ ?>
             <div class="alert alert-success">
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
            <?php } ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">

                             <!--<div class="form-group form-float">
                            <label>Hotel</label>
                                
                                  <div class="form-line">
                                 <select class="form-control" name ="hotel_id" required>
                                  <option value="" disabled selected>Choose your hotel</option>
                                  <?php foreach($hotels as $hotel){ ?>
                                  <option <?php if($data['hotel_id'] == $hotel['id']){ echo 'selected';} ?>  value="<?php echo $hotel['id']; ?>"><?php echo $hotel['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                              </div>-->
                              <div class="form-group form-float">
                                <label>Name In English</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>" placeholder="enter name in english" required>
                                       
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                 <label>Name In Arabic</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name1" value="<?php echo $data['name1'];?>" placeholder="enter name in arebic" required>
                                       
                                    </div>
                                </div>

                                 <div class="form-group form-float">
                                <label>Loction In English</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location" id="locationss" value="<?php echo $data['location'];?>" placeholder="enter location in english" required>
                                       
                                    </div>
                               </div>
                                 <div class="form-group form-float">
                                 <label>Loction In Arabic</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location1" id="location1" value="<?php echo $data['location1'];?>" placeholder="enter location in arebic" required>
                                       
                                    </div>
                                </div>
                              <div class="form-group form-float">
                                 <label>Phone Number</label>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="phone" value="<?php echo $data['phone'];?>" placeholder="enter phone number" required>
                                       
                                    </div>
                                </div>
                             
                               <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                    <input name="image[]" type="file" multiple />
                                </div>
                             </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if($this->session->flashdata('image_message')){ ?>
             <div class="alert alert-success">
                              <?php echo $this->session->flashdata('image_message'); ?>
                            </div>
            <?php } ?>
                        <div class="ctr-outer">

<?php foreach($catring as $catrings){ ?>
<div class="ctr-inn">
<img src="<?php echo base_url();?>uploads/catring/<?php echo $catrings['image'];?>">
<a onclick="return confirm('Are you sure want to delete it? ');" href="<?php echo site_url();?>admin/catring/delete_images/<?php  echo $catrings['id']; ?>/<?php  echo $data['id']; ?>"><span class="red-cr">x</span></a>

</div>
<?php } ?>



</div>
                        </div>
                        <div class="clearfix"></div>

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