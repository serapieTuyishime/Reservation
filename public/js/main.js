function validate_nnumbers(e)
{
	var i=e.keyCode;
	return(i==8||(i>=48 && i<=57));
}
function validate_floats(e)
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
		if (charCode==32||(charCode>=64 && charCode<91)||(charCode>=97 && charCode<123)||charCode==63||charCode==46)
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
function showFunction(vv)
{
	var x=document.getElementById("myDIV");
	var textt=document.getElementById("email_id");
	if(x.style.display==="none"){
		x.style.display="block";
		document.getElementById("reply_area").value=vv.innerText+";  ";
	}
	else
	{
		x.style.display="none";
	}
}

function checkIdentification(identity)
{
	var otherGuy="";
	var otherGuy=(identity==="passport")?"rwandaID":"passport";
	document.getElementById(identity).style.display="block";
	document.getElementById(identity).required=true;
	document.getElementById(otherGuy).style.display="none";
	document.getElementById(otherGuy).value=null;
}

function increment_time()
{
	var tt = document.getElementById('end_booking').value;
	var days_to_add = document.getElementById('days_to_add').value;
	var days_to_add = parseInt(days_to_add,10);


    var date = new Date(tt);
    var newdate = new Date(date);

    newdate.setDate(newdate.getDate() + days_to_add);
    
    var dd = newdate.getDate();
    if (dd<=9){
    	dd='0'+dd;
    }
    var mm = newdate.getMonth() + 1;
    if (mm<=9){
    	mm='0'+mm;
    }
    var y = newdate.getFullYear();

    var FormattedDate = y + '-' + mm + '-' + dd;
    // var someFormattedDate=y+"-"mm+"-"+dd;
    document.getElementById('end_booking').value = FormattedDate;
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
function validate()
{
	var passOneVar=document.getElementById("passOne").value;
	var passTwoVar=document.getElementById("passTwo").value;
	if(passOneVar!=passTwoVar)
	{
		alert("password missmatch");
		document.getElementById("passOne").value="";
		passTwoVar=document.getElementById("passTwo").value="";
		return false;
	}
	else
		return true;
	
}
function showFunction()
{
	var x=document.getElementById("myDIV");
	var y= document.getElementById("firstDiv");
	if(x.style.display==="none"){
		x.style.display="block";
		y.style.display="none";
	}
	else
	{
		x.style.display="none";
	}
		}
function goBack()
{
	window.history.back();
}
function theClick(promptText= 'Enter reservation code')
{
	var input=prompt(promptText);
	var reservation_code= document.getElementById('resId');
	reservation_code.value= input;

}


$(document).ready(function() {
    $('#datatablee').DataTable();
} );
