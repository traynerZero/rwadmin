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
        <h3 class="modal-title">Edit Area</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('edit',this)">
      <div class="modal-body">
          <label>
          Area Name:
          </label>
          <input class="form-control" type="text" name="aname" value="<?php echo $data['area_name']; ?>" required>
        
          <label>
          Area Code:
          </label>
          <input class="form-control" type="text" value="<?php echo $data['area_code']; ?>" name="acode" required>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>