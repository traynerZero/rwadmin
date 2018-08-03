<?php
include "../../func/dbconnect.php";
session_start();

$id = $_GET['id'];
$_SESSION['editid'] = $id;

$sql = "SELECT * FROM tbl_area where area_id = '$id'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
?>

<div class="modal-header">
        <h3 class="modal-title">Add Deduction</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
          <label>
          Name:
          </label>
          <input class="form-control" type="text" name="dname" required>
          
          <label>
          Type:
          </label>
          <select class="form-control" id="dtype" name="dtype">
            <option selected="selected" disabled>Choose option</option>
            <option value="1">Discount</option>
            <option value="2">Voucher</option>
          </select>
          <div class="disc" style="display: none;">
          
          </div>
          <div class="vouch" style="display: none;">
            
        </div>

        <label>
          Area:
        </label>
        <select class="form-control" name="darea">
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

        <label>
          Description:
        </label>
        <textarea class="form-control" name="ddesc"></textarea>
          
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>