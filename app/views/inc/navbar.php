<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 nav_bar" >
  <div class="container">
    <a class="navbar-brand" href="/">Tasks Challenge</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav ml-auto">
          <?php if (!isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="/users/login">Login</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="/users/logout">Logout</a>
            </li>
          <?php endif; ?>
      </ul>
    </div>
</nav>
</div>