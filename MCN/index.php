<!DOCTYPE html>
<?php
  $demo=0;
  if (isset($_POST["demo"])) {$demo = $_POST["demo"];}
  if (isset($_POST["pc"])) {$pc = $_POST["pc"];}
  if (isset($_POST["mobile"])) {$mobile = $_POST["mobile"];}
  if (isset($_POST["ipad"])) {$ipad = $_POST["ipad"];}
  if (isset($_POST["rp"])) {$rp = $_POST["rp"];}
  if (isset($_POST["other"])) {$other = $_POST["other"];}

  $link = mysql_connect('50.112.139.224', 'agutie02', 'hogsmeade');
  mysql_set_charset('utf8',$link);
  if (!$link) {die('Could not connect: ' . mysql_error());}
  if (!mysql_select_db('rfid')) {die('Could not select database: ' . mysql_error());}
  $flag=0;
  if (isset($_POST["rfid_tag1"])) {
    $rfid_tag1 = $_POST["rfid_tag1"];
    if($demo==1){
      if(strcmp($rfid_tag1,"0D001EFE967B")==0){
        $query2 = "SELECT count(*) FROM log_arduino1 WHERE rfid_tag='".$rfid_tag1."'";
        $result2 = mysql_query($query2);
        $row = mysql_fetch_row($result2);
        if ($row[0]!= 0){
          $query3 = "TRUNCATE log_arduino1";
          $result3 = mysql_query($query3);
          $flag=0;
        }
        else{
          $query="INSERT INTO log_arduino1(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag1."',1,".time().");";
          $result = mysql_query($query);
          $flag=1;
        }
      }
      else{
        if(isset($_POST["submit1"])){
          $query="INSERT INTO log_arduino1(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag1."',1,".time().");";
          $result = mysql_query($query);
          $submit1=$_POST["submit1"];
          if(strcmp($submit1,"ON")==0){
            $flag=0;
          }
          else{
            $flag=1;
          }
        }
      }
    }
    if($demo==2){
      if(strcmp($rfid_tag1,"0B007D1F3950")==0){
        $query2 = "SELECT count(*) FROM log_arduino1 WHERE rfid_tag='".$rfid_tag1."'";
        $result2 = mysql_query($query2);
        $row = mysql_fetch_row($result2);
        if ($row[0]!= 0){$query3 = "TRUNCATE log_arduino1";$result3 = mysql_query($query3);$flag=0;}
        else{
          $query="INSERT INTO log_arduino1(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag1."',1,".time().");";
          $result = mysql_query($query);
          $flag=1;
        }
      }
      else{
        if(isset($_POST["submit1"])){
          $submit1=$_POST["submit1"];
          if(strcmp($submit1,"ON")==0){
            $flag=0;
          }
          else if(strcmp($submit1,"RESET")==0){
            $query3 = "TRUNCATE log_arduino1";
            $result3 = mysql_query($query3);
            $query="INSERT INTO log_arduino1(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'0B007D1F3950',1,".time().");";
            $result = mysql_query($query);
            $flag=1;
          }
          else{
            $query="INSERT INTO log_arduino1(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag1."',1,".time().");";
            $result = mysql_query($query);
            $flag=1;
          }
        }
      }
    }
  }
  if(isset($_POST["rfid_tag2"])){
    $rfid_tag2 = $_POST["rfid_tag2"];
    if($demo==2){
      if(strcmp($rfid_tag2,"0B007D1F3950")==0){
        $query2 = "SELECT count(*) FROM log_arduino2 WHERE rfid_tag='".$rfid_tag2."'";
        $result2 = mysql_query($query2);
        $row = mysql_fetch_row($result2);
        if ($row[0]!= 0){$query3 = "TRUNCATE log_arduino2";$result3 = mysql_query($query3);$flag=0;}
        else{
          $query="INSERT INTO log_arduino2(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag2."',2,".time().");";
          $result = mysql_query($query);
          $flag=1;
        }
      }
      else{
        if(isset($_POST["submit2"])){
          $submit2=$_POST["submit2"];
          if(strcmp($submit2,"ON")==0){
            $flag=0;
          }
          else if(strcmp($submit2,"RESET")==0){
            $query3 = "TRUNCATE log_arduino2";
            $result3 = mysql_query($query3);
            $query="INSERT INTO log_arduino2(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'0B007D1F3950',2,".time().");";
            $result = mysql_query($query);
            $flag=1;
          }
          else{
            $query="INSERT INTO log_arduino2(unix_timestamp,rfid_tag,arduino,arduino_timestamp) VALUES (".time().",'".$rfid_tag1."',2,".time().");";
            $result = mysql_query($query);
            $flag=1;
          }
        }
      }
    }
  }

  $conn = new mysqli("50.112.139.224", "agutie02", "hogsmeade", "rfid");if ($conn->connect_error){die("Connection failed: " . $conn->connect_error);} 
  $query="UPDATE demo SET module='".$demo."'";  			if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  $query="UPDATE device SET value='".$pc."' where device='pc'";		if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  $query="UPDATE device SET value='".$mobile."' where device='mobile'";	if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  $query="UPDATE device SET value='".$ipad."' where device='ipad'";	if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  $query="UPDATE device SET value='".$rp."' where device='rp'";  	if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  $query="UPDATE device SET value='".$other."' where device='other'";	if (!mysqli_query($conn, $query)){echo "Error updating record";} 
  mysqli_close($conn);
