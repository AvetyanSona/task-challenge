<div class='container padding_top_100' >
  <div class='row '>
    <div class='col-6 mx-auto '>
      <form class="mx-auto" method='post' action='/users/loginExec'>
        <div class="form-group mx-auto">
          <label for="exampleInputEmail1">UserName</label>
          <input type="text" value="<?= oldValue('username') ? oldValue('username') : '' ?>" name='username'
                 class="form-control" id="username" aria-describedby="emailHelp"
                 placeholder="Enter username">
            <?php if(oldValue('username_err')): ?>
              <div class="alert-danger text-center"><?= oldValue('username_err'); ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group mx-auto">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name='pass' class="form-control" id="exampleInputPassword1"
                 placeholder="Password">
            <?php if(oldValue('error')): ?>
              <div class="alert-danger text-center"><?= oldValue('error'); ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>