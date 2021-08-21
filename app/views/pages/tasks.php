  <div class="container padding_top_100"  >
      <div class="col-md-12 col-12 col-sm-12">
          <div class="col-md-12 col-12 col-sm-12 margin_bottom_10" >
              <button type="submit" class="btn btn-success btn-lg btn-block" onclick="addTaskModal()">Want To Add New Task</button>
          </div>
          <?php if(!empty($data['tasks'])){?>
              <?php
              $order_by = 'ASC';
              if($data['paginator']['by'] == 'ASC'){
                  $order_by = 'DESC';
              }
              ?>
          <div class="card ">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th class="text-center cursor_pointer" ><a class="a_tag_reset" href="/status/<?=$order_by?>/<?=$data['paginator']['page']?>" >Status</a></th>
                              <th class="text-center cursor_pointer" ><a class="a_tag_reset" href="/task_creator_name/<?=$order_by?>/<?=$data['paginator']['page']?>"  >Task Creator</a></th>
                              <th class="text-center cursor_pointer" ><a class="a_tag_reset" href="/task_creator_email/<?=$order_by?>/<?=$data['paginator']['page']?>" >Creator Email</a></th>
                              <th class="text-center ">Description</th>
                              <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']){?>
                                  <th class="text-center">Edit</th>
                              <?php }?>
                          </tr>
                          </thead>
                          <tbody class="userTasksMainContent">
                          <?php foreach ($data['tasks'] as $value): ?>
                          <tr>
                              <td class="p-0 text-center checkbox_align" >
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
                          </tbody></table>
                  </div>
              </div>
          </div>
          <div class="display_flex">
              <?php if($data['paginator']['totalPages'] > 0){ ?>
                  <nav aria-label="Page navigation example">
                      <ul class="pagination">
                          <?php for($i = 1; $i<=$data['paginator']['totalPages']; $i++){ ?>
                              <li class="page-item"><a class="page-link" href="/<?=$data['paginator']['order']?>/<?=$order_by?>/<?=$i?>"><?=$i?></a></li>
                          <?php }?>
                      </ul>
                  </nav>
              <?php }?>
          </div>
          <?php }else{?>
          <div class="card ">
              <div class="card-body">
                  <p class="text-center">Oops, there is no task to show!</p>
              </div>
          </div>
          <?php }?>
      </div>
  </div>

<?php
  $dataUpdateModal = true;
  include('app/views/inc/modals.php')
?>