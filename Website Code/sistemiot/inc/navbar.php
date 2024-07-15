
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if(isset($_GET['pages'])){if($_GET['pages'] == "dashboard"){ ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" style="color:red"><b><span id="statusConnection">Disconnect</span></b></a>
        </li>
      <?php }} ?>
      <?php if(!isset($_GET['pages'])){ ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" style="color:red"><b><span id="statusConnection">Disconnect</span></b></a>
        </li>
      <?php } ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="www.instagram.com" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
