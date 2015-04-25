<?php
require_once 'dbconnect.php';  
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $conn = new mysqli($servername, $username, $password, $dbname);
  $r=$_POST["admno"];
  $sql = "SELECT * FROM admissions WHERE admission_no='$r'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
	echo ("exists");
$conn->close();

}
?>
