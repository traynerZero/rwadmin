<?php
include "../../func/dbconnect.php";
session_start();

$id = $_GET['id'];
$_SESSION['editid'] = $id;

$sql = "SELECT * FROM tbl_member where member_id = '$id'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="modal-header">
        <h3 class="modal-title">Edit Member Type</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('edit',this)">
      <div class="modal-body">
          <label>
          Member Type:
          </label>
          <input class="form-control" type="text" name="mname" value="<?php echo $data['member_type']; ?>" required>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>