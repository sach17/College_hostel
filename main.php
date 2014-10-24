<?php
require_once('include.php');
//$sql1="insert into complaints value('num_rows','2','my_email','to','sub','msg','status','reply','fdfd')";
// mysql_query($sql1) or die(mysql_error());


if(isset($_REQUEST['sub']))
{
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$stud_fac=$_REQUEST['stud_fac'];
$tag=0;
$pages='';
if($_REQUEST['sub'])
{
		if($user=='' || $pass=='')
		{
			echo "<script>alert('fill all entries')</script>";
			$tag=2;
		}
		if($stud_fac=='Admin')
		{
			$sql="select * from admin";
			$pages="admin";
		}
		else if($stud_fac=='Student')
		{
			$sql="select * from student";
			$pages="stud";
		}
		else if($stud_fac=='Faculty')
		{
			$sql="select * from faculty";
			$pages="faculty";
		}	
		
		else if($stud_fac=='Associate Warden')
		{
			$sql="select * from ass_warden";
			$pages="ass_warden";
		}	
		
		else if($stud_fac=='Care Taker')
		{
			$sql="select * from care_taker";
			$pages="care_taker";
		}	
		$query=mysql_query($sql) or die(mysql_error());
		while($res=mysql_fetch_array($query))
		{
			if($res[0]==$user && $res[1]==$pass &&tag!=2)
			{echo "dsddsd";
				session_start();
				$_SESSION['uname']=$res[0];
				$_SESSION['stud_fac']=$stud_fac;
				$_SESSION['logged-in']= true;
				header("Location: pages/$pages.php");
				//header('Location: http://www.google.com');
				exit;
				$tag=1;
			}
		}
		if($tag==0)
		{
			echo "<script>alert('invalid username or password')</script>";
		}
	}
}

?>




<script language="javascript">
	function validate()
	{
		if((document.r.user.value=='') || (document.r.pass.value==''))
		{
			alert("fill all entries");
			document.r.user.focus();
			return false;
		}
	}
</script>


<html>
<link href="main.css" rel="stylesheet" type="text/css" />
<body background="images/mem.jpg">
</body>
<div class="a">
	<div class="a1">
	<img src="images/iitplogo.png" width="140" height="120"style="margin:25px; margin-top:-0px">
	</div>
	<div class="a2">
	<font size="+4">INDIAN INSTITUTE OF TECHNOLOGY, PATNA</font>
	<br>
	<font size="+3"><center>HOSTEL MANAGEMENT SYSTEM</center></font>
	<font size="+3">  </font>
	</div>
</div>

<div class="b">
<div class="bh1">
</div>

<div class="bh2">
<br class="clearFloat">
<div id="wrapper">
<div id="navMenu">
<ul>
<li><a href="main.php" id="onlink">Home</a></li>
</ul>

<ul>
<li><a href="" id="onlink">Academics</a>
<ul>
<li><a href="forms/calendar_13.pdf" id="onlink2">Academic calender</a></li>
<li><a href="forms/holidays13.pdf" id="onlink2">Holidays</a></li>
</ul>
</li>
</ul>

<ul>
<li><a href="" id="onlink">Buildings</a>
<ul>
<li><a href="beauties/mainbuilding.php" id="onlink2">Main Building</a></li>
<li><a href="beauties/stpi.php" id="onlink2">STPI</a></li>
<li><a href="beauties/gymkhana.php" id="onlink2">Gymkhana</a></li>
<li><a href="beauties/scienceblock.php" id="onlink2">Science Block</a></li>
</ul>
</li>
</ul>

<ul>
<li><a href="" id="onlink">Hostels</a>
<ul>
<li><a href="hostels/chanakya.php" id="onlink2">Chanakya Hall</a></li>
<li><a href="hostels/aryabhatta.php" id="onlink2">Aryabhatta Hall</a></li>
<li><a href="hostels/ashoka.php" id="onlink2">Ashoka Hall</a></li>
<li><a href="hostels/new boys.php" id="onlink2">New Boys Hostel</a></li>
<li><a href="hostels/girls.php" id="onlink2">Girls Hostel</a></li>
</ul>
</li>
</ul>

