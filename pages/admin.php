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
height:490px;
width:1365px;
background:#CCCCCC; 
}

.c1{margin-left:-7px;
margin-top:0px;
padding:0px;
height:490px;
width:250px;
float:left;
text-align:center;
background:#99CCCC; 	
}


</style>

<script type='text/javascript'>
window.load = function() {
    var counter = 0;
    window.setInterval(function() {
        document.getElementById('content').innerHTML = (counter++).toString();
    }, 1000);
};
</script>

<?php
require_once('../include.php');
if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

// not logged in, move to login page

header('Location: ../main.php');

exit;
}

?>

<?php
$roll=$_SESSION['uname'];
$sql="select * from admin where roll='$roll'";
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_array($query);
$my_pass=$res[1];
$my_name=$res[2];
$my_email=$res[3];



?>


<html>
<div class="a"><!--<meta http-equiv="refresh" content="5" />-->
<div class="a1">
	<img src="../../college_hostel/images/iitplogo.png" width="115" height="100"style="margin:45px; margin-top:5px">
</div>
<div class="a2">
<pre><font size="+4"><font face="verdana">         Hostel Management System<font size="+3"> <br>                                 IIT PATNA</font></pre></font></font>
</div>
</div>
<div class="b" id="content
">
<br>
<?php
date_default_timezone_set('Asia/Calcutta');
echo "Date:-  ";
echo date('Y-m-d');
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Time:- ";
echo date('h-i-s'); 
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size="+1">Welcome</font>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<font size="+2">
<?php

$roll=$_SESSION['uname'];

$sql="select * from admin where roll='$roll'";

$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_array($query);
?>
<?php echo "$res[2]";?>
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
	<p><a href="admin.php?conLinkName=about"><font size="+2">About me</font></a></p>
    <p><a href="admin.php?conLinkName=inbox_admin"><font size="+2">Inbox</font></a></p>
    <p><a href="admin.php?conLinkName=see_all"><font size="+2">See All Complains</font></a></p>
    <p><a href="admin.php?conLinkName=search"><font size="+2">Search</font></a></p>
    <p><a href="admin.php?conLinkName=chpwd"><font size="+2">Change password</font></a></p></td>
	<p><a href="regestration.php"><font size="+2">Register Members</font></a></p>
	</tr>
</div>
	<?php
	//access other file res. according event
	if(isset($_REQUEST['conLinkName']))
	{
	$conLinkName=$_REQUEST['conLinkName'];
	if($conLinkName=="about")
		{
		include("about_admin.php");
		}
	if($conLinkName=="inbox_admin")
		{
		include("inbox_admin.php");
		}
	if($conLinkName=="see_all")
		{
		include("see_all.php");
		}
	if($conLinkName=="search")
		{
		include("search.php");
		}
	if($conLinkName=="chpwd")
		{
		include("chpwd_admin.php");
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
	
		if($startMessage==1 || $response==1)
			{
			include("message.php");
			}
		else if($response==2)
			{
				include("response_admin.php");
			}

	}
	?>

	
</div>
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
					echo "<script type='text/javascript' language='javascript'>alert('previous password does not match')</script>" ;
					exit;
				}
		if($n_pass!="" && $p_pass!="" && $rn_pass==$n_pass){
		$sql1="UPDATE  `devender`.`admin` SET  `pass` =  '$n_pass' WHERE  `admin`.`roll` =  '$id'";
		 mysql_query($sql1) or die(mysql_error());
		 exit;
		}
		}
		}

	?>
	