<style type="text/css">

.a{margin:-7px;
padding:0px;
height:130px;
width:1365px;
background:#CCCCCC;
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
.b{margin-left:-7px;
margin-top:6px;
padding:0px;
height:50px;
width:1365px;
text-align:right;
marker-offset:50px;
background:#99CC99; 	
}

.c{margin-left:-7px;
margin-top:0px;
padding:0px;
height:500px;
width:1365px;
background:#CCCCCC; 
}

.c1{margin-left:-7px;
margin-top:0px;
padding:0px;
height:450px;
width:250px;
float:left;
text-align:center;
background:#99CCCC; 	
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

<html>
<div class="a">
<div class="a1">
	<img src="../../college_hostel/images/iitplogo.png" width="115" height="100"style="margin:45px; margin-top:5px">
</div>
<div class="a2">
<pre><font size="+4"><font face="verdana">         Hostel Management System<font size="+3"> <br>                                 IIT PATNA</font></pre></font></font>
</div>
</div>
<div class="b" >
<br>
<font size="+2">Welcome</font>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<font size="+2">
<?php
$my_roll=$_SESSION['uname'];
$sql="select * from student where roll='$my_roll'";
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_array($query);
$my_pass=$res[1];
$my_name=$res[2];
$my_email=$res[3];
$my_year=$res[4];
$my_hostel=$res[5];
$my_room=$res[6];
$my_dep=$res[7];



?>
<?php echo $res[2]; ?>
</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../logout.php"><font size="+2">Sign Out</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="c">
<div class="c1">
<br>
<br>
  <tr>
    <td width="139" height="413">
	<p><a href="stud.php?conLinkName=about"><font size="+2">About me</font></a></p>
    <p><a href="stud.php?conLinkName=search"><font size="+2">Search Students</font></a></p>
    <p><a href="stud.php?conLinkName=lodge"><font size="+2">Lodge Complain</font></a></p>
    <p><a href="stud.php?conLinkName=status"><font size="+2">See Complain Status</font></a></p>
    <p><a href="stud.php?conLinkName=see_all"><font size="+2">See All Complaints</font></a></p>
    <p><a href="stud.php?conLinkName=chpwd"><font size="+2">Change password</font></a></p></td>
	</tr>
</div>
	<?php
	//access other file res. according event
	if(isset($_REQUEST['conLinkName']))
	{
	$conLinkName=$_REQUEST['conLinkName'];
	if($conLinkName=="about")
		{
		include("about.php");
		}
	if($conLinkName=="search")
		{
		include("search.php");
		}
	if($conLinkName=="lodge")
		{
		include("lodge.php");
		}
	if($conLinkName=="status")
		{
		include("status.php");
		}
	if($conLinkName=="see_all")
		{
		include("see_all.php");
		}
	if($conLinkName=="chpwd")
		{
		include("chpwd.php");
		}
		}
		
	?>
	
	<?php
	//access other file res. according event
	if(isset($_REQUEST['c_number']))
	{
		$c_number=$_REQUEST['c_number'];
		$startMessage=$_REQUEST['startMessage'];
		$response=$_REQUEST['reply'];
		$forw=$_REQUEST['forw'];
	
		if($startMessage==1 || $response==1 || $forw==1)
			{
			include("message.php");
		
			//include("prevent_resend.php");
			}
	}
	?>
	</div>
			<?php
	//compose page
	
	if(isset($_REQUEST['send1']))
	{
		if($_REQUEST['send1'])
			{
				
				$id=$_SESSION['uname'];
				$sub=$_REQUEST['sub'];
				$msg=$_REQUEST['message'];
				$type=$_REQUEST['type'];
				
					$sql_care_taker="select * from care_taker";
						$query=mysql_query($sql_care_taker) or die(mysql_error());
					while($res=mysql_fetch_array($query))
					{
						if($res[5]==$my_hostel)
						{
							$to=$res[3];
							$tag=1;
							break;
						
						}
					}
					if($tag==0)
					{
						echo "<script>alert('no care Taker found')</script>";
						exit;
					}	
				$status="Not Solved";
				$reply="No Response";
				$level="Care Taker";
				$new_tag=0;
				
		$sql_cnt="select * from complaints";
		$s= mysql_query($sql_cnt) or die(mysql_error());
		$num_rows = mysql_num_rows($s);
		$num_rows=$num_rows+1;
			 //  $sql="insert into complaints values('$id','$to','$sub','$msg')";
				   
			//	   mysql_query($sql) or die(mysql_error());
		if($to!=""){
			date_default_timezone_set('Asia/Calcutta');
			$d=date('y-m-d');
			if($sub=="")
				$sub="No subject";
		$sql1="insert into complaints value('$num_rows','$num_rows','$d','$my_email','$to','$sub','$msg','$status','$reply','$type','$level','$new_tag',0)";
		 mysql_query($sql1) or die(mysql_error());
						echo "<script>alert('complaint sent to $res[2]')</script>";
		
		 exit;
		}
		}
		}
		
		
		
		
		?>
		
<?php
	if(isset($_REQUEST['ch_pass']))
	{echo "sdsdsdsds";
		if($_REQUEST['ch_pass'])
			{
				
				$id=$_SESSION['uname'];
				$p_pass=$_REQUEST['p_pass'];
				$n_pass=$_REQUEST['n_pass'];
				$rn_pass=$_REQUEST['rn_pass'];
				if($p_pass!=$res[1]){
					echo "<script type='text/javascript' language='javascript'>alert('previous password does not match');</script>" ;
					exit;
				}
				
		if($n_pass!="" && $p_pass!="" && $rn_pass==$n_pass){
		$sql1="UPDATE  `devender`.`student` SET  `pass` =  '$n_pass' WHERE  `student`.`roll` =  '$id'";
		 mysql_query($sql1) or die(mysql_error());
		 exit;
		}
		}
		}

	?>
	