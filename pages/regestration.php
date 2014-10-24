
<style type="text/css">
body, div, h1, h2, h3, h4, h5, h6, p, ul, ol, li, dl, dt, dd, img, form, fieldset, input, textarea, blockquote {
	margin: 0; padding: 0; border: 0;
}

body {
	background: ;
	font-family: Helvetica, sans-serif; font-size: 18px; line-height:10px;
}

nav {
	margin: 5px auto; 
	text-align: center;
	margin-left:-35px;
}

nav ul ul {
	display: none;
}

	nav ul li:hover > ul {
		display: block;
	}


nav ul {
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #990000   0%, #990000     100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 30px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;
}
	nav ul:after {
		content: ""; clear: both; display: block;
	}

	nav ul li {
		float: left;
	}
		nav ul li:hover {
			background: #4b545f;
			background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -moz-linear-gradient(top,  #99CC00 0%, #99CC00 40%);
			background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);
		}
			nav ul li:hover a {     
			
				color: #fff;
			}
		
		nav ul li a {
			display: block; padding: 25px 40px;
			color: #757575; text-decoration: none;
		}
			
		
	nav ul ul {
		background: #5f6975; border-radius: 0px; padding: 0;
		position: absolute; top: 100%;
	}
		nav ul ul li {
			float: none; 
			border-top: 1px solid #6b727c;
			border-bottom: 1px solid #575f6a; position: relative;
		}
			nav ul ul li a {
				padding: 5px 	40px;
				color: #fff;
			}	
				nav ul ul li a:hover {
					background: #4b545f;
				}
		
	nav ul ul ul {
		position: absolute; left: 100%; top:0;
	}
-->		

.a {margin:-7px;
padding:0px;
height:110px;
width:1365px;
background: #CC3300;
}
.a1{margin:3px;
   margin-left:19px;
  padding:5px;
  height:90px;
  width:180px;
  background:;
  float:left;
  }
   .a2{margin:10px;
  padding:5px;
  height:80px;
  width:1100px;
  background: ;
  float:left;
  }
.b{margin-top:5px;
margin-left:-7px;
padding:0px;
height:600px;
width:1365;
background: #E1E1E1 ;
}

.b1{margin-top:0px;
margin-left:0px;
padding:0px;
height:600px;
float:left;
width:300px;
background:#E1E1E1;
}

.b2{margin-top:0px;
margin-left:-0px;
padding:0px;
height:600px;
float:left;
width:700px;
background:#CCCCCC;
}

.b2a{margin:0px;
padding:0px;
height:45px;
width:700px;
background:#CCCCCC;
}


</style>
<?php
require_once('../include.php');

if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

// not logged in, move to login page

header('Location: ../main.php');

exit;
}
?>

<?php
	if(isset($_REQUEST['sub']))
	{
		$idi=$_REQUEST['email'];
		if($_REQUEST['sub'])
		{
			if(!(@ereg("[A-Z a-z 0-9 _ .]+\@[a-z]+\.[a-z .]+$","$idi")))
			{
				echo "<script>alert('invalid email----fill all entries again')</script>";
			}
			else
			{
				$stud_fac=$_REQUEST['stud_fac'];
				$roll=$_REQUEST['roll'];
				$pass1=$_REQUEST['pass1'];
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$year=$_REQUEST['year'];
				mysql_connect('127.0.0.1','root','') or die(mysql_error());
				mysql_select_db("devender")  or die(mysql_error());
				$stud_fac=$_REQUEST['stud_fac'];
				if($stud_fac=="Student"){
					$hostel=$_REQUEST['hostel'];
					$room=$_REQUEST['room'];
					$dep=$_REQUEST['dep'];
					$sql1="select * from student";
					$query=mysql_query($sql1) or die(mysql_error());
					while($res=mysql_fetch_array($query))
					{
						if($res[0]==$roll)
						{
							echo "<script>alert('username exists')</script>";
							return ;
							
						}
					}
					$sql="insert into student values('$roll','$pass1','$name','$email','$year','$hostel','$room','$dep')";
						mysql_query($sql) or die(mysql_error());
						echo "<script>alert('Registration done for with username $roll')</script>";
					//	header("Location:www.google.com");
				
				}
				if($stud_fac=="Faculty"){
					$hostel=$_REQUEST['hostel'];
					$room=$_REQUEST['room'];
					$dep=$_REQUEST['dep'];
					$sql1="select * from faculty";
					$query=mysql_query($sql1) or die(mysql_error());
					while($res=mysql_fetch_array($query))
					{
						if($res[0]==$roll)
						{
							echo "<script>alert('username exists')</script>";
							return;
						}
					}
					$sql="insert into faculty values('$roll','$pass1','$name','$email','$year','$hostel','$room','$dep')";
						mysql_query($sql) or die(mysql_error());
						echo "<script>alert('Registration done for with username $roll')</script>";
					//	header("Location:www.google.com");
				}
				if($stud_fac=="Associate Warden"){
					$hostel=$_REQUEST['hostel'];
					$room=$_REQUEST['room'];
					$dep=$_REQUEST['dep'];
					$sql1="select * from ass_warden";
					$query=mysql_query($sql1) or die(mysql_error());
					while($res=mysql_fetch_array($query))
					{
						if($res[0]==$roll)
						{
							echo "<script>alert('username exists')</script>";
							return;
						}
					}
					$sql="insert into ass_warden values('$roll','$pass1','$name','$email','$year','$hostel','$room','$dep')";
						mysql_query($sql) or die(mysql_error());
						echo "<script>alert('Registration done for with username $roll')</script>";
					//	header("Location:www.google.com");
				}
				
				if($stud_fac=="Care Taker"){
					$hostel=$_REQUEST['hostel'];
					$room=$_REQUEST['room'];
					$dep=$_REQUEST['dep'];
					$sql1="select * from care_taker";
					$query=mysql_query($sql1) or die(mysql_error());
					while($res=mysql_fetch_array($query))
					{
						if($res[0]==$roll)
						{
							echo "<script>alert('username exists')</script>";
							return;
						}
					}
					$sql="insert into care_taker values('$roll','$pass1','$name','$email','$year','$hostel','$room','$dep')";
						mysql_query($sql) or die(mysql_error());
						echo "<script>alert('Registration done for with username $roll')</script>";
					//	header("Location:www.google.com");
				}
				
				
			
			}
		}
	}
