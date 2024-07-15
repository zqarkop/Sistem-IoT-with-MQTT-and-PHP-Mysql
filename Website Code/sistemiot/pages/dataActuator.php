<?php
$sql_readDataActuator = "SELECT * FROM data where sensor_actuator = 'actuator'";
$sql_resultReadDataActuator = mysqli_query($conn, $sql_readDataActuator);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Actuator</h1>
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
                    <h3 class="card-title">History Data Actuator</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Actuator Type</th>
                        <th>Value</th>
                        <th>MQTT Topic</th>
                        <th>Serial Number Sender</th>
                        <th>Posted Time</th>
                        <th>Location Sender</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($sql_resultReadDataActuator)){ ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['value'] ?></td>
                        <td><?php echo $row['mqtt_topic'] ?></td>
                        <td><?php echo $row['serial_number'] ?></td>
                        <td><?php echo $row['posted_time'] ?></td>
                        <?php 
                            $sql_readSerialNumber = "SELECT devices.serial_number, devices.location, data.serial_number FROM devices INNER JOIN data ON '".$row['serial_number']."' = devices.serial_number LIMIT 1";
                            $sql_resultReadSN = mysqli_query($conn, $sql_readSerialNumber);
                            while($loc = mysqli_fetch_assoc($sql_resultReadSN)){
                        ?>
                        <td><?php echo $loc['location'] ?></td>
                    </tr>
                    <?php }}?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Actuator Type</th>
                        <th>Value</th>
                        <th>MQTT Topic</th>
                        <th>Serial Number Sender</th>
                        <th>Posted Time</th>
                        <th>Location Sender</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   