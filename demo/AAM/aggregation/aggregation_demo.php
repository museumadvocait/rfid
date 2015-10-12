<?php
  $con=mysqli_connect("localhost","root","hogsmeade","rfid");
  if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}

  
  $result = mysqli_query($con,"SELECT count(*) FROM log_arduino1");
  $elements = (mysqli_fetch_assoc($result));

  if ($elements['count(*)']!= 0) {
    $result = mysqli_query($con,"SELECT * FROM log_arduino1 ORDER BY unix_timestamp DESC LIMIT 1");
    $row = (mysqli_fetch_assoc($result));
    $result2 = mysqli_query($con,"SELECT * FROM content_arduino1 WHERE value='".$row['rfid_tag']."'");
    $row2 = (mysqli_fetch_assoc($result2));
    echo "<tr><td><img src='".$row2['language'].".png' height='42'></td><td><font size='4'>".$row2['text']."</td></tr>";
    echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'OFF' BUTTON TO END LANGUAGE DEMO</td></tr>";
  }
  else{
    echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'ON' BUTTON TO START LANGUAGE DEMO</td></tr>";
  }
?>
<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="1;URL=aggregation_demo.php">
  </head>
  <body bgcolor="#ffffff">
    <center>
      <table border='1'>
      <tr><td></td></tr>
        <?php
          $con=mysqli_connect("localhost","root","hogsmeade","rfid");
          if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}          
          $result = mysqli_query($con,"SELECT count(*) FROM log_arduino1");
          $elements = (mysqli_fetch_assoc($result));
          if ($elements['count(*)']!= 0) {  
            $result = mysqli_query($con,"SELECT * FROM log_arduino1 ORDER BY unix_timestamp DESC LIMIT 1");
            $row = (mysqli_fetch_assoc($result));                                
            $result2 = mysqli_query($con,"SELECT * FROM content_arduino1 WHERE value='".$row['rfid_tag']."'");
            $row2 = (mysqli_fetch_assoc($result2));
            echo "<tr><td><img src='".$row2['language'].".png' height='42'></td><td><font size='4'>".$row2['text']."</td></tr>";
            echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'OFF' BUTTON TO END LANGUAGE DEMO</td></tr>";                  
          }
          else{
            echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'ON' BUTTON TO START LANGUAGE DEMO</td></tr>";
          }
        ?>              
      </table>
    </center>
  </body>
</html>