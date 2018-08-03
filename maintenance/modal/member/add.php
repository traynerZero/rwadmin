
<div class="modal-header">
        <h3 class="modal-title">Add Member Type</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
          <label>
            Member Type:
          </label>
          <input class="form-control" type="text" name="mname" required>
        
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>