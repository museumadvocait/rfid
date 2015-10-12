<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="0;URL=index.php">
  </head>
  <body bgcolor="#ffffff">
  <?php
    $con=mysqli_connect("50.112.139.224","agutie02","hogsmeade","rfid");
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino1");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino2");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino1_log");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino2_log");
    $result = mysqli_query($con,"TRUNCATE language_arduino1");
    $result = mysqli_query($con,"TRUNCATE language_arduino2");
    $result = mysqli_query($con,"TRUNCATE log");
    $result = mysqli_query($con,"TRUNCATE log_arduino1");
    $result = mysqli_query($con,"TRUNCATE log_arduino2");
 //   $result = mysqli_query($con,"DROP TABLE arduino1_aggregation");    
 //   $result = mysqli_query($con,"DROP TABLE arduino2_aggregation");        


    //    $result = mysqli_query($con,"rfid < aggregation_arduino.sql");        
    
  ?>              
  </body>
</html>