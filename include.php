<?php

session_start();


$host = "127.0.0.1";

$username = "root";

$password = "";

$db = "admin";

@mysql_connect($host,$username,$password) or die ("error");

@
mysql_select_db($db) or die("error");

?>