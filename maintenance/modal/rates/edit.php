<?php
include "../../func/dbconnect.php";
session_start();

$id = $_GET['id'];
$_SESSION['editid'] = $id;

$sql = "SELECT *,tbl_rate.member_type as mid, tbl_rate.area_id as areaid, tbl_area.area_name as area, tbl_member.member_type as member FROM tbl_rate,tbl_member,tbl_area where tbl_rate.member_type = tbl_member.member_id and tbl_rate.area_id = tbl_area.area_id and tbl_rate.rate_id = '$id'";
$result = mysqli_query($con,$sql);
$data1 = mysqli_fetch_assoc($result);
$mid = $data1['mid'];
?>
<div class="modal-header">
        <h3 class="modal-title">Edit Rates</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('edit',this)">
      <div class="modal-body">
        <div class="form-group">
          <label>
            Member Type:
          </label>
          <select class="form-control" name="membertype">
            <option selected="selected" value="<?php echo $data1['mid'];?>"><?php echo $data1['member'];?></option>
            <?php
              $sql = "SELECT * FROM tbl_member where member_status = 1";
              $result = mysqli_query($con,$sql);
              while ($data = mysqli_fetch_assoc($result)) {
                # code...
                if($data['member_id'] != $mid){
                ?>
                <option value="<?php echo $data['member_id']; ?>"><?php echo $data['member_type']; ?></option>
                <?php
                }
              }
            ?>
          </select>
          </div>
        
          <label>
          Rate Code:
          </label>
          <input class="form-control" value="<?php echo $data1['rate_code'];?>" type="text" name="rcode" required>
        
        <div class="form-group">
        <label>
          Area:
        </label>

          <select class="form-control" name="area">
            <option selected="selected" value="<?php echo $data1['areaid'];?>"><?php echo $data1['area'];?></option>
            <?php
              $sql = "SELECT * FROM tbl_area where area_status = 1";
              $result = mysqli_query($con,$sql);
              while ($data = mysqli_fetch_assoc($result)) {
                # code...
                if($data['area_id'] != $data1['areaid']){
                ?>
                <option value="<?php echo $data['area_id']; ?>"><?php echo $data['area_name']; ?></option>
                <?php
                }
              }
            ?>
          </select>
        </div>

            <div class="form-group">
            <label>Initial Charge:</label>
            <input type="number" class="form-control" value="<?php echo $data1['initcharge']; ?>" name="init" placeholder="Initial Charge">
            </div>
            <div class="form-group">
            <label>Succeeding Charge:</label>
            <input type="number" class="form-control" value="<?php echo $data1['succharge']; ?>" name="succ" placeholder="Succeeding Charge">
            </div>
            <div class="form-group">
            <label>Overnight Charge:</label>
            <input type="number" class="form-control" value="<?php echo $data1['oncharge']; ?>" name="onight" placeholder="Overnight Charge">
            </div>
            <div class="form-group">
            <label>Lost/Damage Charge:</label>
            <input type="number" class="form-control" value="<?php echo $data1['lostcharge']; ?>" name="lost" placeholder="Lost/Damage Charge">
            </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>