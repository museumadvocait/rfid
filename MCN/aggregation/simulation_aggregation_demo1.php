<?php
  $con=mysqli_connect("50.112.139.224","agutie02","hogsmeade","rfid");
  if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
  
  $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino1 WHERE rfid_tag!='0B007D1F3950' ORDER BY unix_timestamp DESC LIMIT 1");
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt==0){$flag=-1;}
  else if($row_cnt==1){
    $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino1 WHERE rfid_tag!='0B007D1F3950' ORDER BY unix_timestamp DESC LIMIT 1");
    $elements = (mysqli_fetch_assoc($result));
    $rfid_tag = $elements['rfid_tag'];
    $result = mysqli_query($con,"SELECT count(*) FROM log_arduino2 WHERE rfid_tag='".$rfid_tag."'");
    $row = (mysqli_fetch_assoc($result));
    $flag=-1;
    if ($row['count(*)']!= 0){$flag=1;}
    else{$flag=0;}
  }
?>
<html>
  <head>
    <title>AGGREGATION DEMO OBJECT1</title>
    <META http-equiv="refresh" content="1;URL=aggregation_demo1.php">
  </head>
  <body bgcolor="#ffffff">
    <center>
      <table border='1'>
        <?php
          if($flag==-1){
            echo "<tr><td colspan='2'><font size='4'>PLEASE CLICK ANY OF THE ABOVE BUTTONS</td></tr>";
          }
          else{
            $result2 = mysqli_query($con,"SELECT * FROM content_arduino1 WHERE value='".$rfid_tag."'");
            $row2 = (mysqli_fetch_assoc($result2));
            if($flag==0)      {echo "<tr><td><img src='".$row2['language'].".png' height='42'></td><td><font size='4'>".$row2['text']."</td></tr>";}
            else if($flag==1) {echo "<tr><td><img src='".$row2['language'].".png' height='42'></td><td><font size='4'>".$row2['aggregated_text']."</td></tr>";}          
          }
          echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'OFF' BUTTON TO STOP THIS DEMO</td></tr>";
          mysqli_close($con);
          
        ?>              
      </table>
    </center>
  </body>
</html>