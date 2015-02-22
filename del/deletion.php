<?php
$servername = "mysql.x20hosting.com";
$username = "u122326214_doyle";
$password = "haridoyle";
$dbname = "u122326214_mis";

/*session_start();
$_POST = $_SESSION;
if($_POST["direct"]!=1)
	{die('Access Denied');}*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$_POST["admission_id"]=$_POST["roll"];
$sql = "DELETE FROM addresses WHERE admission_id=$_POST[admission_id]";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in addresses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "DELETE FROM admissions WHERE admission_id=$_POST[admission_id]";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in admissions";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM details WHERE admission_id=$_POST[admission_id]";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in details";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM relatives WHERE admission_id=$_POST[admission_id]";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record successfully deleted in relatives";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


