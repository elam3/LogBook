<?php


/**
 * Set up database connection
 *
 * @return  reference to a database connection
 */
function getDatabaseConnection() {
    include('includes/dbvars.inc'); // Include credentials
    $conn = new mysqli("localhost", $dbuser, $dbpass, "test_group5c");
    unset($dbuser, $dbpass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}//getDatabaseConnection()


//
// If input is POSTed, assign variables & input into database
function signIn() {
    $conn = getDatabaseConnection();
    if(isset($_POST['visitor'])) {
        $visitor = $conn->real_escape_string($_POST['visitor']);
        $visiting = $conn->real_escape_string($_POST['visiting']);
        $timein = date("Y-m-d H:i:s");
        //Insert into database
        $insert = "INSERT INTO grp5c (Name, Visiting) VALUES ('".$visitor."', '".$visiting."')";
        $results = $conn->query($insert);
    }

    // Exit Procedures
    //$results->free();
    $conn->close();
}//signIn()


//
// Declare ouput variable with table header
function displayTable() {
    $conn = getDatabaseConnection();

    $output = "<div class='row'>";
    $output .= "<table><tr><th>Visitor</th><th>Visiting</th><th>Time In</th><th>Time Out</th></tr>";

    // Assign variable to query
    $sql = "SELECT Name, Visiting, Time_In, Time_Out FROM grp5c";
    $result = $conn->query($sql);
    //Declare variable to keep track of table cells
    $cell = 1;
    // If there are results, append them to table
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //If not signed out, display sign out button
            if ($row["Time_Out"] == "") {
                $outtime = "<button type='button' onclick='out(".$cell.")'>Sign Out</button>";
            } else {
                $outtime = $row["Time_Out"];
            }
            //Print table rows & give cells unique IDs
            $output .= "<tr><td id='name".$cell."'>".$row["Name"]."</td><td>".$row["Visiting"]."</td><td>".$row["Time_In"]."</td><td id='out".$cell."'>".$outtime."</td></tr>"; 
            $cell++;
        }
    }
    $output .= "</table>";
    $output .= "</div>";

    // Exit Procedures
    $result->free();
    $conn->close();

    return $output;
}//displayTable()


/**
 * Count visitors who haven't signed out
 *
 * @return  number of visitors still in the building
*/
function countVisitors() {
    $conn = getDatabaseConnection();
   $retval=0;
       
   $query='select count(*) as notsignedout from grp5c where time_out is null';
   $result = $conn->query($query);
   if ($result->num_rows > 0) 
   {
       $row = $result->fetch_assoc();
       $retval = $row["notsignedout"];
   }

   // Exit Procedures
   $result->free();
   $conn->close();

   return $retval;
}//countVisitors



/*
 * Return the average visit length
 *
 * @return  a floating point, of the average minutes per visit
*/
function averageVisit()
{
    $conn = getDatabaseConnection();

   $retval=0;
   
   $query='select avg( TIMESTAMPDIFF(MINUTE,time_in, time_out) ) as avg_minutes from grp5c;';
   $result = $conn->query($query);
   if ($result->num_rows > 0) 
   {
       $row = $result->fetch_assoc();
       $retval = $row["avg_minutes"];
   }

    // Exit Procedures
    $result->free();
    $conn->close();

   return $retval;
}//averageVisit


?>
