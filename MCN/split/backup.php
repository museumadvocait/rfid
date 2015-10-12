<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="1;URL=split_demo_arduino1.php">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  </head>
  <body bgcolor="#ffffff">
    <center>
    <?php
      $x=0;
      $y=0;
    ?>
      <table>
        <?php
          $con=mysqli_connect("50.112.139.224","agutie02","hogsmeade","rfid");
          if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
          $result0 = mysqli_query($con,"SET character_set_results=utf8");
          $result = mysqli_query($con,"SELECT count(*) FROM log_arduino1");                
          $elements = (mysqli_fetch_assoc($result));
          if ($elements['count(*)']>0) {  
            if ($elements['count(*)']==1) {
            echo "<table border='1'><tr><td colspan='2' align='center'><font size='4'>PLEASE SCAN ANY RFID TAG</td></tr></table>";
            }else{
              echo "<table><tr>";
              $result = mysqli_query($con,"SELECT count(distinct(rfid_tag)) FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B'");
              $visitors = mysqli_fetch_row($result);
              $visitors = $visitors[0];
              echo "visitors:'".$visitors."'<br>";
              
              $result = mysqli_query($con,"SELECT distinct(rfid_tag) FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B'");
              while ($row = mysqli_fetch_row($result)){
                $result2 = mysqli_query($con,"SELECT * FROM log_arduino1 WHERE rfid_tag!='0D001EFE967B' AND rfid_tag='".$row[0]."' ORDER BY unix_timestamp DESC LIMIT 1");
                $row2 = (mysqli_fetch_assoc($result2));
                $result3 = mysqli_query($con,"SELECT text,visitor FROM content_arduino1 WHERE value='".$row2['rfid_tag']."'");
                $row3 = mysqli_fetch_row($result3);
                if($x<2){
                  $x++;
                  echo "<td><table border='1'><tr><td align='center'>".$row3[1]."</td><td width='250'><font size='4'>".$row3[0]."</td></tr></table></td>"; 
                }
                else{
                  $x=0;
                  echo "<td><table border='1'><tr><td align='center'>".$row3[1]."</td><td width='250'><font size='4'>".$row3[0]."</td></tr></table></td>";                   
                  echo "</tr><tr>";
                }
              }
              echo "</tr></table>";
            }
          }
          else{
            echo "<tr><td colspan='2' align='center'><font size='4'>CLICK 'ON' BUTTON TO START SPLIT DEMO</td></tr>";
          }
        ?>              
      </table>
    </center>
  </body>
</html>