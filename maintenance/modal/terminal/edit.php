<?php
include "../../func/dbconnect.php";
session_start();

$id = $_GET['id'];
$_SESSION['editid'] = $id;

$sql = "SELECT *, tbl_terminal.term_area as areaid,tbl_area.area_name as area FROM tbl_terminal,tbl_area where tbl_terminal.term_area = tbl_area.area_id and term_id = '$id'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
?>

<div class="modal-header">
        <h3 class="modal-title">Edit Terminal</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('edit',this)">
      <div class="modal-body">
          <label>
          Terminal Name:
          </label>
          <input class="form-control" value="<?php echo $data['term_name']; ?>" type="text" name="tname" required>
        
          <label>
          Terminal IP Address:
          </label>
          <input class="form-control" value="<?php echo $data['term_ip']; ?>" type="text" name="tip" required>
          
          <label>
            Area:
          </label>
          <select class="form-control" name="tarea">
             <option selected="selected" value="<?php echo $data['areaid'];?>"><?php echo $data['area'];?></option>
            <?php
              $sql = "SELECT * FROM tbl_area where area_status = 1";
              $result = mysqli_query($con,$sql);
              while ($data1 = mysqli_fetch_assoc($result)) {
                # code...
                if($data1['area_id'] != $data['areaid']){
                ?>
                <option value="<?php echo $data1['area_id']; ?>"><?php echo $data1['area_name']; ?></option>
                <?php
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