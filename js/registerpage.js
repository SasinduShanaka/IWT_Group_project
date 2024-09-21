function checkpassword()
{
	if(document.getElementById("psw").value != document.getElementById("repsw").value)
	{
		alert("password mismatched.");
		return false;
	}
	else
	{
		alert("success!");
		return true;
	}
}

function checknic()
{
    if(document.getElementById("nic").valuelength =! 12)
	{
		alert("Wrong NIC number.");
		return false;
		
	}
}

