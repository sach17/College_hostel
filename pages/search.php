
<style type="text/css">
	.x{margin:0px;
	padding:0px;
	height:450px;
	width:1350px;
	background:#00FF33;
	}
	.x1{margin:0px;
	padding:0px;
	height:450px;
	width:550px;
	float:left;
	background:#0099CC;
	}
</style>


<html>
<head>
<script type="text/javascript" language="javascript">


function validate(search_form){
	if((document.f.s_roll.value=='') && (document.f.name.value==''))
		{
			alert("Atleast enter one field");
			document.f.name.focus();
			return false;
		}
	else
		{
		document.getElementById('theid').style.display = 'none';
		}
		
		
}
</script>

</head>
<html>
<div class="x">
<div class="x1">
<br>
<br>
<form method="post" name="f" id="search_form" action="" style="display:">
<font size="+1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name :  
</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name" placeholder="Enter Name">
<br>
<br>
<font size="+1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Roll No./Emp Code :
</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="s_roll" placeholder="Enter roll number">
<br>
<br>
<font size="+1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Field :
</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="field" id="field" style="background:#CC6633; height:30px; width:160px; ">
<option>Faculty</option><option>Student</option>
</select>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="height:30px; width:120px;" onClick="return validate()" name="search" value="Search Details">
</form>
</div>
<div class="x1" style="background:#CCCCCC">

<?php
if(isset($_REQUEST['search']))
{
	if($_REQUEST['search'])
	{
		$name=$_REQUEST['name'];
		$s_roll=$_REQUEST['s_roll'];
		$field=$_REQUEST['field'];
		if($field=="Student")
			$sa="student";
		else if($field=="Faculty")
			$sa="faculty";
		
		
		if($name!="")
		{
			$sql_search="select * from $sa where name='$name'";
			$query=mysql_query($sql_search) or die(mysql_error());
			$res=mysql_fetch_array($query);
		}
		else if($s_roll!="")
		{
			$sql_search="select * from $sa where roll='$s_roll'";
			$query=mysql_query($sql_search) or die(mysql_error());
			$res=mysql_fetch_array($query);
		}
		
		if($res=="")
		{
			echo "<script>alert('no data found')</script>";
		}
		else
		{
			echo "<br><br><br><br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$roll_no=$res['roll'];
			$name=$res['name'];
			$year=$res['year'];
			$hostel=$res['hostel'];
			$room=$res['room'];
			$department=$res['department'];
			$email=$res['email'];
			echo "<font size='+1'>";
			echo "Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $name;
			echo "<br>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Roll No. :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $roll_no;
			echo "<br>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Year:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $year;
			echo "<br>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Hostel:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $hostel;
			echo "<br>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Room:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $room;
			echo "<br>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $department;
			echo "<br>";
			echo "<br>";
			echo "</font>";
		}
	
	}



}

?>

</div>
</div>
</html>
