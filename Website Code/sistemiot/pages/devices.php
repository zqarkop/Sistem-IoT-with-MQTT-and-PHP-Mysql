<?php
$isUpdate = false;
$isAdded = false;
if(isset($_GET['deleteAct'])){
  $serial_number = $_GET['serial_number'];
  $sql_deleteData = "DELETE FROM devices WHERE serial_number = '$serial_number'";
  $resultdeleteData = mysqli_query($conn, $sql_deleteData);
}
if(isset($_POST['addAct'])){
  $serial_number = $_POST['serial_number'];
  $mcu_type = $_POST['mcu_type'];
  $location = $_POST['location'];
  $sql_InputDataDevices = "INSERT INTO devices (serial_number, mcu_type, location) VALUES ('$serial_number', '$mcu_type', '$location')";
  $resultInputDataDevices = mysqli_query($conn, $sql_InputDataDevices);
  $isUpdate = false;
  if($resultInputDataDevices){
    $isAdded = true;
  }
}
if(isset($_GET['updateVisible'])){
  $isUpdate = true;
  $sql_update = "SELECT * FROM devices WHERE serial_number = '".$_GET['serial_number']."' LIMIT 1";
  $resultUpdate = mysqli_query($conn, $sql_update);

  while($row = mysqli_fetch_assoc($resultUpdate)){
    $serial_numberUpdate = $row['serial_number'];
    $mcu_typeUpdate = $row['mcu_type'];
    $locationUpdate = $row['location'];
    $activeUpdate = $row['active'];
  }
}
if(isset($_POST['updateAct'])){
  $oldSN = $serial_numberUpdate;
  $serial_numberUpdateData = $_POST['serial_numberUpdate'];
  $mcu_typeUpdateData = $_POST['mcu_typeUpdate'];
  $locationUpdateData = $_POST['locationUpdate'];
  $activeUpdateData = $_POST['activeUpdate'];
  $sql_UpdateData = "UPDATE devices SET serial_number = '$serial_numberUpdateData', mcu_type = '$mcu_typeUpdateData', location = '$locationUpdateData', active = '$activeUpdateData' WHERE serial_number = '$oldSN'";
  $resultUpdateData = mysqli_query($conn, $sql_UpdateData);
  $isUpdate = false;
}

$sql_ReadDataDevices = "SELECT * FROM devices";
$resultReadDataDevices = mysqli_query($conn, $sql_ReadDataDevices);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <?php if ($isAdded){alertMessage("Succesfull","Data Berhasil Di Tambahkan");} ?>
            <h1 class="m-0">Devices</h1>
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
                    <h3 class="card-title">Registered Devices</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>MCU Type</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($resultReadDataDevices)){ ?>
                    <tr>
                        <td><?php echo $row['serial_number'] ?></td>
                        <td><?php echo $row['mcu_type'] ?></td>
                        <td><?php echo $row['location'] ?></td>
                        <td><?php echo $row['active'] ?></td>
                        <td>
                          <a href='?pages=devices&updateVisible=true&serial_number=<?php echo $row['serial_number'] ?>' class="fas fa-edit" action =""></a> |
                          <a href='?pages=devices&deleteAct=true&serial_number=<?php echo $row['serial_number'] ?>' class="fas fa-trash-alt" action =""></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Serial Number</th>
                        <th>MCU Type</th>
                        <th>Location</th>
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
                    <h3 class="card-title">Add Device</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method = "POST" action = "">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Serial Number</label>
                        <input type="hidden" class="form-control" name = "addAct" value = "true">
                        <input type="text" class="form-control" placeholder="Unique Serial Number" REQUIRED name = "serial_number">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">MCU Type</label>
                        <input type="text" class="form-control" placeholder="ESP32" REQUIRED name = "mcu_type">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" placeholder="Jakarta" REQUIRED name = "location">
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
                    <h3 class="card-title">Update Device</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method = "POST" action = "">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Serial Number</label>
                        <input type="hidden" class="form-control" name = "updateAct" value = "true">
                        <input type="text" class="form-control" REQUIRED name = "serial_numberUpdate" value = "<?php echo $serial_numberUpdate ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">MCU Type</label>
                        <input type="text" class="form-control" REQUIRED name = "mcu_typeUpdate" value = "<?php echo $mcu_typeUpdate ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" REQUIRED name = "locationUpdate" value = "<?php echo $locationUpdate ?>">
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
   