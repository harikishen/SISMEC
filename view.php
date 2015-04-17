<html>
<head><title>SISMEC</title>
<link rel="stylesheet" type="text/css" href="add.css">
</head>
<?php
if($_POST){
$flag=1;
$admno=$roll=$name=$class=$sem="";
$admErr=$rollErr=$nameErr="";
$day=$month=$year=$sex="";
$caste=$religion=$bgroup=$spho=$semail="";
$fname=$focc=$femail=$fpho=$mname="";
$mocc=$memail=$mpho=$hname=$pl1="";
$pl2=$poffice=$district=$state=$phname="";
$ppl1=$ppl2=$ppoffice=$pdistrict=$pstate="";
$gname=$gocc=$gemail=$gpho=$grel="";
$ghname=$gpl1=$gpl2=$gpoffice=$gdistrict=$gstate="";
$day1=$month1=$year1=$branch=$cat=$res="";
$prev=$rank=$qexam=$qboard=$percentage=$yop="";
$castErr=$relErr=$sphErr="";
$semailErr=$fnameErr=$femailErr="";
$fphoErr=$mnameErr=$memailErr="";
$mphoErr=$gnameErr=$gemailErr="";
$gphoErr=$rankErr="";
require_once 'dbconnect.php';  
$r=$_POST["sroll"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admissions WHERE admission_no='$r'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
       while($row=$result->fetch_assoc()){
    	   $admno=$row["admission_no"];
	   $roll=$row["rollno"];
	   $name=$row["name"];
	   $class=$row["class"];
	   $sem=$row["semester"];
	   $dob=$row["date_of_birth"];
	   $grel=$row["relation"];
	   $dob=explode('-',$dob);
	   $year=$dob[0];
	   $month=$dob[1];
	   $day=$dob[2];
	   $sex=$row["sex"];
	   $caste=$row["caste"];
	   $religion=$row["religion"];
	   $bgroup=$row["blood_group"];
	   $spho=$row["student_mobile"];
	   $semail=$row["student_email"];
	   $dob1=$row["date_of_admission"];
	   $dob1=explode('-',$dob1);
	   $year1=$dob1[0];
	   $month1=$dob1[1];
	   $day1=$dob1[2];
	   $cat=$row["category_id"];
	   $res=$row["reservation_id"];
	   $adm=$admno;
	}
} else {
      header("Location:http://127.1.1/notfound.php");exit();
    }

$sql = "SELECT * FROM addresses WHERE admission_id='$adm'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row=$result->fetch_assoc()){
                   if($row["type"]==0){
	   $hname=$row["house_name"];
	   $pl1=$row["place1"];
	   $pl2=$row["place2"];
	   $poffice=$row["post_office"];
	   $district=$row["district"];
	   $state=$row["state"];
	   }
	   if($row["type"]==1){
	   $phname=$row["house_name"];
	   $ppl1=$row["place1"];
	   $ppl2=$row["place2"];
	   $ppoffice=$row["post_office"];
	   $pdistrict=$row["district"];
	   $pstate=$row["state"];
	   }
           if($row["type"]==2){
	   $ghname=$row["house_name"];
	   $gpl1=$row["place1"];
	   $gpl2=$row["place2"];
	   $gpoffice=$row["post_office"];
	   $gdistrict=$row["district"];
	   $gstate=$row["state"];
	   }
	}
}
$sql = "SELECT * FROM details WHERE admission_id='$adm'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row=$result->fetch_assoc(); 
   // output data of each row
	   $prev=$row["previous_institution"];
	   $rank=$row["entrance_rank"];
	   $qexam=$row["qualifying_exam"];
	   $qboard=$row["qualifying_board"];
	   $percentage=$row["percentage"];
           $yop=$row["year_of_pass"];
	
} else {
    //echo "0 results";
}
$sql = "SELECT * FROM relatives WHERE admission_id='$adm'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row=$result->fetch_assoc()){
    // output data of each row
           if($row["type"]==0){
	   $fname=$row["name"];
	   $focc=$row["occupation"];
	   $femail=$row["email_address"];
	   $fpho=$row["phone_no"];
	   }
	   if($row["type"]==1){
	   $mname=$row["name"];
	   $mocc=$row["occupation"];
	   $memail=$row["email_address"];
	   $mpho=$row["phone_no"];
	   }
           if($row["type"]==2){
	   $gname=$row["name"];
	   $gocc=$row["occupation"];
	   $gemail=$row["email_address"];
	   $gpho=$row["phone_no"];
	   }

	}
} else {
    //echo "0 results";
}