?>
<html>
<body>
  <table>
    <tr><td colspan="2">CHOOSE:</td></tr>
    <tr>
      <td>
        <form action="index.php" method="POST">      
        <table>
          <tr>
            <td>
              <table>
                <tr><td>MODULE</td></tr>
                <tr><td><input <?php if($demo==1){echo "checked=\"checked\"";}?> type="radio" name="demo" value="1" >Language Accessibility</td></tr>
                <tr><td><input <?php if($demo==2){echo "checked=\"checked\"";}?> type="radio" name="demo" value="2">Content Aggregation</td></tr>
                <tr><td><input <?php if($demo==3){echo "checked=\"checked\"";}?> type="radio" name="demo" value="3">Time-based Preference Prediction</td></tr>
                <tr><td><input <?php if($demo==4){echo "checked=\"checked\"";}?> type="radio" name="demo" value="4">Repeat-visit Recognition</td></tr>
                <tr><td><input <?php if($demo==5){echo "checked=\"checked\"";}?> type="radio" name="demo" value="5">Multi-user Accommodation</td></tr>
              </table>
            </td>
            <td>
              <table>
                <tr><td>DEVICE</td></tr>
                <tr><td><input <?php if($pc==1){echo "checked=\"checked\"";}?> type="checkbox" name="pc" value="1" >Computer</td></tr>
                <tr><td><input <?php if($mobile==1){echo "checked=\"checked\"";}?> type="checkbox" name="mobile" value="1">Mobile</td></tr>
                <tr><td><input <?php if($ipad==1){echo "checked=\"checked\"";}?> type="checkbox" name="ipad" value="1">iPad</td></tr>
                <tr><td><input <?php if($rp==1){echo "checked=\"checked\"";}?> type="checkbox" name="rp" value="1">Raspberry Pi</td></tr>
                <tr><td><input <?php if($other==1){echo "checked=\"checked\"";}?> type="checkbox" name="other" value="1">Other</td></tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan='2'><input type="submit"></td>
          </tr>
        </table>
        </form>
      </td>
    </tr>
    <?php
    if($demo==1){
    ?>
    <tr>
      <td>
        <table>
          <tr><td colspan='6'>SIMULATION LANGUAGE</td></tr>
          <tr>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0C00319AFB5C">
	        <input type="submit" name="submit1" value="B1=ENGLISH" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0C004745E6E8">
                <input type="submit" name="submit1" value="B2=SPANISH" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="10002144F782">
                <input type="submit" name="submit1" value="R1=GERMAN" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="100021574523">
                <input type="submit" name="submit1" value="R2=ITALIAN" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0F002D84BD1B">
                <input type="submit" name="submit1" value="Y1=PERSIAN" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0F00305F1777">
                <input type="submit" name="submit1" value="Y2=CHINESE" />
              </form>
            </td>
          </tr>
          <tr><td colspan='6'> <?php echo "RFID_TAG1:'".$rfid_tag1."'";?></td></tr>
        </table>
      </td>
    </tr>
    <?php
    }

    if($demo==2){
    ?>
    <tr>
      <td>
        <table>
          <tr><td colspan='6'>SIMULATION CONTENT AGGREGATION #1</td></tr>
          <tr>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0C00319AFB5C">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="B1=ENGLISH" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0C004745E6E8">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="B2=SPANISH" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="10002144F782">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="R1=GERMAN" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="100021574523">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="R2=ITALIAN" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0F002D84BD1B">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="Y1=PERSIAN" />
              </form>
            </td>

           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="0F00305F1777">
                <input type="hidden" name="rfid_tag2" value="<?php echo $rfid_tag2;?>">
                <input type="submit" name="submit1" value="Y2=CHINESE" />
              </form>
            </td>
          </tr>
          <tr><td colspan='6'> <?php echo "RFID_TAG1:'".$rfid_tag1."'";?></td></tr>
        </table>
      </td>
    </tr>

    <tr>
      <td>
        <table>
          <tr><td colspan='6'>SIMULATION CONTENT AGGREGATION #2</td></tr>
          <tr>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="0C00319AFB5C">
                <input type="submit" name="submit2" value="B1=ENGLISH" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="0C004745E6E8">
                <input type="submit" name="submit2" value="B2=SPANISH" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="10002144F782">
                <input type="submit" name="submit2" value="R1=GERMAN" />
              </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="100021574523">
                <input type="submit" name="submit2" value="R2=ITALIAN" />
              </form>
           </td>
           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="0F002D84BD1B">
                <input type="submit" name="submit2" value="Y1=PERSIAN" />
              </form>
            </td>

           <td>
              <form action="index.php" method="POST">
                <input type="hidden" name="demo" value="<?php echo $demo;?>">
                <input type="hidden" name="pc" value="<?php echo $pc;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="ipad" value="<?php echo $ipad;?>">
                <input type="hidden" name="rp" value="<?php echo $rp;?>">
                <input type="hidden" name="other" value="<?php echo $other;?>">
                <input type="hidden" name="rfid_tag1" value="<?php echo $rfid_tag1;?>">
                <input type="hidden" name="rfid_tag2" value="0F00305F1777">
                <input type="submit" name="submit2" value="Y2=CHINESE" />
              </form>
            </td>
          </tr>
          <tr><td colspan='6'> <?php echo "RFID_TAG2:'".$rfid_tag2."'";?></td></tr>
        </table>
      </td>
    </tr>
  </table>
<?php

}
if($demo==3){
?>
<table border='1'>
  <tr><td>3. Time-based Preference Prediction</td></tr>
  <tr><td><a href="reset.php">RESET</a></td></tr>
  <tr><td><a href="update_aggregation/simulation_update_aggregation.php" target="_blank">SIMULATION</a></td></tr>    
  <tr><td><a href="update_aggregation/update_aggregation_demo.php" target="_blank">PC</a></td></tr>  
  <tr><td><a href="update_aggregation/simulation_update_aggregation_demo_ipad1.php" target="_blank">iPAD</a></td></tr>  
</table><br>
<?php
}
if($demo==4){
?>
<table border='1'>
  <tr><td>4. Repeat-visit Recognition</td></tr>
  <tr><td><a href="reset.php">RESET</a></td></tr>
  <tr><td><a href="update/simulation_update.php" target="_blank">SIMULATION</a></td></tr>
  <tr><td><a href="update/update_demo.php" target="_blank">PC</a></td></tr>    
  <tr><td><a href="update/simulation_update_demo_ipad1.php" target="_blank">iPAD</a></td></tr>  
</table><br>
<?php
}
if($demo==5){
?>
<table border='1'>
  <tr><td>5. Multi-user Accommodation</td></tr>
  <tr><td><a href="reset.php">RESET</a></td></tr>
  <tr><td><a href="split/simulation_split.php" target="_blank">SIMULATION</a></td></tr>    
  <tr><td><a href="split/split_demo.php" target="_blank">PC</a></td></tr>  
  <tr><td><a href="split/simulation_split_demo_arduino1_ipad.php" target="_blank">iPAD</a></td></tr>  
</table><br>
</body>
</html>
<?php
}
?>
