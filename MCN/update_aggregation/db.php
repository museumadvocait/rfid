<?php
  $link = mysql_connect('50.112.139.224', 'agutie02', 'hogsmeade');
  mysql_set_charset('utf8',$link);
  if (!$link) {die('Could not connect: ' . mysql_error());}
  if (!mysql_select_db('rfid')) {die('Could not select database: ' . mysql_error());}
?>
