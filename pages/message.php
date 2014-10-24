<?php
	if(isset($_REQUEST['c_number']))
	{
	$c_number=$_REQUEST['c_number'];
	$startMessage=$_REQUEST['startMessage'];
	$response=$_REQUEST['reply'];
	$forw=$_REQUEST['forw'];
		$sql_message="select * from complaints where c_no='$c_number'";
		$query=mysql_query($sql_message) or die(mysql_error());
		$full_message=mysql_fetch_array($query);
		if($startMessage==1)
		{
			echo "<font size='+1'>";
			echo "From:&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['sender']."<br>";
			echo "To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['to']."<br>";
			echo "Dated:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['date']."<br>";
			echo "Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['type']."<br>";
			echo "Complaint No.:&nbsp;&nbsp;".$full_message['c_no']."<br><br>";
			echo "Sub:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['sub']."<br><br>";
			echo "Message:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['message']."<br>";
			echo "</font>";
		}
		else if($forw==1)
		{
			echo $full_message['level'];
			$level=$full_message['level'];
			
			if($level=="Care Taker")
				$n_level="Associate Warden";
			else if($level=="Associate Warden")
				$n_level="Admin";
				
			$sql1="UPDATE  `devender`.`complaints` SET  `level` =  '$n_level' WHERE  `complaints`.`c_no` =  '$c_number'";
		 mysql_query($sql1) or die(mysql_error());
			
			 
		 $sql_cnt="select * from forward_complaint";
		$s= mysql_query($sql_cnt) or die(mysql_error());
		$num_rows = mysql_num_rows($s);
		$num_rows=$num_rows+1;
		
		$roll=$_SESSION['uname'];
		
			
			
			echo $_SESSION['uname'];
			echo $_SESSION['stud_fac'];
			$stud_fac=$_SESSION['stud_fac'];
			$to="";
			if($stud_fac=="Student")
			{
				$sql2="select * from student where roll='$roll'";
			$query=mysql_query($sql2) or die(mysql_error());
			$res=mysql_fetch_array($query);
			$my_email=$res['email'];
			$my_hostel=$res['hostel'];
			
				if($n_level=="Associate Warden")
				{
					$sql5="select * from ass_warden where hostel='$my_hostel'";
			$query=mysql_query($sql5) or die(mysql_error());
			$res=mysql_fetch_array($query);
				$to=$res['email'];
				}
				else if($n_level=="Admin")
				{
					$sql3="select * from admin";
					$query=mysql_query($sql3) or die(mysql_error());
					$res3=mysql_fetch_array($query);
					$to=$res3['email'];
				}
			}
			else if($stud_fac=="Faculty")
			{
				$sql2="select * from faculty where roll='$roll'";
			$query=mysql_query($sql2) or die(mysql_error());
			$res=mysql_fetch_array($query);
			$my_email=$res['email'];
			$my_hostel=$res['hostel'];
	
					$sql5="select * from ass_warden where hostel='$my_hostel'";
			$query=mysql_query($sql5) or die(mysql_error());
			$res=mysql_fetch_array($query);
				$to=$res['email'];

	
			}
			else if($stud_fac=="Care Taker")
			{
				$sql2="select * from care_taker where roll='$roll'";
				
			$query=mysql_query($sql2) or die(mysql_error());
			$res=mysql_fetch_array($query);
			$my_email=$res['email'];
			$my_hostel=$res['hostel'];

					$sql5="select * from ass_warden where hostel='$my_hostel'";
			$query=mysql_query($sql5) or die(mysql_error());
			$res=mysql_fetch_array($query);
				$to=$res['email'];
	
			}
			else if($stud_fac=="Associate Warden")
			{
				$sql2="select * from ass_warden where roll='$roll'";
				
			$query=mysql_query($sql2) or die(mysql_error());
			$res=mysql_fetch_array($query);
			$my_email=$res['email'];
				$sql3="select * from admin";
				$query=mysql_query($sql3) or die(mysql_error());
				$res3=mysql_fetch_array($query);
				$to=$res3['email'];
			}

					$sql4="UPDATE  `devender`.`complaints` SET  `to` =  '$to' WHERE  `complaints`.`c_no` =  '$c_number'";
		 mysql_query($sql4) or die(mysql_error());


		
			$sql="select * from `devender`.`complaints`  WHERE  `complaints`.`c_no` ='$c_number'";
		$query=mysql_query($sql) or die(mysql_error());
		$res=mysql_fetch_array($query);
		date_default_timezone_set('Asia/Calcutta');
			$r_date=date('y-m-d');
		echo $res['sender'];
		$d=$res['date'];
		$sender=$res['sender'];
		$sub=$res['sub'];
		$message=$res['message'];
		
		$sql1="INSERT INTO `devender`.`forward_complaint`  VALUE('$num_rows','$c_number','$d','$r_date','$my_email','$to','$sub','$message')";
		 mysql_query($sql1) or die(mysql_error());

			if($stud_fac=="Student")
				header("Location: stud.php");
			else if($stud_fac=="Faculty")
				header("Location: faculty.php");
			else if($stud_fac=="Care Taker")
				header("Location: care_taker.php");
			else if($stud_fac=="Associate Warden")
				header("Location: ass_warden.php");
		
			
			
			
		
		}
		else if($response==1)  			//to see response
		{
			echo "<font size='+1'>";
			echo "From:&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['to']."<br>";
			echo "To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['sender']."<br>";
			echo "Dated:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['date']."<br>";
			echo "Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['type']."<br>";
			echo "Complaint No.:&nbsp;&nbsp;".$full_message['c_no']."<br><br>";
			echo "Sub:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['sub']."<br><br>";
			echo "Response Message:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$full_message['response']."<br>";
			echo "</font>";
		
		}
	}
?>

