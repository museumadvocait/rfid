<?php
  $con=mysqli_connect("localhost","root","hogsmeade","rfid");
  if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
  $result0 = mysqli_query($con,"SET character_set_results=utf8");  
  $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino2 WHERE rfid_tag!='0B007D1F3950' ORDER BY unix_timestamp DESC LIMIT 1");
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt==0){$flag=-1;}
  else if($row_cnt==1){
    $result = mysqli_query($con,"SELECT rfid_tag FROM log_arduino2 WHERE rfid_tag!='0B007D1F3950' ORDER BY unix_timestamp DESC LIMIT 1");
    $elements = (mysqli_fetch_assoc($result));
    $rfid_tag = $elements['rfid_tag'];
    $result = mysqli_query($con,"SELECT count(*) FROM log_arduino1 WHERE rfid_tag='".$rfid_tag."'");
    $row = (mysqli_fetch_assoc($result));
    $flag=-1;
    if ($row['count(*)']!= 0){$flag=1;}
    else{$flag=0;}
  }
?>
<html>
  <head>
    <title>CONTENT AGGREGATION FROM OBJECT #2 DEMO</title>
    <META http-equiv="refresh" content="1;URL=simulation_aggregation_demo_ipad2.php">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />    
  </head>
  <body bgcolor="#ffffff">
    <center>
      <table border='1'>
        <?php
          if($flag==-1){
//            echo "<tr><td colspan='2'><font size='4'>SWIPE ANY TAG ON OBJECT#2 TO START THE CONTENT AGGREGATION FROM OBJECT #2 DEMO</td></tr>";
          }
          else{
            $result2 = mysqli_query($con,"SELECT * FROM content_arduino2 WHERE value='".$rfid_tag."'");
            $row2 = (mysqli_fetch_assoc($result2));
            echo "<tr><td><img src='".$row2['language'].".png' height='42'></td>";
            echo "<td><font size='4'><p align='";
            if(strcmp($row2['ID'],"Y1")==0){echo "right";}
            else{echo "left";}
            
            if($flag==0)      {
              echo "'>".$row2['text']."</p></td></tr>";
            }
            else if($flag==1) {
              echo "'>".$row2['aggregated_text']."</p></td></tr>";              
            }    
          }
          mysqli_close($con);
        ?>              
      </table>
    </center>
  </body>
</html>