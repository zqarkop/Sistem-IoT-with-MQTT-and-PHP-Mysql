
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Sistem IoT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['fullname']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?pages=dashboard" class="nav-link <?php if(isset($_GET['pages'])){if($_GET['pages'] == 'dashboard'){echo 'active';}} ?>">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages=devices" class="nav-link <?php if(isset($_GET['pages'])){if($_GET['pages'] == 'devices'){echo 'active';}} ?>">
                  <i class="fas fa-desktop nav-icon"></i>
                  <p>Devices</p>
                </a>
              </li>
              <?php if($_SESSION['role'] == "Admin"){?>
              <li class="nav-item">
                <a href="?pages=user" class="nav-link <?php if(isset($_GET['pages'])){if($_GET['pages'] == 'user'){echo 'active';}} ?>">
                  <i class="fas fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <?php }?>
              <li class="nav-item">
                <a href="?pages=dataSensor" class="nav-link <?php if(isset($_GET['pages'])){if($_GET['pages'] == 'dataSensor'){echo 'active';}} ?>">
                  <i class="fas fa-temperature-low nav-icon"></i>
                  <p>Data Sensor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages=dataActuator" class="nav-link <?php if(isset($_GET['pages'])){if($_GET['pages'] == 'dataActuator'){echo 'active';}} ?>">
                  <i class="fas fa-wrench nav-icon"></i>
                  <p>Data Actuator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
