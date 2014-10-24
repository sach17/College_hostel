

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
	border-bottom:double #000000;
	background:#66FFCC;
	}
	
	.bb1{margin:0px;
	padding:0px;
	height:30px;
	width:100px;
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
	width:120px;
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



<?php

if(isset($_REQUEST['conLinkName']))
	{
		$conLinkName=$_REQUEST['conLinkName'];

	
		if($conLinkName=="see_all")
		{
			$sql="select * from `devender`.`complaints` order by no desc";

	echo "<div class='aa' style='height:450px; overflow:scroll'>";

			$data = mysql_query($sql);
			if(!$data)
			{
				die('Invalidquery;'.mysql_error());
			}
		
			echo "<font size='+1'>"."Complaint No."."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Subject"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Response"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Status"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "<font size='+1'>"."Level"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</font>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<font size='+1'>"."Days Spent"."&nbsp;&nbsp;"."</font>";
			echo "<br>";
			echo "<br>";
			if($_SESSION['stud_fac']=="Student")
				$pages="stud";
			else if($_SESSION['stud_fac']=="Faculty")
				$pages="faculty";
			else if($_SESSION['stud_fac']=="Care Taker")
				$pages="care_taker";
			else if($_SESSION['stud_fac']=="Associate Warden")
				$pages="ass_warden";
			else if($_SESSION['stud_fac']=="Admin")
				$pages="admin";
			

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
					echo "<a href='$pages.php?c_number=$c_no&amp;startMessage=1&amp;reply=0&amp;forw=0'>";
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
					echo "<a href='$pages.php?c_number=$c_no&amp;startMessage=0&amp;reply=1&amp;forw=0'>";
					if(strlen($response)<=1)
					{
						echo $response;
							
					}
					else
					{
						for($i=0;$i<1;$i++)
						{
							echo $response[$i];
						}
						echo ".............";
					}
					echo "</a>";
					echo "</div>";
					echo "<div class='bb3'>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					if($status=="Not Solved")
					echo "<font style='color:#FF0000'>";
					if($status=="Solved")
					echo "<font style='color:#009966'>";
					echo $status;
					echo "</font>";
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
					}
					else
					{
						echo "0";
					}
					echo "</div>";
					echo "</div>";
			}
				
		

		}	
		
		
	}
	
		echo "</div>";
			
?>
