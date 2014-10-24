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
<pre><font size="+4"><font face="verdana">         Hostel Management System<font size="+3"> <br>                                   IIT PATNA</font></pre></font></font>
</div>
</div>
<div class="b" >
<br>
<font size="+2">Welcome</font>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<font size="+2">
<?php
$roll=$_SESSION['uname'];
$sql="select * from ass_warden where roll='$roll'";
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
	<p><a href="ass_warden.php?conLinkName=about"><font size="+2">About me</font></a></p>
    <p><a href="ass_warden.php?conLinkName=search"><font size="+2">Search</font></a></p>
    <p><a href="ass_warden.php?conLinkName=inbox_ass_warden"><font size="+2">Complaint's Inbox</font></a></p>
    <p><a href="ass_warden.php?conLinkName=see_all"><font size="+2">See All Comlaint's</font></a></p>
    <p><a href="ass_warden.php?conLinkName=chpwd"><font size="+2">Change password</font></a></p></td>
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
	if($conLinkName=="inbox_ass_warden")
		{
		include("inbox_ass_warden.php");
		}
	if($conLinkName=="see_all")
		{
		include("see_all.php");
		}
	if($conLinkName=="chpwd")
		{
		include("chpwd_ass_warden.php");
		}
		
	if($conLinkName=="search")
		{
		include("search.php");
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
	
		if($startMessage==1 || $forw==1 || $response==1)
			{
			include("message.php");
			}
		else if($response==2)
			{
				include("response_ass_warden.php");
			}

	}

	?>
	
	
	
	
	</div>
		
<?php
echo "pppppppppppccccccc";
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
		$sql1="UPDATE  `devender`.`ass_warden` SET  `pass` =  '$n_pass' WHERE  `ass_warden`.`roll` =  '$id'";
		 mysql_query($sql1) or die(mysql_error());
		echo "<script type='text/javascript' language='javascript'>alert('password changed successfully');</script>" ;
					
		 exit;
		}
		}
		}

	?>
	