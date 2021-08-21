   <?php
   (isset($_SESSION['is_admin']) && $_SESSION['is_admin']==1)?$is_admin = 1 : $is_admin = 0;
   ?>
    <div id='task_update_modal'>
        <input id="task_id" type="hidden" value="<?= $data['id'] ?>"/>
        <h5 class="modal-title mb-2">Task Details</h5>
        <div id='errorBox' class="alert alert-danger">
            Task Description is required
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
            </div>
            <textarea id='taskNewBody' name='taskNewBody' type="text" class="form-control require"
                      placeholder="Post Description"
                      require
                      value=''><?= $data['task_description'] ?></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="custom-checkbox custom-control">
                <input
                        class="custom-control-input"
                        name="task_status"
                        id="task_status"
                        type="checkbox"
                        <?=$data['status'] ?'checked':''?>
                >
                <label for="task_status" class="custom-control-label">&nbsp;</label>
                <span>Change Task Status</span>
            </div>
        </div>
        <div class="modal-footer">
            <button id='taskUpdate' onclick="updateTask(<?=$is_admin?>)" type="button" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>





