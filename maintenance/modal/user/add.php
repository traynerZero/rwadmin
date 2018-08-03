
<div class="modal-header">
        <h3 class="modal-title">Add User</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
          <label>
          First Name:
          </label>
          <input class="form-control" type="text" name="fname" required>
        
          <label>
          Last Name:
          </label>
          <input class="form-control" type="text" name="lname" required>
        
        <label>
          Username:
        </label>

          <input class="form-control" type="text" name="uname" required>
        
        <label>
          RFID Password:
        </label>
        <input class="form-control password" type="password" name="pname" required>
        
        <label>
          Confirm RFID Password:
        </label>
          <input class="form-control cfpassword" type="password"" required>
          <span class="prompt"></span><br><br>
        <label>
          User Level:
        </label>
          <select class="form-control" name="ulevel" required>
              <option selected="selected" disabled>Choose option</option>
              <option value="1">Admin</option>
              <option value="2">Teller</option>
              <option value="3">Vallet</option>
          </select>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit" disabled>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
