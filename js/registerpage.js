function checkpassword()
{
	if(document.getElementById("psw").value != document.getElementById("repsw").value)
	{
		alert("Password Mismatched.");
		return false;
	}
	else
	{
		alert("Successfully Registered!");
		return true;
	}
}