$conn->close();
}
  function categorycheck($data)
   {
          switch($data)
      {
        case 0: return("GEN");
		  break;
        case 1: return("EZ");
		  break;
        case 2: return("MU");
		  break;
        case 3: return("BH");
		  break;
        case 4: return("LC");
		  break;
        case 5: return("BX");
		  break;
        case 6: return("SC");
		  break;
        case 7: return("ST");
		  break;
}
    return("");
   }
  function reservation($data)
   {
      switch($data)
      {
        case 0: return("SM");
		  break;
        case 1: return("NRI");
		  break;
        case 2: return("EZ");
		  break;
        case 3: return("MU");
		  break;
        case 4: return("BH");
		  break;
        case 5: return("LC");
		  break;
        case 6: return("BX");
		  break;
        case 7: return("ST");
		  break;
        case 8: return("SC");
		  break;
        case 9: return("ST");
		  break;

}
    return("");
   }

  function monthcheck($data)
   { 
     switch($data)
      {
        case 01: return("January");
		  break;
        case 2: return("February");
		  break;
        case 3: return("March");
		  break;
        case 4: return("April");
		  break;
        case 5: return("May");
		  break;
        case 6: return("June");
		  break;
        case 7: return("July");
		  break;
        case 8: return("August");
		  break;
        case 9: return("September");
		  break;
        case 10: return("October");
		  break;
        case 11: return("November");
		  break;
        case 12: return("December");
		  break;}
    return("");
   }
   function checkno($data)
    {
     global $flag;
     if(!preg_match("/^[0-9  \/]*$/",$data))
       {
        $flag++;
        return 1;
       }
     return 0;
    }
   function checkmail($email)
   {
     global $flag;
     if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $flag++;  
        return 1;
      }
      return 0;
   }
  function checkname($data)
  {
   global $flag;
   if(!preg_match("/^[a-zA-Z0-9 ]*$/",$data))
    {
      $flag++;
      return 1;
    }
   return 0;
  }



?>
<body background ="bg.jpg">

