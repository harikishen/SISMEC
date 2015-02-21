<html>
<head><title>SISMEC</title>
<link rel="stylesheet" type="text/css" href="add.css">
</head>
<?php
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

  
$servername = "localhost";
$username = "root";
$password = "turbodrive111";
$dbname = "harikishen";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admissions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($row["id"]==26)
         {
	   $admno=$row["admission_no"];
	   $roll=$row["rollno"];
	   $name=$row["name"];
	   $class=$row["class"];
	   $sem=$row["semester"];
	   $dob=$row["date_of_birth"];
	   $dob=explode('-',$dob);
	   $day=$dob[0];
	   $month=$dob[1];
	   $year=$dob[2];
	   $sex=$row["sex"];
	   $caste=$row["caste"];
	   $religion=$row["religion"];
	   $bgroup=$row["blood_group"];
	   $spho=$row["student_mobile"];
	   $semail=$row["student_email"];
	   /*$fname=$row["fname"];
	   //$focc=$_POST["focc"];
	   //$femail=$_POST["femail"];
	   //$fpho=$_POST["fpho"];
	   //$mname=$_POST["mname"];
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
	   $grel=$_POST["grel"];
	   $pdistrict=$_POST["pdistrict"];
	   $pstate=$_POST["pstate"];
	   $gdistrict=$_POST["gdistrict"];
	   $gstate=$_POST["gstate"];
	   */$dob1=$row["date_of_admission"];
	   $dob1=explode('-',$dob1);
	   $day1=$dob1[0];
	   $month1=$dob1[1];
	   $year1=$dob1[2];
	   //$branch=$_POST["branch"];
	   $cat=$row["category_id"];
	   $res=$row["reservation_id"];
	   //$prev=$row["prev"];
	   //$rank=$_POST["rank"];
	   //$qexam=$_POST["qexam"];
	   //$qboard=$_POST["qboard"];
	   //$percentage=$_POST["percentage"];
           $yop=$row["year_po"];
	 }
    }
} else {
    echo "0 results";
}
$conn->close();
 

