<?php
$sql_dashboard = "SELECT * FROM devices WHERE serial_number != 'websiteSN'";
$result_dashboard = mysqli_query($conn, $sql_dashboard);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
          <div class="col-lg-4">
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3><span id = "temperature">-</span> C</h3>

                <p>Temperature</p>
              </div>
              <div class="icon">
                <i class="fas fa-thermometer-three-quarters"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><span id = "humidity">-</span> %</h3>

                <p>Humidity</p>
              </div>
              <div class="icon">
                <i class="fas fa-tint"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><span id = "potentio">-</span> %</h3>

                <p>Potentiometer</p>
              </div>
              <div class="icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
            </div>
          </div>
          
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Servo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <input id="sliderServo" type="text" name="sliderServo" onchange = "publishDataServo()">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-6">
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Lamp</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row margin">
                  <div class="col-sm-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-success" id="labelLampOn">
                        <input type="radio" name="lamp" id="lampOn" autocomplete="off" onchange="publishDataLamp()"> ON
                    </label>
                    <label class="btn btn-success" id="labelLampOff">
                        <input type="radio" name="lamp" id="lampOff" autocomplete="off" onchange="publishDataLamp()"> OFF
                    </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-12">
            <div class="card card-indigo">
              <div class="card-header">
                <h3 class="card-title">Status Devices</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Location</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = mysqli_fetch_assoc($result_dashboard)){ ?>
                    <tr>
                      <td><?php echo $row['serial_number']; ?></td>
                      <td><?php echo $row['location']; ?></td>
                      <td style="color:red" id = "sistemiot/statusdevice/<?php echo $row['serial_number'];?>">Offline</td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  
  <script>
        const clientId = 'userWebsite_' + Math.random().toString(16).substr(2, 8);
        const host = "ws://YOUR IP SERVER BROKER:9001";

        const option = {
            keepalive: 60,
            clientId: clientId,
            username: "YOUR USERNAME SERVER BROKER",
            password: "YOUR PASSWORD SERVER BROKER",
            protocolId: "MQTT",
            protocolVersion: 4,
            clean: false,
            reconnectPeriod: 1000,
            coneectTimeout: 30000,
        };
        console.log("Mengghubungkan ke broker");
        const client = mqtt.connect(host, option);
        client.subscribe("sistemiot/#", {qos: 1});

        client.on("connect", () =>{
            console.log("Terhubung ke broker. Client ID : " + clientId);
            document.getElementById("statusConnection").innerHTML = "Terhubung";
            document.getElementById("statusConnection").style.color = "green";
        });

        client.on("message", function(topik, payload){
            if(topik == "sistemiot/123451/sensor/temperature"){
                document.getElementById("temperature").innerHTML = payload;
            }
            if(topik == "sistemiot/123451/sensor/humidity"){
                document.getElementById("humidity").innerHTML = payload;
            }
            if(topik == "sistemiot/123451/sensor/potentio"){
                document.getElementById("potentio").innerHTML = payload;
            }
            if(topik == "sistemiot/websiteSN/actuator/servo"){
              let posServo = $("#sliderServo").data("ionRangeSlider")

              posServo.update({
                from:payload.toString()
              })
            }
            if(topik == "sistemiot/websiteSN/actuator/Lamp"){
              if(payload == "on"){
                document.getElementById("labelLampOn").classList.add("active");
                document.getElementById("labelLampOff").classList.remove("active");
              }else{
                document.getElementById("labelLampOn").classList.remove("active");
                document.getElementById("labelLampOff").classList.add("active");
              }
            }
            if(topik.includes("sistemiot/statusdevice/")){
              let kapital = payload.toString();
                document.getElementById(topik).innerHTML = kapital.substring(0,1).toUpperCase() + kapital.substring(1).toUpperCase();
                if(payload == "Online"){
                  document.getElementById(topik).style.color= "green";
                }else{
                  document.getElementById(topik).style.color= "red";
                }
            }
        });

        function publishDataServo(){
          posServo = document.getElementById("sliderServo").value;
          client.publish("sistemiot/websiteSN/actuator/servo", posServo, {qos: 1, retain: true});
        }
        function publishDataLamp(){
          if(document.getElementById("lampOn").checked){
            statusLamp = "on";
          }else{
            statusLamp = "off";
          }
          client.publish("sistemiot/websiteSN/actuator/Lamp", statusLamp, {qos: 1, retain: true});
        }
    </script>
