<?php
include "../../func/dbconnect.php";
?>
<div class="modal-header">
        <h3 class="modal-title">Add User</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
        <div class="form-group">
          <label>
            Member Type:
          </label>
          <select class="form-control" name="membertype">
            <option selected="selected" disabled>Choose option</option>
            <?php
              $sql = "SELECT * FROM tbl_member where member_status = 1";
              $result = mysqli_query($con,$sql);
              while ($data = mysqli_fetch_assoc($result)) {
                # code...
                ?>
                <option value="<?php echo $data['member_id']; ?>"><?php echo $data['member_type']; ?></option>
                <?php
              }
            ?>
          </select>
          </div>
        
          <label>
          Rate Code:
          </label>
          <input class="form-control" type="text" name="rcode" required>
        
        <div class="form-group">
        <label>
          Area:
        </label>

          <select class="form-control" name="area">
            <option selected="selected" disabled>Choose option</option>
            <?php
              $sql = "SELECT * FROM tbl_area where area_status = 1";
              $result = mysqli_query($con,$sql);
              while ($data = mysqli_fetch_assoc($result)) {
                # code...
                ?>
                <option value="<?php echo $data['area_id']; ?>"><?php echo $data['area_name']; ?></option>
                <?php
              }
            ?>
          </select>
        </div>

            <div class="form-group">
            <label>Initial Charge:</label>
            <input type="number" class="form-control" name="init" placeholder="Initial Charge">
            </div>
            <div class="form-group">
            <label>Succeeding Charge:</label>
            <input type="number" class="form-control" name="succ" placeholder="Succeeding Charge">
            </div>
            <div class="form-group">
            <label>Overnight Charge:</label>
            <input type="number" class="form-control" name="onight" placeholder="Overnight Charge">
            </div>
            <div class="form-group">
            <label>Lost/Damage Charge:</label>
            <input type="number" class="form-control" name="lost" placeholder="Lost/Damage Charge">
            </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>