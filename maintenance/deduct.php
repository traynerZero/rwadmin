<?php

include "func/config.php";
include "func/dbconnect.php";

?>
<div style="margin-left: 20px; padding: 10px; height: 100%;">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<a href="<?php echo modal_url();?>deduct/add.php" role="tab"data-target="#theModal" data-toggle="modal" class="btn btn-success"><span class="fa fa-plus"></span> Add Deduction</a>
<br>
<br>
<table id="table" class="table table-hover table-bordered">
	<thead class="bg-red">
		<th>Name</th>
    <th>Amount</th>
    <th>Type</th>
    <th>Description</th>
		<th>Area</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php

      $sql = "SELECT * FROM tbl_deduct";
      $result = mysqli_query($con,$sql);
      while($data = mysqli_fetch_assoc($result)){
      	if($data['dc_status'] == 1)
      {
      	$status = "Active";
      
      ?>
		<tr>
			<td><?php echo $data['dc_name']; ?></td>
			<td><?php echo $data['dc_amount']; ?></td>
      <td><?php echo $data['dc_type']; ?></td>
      <td><?php echo $data['dc_desc']; ?></td>
			<td><?php echo $status; ?></td>
			<td>
				<button class="btn btn-danger" onclick="ajaxCon('delete','<?php echo $data['dc_id']; ?>')"  title="Delete"><span class="fa fa-trash-o"></span></button>
				<button class="btn btn-info" href="<?php echo modal_url();?>deduct/edit.php?id=<?php echo $data['dc_id']; ?>" role="tab"data-target="#theModal" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span></button>
			</td>
		</tr>
		<?php
    }
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

  $('#theModal').on('shown.bs.modal',function(){
    
    $('#dtype').on('change',function(){
            if($(this).val() == 1){
              $('.disc').append('<label>Amount:</label><div class="input-group "><div class="input-group-addon"><label>%</label></div><input class="form-control" type="number" name="amount" required></div>');
              $('.vouch').html('');
              $('.disc').show('blind');
              $('.vouch').hide('blind');

        }else{
              $('.vouch').append('<label>Amount:</label><div class="input-group "><div class="input-group-addon"><select style="width: 50px; border:none;"><option>%</option><option>&#8369;</option></select></div><input class="form-control" type="text" name="amount" required></div>');
              $('.disc').html('');
              $('.disc').hide('blind');
              $('.vouch').show('blind');
            }
          });

  });

  function ajaxCon(action_,object)
    {
      if(action_ == "delete"){
        var conf = confirm("Are you sure?");
        if(conf){

        $.ajax({
      type: 'POST',
      url: '<?php echo modal_url();?>deduct/connect.php',
      data: {action: action_ , data: object}, // you can use as much as data you want to send,
      success: function(response) {
        alert(response);
        location.reload();
      }
      });
      }

      }else{
      var dataObject = {
        aname : object.aname.value,
        acode : object.acode.value,
      };
      
      
      // dataObject = JSON.stringify(dataObject);
      $.ajax({
      type: 'POST',
      url: '<?php echo modal_url();?>deduct/connect.php',
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