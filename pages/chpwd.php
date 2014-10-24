<html>
<head>
<script type="text/javascript" language="javascript">
	
	function validate(){
	if((document.stud_chpass_form.p_pass.value=='' || document.stud_chpass_form.n_pass.value=='' || document.stud_chpass_form.rn_pass.value==''))
		{
			alert("fill all entries");
			document.stud_chpass_form.p_pass.focus();
			return false;
		}
		if(document.stud_chpass_form.n_pass.value!=document.stud_chpass_form.rn_pass.value)
		{
			alert("password does not match");
			document.stud_chpass_form.n_pass.value='';
			document.stud_chpass_form.rn_pass.value='';
			document.stud_chpass_form.n_pass.focus();
			return false;
		}
		var length=document.stud_chpass_form.n_pass.value.length;
		if(length<5)
		{
			alert("password should be greater than 5 characters");
			document.stud_chpass_form.n_pass.value='';
			document.stud_chpass_form.rn_pass.value='';
			document.stud_chpass_form.n_pass.focus();
			return false;
		}
	}



</script>
</html>
</head>



<html>
<form method="post" name="stud_chpass_form" action="stud.php">
<br /><br /><br />
<font size="+1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter previous password</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="p_pass" placeholder="enter previous password" />
<br />
<br />
<font size="+1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter new password</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="n_pass" placeholder="enter new password" />
<br />
<br />
<font size="+1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Renter new password</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="rn_pass" placeholder="renter new password" />
<br />
<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="ch_pass" value="Change Password" style="background:#996633; height:30px; width:160px;" onClick="return validate()" />
</form>
</html>