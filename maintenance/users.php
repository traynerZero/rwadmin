<?php

include "func/config.php";
include "func/dbconnect.php";
?>
<div style="margin-left: 20px; padding: 10px; height: 100%;">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<a href="<?php echo modal_url();?>user/add.php" role="tab"data-target="#theModal" data-toggle="modal" class="btn btn-success"><span class="fa fa-plus"></span> Add User</a>
<br>
<br>

<table id="table" class="table table-hover table-bordered">
	<thead class="bg-red">
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username</th>
		<th>Level</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php

      
      $sql = "SELECT * FROM tbl_user";
      $result = mysqli_query($con,$sql);
      if($result){
      while($data = mysqli_fetch_assoc($result)){
      $level = "";

      if($data['userlevel'] == 1)
      {
      $level = "Admin";
      }
      else if($data['userlevel'] == 2)
      {
      $level = "Cashier";
      }
      else if($data['userlevel'] == 3)
      {
      	$level = "Vallet";
      }

      if($data['status'] == 1)
      {
      	$status = "Active";
      ?>
		<tr>
			<td><?php echo $data['firstname']; ?></td>
			<td><?php echo $data['lastname']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $level; ?></td>
			<td><?php echo $status; ?></td>
			<td>
				<button class="btn btn-danger" onclick="ajaxCon('delete','<?php echo $data['userid']; ?>')"  title="Delete"><span class="fa fa-trash-o"></span></button>
				<button class="btn btn-info" href="<?php echo modal_url();?>user/edit.php?id=<?php echo $data['userid']; ?>" role="tab"data-target="#theModal" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span></button>
			</td>
		</tr>
		<?php
    }
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
    
    $('.password').on('keyup', function(){

      if($(this).val() != $('.cnfpassword').val()){
        $('.prompt').html('Password does not match!');
        $('.prompt').css('color','red');
        $('.submit').prop('disabled',true);
      }else{

        $('.prompt').html('');
        $('.prompt').css('color','');
        if($(this.val() != "")){
          $('.prompt').html('Password Matched!');
          $('.prompt').css('color','green');
          $('.submit').prop('disabled',false);
        }
      }

    });

    $('.cfpassword').on('keyup', function(){


      if( $(this).val() != $('.password').val() ){

      $('.prompt').html('Password does not match!');
        $('.prompt').css('color','red');
        $('.submit').prop('disabled',true);

      }else{

        $('.prompt').html('');
        $('.prompt').css('color','');

        if($(this).val() != ""){
          $('.prompt').html('Password Matched!');
          $('.prompt').css('color','green');
          $('.submit').prop('disabled',false);
        }
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
      url: '<?php echo modal_url();?>user/connect.php',
      data: {action: action_ , data: object}, // you can use as much as data you want to send,
      success: function(response) {
        alert(response);
        location.reload();
      }
      });
      }

      }else{
      var dataObject = {
        fname : object.fname.value,
        lname : object.lname.value,
        uname : object.uname.value,
        pword : object.pname.value,
        level : object.ulevel.value
      };
      
      // dataObject = JSON.stringify(dataObject);
      $.ajax({
      type: 'POST',
      url: '<?php echo modal_url();?>user/connect.php',
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