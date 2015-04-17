<?php
require_once 'dbconnect.php';
session_start();
$_POST = $_SESSION;
if($_POST["direct"]!=2)
	{die('Access Denied');}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//echo $_POST["month"];
if($_POST["month"]=="January")
  $_POST["month"]="01";
if($_POST["month"]=="February")
  $_POST["month"]="02";
if($_POST["month"]=="March")
  $_POST["month"]="03";
if($_POST["month"]=="April")
  $_POST["month"]="04";
if($_POST["month"]=="May")
  $_POST["month"]="05";
if($_POST["month"]=="June")
  $_POST["month"]="06";
if($_POST["month"]=="July")
  $_POST["month"]="07";
if($_POST["month"]=="August")
  $_POST["month"]="08";
if($_POST["month"]=="September")
  $_POST["month"]="09";
if($_POST["month"]=="October")
  $_POST["month"]="10";
if($_POST["month"]=="November")
  $_POST["month"]="11";
if($_POST["month"]=="December")
  $_POST["month"]="12";
if($_POST["month1"]=="January")
  $_POST["month1"]="01";
if($_POST["month1"]=="February")
  $_POST["month1"]="02";
if($_POST["month1"]=="March")
  $_POST["month1"]="03";
if($_POST["month1"]=="April")
  $_POST["month1"]="04";
if($_POST["month1"]=="May")
  $_POST["month1"]="05";
if($_POST["month1"]=="June")
  $_POST["month1"]="06";
if($_POST["month1"]=="July")
  $_POST["month1"]="07";
if($_POST["month1"]=="August")
  $_POST["month1"]="08";
if($_POST["month1"]=="September")
  $_POST["month1"]="09";
if($_POST["month1"]=="October")
  $_POST["month1"]="10";
if($_POST["month1"]=="November")
  $_POST["month1"]="11";
if($_POST["month1"]=="December")
  $_POST["month1"]="12";

$id=null;
$admission_id=null;
$type=null;
$house_name=$_POST["hname"];
$place1=$_POST["pl1"];
$place2=$_POST["pl2"];
$post_office=$_POST["poffice"];
$district=$_POST["district"];
$state=$_POST["state"];
$pin=null;
$admission_no=$_POST["admno"];
$admission_id=$_POST["admno"];
$name=$_POST["name"];
$date_of_birth=$_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
$sex=$_POST["sex"];
$caste=$_POST["caste"];
$religion=$_POST["religion"];

//present addr
$phouse_name=$_POST["phname"];
$pplace1=$_POST["ppl1"];
$pplace2=$_POST["ppl2"];
$ppost_office=$_POST["ppoffice"];
$pdistrict=$_POST["pdistrict"];
$pstate=$_POST["pstate"];

//gaurdian
$ghouse_name=$_POST["ghname"];
$gplace1=$_POST["gpl1"];
$gplace2=$_POST["gpl2"];
$gpost_office=$_POST["gpoffice"];
$gdistrict=$_POST["gdistrict"];
$gstate=$_POST["gstate"];

$naitivity=null;
$village=null;
$taluk=null;
$relation=$_POST["relation"];
$blood_group=$_POST["bgroup"];
$annual_income=null;
$student_mobile=$_POST["spho"];
$student_email=$_POST["semail"];
$date_of_admission=$_POST["year1"].'-'.$_POST["month1"].'-'.$_POST["day1"];
$course_id=null;
$category_id=null;
$reservation_id=null;
$detail_id=null;
$transfercertificate_id=null;
$rollno=$_POST["roll"];
$batch=null;
$semester=$_POST["sem"];

$class=$_POST["class"];
$regno=null;
$year_po=null;
$previous_institution=$_POST["prev"];
$register_no=null;
$tc_no=null;
$tc_date=null;
$entrance_roll_no=null;
$entrance_rank=$_POST["rank"];
$qualifying_board=$_POST["qboard"];
$qualifying_exam=$_POST["qexam"];
$percentage=$_POST["percentage"];
$year_po=$year_of_pass=$_POST["yop"];

//mother father
$fname=$_POST["fname"];
$foccupation=$_POST["focc"];
$femail_address=$_POST["femail"];
$fphone_no=$_POST["fpho"];
$mname=$_POST["mname"];
$moccupation=$_POST["mocc"];
$memail_address=$_POST["memail"];
$mphone_no=$_POST["mpho"];

$gname=$_POST["gname"];
$goccupation=$_POST["gocc"];
$gemail_address=$_POST["gemail"];
$gphone_no=$_POST["gpho"];

$sql = "UPDATE admissions SET name='$name',date_of_birth='$date_of_birth',sex='$sex',caste='$caste',religion='$religion',naitivity='$naitivity',village='$village',taluk='$taluk',relation='$relation',blood_group='$blood_group',annual_income='$annual_income',student_mobile='$student_mobile',student_email='$student_email',date_of_admission='$date_of_admission', course_id='$course_id',category_id='$category_id',reservation_id='$reservation_id',detail_id='$detail_id',transfercertificate_id='$transfercertificate_id',batch='$batch',semester='$semester',phone_no='$phone_no',class='$class',regno='$regno',year_po='$year_po' WHERE rollno='$rollno' ";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "Record updated successfully in admissions";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo $date_of_birth;
$sql = "UPDATE addresses SET house_name='$house_name',place1='$place1',place2='$place2',post_office='$post_office',district='$district',state='$state',pin='$pin' WHERE admission_id='$admission_no' AND type=0";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in addresses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE addresses SET house_name='$phouse_name',place1='$pplace1',place2='$pplace2',post_office='$ppost_office',district='$pdistrict',state='$pstate',pin='$ppin' WHERE admission_id='$admission_no' AND type=1";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in addresses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE addresses SET house_name='$ghouse_name',place1='$gplace1',place2='$gplace2',post_office='$gpost_office',district='$gdistrict',state='$gstate',pin='$gpin' WHERE admission_id='$admission_no' AND type=2";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in addresses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE details SET previous_institution='$previous_institution',register_no='$register_no',tc_no='$tc_no',tc_date='$tc_date',entrance_roll_no='$entrance_roll_no',entrance_rank='$entrance_rank',qualifying_board='$qualifying_board',qualifying_exam='$qualifying_exam',
percentage='$percentage',year_of_pass='$year_of_pass' WHERE admission_id='$admission_no'";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in details.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE relatives SET name='$fname',occupation='$foccupation',email_address='$femail_address',phone_no='$fphone_no' WHERE admission_id='$admission_no' AND type=0";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in relatives.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE relatives SET name='$mname',occupation='$moccupation',email_address='$memail_address',phone_no='$mphone_no' WHERE admission_id='$admission_no' AND type=1";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in relatives.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE relatives SET name='$gname',occupation='$goccupation',email_address='$gemail_address',phone_no='$gphone_no' WHERE admission_id='$admission_no' AND type=2";
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully in relatives.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

session_destroy();
$conn->close();

/*function convert($data){
if($data=="January")
 return 1;}*/




?>
