<?php
	// Set up database connection
	include_once('dbvars.inc'); // Include credentials
    $conn = mysqli_connect("localhost", $dbuser, $dbpass, "test_group5c");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //Grab data sent by AJAX
	$x = $_REQUEST["x"];
	$outtime = date("Y-m-d H:i:s");
	//Insert out time into database
	$insertOut = "UPDATE grp5c SET Time_Out ='".$outtime."' WHERE Name = '".$x."'";
	$result = $conn->query($insertOut);

    // Exit Procedures
    //$result->free();
    $conn->close();

	//Send out time back over AJAX
	echo $outtime;
?>
