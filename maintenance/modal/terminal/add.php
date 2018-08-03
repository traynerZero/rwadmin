
<div class="modal-header">
        <h3 class="modal-title">Add Terminal</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
          <label>
          Terminal Name:
          </label>
          <input class="form-control" type="text" name="tname" required>
        
          <label>
          Terminal IP Address:
          </label>
          <input class="form-control" type="text" name="tip" required>
          
          <label>
            Area:
          </label>
          <select class="form-control" name="tarea">
            <option selected="selected" disabled>Choose option</option>
            <?php

            include "../../func/dbconnect.php";

            $sql = "SELECT * FROM tbl_area";
            $result = mysqli_query($con,$sql);
            if($result){
              while($data = mysqli_fetch_assoc($result)){
                if($data['area_status'] == 1){
            ?>
              <option value="<?php echo $data['area_id']; ?>"><?php echo $data['area_name']; ?></option>
            <?php
            }
          }
        }
            ?>
          </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>