
var uid_prefix = document.getElementById("uid").value;
var patt = /^19[0-9]{4}$/;
	function validateusername()
		{
			if ((uid_prefix.match(patt))=="true") 
			{
			}
			else 
			{
				alert("Invalid username");
			}
		}