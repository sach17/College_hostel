<?php
		require_once('../include.php');
if(isset($_REQUEST['send_r2'])){
			if($_REQUEST['send_r2'])
			{
			
			$r_c_number=$_REQUEST['varname'];
				$resp=$_REQUEST['r_message'];
				$cname=$_REQUEST['cname'];
		 
				echo $resp;
				
				$sql1="UPDATE  `devender`.`complaints` SET  `response` =  '$resp' WHERE  `complaints`.`c_no` =  '$r_c_number'";
		 mysql_query($sql1) or die(mysql_error());
		 
		 
		 $sql_cnt="select * from response_complaint";
		$s= mysql_query($sql_cnt) or die(mysql_error());
		$num_rows = mysql_num_rows($s);
		$num_rows=$num_rows+1;
		
		$roll=$_SESSION['uname'];
		$sql="select * from admin where roll='$roll'";
		$query=mysql_query($sql) or die(mysql_error());
		$res=mysql_fetch_array($query);
		$email=$res['email'];
		
		
		$sql="select * from `devender`.`complaints`  WHERE  `complaints`.`c_no` ='$r_c_number'";
		$query=mysql_query($sql) or die(mysql_error());
		$res=mysql_fetch_array($query);
		date_default_timezone_set('Asia/Calcutta');
			$r_date=date('y-m-d');
		echo $res['sender'];
		
	//	'$num_rows','$r_c_number','$res['date']','$r_date','$care_email','$res['sender']','$res['sub']','$res['message']','$resp'
		$d=$res['date'];
		$sender=$res['sender'];
		$sub=$res['sub'];
		$message=$res['message'];
		
		$sql1="INSERT INTO `devender`.`response_complaint`  VALUE('$num_rows','$r_c_number','$d','$r_date','$email','$sender','$sub','$message','$resp')";
		 mysql_query($sql1) or die(mysql_error());
		 if($cname)
		 {
		 	$sql1="UPDATE  `devender`.`complaints` SET  `status` =  'Solved' WHERE  `complaints`.`c_no` =  '$r_c_number'";
			 mysql_query($sql1) or die(mysql_error());
		 }
		 
				header("Location: admin.php");
		 
			
			}
			}
?>
		
		
		
		
			<form action='response_admin.php'>
			<?php
			    echo "<input type='hidden' name='varname' value='$c_number'>";
		 ?>
			<textarea name='r_message' style='width:580px; height:250px;'></textarea>
			
			<br>
			<?php
			echo "<input type='checkbox' name='cname' value='$c_number'>"
			?>
			Solved
			<br>
			<br>
			<input type='submit' name='send_r2' value='SEND'/>
			</form>