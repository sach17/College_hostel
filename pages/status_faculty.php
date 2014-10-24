

<style type="text/css">
	
	.aa{margin:0px;
	padding:0px;
	height:400px;
	width:1120px;
	float:right;
	}
	
	.bb{margin:0px;
	padding:0px;
	height:30px;
	width:1110px;
	background:#66FFCC;
	border-bottom: double #000000 ;
	}
	
	.bb1{margin:0px;
	padding:0px;
	height:30px;
	width:120px;
	float:left;
	background:#66FFCC;
	}
	
	.bb2{margin:0px;
	padding:0px;
	height:30px;
	width:440px;
	float:left;
	background:#66FFCC;
	}
	
	.bb3{margin:0px;
	padding:0px;
	height:30px;
	width:100px;
	float:left;
	background:#66FFCC;
	}
	
	.bb4{margin:0px;
	padding:0px;
	height:30px;
	width:60px;
	float:left;
	background:#66FFCC;
	}


</style>


<form action="faculty.php">
<font size="+2">Complaint Status is :-</font>
<br>
<br>
<?php


if(isset($_REQUEST['conLinkName']))
	{
		$conLinkName=$_REQUEST['conLinkName'];

	
		if($conLinkName=="status")
		{
			$sql="select * from `devender`.`complaints`  WHERE  `complaints`.`sender` ='$my_email' order by no desc";

	echo "<div class='aa' style='height:450px; overflow:scroll'>";

			$data = mysql_query($sql);
			if(!$data)
			{
				die('Invalidquery;'.mysql_error());
			}
		
			echo "<font size='+1'>"."Complaint No."."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Subject"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Response"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Status"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Level"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<font size='+1'>"."Days Spent"."&nbsp;&nbsp;"."</font>";
			echo "<br>";
			echo "<br>";
	

			$i=0;
			while($res=mysql_fetch_array($data))
			{	
				$date=$res['date'];
				$rec=$res['to'];
				$msg= $res['message'];
				$no=$res['no'];
				$c_no=$res['c_no'];
				$sub=$res['sub'];
				$response=$res['response'];
				$status=$res['status'];
				$level=$res['level'];
				$new_tag=$res['new_tag'];
			
				
				echo "<div class='bb'>";
					echo "<div class='bb1'>";
				echo "&nbsp;&nbsp;&nbsp;".$c_no;
					echo "</div>";
					echo "<div class='bb2'>";
					echo "<a href='faculty.php?c_number=$c_no&amp;startMessage=1&amp;reply=0&amp;forw=0'>";
				if(strlen($sub)<=60)
				{
					echo $sub;
					
				}
				else
				{
					for($i=0;$i<50;$i++)
					{
						echo $sub[$i];
					}
					echo ".............";
				}
				echo "</a>";
				$i++;
					echo "</div>";
					echo "<div class='bb1'>";
					echo "&nbsp;&nbsp;&nbsp;";
					echo "<a href='faculty.php?c_number=$c_no&amp;startMessage=0&amp;reply=1&amp;forw=0'>";
						echo "see response";
					echo "</a>";
					echo "</div>";
					echo "<div class='bb3'>";
					if($status=="Not Solved")
					echo "<font style='color:#FF0000'>";
					if($status=="Solved")
					echo "<font style='color:#009966'>";
					echo $status;
					echo"</font>";
					echo "</div>";
					echo "<div class='bb3'>";
					echo $level;
					echo "</div>";
					echo "<div class='bb4'>";
					echo "</div>";
					echo "<div class='bb4'>";
					if($status=="Not Solved")
					{
						$t_date=date('y-m-d');
						$diff=abs(strtotime($t_date) - strtotime($date));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						echo $days;
								$sql1="UPDATE  `devender`.`complaints` SET  `days` =  '$days' WHERE  `complaints`.`c_no` =  '$c_no'";
		 mysql_query($sql1) or die(mysql_error());
					}
					else
					{
						echo $res['days'];
					}
					echo "</div>";
					echo "</div>";
			}
				
		

		}	
		
		
	}
	
		echo "</div>";
			
?>

</form>
