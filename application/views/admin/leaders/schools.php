  
   <div class="form-group form-float" id="schoolss">
                            <label>School</label>
                                    <div class="form-line">
   <select class="form-control" id="school_id" name ="school_id" required>
                                <option value="">Choose your school</option>
                             <?php foreach($schools as $school){ ?>
                             <option value="<?php echo $school['id']; ?>"><?php echo $school['name']; ?></option>
                          <?php } ?>
                            </select>
                        </div>
                    </div>
                  