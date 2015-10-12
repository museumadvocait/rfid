<?php
$host='50.112.139.224';
$user='agutie02';
$password='hogsmeade';
$db='test';
$query="INSERT INTO test (text) VALUES ('test!')";

mysql_connect($host, $user, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());


mysql_query($query) or die(mysql_error());  

echo "Data Inserted!";


?> 