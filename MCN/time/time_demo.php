<?php
  $con=mysqli_connect("50.112.139.224","agutie02","hogsmeade","rfid");
  if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
  $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt==0){$flag1=-1;}
  else{$flag1=0;}
  $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino2 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt==0){$flag2=-1;}
  else{$flag2=0;}
//  echo "flag1 has:'".$flag1."'<br>";
//  echo "flag2 has:'".$flag2."'<br>";    
  if(($flag1==-1)&&($flag2==-1)){$flag=-1;}
  else if(($flag1==0)&&($flag2==-1)){$flag=0;}
  else if(($flag1==-1)&&($flag2==0)){$flag=1;}
  else if(($flag1==0)&&($flag2==0)){$flag=2;}
//  echo "flag has:'".$flag."'<br>";
?>
<html>
  <head>
    <title>AGGREGATION DEMO OBJECT1</title>
    <META http-equiv="refresh" content="2;URL=time_demo.php">
  </head>
  <body bgcolor="#ffffff">
    <center>
        <?php        
          if($flag==-1){
            echo "<table border='1'><tr><td colspan='3'><font size='4'>PLEASE SCAN ANY RFID TAG</td></tr></table>";
          }
          else{
            if($flag==0){
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp DESC");
                while ($row2 = mysqli_fetch_row($result2)) {              
                  $result3 = mysqli_query($con,"INSERT INTO aggregation_arduino1_log(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".$row2[0].",'".$row2[1]."',".$row2[2].",".$row2[3].");");              
                }
              }
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM aggregation_arduino1_log WHERE rfid_tag!='0D001EFE967B'");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM aggregation_arduino1_log WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp ASC");
                echo "<table border='1'><tr><td>WHO</td><td>OBJECT(#)</td><td>TIMESTAMP</td></tr>";                                    
                while ($row2 = mysqli_fetch_row($result2)) {
                  if($row2[2]==1){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino1 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>1</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                  
                  }
                  else if($row2[2]==2){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino2 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);                
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>2</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                                                    
                  }
                }
                echo "</table><br>";
              }    
              $result3 = mysqli_query($con,"TRUNCATE aggregation_arduino1_log");                          
            }
            else if($flag==1){
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM log_arduino2 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM log_arduino2 WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp DESC");
                while ($row2 = mysqli_fetch_row($result2)) {              
                  $result3 = mysqli_query($con,"INSERT INTO aggregation_arduino2_log(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".$row2[0].",'".$row2[1]."',".$row2[2].",".$row2[3].");");              
                }
              }
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM aggregation_arduino2_log WHERE rfid_tag!='0D001EFE967B'");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM aggregation_arduino2_log WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp ASC");
                echo "<table border='1'><tr><td>WHO</td><td>OBJECT(#)</td><td>TIMESTAMP</td></tr>";                                                    
                while ($row2 = mysqli_fetch_row($result2)) {
                  if($row2[2]==1){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino1 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>1</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                  
                  }
                  else if($row2[2]==2){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino2 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);                
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>2</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                                                    
                  }
                }
                echo "</table><br>";
              }    
              $result3 = mysqli_query($con,"TRUNCATE aggregation_arduino2_log");                          
            }
            else if($flag==2){
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp DESC");
                while ($row2 = mysqli_fetch_row($result2)) {              
                  $result3 = mysqli_query($con,"INSERT INTO aggregation_arduino1_log(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".$row2[0].",'".$row2[1]."',".$row2[2].",".$row2[3].");");              
                }
              }
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM log_arduino2 WHERE rfid_tag!='0D001EFE967B' ORDER BY unix_timestamp DESC");
              while ($row = mysqli_fetch_row($result)) {
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM log_arduino2 WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp DESC");
                while ($row2 = mysqli_fetch_row($result2)) {              
                  $result3 = mysqli_query($con,"INSERT INTO aggregation_arduino1_log(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".$row2[0].",'".$row2[1]."',".$row2[2].",".$row2[3].");");              
                }
              }              
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM aggregation_arduino1_log WHERE rfid_tag!='0D001EFE967B'");
              while ($row = mysqli_fetch_row($result)) {
                //echo "row has:'".$row[0]."'<br>";
                $result2 = mysqli_query($con,"SELECT unix_timestamp,rfid_tag,arduino,arduino_timestamp FROM aggregation_arduino1_log WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' GROUP BY unix_timestamp,rfid_tag, arduino,arduino_timestamp ORDER BY unix_timestamp ASC");
                echo "<table border='1'><tr><td>WHO</td><td>OBJECT(#)</td><td>TIMESTAMP</td></tr>";                                                    
                while ($row2 = mysqli_fetch_row($result2)) {
                  if($row2[2]==1){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino1 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>1</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                  
                  }
                  else if($row2[2]==2){
                    $result3 = mysqli_query($con,"SELECT visitor FROM content_arduino2 WHERE value='".$row2[1]."'");
                    $row3 = mysqli_fetch_row($result3);                
                    echo "<tr><td align='center'>".$row3[0]."</td><td align='center'>2</td><td align='center'>".date("D M j G:i:s",$row2[0])."</td></tr>";                                                    
                  }
                }
                echo "</table><br>";
              }
              $result3 = mysqli_query($con,"TRUNCATE aggregation_arduino1_log");                          
            }
          }
//          echo "<tr><td colspan='3' align='center'><font size='4'>CLICK 'OFF' BUTTON TO STOP THIS DEMO</td></tr>";
          mysqli_close($con);
          
        ?>              
      </table>
    </center>
  </body>
</html>