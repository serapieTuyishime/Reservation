function validate_nnumbers(e)
{
	var i=e.keyCode;
	return(i==8||(i>=48 && i<=57));
}
function validate_alphabets(e)
{
	try{
		if(window.event){
			var charCode=window.event.keyCode;
		}
		else if(e)
		{
			var charCode=e.which;
		}
		else
		{
			return true;
		}
		if (charCode==32||(charCode>=64 && charCode<91)||
			(charCode>=97 && charCode<123)||charCode==63||charCode==46)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	catch (err){
		alert(err.Description);
	}
}
function validate_alphabets_with_symbols(e)
{
	try
	{
		if(window.event)
		{
			var charCode=window.event.keyCode;
		}
		else if(e)
		{
			var charCode=e.which;
		}
		else {return true;}
		if (charCode==44||charCode==32||(charCode>=64 && charCode<91)||(charCode>=97 && charCode<123)||charCode==63||charCode==46){
			return true;
		}
		else {return false;}
	}
	catch (err)
	{
		alert(err.Description);
	}
}
$(document).ready(function() {
    $('#datatablee').DataTable();
} );