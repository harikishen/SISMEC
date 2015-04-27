<?php
session_start();
if($_SESSION["delete"]!=1)
{
 
 die("Access Denied");
}
else
 {
 $_SESSION["delete"]=0;
 session_write_close();
}
require_once 'dbconnect.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$roll=$_GET["sroll"]; 
$sql = "SELECT admission_no FROM admissions WHERE rollno='$roll'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
       while($row=$result->fetch_assoc()){
    	   $admno=$row["admission_no"];
	}
} else {
      header("Location:http://127.1.1/notfound.php");exit();
    }

$sql = "DELETE FROM addresses WHERE admission_id='$admno'";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in addresses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "DELETE FROM admissions WHERE admission_no='$admno'";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in admissions";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM details WHERE admission_id='$admno'";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in details";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM relatives WHERE admission_id='$admno'";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in relatives";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


