<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="1;URL=simulation_language_demo_arduino1_ipad.php">
  </head>
  <body bgcolor="#ffffff">
    <center>
      <table border=0>       
        <tr>
          <td>
            <table border='1'>
            <?php
                $con=mysqli_connect("50.112.139.224","agutie02","hogsmeade","rfid");
                if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
                $result = mysqli_query($con,"SELECT count(*) FROM log_arduino1");                
                $elements = (mysqli_fetch_assoc($result));
                if ($elements['count(*)']!= 0) {  
                  $result = mysqli_query($con,"SELECT * FROM log_arduino1 ORDER BY unix_timestamp DESC LIMIT 1");
                  $row = (mysqli_fetch_assoc($result));                                
                  $result2 = mysqli_query($con,"SELECT * FROM content_arduino1 WHERE value='".$row['rfid_tag']."'");
                  $row2 = (mysqli_fetch_assoc($result2));
                  echo "<tr><td width='700'><font size='4'><p align='";
                  if(strcmp($row2['ID'],"Y1")==0){echo "right";}
                  else{echo "left";}
                  echo "'>".$row2['text']."</p></font></td></tr>";                        
                }
            ?>              
            </table>
          </td>
        </tr>
      </table>
    </center>
  </body>
</html>