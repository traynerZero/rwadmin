
<div class="modal-header">
        <h3 class="modal-title">Add Area</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="ajaxCon('add',this)">
      <div class="modal-body">
          <label>
          Area Name:
          </label>
          <input class="form-control" type="text" name="aname" required>
        
          <label>
          Area Code:
          </label>
          <input class="form-control" type="text" name="acode" required>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>