if($_POST)
 { 
   $_POST["direct"]=1;
   $flag=0;
   $admno=$_POST["admno"];
   $roll=$_POST["roll"];
   $name=$_POST["name"];
   $class=$_POST["class"];
   $sem=$_POST["sem"];
   $day=$_POST["day"];
   $month=$_POST["month"];
   $year=$_POST["year"];
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
   $grel=$_POST["grel"];
   $pdistrict=$_POST["pdistrict"];
   $pstate=$_POST["pstate"];
   $gdistrict=$_POST["gdistrict"];
   $gstate=$_POST["gstate"];
   $day1=$_POST["day1"];
   $month1=$_POST["month1"];
   $year1=$_POST["year1"];
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
   if(empty($admno))
     {$admErr="*Admission Number is Required";$flag++;}
      $admno=$_POST["admno"];
   if(checkname($roll)==1)
    $rollErr="*Invalid Roll Number";
   if(empty($roll))
     {$rollErr="*Roll Number is Required";$flag++;}
   if(checkname($name)==1)
    $nameErr="*Invalid Name";
   if(empty($name))
     {$nameErr="*Name is Required";$flag++;}
   if(checkmail($semail)==1)
    $semailErr="*Invalid Email ID";
   if(empty($semail))
     {$semailErr="*Email ID is Required";$flag++;}
   if(checkno($spho)==1)
    $sphErr="*Invalid Phone Number";
   if(empty($spho))
     {$sphErr="*Phone Number is Required";$flag++;}
   if(checkname($fname)==1)
    $nameErr="*Invalid Name";
   if(empty($fname))
     {$fnameErr="*Father's Name is Required";$flag++;}
   if(checkmail($femail)==1)
    $femailErr="*Invalid Email ID";
   if(empty($femail))
     {$femailErr="*Email ID is Required";$flag++;}
   if(checkno($fpho)==1)
    $fphoErr="*Invalid Phone Number";
   if(empty($fpho))
     {$fphoErr="*Phone Number is Required";$flag++;}
   if(empty($mname))
     {$mnameErr="*Mother's Name is Required";$flag++;}
   if(checkmail($memail)==1)
    $memailErr="*Invalid Email ID";
   if(empty($memail))
     {$memailErr="*Email ID is Required";$flag++;}
   if(checkno($mpho)==1)
    $mphoErr="*Invalid Phone Number";
   if(empty($mpho))
     {$mphoErr="*Phone Number is Required";$flag++;}
   if(empty($gname))
     {$gnameErr="*Guardian's Name is Required";$flag++;}
   if(checkmail($gemail)==1)
    $gemailErr="*Invalid Email ID";
   if(empty($gemail))
     {$gemailErr="*Email ID is Required";$flag++;}
   if(checkno($gpho)==1)
    $gphoErr="*Invalid Phone Number";
   if(empty($gpho))
     {$gphoErr="*Phone Number is Required";$flag++;}
        session_start();
	$_SESSION=$_POST;
	session_write_close();

   if($flag==0)
    {       

	header("Location: http://127.1.1/db.php");exit();
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
		<form name="form1"  method="post" action="add.php" id="form1" >
			<table>
				<tr><td width ="400">Admission No</td><td><input type ="text" name="admno" value="<?php echo $admno;?>" size="20"></td><td><p><?php echo $admErr;?></p></td></tr>
				<tr><td width ="400">Roll No</td><td><input type ="text" name="roll" value="<?php echo $roll;?>" size ="20"></td><td><p><?php echo $rollErr;?></p></td></tr>
                                <tr><td width ="400">Name</td><td><input type ="text" name="name" value="<?php echo $name;?>" size="20"></td><td><p><?php echo $nameErr;?><p></td></tr>
				<tr><td width ="400">Class</td><td>
				<select name="class">
                                        <option selected ="<?php echo $class;?>"><?php echo $class;?></option>
					<option value ="C1&2A" selected>C1&2A </option>
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
					<option value ="1&2" selected>1&2 </option>
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
				<tr><td width ="400">DoB</td><td>
					<select name="day">
						<option></option>
						<option selected="<?php echo $day;?>"><?php echo $day;?></option>
						<option value="01" selected>01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
						<select name="month" >
						<option></option>
						<option selected="<?php echo $month;?>"><?php echo $month;?></option>
						<option value="01" selected>January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
						</select>
						<select name="year">
						<option selected="<?php echo $year;?>"><?php echo $year;?></option>
						<option value="1999" selected>1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
						<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
						<option value="1979">1979</option>
						<option value="1978">1978</option>
						<option value="1977">1977</option>
						<option value="1976">1976</option>
						<option value="1975">1975</option>
						</select>
						</td></tr>
				<tr><td width ="400">Sex</td><td><input type ="radio" name="sex" <?php if (isset($sex) && $sex=="m") echo "checked";?> value="m">Male<input type="radio" name="sex" <?php if (isset($sex) && $sex=="f") echo "checked";?> value="f">Female</td></tr>
				<tr><td width ="400">Caste</td><td><input type ="text" size ="20" name="caste" value="<?php echo $caste;?>"><p><?php echo $castErr;?></p></td></tr>
				<tr><td width ="400">Religion</td><td><input type ="text" size ="20" name="religion"  value="<?php echo $religion;?>"><p><?php echo $relErr;?></p></td></tr>
				<tr><td width ="400">Blood Group</td><td>
				<select name="bgroup">
					<option value ="A+" selected>A+</option>
					<option value ="B+">B+</option>
					<option value ="O+">O+</option>
					<option value ="AB+">O+</option>
					<option value ="AB-">O+</option>
					<option value ="A-">A-</option>
					<option value ="B-">B-</option>
					<option value ="O-">O-</option>
				</select></td></tr>
				<tr><td width ="400">Students Ph no.</td><td><input type ="text" size="20" name="spho" value="<?php echo $spho;?>"></td><td><p><?php echo $sphErr;?></p></td></tr>
				<tr><td width ="400">Students email</td><td><input type ="text" size="20" name="semail" value="<?php echo $semail;?>"></td><td><p><?php echo $semailErr;?></p></td></tr>	
			</table>
		
	</div>
	
	
	<!-- Fathers Details -->

	<div class ="section">
		<h3>Fathers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="fname" value="<?php echo $fname;?>"></td><td><p><?php echo $fnameErr;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="focc" value="<?php echo $focc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="text" size="20" name="femail" value="<?php echo $femail;?>"></td><td><p><?php echo $femailErr;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="fpho" value="<?php echo $fpho;?>"></td><td><p><?php echo $fphoErr;?></p></td><tr>
			</table>
		
	</div>


	<!-- Mothers Details -->
	
	<div class ="section">
		<h3>Mothers Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="mname"value="<?php echo $mname;?>"></td><td><p><?php echo $mnameErr;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="mocc" value="<?php echo $mocc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="text" size="20" name="memail" value="<?php echo $memail;?>"></td><td><p><?php echo $memailErr;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="mpho" value="<?php echo $mpho;?>"></td><td><p><?php echo $mphoErr;?></p><td></tr>
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
				<tr><td width ="400">Date Of Admission</td><td>
					<select name="day1">
						<option></option>
						<option value="01" selected>01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
						<select name="month1" > 							         							<option></option>
						<option value="01" selected>January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
						</select>
						<select name="year1">
						<option></option>
						<option value="2035" selected>2035</option>
						<option value="2034">2034</option>
						<option value="2033">2033</option>
						<option value="2032">2032</option>
						<option value="2031">2031</option>
						<option value="2030">2030</option>
						<option value="2029">2029</option>
						<option value="2028">2028</option>
						<option value="2027">2027</option>
						<option value="2026">2026</option>
						<option value="2025">2025</option>
						<option value="2024">2024</option>
						<option value="2023">2023</option>
						<option value="2022">2022</option>
						<option value="2021">2021</option>
						<option value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="4009">4009</option>
						<option value="4008">4008</option>
						<option value="4007">4007</option>
						<option value="4006">4006</option>
						<option value="4005">4005</option>
						<option value="4004">4004</option>
						<option value="4003">4003</option>
						<option value="4002">4002</option>
						<option value="4001">4001</option>
						<option value="4000">4000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						</select>
						</td></tr>
				<tr><td width ="400">Branch</td><td>
				<select name="branch">
					<option></option>
					<option value ="CSU" selected>CSU</option>
					<option value ="ECU">ECU</option>
					<option value ="EBU">EBU</option>
					<option value ="EEE">EEE</option>
					</select></td></tr>
				<tr><td width ="400">Category</td><td>
				<select name="cat">
					<option></option>
					<option value ="GEN" selected>GEN</option>
					<option value ="EZ">EZ</option>
					<option value ="MU">MU</option>
					<option value ="BH">BH</option>
					<option value ="LC">LC</option>
					<option value ="BX">BX</option>
					<option value ="SC">SC</option>
					<option value ="ST">ST</option>
					</select></td></tr>
				<tr><td width ="400">Reservation</td><td>
				<select name="res">
										<option></option>
					<option value ="SM" selected>SM</option>
					<option value ="NRI">NRI</option>
					<option value ="EZ">EZ</option>
					<option value ="MU">MU</option>
					<option value ="BH">BH</option>
					<option value ="LC">LC</option>
					<option value ="BX">BX</option>
					<option value ="SC">SC</option>
					<option value ="ST">ST</option>
					<option value ="MG">MG</option>
					</select></td></tr>

				<tr><td width ="400">Previous Institution</td><td><input type ="text" size="20" name="prev" value="<?php echo $prev;?>"></td></tr>
			</table>
		
	</div>
	
	<!-- Guardians's Details -->
	
	<div class="section">
		<h3>Guardians Details</h3><hr><br>
		
			<table>
				<tr><td width ="400">Name</td><td><input type="text" size="20" name="gname" value="<?php echo $gname;?>"></td><td><p><?php echo $gnameErr;?></p></td></tr>
				<tr><td width ="400">Occupation</td><td><input type="text" size="20" name="gocc" value="<?php echo $gocc;?>"></td></tr>
				<tr><td width ="400">Email</td><td><input type="text" size="20" name="gemail" value="<?php echo $gemail;?>"></td><td><p><?php echo $gemailErr;?></p></td><tr>
				<tr><td width ="400">Phone no</td><td><input type="text" size="20" name="gpho" value="<?php echo $gpho;?>"></td><td><p><?php echo $gphoErr;?></p></td><tr>
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
				<tr><td width ="400">Qualifying Board</td><td><input type="text" size="20" name="qboard" value="<?php echo $qexam;?>"></td></tr>
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