<div id ="Wrapper">
	<div id="header">
		<h1>SISMEC</h1>
	</div>

	<!-- Student Details -->
	
	<div class ="section">
		<h3>Student Details</h3><hr><br>
		<form name="form1"  method="post"id="form1" >
			<table>
				<tr><td width ="400">Admission No</td><td><p><?php echo $admno;?></p></td></tr>
				<tr><td width ="400">Roll No</td><td><p><?php echo $roll;?></p></td></tr>
                                <tr><td width ="400">Name</td><td><p><?php echo $name;?></p></td></tr>
				<tr><td width ="400">Class</td><td><p><?php echo $class;?></p></td></tr>
				<tr><td width ="400">Semester</td><td><p><?php echo $sem;?></p></td></tr>
			</table>
		
	</div>
	
	<!-- Personal Details -->
	
	
	<div class ="section">
		<h3>Personal Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">DoB</td><td><p><?php echo $day."-".monthcheck($month)."-".$year;?></p></td></tr>
				<tr><td width ="400">Sex</td><td><p><?php if($sex==m){echo"Male";}else{echo"Female";}?></p></td></tr>
				<tr><td width ="400">Caste</td><td><p><?php echo $caste;?></p></td></tr>
				<tr><td width ="400">Religion</td><td><p><?php echo $religion;?></td></tr>
				<tr><td width ="400">Blood Group</td><td><p><?php echo $bgroup;?></p></td></tr>
				<tr><td width ="400">Students Ph no.</td><td><p><?php echo $spho;?></p></td></tr>
				<tr><td width ="400">Students email</td><td><p><?php echo $semail;?></p></td></tr>	
			</table>
		
	</div>
	
	
	<!-- Fathers Details -->

	<div class ="section">
		<h3>Fathers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><p><?php echo $fname;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><p><?php echo $focc;?></p></td></tr>
				<tr><td width ="400">Email</td><td><p><?php echo $femail;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><p><?php echo $fpho;?></p></td><tr>
			</table>
		
	</div>


	<!-- Mothers Details -->
	
	<div class ="section">
		<h3>Mothers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><p><?php echo $mname;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><p><?php echo $mocc;?></p></td></tr>
				<tr><td width ="400">Email</td><td><p><?php echo $memail;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><p><?php echo $mpho;?></p><td></tr>
			</table>
		
	</div>
	
	<!-- Permanent Address -->
	
	<div class ="section">
		<h3>Permanent Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><p><?php echo $hname;?></p></td></tr>
				<tr><td width ="400">Place 1</td><td><p><?php echo $pl1;?></p></td></tr>
				<tr><td width ="400">Place 2</td><td><p><?php echo $pl2;?></p></td></tr>
				<tr><td width ="400">Post Office</td align="center"><td><p><?php echo $poffice;?></p></td></tr>
				<tr><td width ="400">District</td><td><p><?php echo $district;?></p></td></tr>
				<tr><td width ="400">State</td><td><p><?php echo $state;?></p></td></tr>
			</table>
		
	</div>
	<!-- Permanent Address -->
	
	<div class ="section">
		<h3>Present Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><p><?php echo $phname;?></p></td></tr>
				<tr><td width ="400">Place 1</td><td><p><?php echo $ppl1;?></p></td></tr>
				<tr><td width ="400">Place 2</td><td><p><?php echo $ppl2;?></p></td></tr>
				<tr><td width ="400">Post Office</td align="center"><td><p><?php echo $ppoffice;?></p></td></tr>
				<tr><td width ="400">District</td><td><p><?php echo $pdistrict;?></p></td></tr>
				<tr><td width ="400">State</td><td><p><?php echo $pstate;?></p></td></tr>
			</table>
		
	</div>

	<div class ="section">
		<h3>Admission Details And Previous Institution Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Date Of Admission</td><td><p><?php echo $day1."-".$month1."-".$year1;?></p></td></tr>
				<tr><td width ="400">Branch</td><td><p><?php echo $branch;?></p></td></tr>
				<tr><td width ="400">Category</td><td><p><?php echo categorycheck($cat);?></p></td></tr>
				<tr><td width ="400">Reservation</td><td><p><?php echo reservation($res);?></p></td></tr>
				<tr><td width ="400">Previous Institution</td><td><p><?php echo $prev;?></p></td></tr>
			</table>
		
	</div>
	
	<!-- Guardians's Details -->
	
	<div class="section">
		<h3>Guardians Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><p><?php echo $gname;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><p><?php echo $gocc;?></p></td></tr>
				<tr><td width ="400">Email</td><td><p><?php echo $gemail;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><p><?php echo $gpho;?></p></td><tr>
				<tr><td width ="400">Relation</td><td><p><?php echo $grel;?></p></td><tr>
			</table>
		
	</div>
	
	<!-- Guardian's Address -->
	
	<div class ="section">
		<h3>Guardian's Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><p><?php echo $ghname;?></p></td></tr>
				<tr><td width ="400">Place 1</td><td><p><?php echo $gpl1;?></p></td></tr>
				<tr><td width ="400">Place 2</td><td><p><?php echo $gpl2;?></p></td></tr>
				<tr><td width ="400">Post Office</td align="center"><td><p><?php echo $gpoffice;?></p></td></tr>
				<tr><td width ="400">District</td><td><p><?php echo $gdistrict;?></p></td></tr>
				<tr><td width ="400">State</td><td><p><?php echo $gstate;?></p></td></tr>
			</table>
		
	</div>
	
	<!-- Qualifying Examination Details -->
	
	<div class="section">
		<h3>Qualifying Examination Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Entrance Rank</td><td><p><?php echo $rank;?></p></td></tr>
				<tr><td width ="400">Qualifying Exam</td><td><p><?php echo $qexam;?></p></td></tr>
				<tr><td width ="400">Qualifying Board</td><td><p><?php echo $qboard;?></p></td></tr>
				<tr><td width ="400">Percentage</td><td><p><?php echo $percentage;?></p></td></tr>
				<tr><td width ="400">Year of Pass</td><td><p><?php echo $yop;?></p></td></tr>
			</table><br></br>
		</form>
	</div>
	
	<div id="footer">
		Copyright 2013 Model Engineering College, Thrikkakara &copy;
	</div>
<style>
p{
	font-style: bold;
	
}
</style>
  
		
	
</div>
</body>

</html>