<ul>
<li><a href="" id="onlink">Forms</a>
<ul>
<li><a href="forms/mess_rebate_form.doc" id="onlink2">Mess Rebate</a></li>
<li><a href="forms/hostel_leaving.doc" id="onlink2">Hostel Leave</a></li>
<li><a href="forms/f4_station-leave-on-cl-or-holidays.doc" id="onlink2">Staions Leave</a></li>
<li><a href="forms/f1_leave-application.doc" id="onlink2">Leave pplication</a></li>
</ul>
</li>
</ul>



</div>
</div> 


</div>

<div class="b1">
<br><br><br><br><br><br>
</div>
<div class="b2">
	<div class="b2a">
		<font color= color="#0000CC" size="+3"><i>Recent Complaints............</i></font>
		<br>
		<?php
			$sql_cmp="select * from `devender`.`complaints` order by no desc";
			$data = mysql_query($sql_cmp);
			if(!$data)
			{
				die('Invalidquery;'.mysql_error());
			}
			$i=0;
			echo "<font size='+2'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Status";
			echo "</font>";
			while(($res=mysql_fetch_array($data)) && ($i<7))
			{
			echo "<div class='b2b'>";
				$msg= $res['message'];
				
				$sub=$res['sub'];
				$status=$res['status'];
				$level=$res['level'];
				echo "<i>";
				echo "<font size='+1.5'>";
				echo "<div class='b2b1'>";
				echo "*&nbsp;&nbsp;&nbsp;";
				if(strlen($sub)<=20)
				{
					echo $sub;
					
				}
				else
				{
					for($j=0;$j<20;$j++)
					{
						echo $sub[$j];
					}
					echo ".............";
				}
				echo "</div>";
				echo "<div class='b2b2'>";
				echo $level;
				echo "</div>";
				echo $status;
				echo "</font>";
				echo "</i>";
				echo "<br>";
				$i++;
			echo "</div>";
			}
		?>
		
		
	</div>
	<?php
		echo "<div style='width:60px; height:60px; background:'>";
		echo "</div>";
		echo "<div style='width:60px; height:60px; background:; float:left'>";
		echo "</div>";
				echo "<div class='b2a1'>";				//larger percentage
		$sql_cmp="select * from `devender`.`complaints` order by no desc";
			$data = mysql_query($sql_cmp);
			if(!$data)
			{
				die('Invalidquery;'.mysql_error());
			}
			$i=0;
			$s=0;
			$total=0;
			while(($res=mysql_fetch_array($data)))
			{
				$status=$res['status'];
				if($status=="Solved")
				{
					$s++;
					$total++;
				}
				else
				{
					$total++;
				}
			}
			$percen=($s*100)/$total;
			$english_format_number = number_format($percen, 2, '.', '');
			$new=2*$english_format_number;
	
	
		echo "<div style='width:".$new."px; height:20px; background:#333399'>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<font size='+1'>";
		echo "Percentage of Complaints solved&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;";
		echo $english_format_number."&nbsp;&nbsp;%";
		echo "</font>";		
	?>
</div>
<div class="b3">
	<form method="post" name="r" action="">
			<br>
		<font size="+1" style="margin:20px;">Sign In</font>
			<br><br>
		<font size="+0.85" style="margin:20px;">Username</font>
			<br>
		<input type="text" name="user" style="margin-left:20px; height:25px; width:300px;">
			<br><br>
		<select name="stud_fac" style="height:30px; width:140px; margin-left:25px; color: #0000FF; background-color: #99FF99">
			<option>Student</option><option>Faculty</option><option>Admin</option><option>Associate Warden</option><option>Care Taker</option>
		</select>
		<br><br>
		<font size="+1" style="margin:20px;">Password</font>
			<br>
		<input type="password" name="pass" style="margin-left:20px; height:25px; width:300px;">
		<br><br>
		<input type="submit" name="sub" value="Sign in" style="margin-left:20px;height:30px; width:70px; background:#0066FF" onClick="return validate()">
		&nbsp;
		<br><br>
		<!--<a href=""><font style="margin-left:20px" color= color= color="#000066">Forgot password?</font></a>-->
	</form>
</div>
</div>
</html>
