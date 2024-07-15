<?php
if($_SESSION['role'] == "User"){
  echo "<script>location.href='index.php'</script>";
}

$isUpdate = false;
$isAdded = false;
if(isset($_GET['deleteAct'])){
  $username = $_GET['username'];
  $sql_deleteData = "DELETE FROM user WHERE username = '$username'";
  $resultdeleteData = mysqli_query($conn, $sql_deleteData);
}
if(isset($_POST['addAct'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $role = $_POST['role'];
  $passwordHase = password_hash($password, PASSWORD_DEFAULT);
  $sql_InputDatauser = "INSERT INTO user (username, password, fullname, role) VALUES ('$username', '$passwordHase', '$fullname', '$role')";
  $resultInputDatauser = mysqli_query($conn, $sql_InputDatauser);
  $isUpdate = false;
  if($resultInputDatauser){
    $isAdded = true;
  }
}
if(isset($_GET['updateVisible'])){
  $isUpdate = true;
  $sql_update = "SELECT * FROM user WHERE username = '".$_GET['username']."' LIMIT 1";
  $resultUpdate = mysqli_query($conn, $sql_update);

  while($row = mysqli_fetch_assoc($resultUpdate)){
    $usernameUpdate = $row['username'];
    $fullnameUpdate = $row['fullname'];
    $roleUpdate = $row['role'];
    $activeUpdate = $row['active'];
  }
}
if(isset($_POST['updateAct'])){
  $oldSN = $usernameUpdate;
  $usernameUpdateData = $_POST['usernameUpdate'];
  $passwordUpdate = $_POST['passwordUpdate'];
  $fullnameUpdateData = $_POST['fullnameUpdate'];
  $roleUpdateData = $_POST['roleUpdate'];
  $activeUpdateData = $_POST['activeUpdate'];
  $passwordHase = password_hash($passwordUpdate, PASSWORD_DEFAULT);
  if($passwordUpdate == ""){
    $sql_UpdateData = "UPDATE user SET username = '$usernameUpdateData', fullname = '$fullnameUpdateData', role = '$roleUpdateData', active = '$activeUpdateData' WHERE username = '$oldSN'";
  }else{
    $sql_UpdateData = "UPDATE user SET username = '$usernameUpdateData', password = '$passwordHase', fullname = '$fullnameUpdateData', role = '$roleUpdateData', active = '$activeUpdateData' WHERE username = '$oldSN'";
  }
  
  $resultUpdateData = mysqli_query($conn, $sql_UpdateData);
  $isUpdate = false;
}

$sql_ReadDatauser = "SELECT * FROM user";
$resultReadDatauser = mysqli_query($conn, $sql_ReadDatauser);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <?php if ($isAdded){alertMessage("Succesfull","Data Berhasil Di Tambahkan");} ?>
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($resultReadDatauser)){ ?>
                    <tr>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td><?php echo $row['active'] ?></td>
                        <td>
                          <a href='?pages=user&updateVisible=true&username=<?php echo $row['username'] ?>' class="fas fa-edit" action =""></a> |
                          <a href='?pages=user&deleteAct=true&username=<?php echo $row['username'] ?>' class="fas fa-trash-alt" action =""></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                
              <?php if(!$isUpdate){?>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method = "POST" action = "">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="hidden" class="form-control" name = "addAct" value = "true">
                        <input type="text" class="form-control" placeholder="Unique Username" REQUIRED name = "username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" REQUIRED name = "password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Full Name</label>
                        <input type="text" class="form-control" placeholder="Andi Ganteng" REQUIRED name = "fullname">
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control" name = "role">
                              <option value = "Admin">Admin</option>
                              <option value = "User">User</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              <?php } if($isUpdate){?>
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method = "POST" action = "">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="hidden" class="form-control" name = "updateAct" value = "true">
                        <input type="text" class="form-control" REQUIRED name = "usernameUpdate" value = "<?php echo $usernameUpdate ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="leave blank if you don't want to change it" name = "passwordUpdate">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Full Name</label>
                        <input type="text" class="form-control" REQUIRED name = "fullnameUpdate" value = "<?php echo $fullnameUpdate ?>">
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control" name = "roleUpdate">
                            <?php
                            if($roleUpdate == "Admin"){ ?>
                              <option value = "Admin">Admin</option>
                              <option value = "User">User</option>
                            <?php }else{?>
                              <option value = "User">User</option>
                              <option value = "Admin">Admin</option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name = "activeUpdate">
                            <?php
                            if($activeUpdate == "Yes"){ ?>
                              <option value = "Yes">Active</option>
                              <option value = "No">Non Active</option>
                            <?php }else{?>
                              <option value = "No">Non Active</option>
                              <option value = "Yes">Active</option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                  </form>
                </div>
              <?php }?>
            </div>
            
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   