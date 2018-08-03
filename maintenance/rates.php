<?php

include "func/config.php";
include "func/dbconnect.php";
?>
<div style="margin-left: 20px; padding: 10px; height: 100%;">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<a href="<?php echo modal_url();?>rates/add.php" role="tab"data-target="#theModal" data-toggle="modal" class="btn btn-success"><span class="fa fa-plus"></span> Add Rates</a>
<br>
<br>
<br>
<table id="table" class="table table-hover table-bordered">
	<thead class="bg-red">
		<th>Member Type</th>
		<th>Code</th>
		<th>Area</th>
		<th>Charges</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php

      
      $sql = "SELECT *, tbl_area.area_name as area, tbl_member.member_type as member FROM tbl_rate,tbl_member,tbl_area where tbl_rate.member_type = tbl_member.member_id and tbl_rate.area_id = tbl_area.area_id";
      $result = mysqli_query($con,$sql);
      if($result){
      while($data = mysqli_fetch_assoc($result)){
      


      if($data['rate_status'] == 1)
      {
      	$status = "Active";
      ?>
		<tr>
			<td><?php echo $data['member']; ?></td>
			<td><?php echo $data['rate_code']; ?></td>
			<td><?php echo $data['area']; ?></td>
			<td><button style="width: 100%;" class="btn btn-warning" href="<?php echo modal_url();?>rates/charge.php?cid=<?php echo $data['rate_id']; ?>" role="tab"data-target="#theModal" data-toggle="modal" title="Edit">Charges</button></td>
			<td><?php echo $status; ?></td>
			<td>
				<button class="btn btn-danger" onclick="ajaxCon('delete','<?php echo $data['rate_id']; ?>')"  title="Delete"><span class="fa fa-trash-o"></span></button>
				<button class="btn btn-info" href="<?php echo modal_url();?>rates/edit.php?id=<?php echo $data['rate_id']; ?>" role="tab"data-target="#theModal" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span></button>
			</td>
		</tr>
		<?php
    }
		}
	}else{
		echo mysqli_error($con);
	}
		?>
	</tbody>
</table>

<div class="modal fade" id="theModal">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-content clearable-content">
              <div class="modal-body">

              </div>
            </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#table').DataTable();
});

  $(document).on('hidden.bs.modal', function (e) {
          var target = $(e.target);
          target.removeData('bs.modal')
          .find(".clearable-content").html('');
        });

  function ajaxCon(action_,object)
    {
      if(action_ == "delete"){
        var conf = confirm("Are you sure?");
        if(conf){

        $.ajax({
      type: 'POST',
      url: '<?php echo modal_url();?>rates/connect.php',
      data: {action: action_ , data: object}, // you can use as much as data you want to send,
      success: function(response) {
        alert(response);
        location.reload();
      }
      });
      }

      }else{
      var dataObject = {
        mtype : object.membertype.value,
        rcode : object.rcode.value,
        area : object.area.value,
        incharge : object.init.value,
        scharge : object.succ.value,
        ocharge : object.onight.value,
        lcharge : object.lost.value
      };
      
      // dataObject = JSON.stringify(dataObject);
      $.ajax({
      type: 'POST',
      url: '<?php echo modal_url();?>rates/connect.php',
      data: {action: action_ , data : dataObject}, // you can use as much as data you want to send,
      success: function(response) {
        alert(response);
        location.reload();
      }
      });
      }

    }
</script>
</div>