<?php
  include("db.php");
  $flag=0;
  if(isset($_POST["rfid_tag1"])){
    $rfid_tag1=$_POST["rfid_tag1"];
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
?>
<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="100;URL=simulation_language_arduino1.php">
  </head>
  <body bgcolor="#ffffff">
    <table border="1" align="center">
      <tr><td colspan="7" align="center">ARDUINO #1</td></tr>
      <tr>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="0C00319AFB5C"><input type="submit" name="submit1" value="B1=ENGLISH" /></form></td>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="0C004745E6E8"><input type="submit" name="submit1" value="B2=SPANISH" /></form></td>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="10002144F782"><input type="submit" name="submit1" value="R1=GERMAN" /></form></td>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="100021574523"><input type="submit" name="submit1" value="R2=ITALIAN" /></form></td>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="0F002D84BD1B"><input type="submit" name="submit1" value="Y1=PERSIAN" /></form></td>
        <td><form action="simulation_language_arduino1.php" method="post"><input type="hidden" name="rfid_tag1" value="0F00305F1777"><input type="submit" name="submit1" value="Y2=CHINESE" /></form></td>
      </tr>
    </table>
  </body>
</html>