?>






<html>
<head>
<script type="text/javascript" language="javascript">

function ValidateAlpha()
{
var keyCode = window.event.keyCode;
if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
{
window.event.returnValue = false;
alert("Enter only letters");
return false;
}
}

function ValidateNumber()
{
var keyCode = window.event.keyCode;
if ((keyCode < 48 || keyCode > 57))
{
window.event.returnValue = false;
alert("Enter only numbers");
return false;
}
}





function validate(){
	if((document.f.roll.value==''))
		{
			alert("enter your roll");
			document.f.roll.focus();
			return false;
		}
		if(document.f.pass1.value=='')
		{
			alert("Enter password");
			document.f.pass1.focus();
			return false;
		}
		if(document.f.pass2.value=='' || document.f.pass1.value!=document.f.pass2.value)
		{
			alert("password does not match");
			document.f.pass1.value='';
			document.f.pass2.value='';
			document.f.pass1.focus();
			return false;
		}
		var length=document.f.pass1.value.length;
		if(length<5 || length>20)
		{
			alert("password should be in 5 to 8 characters");
			document.f.pass1.value='';
			document.f.pass2.value='';
			document.f.pass1.focus();
			return false;
		}
		if((document.f.name.value==''))
		{
			alert("enter your name");
			document.f.name.focus();
			return false;
		}
		if(document.f.email.value=='')
		{
			alert("current email is nessecary");
			document.f.email.focus();
			return false;
		}
		if(document.f.year.value=='')
		{
			alert("enter ur year of joining");
			document.f.year.focus();
			return false;
		}
		if(isNaN(document.f.year.value))
		{
			alert("only numeric value of year is required!!!");
			document.f.year.focus();
			return false;
		}
		if(document.f.room.value=='' && document.f.stud_fac.selectedIndex!=1)
		{
			alert("fill room number!!!");
			document.f.room.focus();
			return false;
		}
		if(isNaN(document.f.room.value) && document.f.stud_fac.selectedIndex!=1)
		{
			alert("only numeric value of year is required!!!");
			document.f.room.focus();
			return false;
		}
}
</script>

</head>
<div class="a">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="a1">
<img src="../../college_hostel/images/iitlogo2.png" width="110" height="95"style="margin:35px; margin-top:4px">
</div>
<div class="a2">
<pre><font size="+4"><font face="verdana">               Registration Desk <br><br><font size="+3">                                 IIT PATNA</font></pre></font></font>
</div>
</div>
<div class="bh2">
 <nav><ul>
            <li><a href="admin.php"> Home</a></li>
            <li><a href="../logout.php" id="onlink">Log Out</a></li>
            
        </ul>
		</nav>
</div>

<div class="b">
<div class="b1">
</div>
<div class="b2">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="+3">Registration Form :-</font>
<br> 
<br>
<br>
<body>
<form method="post" id="form" name="f" action="">
<font size="+1">Enter Type</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<select name="stud_fac" style="background:#CC6633; height:30px; width:160px;">
<option>Student</option><option>Faculty</option><option>Associate Warden</option><option>Care Taker</option></select>
<br>
<br>
<font size="+1">Roll No./Emp No./Staff No.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="roll" placeholder="enter your roll" style="height:30px; width:260px;">
<br>
<br>
<font size="+1">Password</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="pass1" placeholder="enter password" style="height:30px; width:260px;">
<br>
<br>
<font size="+1">Renter Password</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="pass2" placeholder="enter re-password" style="height:30px; width:260px;">
<br>
<br>
<font size="+1">Name</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name" placeholder="Enter Name" style="height:30px; width:260px;"onKeyPress="ValidateAlpha();">
<br>
<br>
<font size="+1">Email Id</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="email" placeholder="Enter e-mail" style="height:30px; width:260px;">
<br>
<br>
<font size="+1">Year Of Joinig</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="year" placeholder="Enter year" style="height:30px; width:260px;" onKeyPress="ValidateNumber();">
<br>
<br>
<div class="b2a" id="divh" style="display:block;">
<font size="+1" id="hostell" style="">Hostel And Room No.</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="hostel" id="hostel" style="background:#CC6633; height:30px; width:160px; ">
<option>Chanakya Hall</option><option>Aryabhatta Hall</option><option>New Boys Hostel</option><option>Girls Hostel</option><option>Main Building</option><option>STPI</option><option>Science Block</option>
</select>&nbsp;&nbsp;
<input type="text" name="room" id="room" style="height:30px; width:90px;" placeholder="Room No."onKeyPress="ValidateNumber();">
<br>
<br>
</div>
<div class="b2a" id="divd" style="display:block;">
<font size="+1" id="depl" style="">Department</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="dep" id="dep" style="background:#CC6633; height:30px; width:260px; ">
<option>Computer Science</option><option>Mechanical Engineering</option><option>Electrical Engineering</option><option>Civil Engineering</option>
</select>
</div>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="sub" style="background:#CC9966; height:30px; width:100;" onClick="return validate()">
<br>
</form>
</body>
</div>
</div>
</html>