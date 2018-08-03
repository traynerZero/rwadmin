<?php
  include "../../func/dbconnect.php";
  $id = $_GET['cid'];
  $sql = "SELECT initcharge,succharge,oncharge,lostcharge from tbl_rate where rate_id = '$id'";
  $result = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($result);

?>
    <form action='sessionDestroy()'> 
    <div class="modal-header">
        <h3 class="modal-title">Charges</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered">
          <tbody>
            <tr>
              <td>Inital Charge</td>
              <td><?php echo $data['initcharge']; ?></td>
            </tr>

            <tr>
              <td>Succeeding Charge</td>
              <td><?php echo $data['succharge']; ?></td>
            </tr>

            <tr>
              <td>Overnight Charge</td>
              <td><?php echo $data['oncharge']; ?></td>
            </tr>

            <tr>
              <td>Lost/Damaged Charge</td>
              <td><?php echo $data['lostcharge']; ?></td>
            </tr>
          </tbody>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
      </div>
      </form>