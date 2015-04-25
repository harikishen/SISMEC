function test(){
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText==="exists")
         alert("Student Details Already Exists\nEnter Different Admission Number");		
    }
  }
xmlhttp.open("POST","validity.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("admno="+document.getElementById("admno").value);
}
