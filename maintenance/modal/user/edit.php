<?php
include "../../func/dbconnect.php";
session_start();

$id = $_GET['id'];
$_SESSION['editid'] = $id;

$sql = "SELECT * FROM tbl_user where userid = '$id'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);

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


class ulevel{
  public $id;
  public $value;
}

$admin = new ulevel();
$admin->id = '1';
$admin->value = 'Admin';

$cash = new ulevel();
$cash->id = '2';
$cash->value = 'Cashier';

$val = new ulevel();
$val->id = '3';
$val->value = 'Vallet';

$levelarray = array('admin' => $admin, 'cash' => $cash, 'val' => $val);
// $levelarray['admin']->id;
?>
<div class="modal-header">
        <h3 class="modal-title">Edit User</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('edit',this)">
      <div class="modal-body">
          <label>
          First Name:
          </label>
          <input class="form-control" type="text" name="fname" value="<?php echo $data['firstname']; ?>" required>
        
          <label>
          Last Name:
          </label>
          <input class="form-control" type="text" value="<?php echo $data['lastname']; ?>" name="lname" required>
        
        <label>
          Username:
        </label>

          <input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="uname" required>
        
        <label>
          RFID Password:
        </label>
        <input class="form-control password" value="<?php echo $data['password']; ?>" type="password" name="pname" required>
        
        <label>
          Confirm RFID Password:
        </label>
          <input class="form-control cfpassword" value="<?php echo $data['password']; ?>" type="password"" required>
          <span class="prompt"></span><br><br>
        <label>
          User Level:
        </label>
          <select class="form-control" name="ulevel" required>
              <option selected="selected" value="<?php $data['userlevel']; ?> "><?php echo $level; ?></option>
              <?php

              foreach ($levelarray as $key) {
                # code...
                if($key->id != $data['userlevel']){
                  ?>

                  <option value="<?php echo $key->id;?>"><?php echo $key->value; ?></option>
                  <?php
                }
              }

              ?>
          </select>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>

      <script type="text/javascript">
        
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

   
      </script>