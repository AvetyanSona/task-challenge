<?php foreach ($data['tasks'] as $value): ?>
    <tr>
        <td class="p-0 text-center checkbox_align">
            <div class="custom-checkbox custom-control">
                <input class="custom-control-input" type="checkbox" <?=$value->status?'checked':''?> disabled >
                <label  class="custom-control-label">&nbsp;</label>
            </div>
        </td>
        <td class="text-center"><?= $value->task_creator_name ?></td>
        <td class="text-center"><?= $value->task_creator_email ?></td>
        <td class="text-center"><?= $value->task_description ?></td>
        <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']){?>
            <td class="text-center">
                <a class="btn btn-info btn-action" type="button" data-toggle="tooltip" onclick="task_update_modal(<?= $value->id ?>)" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
            </td>
        <?php }?>
    </tr>
<?php endforeach; ?>
<?php
$dataUpdateModal = true;
include('app/views/inc/modals.php')
?>