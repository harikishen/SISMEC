<html>
<head><title>SISMEC</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="date.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="add.css">
</head>
<?php
if(!$_POST){
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
session_start();
if($_SESSION["edit"]!=1)
  die("Access Denied");
else
 {
  $_SESSION["edit"]=0;
  session_write_close();
}

require_once 'dbconnect.php';
$r=$_GET["sroll"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admissions WHERE rollno='$r'";
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
	   $sex=$row["sex"];
	   $caste=$row["caste"];
	   $religion=$row["religion"];
	   $bgroup=$row["blood_group"];
	   $spho=$row["student_mobile"];
	   $semail=$row["student_email"];
	   $doa=$row["date_of_admission"];
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
if($_POST)
 { 
   $_POST["direct"]=1;
   $flag=0;
   $admno=$_POST["admno"];
   $roll=$_POST["roll"];
   $name=$_POST["name"];
   $class=$_POST["class"];
   $sem=$_POST["sem"];
   $dob=$_POST["dob"];
   $sex=$_POST["sex"];
   $caste=$_POST["caste"];
   $religion=$_POST["religion"];
   $bgroup=$_POST["bgroup"];
   $spho=$_POST["spho"];
   $semail=$_POST["semail"];
   $fname=$_POST["fname"];
   $focc=$_POST["focc"];
   $femail=$_POST["femail"];
   $fpho=$_POST["fpho"];
   $mname=$_POST["mname"];
   $mocc=$_POST["mocc"];
   $memail=$_POST["memail"];
   $mpho=$_POST["mpho"];
   $hname=$_POST["hname"];
   $pl1=$_POST["pl1"];
   $pl2=$_POST["pl2"];
   $poffice=$_POST["poffice"];
   $district=$_POST["district"];
   $state=$_POST["state"];
   $phname=$_POST["phname"];
   $ppl1=$_POST["ppl1"];
   $ppl2=$_POST["ppl2"];
   $ppoffice=$_POST["ppoffice"];
   $ghname=$_POST["ghname"];
   $gpl1=$_POST["gpl1"];
   $gpl2=$_POST["gpl2"];
   $gpoffice=$_POST["gpoffice"];
   $gname=$_POST["gname"];
   $gocc=$_POST["gocc"];
   $gemail=$_POST["gemail"];
   $gpho=$_POST["gpho"];
   $grel=$_POST["relation"];
   $pdistrict=$_POST["pdistrict"];
   $pstate=$_POST["pstate"];
   $gdistrict=$_POST["gdistrict"];
   $gstate=$_POST["gstate"];
   $doa=$_POST["doa"];
   $branch=$_POST["branch"];
   $cat=$_POST["cat"];
   $res=$_POST["res"];
   $prev=$_POST["prev"];
   $rank=$_POST["rank"];
   $qexam=$_POST["qexam"];
   $qboard=$_POST["qboard"];
   $percentage=$_POST["percentage"];
   $yop=$_POST["yop"];
   if(checkno($admno)==1)
    $admErr="*Invalid Admission Number";
        $admno=$_POST["admno"];
   if(checkno($spho)==1)
    $sphErr="*Invalid Phone Number";
   if(checkno($fpho)==1)
    $fphoErr="*Invalid Phone Number";
   if(checkno($mpho)==1)
    $mphoErr="*Invalid Phone Number";
   if(checkno($gpho)==1)
    $gphoErr="*Invalid Phone Number";
        session_start();
	$_SESSION=$_POST;
   $_SESSION["direct"]=2;
	session_write_close();

   if($flag==0)
    {       
     
	header("Location: http://127.1.1/update.php");exit();
    }
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
		<form name="form1"  method="post" action="edit.php" id="form1" >
			<table>
				<tr><td width ="400">Admission No</td><td><input type ="text" name="admno" value="<?php echo $admno;?>" size="20" required></td><td><p><?php echo $admErr;?></p></td></tr>
				<tr><td width ="400">Roll No</td><td><input type ="text" name="roll" value="<?php echo $roll;?>" size ="20" required></td><td></td></tr>
                                <tr><td width ="400">Name</td><td><input type ="text" name="name" value="<?php echo $name;?>" size="20" required></td><td></td></tr>
				<tr><td width ="400">Class</td><td>
				<select name="class">
                                        <option selected ="<?php echo $class;?>"><?php echo $class;?></option>
					<option value ="C1&2A" >C1&2A </option>
					<option value ="C1&2B">C1&2B </option>
					<option value ="C3A">C3A</option>
					<option value ="C3B">C3B</option>
					<option value ="C4A">C4A</option>
					<option value ="C4B">C4B</option>
					<option value ="C5A">C5A </option>
					<option value ="C5B">C5B </option>
					<option value ="C6A">C6A</option>
					<option value ="C6B">C6B</option>
					<option value ="C7A">C7A</option>
					<option value ="C7B">C7B</option>
					<option value ="C8A">C8A</option>
					<option value ="C8B">C8B</option>
					<option value ="E1&2A">E1&2A </option>
					<option value ="E1&2B">E1&2B </option>
					<option value ="E3A">E3A</option>
					<option value ="E3B">E3B</option>
					<option value ="E4A">E4A</option>
					<option value ="E4B">E4B</option>
					<option value ="E5A">E5A </option>
					<option value ="E5B">E5B </option>
					<option value ="E6A">E6A</option>
					<option value ="E6B">E6B</option>
					<option value ="E7A">E7A</option>
					<option value ="E7B">E7B</option>
					<option value ="E8A">E8A</option>
					<option value ="E8B">E8B</option>
					<option value ="EB1&2">EB1&2 </option>
					<option value ="B3">B3</option>
					<option value ="B4">B4</option>
					<option value ="B5">B5</option>
					<option value ="B6">B6</option>
					<option value ="B7">B7</option>
					<option value ="B8">B8</option>
					<option value ="EE1&2">EE1&2 </option>
					<option value ="EE3">EE3</option>
					<option value ="EE4">EE4</option>
					<option value ="EE5">EE5</option>
					<option value ="EE6">EE6</option>
					<option value ="EE7">EE7</option>
					<option value ="EE8">EE8</option>
				</select></td></tr>
				<tr><td width ="400">Semester</td><td>
				<select name="sem">
                                        <option selected ="<?php echo $sem;?>"><?php echo $sem;?></option>
					<option value ="1&2" >1&2 </option>
					<option value ="3">3</option>
					<option value ="4">4</option>
					<option value ="5">5</option>
					<option value ="6">6</option>
					<option value ="7">7</option>
					<option value ="8">8</option>
				</select></td></tr>

			</table>
		
	</div>
	
	<!-- Personal Details -->
	
	
	<div class ="section">
		<h3>Personal Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">DoB</td><td><input type ="date" size ="20" name="dob" value="<?php echo $dob;?>" placeholder="yyyy/mm/dd" required></td></tr>
				<tr><td width ="400">Sex</td><td><input type ="radio" name="sex" <?php if (isset($sex) && $sex=="m") echo "checked";?> value="m">Male<input type="radio" name="sex" <?php if (isset($sex) && $sex=="f") echo "checked";?> value="f">Female</td></tr>
				<tr><td width ="400">Caste</td><td><input type ="text" size ="20" name="caste" value="<?php echo $caste;?>"></td></tr>
				<tr><td width ="400">Religion</td><td><input type ="text" size ="20" name="religion"  value="<?php echo $religion;?>"></td></tr>
				<tr><td width ="400">Blood Group</td><td>
				<select name="bgroup">
					<option selected="<?php echo $bgroup;?>"><?php echo $bgroup;?></option>
					<option value ="A+" >A+</option>
					<option value ="B+">B+</option>
					<option value ="O+">O+</option>
					<option value ="AB+">AB+</option>
					<option value ="AB-">AB-</option>
					<option value ="A-">A-</option>
					<option value ="B-">B-</option>
					<option value ="O-">O-</option>
				</select></td></tr>
				<tr><td width ="400">Students Ph no.</td><td><input type =tel size="20" name="spho" value="<?php echo $spho;?>" required></td><td></td></tr>
				<tr><td width ="400">Students email</td><td><input type =email size="20" name="semail" value="<?php echo $semail;?>" required></td><td></td></tr>	
			</table>
		
	</div>
	
	
	<!-- Fathers Details -->

	<div class ="section">
		<h3>Fathers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="fname" value="<?php echo $fname;?>" required></td><td></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="focc" value="<?php echo $focc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="email" size="20" name="femail" value="<?php echo $femail;?>" required></td><td></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="fpho" value="<?php echo $fpho;?>" required></td><td><p><?php echo $fphoErr;?></p></td><tr>
			</table>
		
	</div>


	<!-- Mothers Details -->
	
	<div class ="section">
		<h3>Mothers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="mname"value="<?php echo $mname;?>" required></td><td></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="mocc" value="<?php echo $mocc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="email" size="20" name="memail" value="<?php echo $memail;?>" required></td><td></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="mpho" value="<?php echo $mpho;?>" required></td><td><td></tr>
			</table>
		
	</div>
	
	<!-- Permanent Address -->
	
	<div class ="section">
		<h3>Permanent Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><input type ="text" size="20" name="hname" value="<?php echo $hname;?>"></td></tr>
				<tr><td width ="400">Place 1</td><td><input type="text" size="20" name="pl1" value="<?php echo $pl1;?>"></td></tr>
				<tr><td width ="400">Place 2</td><td><input type="text" size="20" name="pl2" value="<?php echo $pl2;?>"></td></tr>
				<tr><td width ="400">Post Office</td align="center"><td><input type="text" size="20" name="poffice" value="<?php echo $poffice;?>"></td></tr>
				<tr><td width ="400">District</td><td><input type="text" size="20" name="district" value="<?php echo $district;?>"></td></tr>
				<tr><td width ="400">State</td><td><input type="text" size="20" name="state" value="<?php echo $state;?>"></td></tr>
			</table>
		
	</div>
	
	<!-- Present Address -->
	
	<div class ="section">
		<h3>Present Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><input type ="text" size="20" name="phname" value="<?php echo $phname;?>"></td></tr>
				<tr><td width ="400">Place 1</td><td><input type="text" size="20" name="ppl1" value="<?php echo $ppl1;?>"></td></tr>
				<tr><td width ="400">Place 2</td><td><input type="text" size="20" name="ppl2" value="<?php echo $ppl2;?>"></td></tr>
				<tr><td width ="400">Post Office</td><td><input type="text" size="20" name="ppoffice" value="<?php echo $ppoffice;?>"></td></tr>
				<tr><td width ="400">District</td><td><input type="text" size="20" name="pdistrict" value="<?php echo $pdistrict;?>"></td></tr>
				<tr><td width ="400">State</td><td><input type="text" size="20" name="pstate" value="<?php echo $pstate;?>"></td></tr>
			</table>
		
	</div>
	<div class ="section">
		<h3>Admission Details And Previous Institution Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Date Of Admission</td><td><input type ="date" size ="20" name="doa" value="<?php echo $doa;?>" placeholder="yyyy/mm/dd" required></td></tr>
				<tr><td width ="400">Branch</td><td>
				<select name="branch">
					<option></option>
					<option selected="<?php echo substr($roll,0,3);?>"><?php echo substr($roll,0,3);?></option>
					<option value ="CSU">CSU</option>
					<option value ="ECU">ECU</option>
					<option value ="EBU">EBU</option>
					<option value ="EEE">EEE</option>
					</select></td></tr>
				<tr><td width ="400">Category</td><td>
				<select name="cat">
					<option></option>
					<option selected="<?php echo $cat;?>"><?php echo categorycheck($cat);?></option>
					<option value ="0">GEN</option>
					<option value ="1">EZ</option>
					<option value ="2">MU</option>
					<option value ="3">BH</option>
					<option value ="4">LC</option>
					<option value ="5">BX</option>
					<option value ="6">SC</option>
					<option value ="7">ST</option>
					</select></td></tr>
				<tr><td width ="400">Reservation</td><td>
				<select name="res">
					<option></option>
					<option selected="<?php echo $res;?>"><?php echo reservation($res);?></option>
					<option value ="0" >SM</option>
					<option value ="1">NRI</option>
					<option value ="2">EZ</option>
					<option value ="3">MU</option>
					<option value ="4">BH</option>
					<option value ="5">LC</option>
					<option value ="6">BX</option>
					<option value ="7">SC</option>
					<option value ="8">ST</option>
					<option value ="9">MG</option>
					</select></td></tr>

				<tr><td width ="400">Previous Institution</td><td><input type ="text" size="20" name="prev" value="<?php echo $prev;?>"></td></tr>
			</table>
		
	</div>
	
	<!-- Guardians's Details -->
	
	<div class="section">
		<h3>Guardians Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="gname" value="<?php echo $gname;?>" required></td><td></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="gocc" value="<?php echo $gocc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="email" size="20" name="gemail" value="<?php echo $gemail;?>" required></td><td></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="gpho" value="<?php echo $gpho;?>"></td><td></td><tr>
				<tr><td width ="400">Relation</td><td><input type="text" size="20" name="relation" value="<?php echo $grel;?>"></td><tr>
			</table>
		
	</div>
	
	<!-- Guardian's Address -->
	
	<div class ="section">
		<h3>Guardian's Address</h3><hr><br>
		
			<table>
				<tr><td width ="400">House Name</td><td><input type ="text" size="20" name="ghname" value="<?php echo $ghname;?>"></td></tr>
				<tr><td width ="400">Place 1</td><td><input type="text" size="20" name="gpl1" value="<?php echo $gpl1;?>"></td></tr>
				<tr><td width ="400">Place 2</td><td><input type="text" size="20" name="gpl2" value="<?php echo $gpl2;?>"></td></tr>
				<tr><td width ="400">Post Office</td><td><input type="text" size="20" name="gpoffice" value="<?php echo $gpoffice;?>"></td></tr>
				<tr><td width ="400">District</td><td><input type="text" size="20" name="gdistrict" value="<?php echo $gdistrict;?>"></td></tr>
				<tr><td width ="400">State</td><td><input type="text" size="20" name="gstate" value="<?php echo $gstate;?>"></td></tr>
			</table>
		
	</div>
	
	<!-- Qualifying Examination Details -->
	
	<div class="section">
		<h3>Qualifying Examination Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Entrance Rank</td><td><input type="text" size="20" name="rank" value="<?php echo $rank;?>"><p><?php echo $rankErr;?></p></td></tr>
				<tr><td width ="400">Qualifying Exam</td><td><input type="text" size="20" name="qexam" value="<?php echo $qexam;?>"></td></tr>
				<tr><td width ="400">Qualifying Board</td><td><input type="text" size="20" name="qboard" value="<?php echo $qboard;?>"></td></tr>
				<tr><td width ="400">Percentage</td><td><input type="text" size="20" name="percentage" value="<?php echo $percentage;?>"></td></tr>
				<tr><td width ="400">Year of Pass</td><td><input type="text" size="20"name="yop" value="<?php echo $yop;?>"></td></tr>
			</table><br></br>
                                 <div align="center"><input type="submit" name="submit"  value="&check;" id="but_sub"></div>
		</form>
	</div>
	
	<div id="footer">
		Copyright 4008 Model Engineering College, Thrikkakara &copy;
	</div>
<style>
p{
	color: red;
	font-style: italic;
	
}
</style>
  
		
	
</div>
</body>
</html>
