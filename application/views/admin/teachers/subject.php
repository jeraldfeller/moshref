 <div class="form-group form-float" id="subcat">
                                    <div class="form-line">
                                <select class="form-control" name ="subject_id" required>
                                  <option value="" disabled selected>Choose your subject</option>
                                  <?php foreach($subjects as $subject){ ?>
                                  <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                                  <?php } ?>
                                  
                                </select>
                               
                              </div>
                                </div>