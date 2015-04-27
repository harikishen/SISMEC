<?php
session_start();
$_POST=$_SESSION;
if($_POST["menu"]!=1)
{
 
 die("Access Denied");
}
else
 {
 $_SESSION["menu"]=0;
 session_write_close();
}
?>
<html>
<head><title>SISMEC</title>
<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body background ="bg.jpg">

<div id ="Wrapper">
	<div id="header">
		<h1>SISMEC</h1>
	</div>
<?php
if($_GET ){
require_once 'dbconnect.php';  
session_start();
$_SESSION["view"]=1;
$_SESSION["edit"]=1;
$_SESSION["delete"]=1;
session_write_close();
$class=$_GET["clss"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM admissions WHERE class='$class'";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
    session_start();
    $SESSION["view"]=1;
    $SESSION["edit"]=1;
    $SESSION["delete"]=1;
    echo "<table id=\"datatables\" class=\"display\">
    <tr>
        <th>SL.NO</th>
        <th>Roll Number</th>
        <th>Name</th>
        <th></th>		  
        <th>Option</th>
        <th></th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $slno++;
        echo "<tr>
        <td id=\"slno\">".$slno."</td>
        <td>".$row["rollno"]."</td>
        <td>".$row["name"]."</td>
        <td><a href=\"view.php?sroll=".$row["rollno"]."\">View</a> </td>
        <td><a href=\"edit.php?sroll=".$row["rollno"]."\">Edit</a> </td>
        <td><a href=\"deletion.php?sroll=".$row["rollno"]."\">Delete</a> </td>
          </tr>";
    }
    echo "</table>";
	}
 else {
      echo("0 Records");
    }
}
?>  			
</div>
</body>
</html>
