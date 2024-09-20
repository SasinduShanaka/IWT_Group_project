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

function enableButton()
{
    if(document.getElementById("chk").checked)
	{
		document.getElementById("sbtbtn").desabled=false;
	}
	else
	{
		document.getElementById("sbtbtn").desabled=true;
	}
}

