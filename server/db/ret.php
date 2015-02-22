<?php
$servername = "mysql.x20hosting.com";
$username = "u122326214_testd";
$password = "doylefermi";
$dbname = "u122326214_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, website, email, gender, comments FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>". " Web: " . $row["website"]. "<br>"."gender: " . $row["gender"]. " - email: " . $row["email"]. "<br>". " comments: " . $row["comments"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
