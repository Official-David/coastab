<?php

	$dbUsername="root";
	$psswd = "";
	$dbName = "getcoast_data";
	$hostName = "localhost";
	$myConn = mysqli_connect($hostName,$dbUsername,$psswd,$dbName);
	if(!$myConn){
        die("Could not connect at the moment because ". mysqli_connect_error()); 	
    }
?>