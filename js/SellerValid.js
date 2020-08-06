function LFV()
{

	var uname=document.getElementById('name');
	var pass=document.getElementById('pass');
	if (uname.value=='' || pass.value=='') {
		alert('Null submission');
		return(false);
	}
}



function specialCharPresent(a,b)
{
	var c = a.indexOf(b);
	return c;
}



function valid_email()
{

    function valid(email)
    {
    	if (email.indexOf("@") == -1) {
            return false;
        }
        var parts = email.split("@");
        var dot = parts[1].indexOf(".");

        var len = parts[1].length;
        var dotSplits = parts[1].split(".");
        var dotCount = dotSplits.length - 1;


        if (dot == -1 || dot < 2 || dotCount > 2) {
            return false;
        }

        for (var i = 0; i < dotSplits.length; i++) {
            if (dotSplits[i].length == 0) {
                return false;
            }
        }

        return true;
    }

    var mail = document.getElementById('email').value;
    var msg = document.getElementById('pmsg');
    var mark = document.getElementById('alert');
    document.getElementById('updateProfile').disabled=false;
    if (mail=="") {
    	msg.innerHTML="<b>*</b>Empty value";
    	document.getElementById('updateProfile').disabled=true;
    }
    else
    {
    	var status = valid(mail);

	    if (status) {
	    	msg.innerHTML="";
	    	document.getElementById('updateProfile').disabled=false;
	    	mark.innerHTML="";
	    }
	    else
	    {
	    	msg.innerHTML="<b>*</b>Invalid email";
	    	mark.innerHTML="*";
	    	document.getElementById('updateProfile').disabled=true;

	    }
    }
}

function changePasword()
{
	var p1 = document.getElementById('npass').value;
	var p2 = document.getElementById('cnpass').value;
	var p3 = document.getElementById('cpass').value;
	var msg = document.getElementById('error');

	if (p1=='' || p2=='' || p3=='') {
		alert('Null submission');
		// window.location='sellerHome.php';
		msg.innerHTML = "Null input";
	}
	else
	{
		if (p1!=p2) {
			alert('Confirm password not matching');
			window.location='sellerHome.php';
		}
		else
		{
			msg.innerHTML="";
		}
	}
}



function validCurrentPass()
{
	var msg = document.getElementById('passmsg');
	var pass = document.getElementById('cpass').value;

	if (pass=='') {
		msg.innerHTML=" *Empty password field";
		document.getElementById('updateProfile').disabled=true;
	}
	else
	{
		msg.innerHTML="";
		document.getElementById('updateProfile').disabled=false;
	}

}

function changepass1()
{
	var newpass = document.getElementById('npass').value;
	var error = document.getElementById('newP');
	if (newpass==="") {
		error.innerHTML=" *Empty new password field";
		document.getElementById('updatepass').disabled=true;
	}
	else
	{
		error.innerHTML="";
		//document.getElementById('updatepass').disabled=false
		;
	}
}

function changepass2()
{
	var newpass = document.getElementById('npass').value;
	var cnewpass = document.getElementById('cnpass').value;
	var error = document.getElementById('CnewP');
	if (cnewpass==="") {
		error.innerHTML=" *Empty current new password field";
		document.getElementById('updatepass').disabled=true;
	}
	else
	{
		if (newpass===cnewpass) {
			error.innerHTML="";
		}
		else
		{
			error.innerHTML=" *New pass & current new pass didn't matching";
			document.getElementById('updatepass').disabled=true;
		}
		//document.getElementById('updatepass').disabled=false
		;
	}
}


function changepass3()
{
	var currentpass = document.getElementById('cpass').value;
	var newpass = document.getElementById('npass').value;
	var cnewpass = document.getElementById('cnpass').value;
	var error = document.getElementById('CP');
	if (currentpass==="") {
		error.innerHTML=" *Empty current pass field";
		document.getElementById('updatepass').disabled=true;
	}
	else
	{
		if (newpass=="" || cnewpass==="") {
			error.innerHTML=" *Empty prevoius field";
			document.getElementById('updatepass').disabled=true;
		}
		else
		{
			error.innerHTML="";
			document.getElementById('updatepass').disabled=false;
		}
	}
}

function profileName()
{
	var name = document.getElementById('name').value;
	var error = document.getElementById('nmsg');
	var alert= document.getElementById('Nalert');

	if (name==="") {
		error.innerHTML=" *Empty Full name field";
		alert.innerHTML="*";
		document.getElementById('updatepass').disabled=true;
	}
	else{
		error.innerHTML="";
		alert.innerHTML="";
	}
}



function Pname()
{
	var name = document.getElementById('name').value;
	var error = document.getElementById('Ne');

	if (name==="") {
		error.innerHTML=" *Empty product name";
		document.getElementById('addP').disabled=true;
	}
	else
	{
		error.innerHTML="";
	}
}

function Pquantity()
{
	var q = document.getElementById('qntity').value;
	var error = document.getElementById('Qe');

	if (q=="") {
		error.innerHTML=" *Empty quantity field";
		document.getElementById('addP').disabled=true;
	}
	else
	{
		if (q<0) {
			error.innerHTML=" *Quantity can't be negative";
			document.getElementById('addP').disabled=true;
		}
		else
		{
			error.innerHTML="";
		}
	}
}

function Pdate()
{
	var d= document.getElementById('date').value;
	var error = document.getElementById('De');
	if (d=="") {
		error.innerHTML=" *Blank date";
		document.getElementById('addP').disabled=true;
	}
	else
	{
		error.innerHTML="";
	}
}

function Pbuy()
{
	var q = document.getElementById('bp').value;
	var error = document.getElementById('Be');

	if (q=="") {
		error.innerHTML=" *Empty buy price field";
		document.getElementById('addP').disabled=true;
	}
	else
	{
		if (q<0) {
			error.innerHTML=" *Price value can't be negative";
			document.getElementById('addP').disabled=true;
		}
		else
		{
			error.innerHTML="";
		}
	}
}


function Psell()
{
	var q = document.getElementById('sp').value;
	var error = document.getElementById('Se');

	if (q=="") {
		error.innerHTML=" *Empty sell price field";
		document.getElementById('addP').disabled=true;
	}
	else
	{
		if (q<0) {
			error.innerHTML=" *Price can't be negative";
			document.getElementById('addP').disabled=true;
		}
		else
		{
			error.innerHTML="";
		}
	}
}

function Pdesc()
{
	var q = document.getElementById('desc').value;
	var error = document.getElementById('Dse');

	if (q=="") {
		error.innerHTML=" *Empty description field";
		document.getElementById('addP').disabled=true;
	}
	else{
		error.innerHTML="";
	}
}


function Pimg()
{
	var q = document.getElementById('img').value;
	var error = document.getElementById('Ie');
	if (q=="") {
		error.innerHTML=" *Image add please";
		document.getElementById('addP').disabled=true;
	}
	else{
		error.innerHTML="";
	}
}


function Pcat()
{
	var q = document.getElementById('cat').value;
	var error = document.getElementById('Ce');

	if (q=="") {
		error.innerHTML=" *Empty category field";
		document.getElementById('addP').disabled=true;
	}
	else{
		error.innerHTML="";
		document.getElementById('addP').disabled=false;
	}
}

function cateValid()
{
	var q = document.getElementById('cat').value;
	var error = document.getElementById('Ce');
	if (q=="") {
		error.innerHTML=" *Empty category field";
		document.getElementById('addP').disabled=true;
	}
	else{
		error.innerHTML="";
		document.getElementById('addP').disabled=false;
	}
}

function subcarValid()
{
	var q = document.getElementById('subcat').value;
	var error = document.getElementById('sCe');
	if (q=="") {
		error.innerHTML=" *Empty Sub-category field";
		document.getElementById('addP').disabled=true;
	}
	else{
		error.innerHTML="";
		document.getElementById('addP').disabled=false;
	}
}

function date1Valid()
{
	var d1 = document.getElementById('date1').value;
	//var d2 = document.getElementById('date2').value;
	var error = document.getElementById('dateE1');

	if (d1==="") {
		error.innerHTML=" *Starting date empty";
		document.getElementById('data').disabled=true;
		document.getElementById('export').disabled=true;
	}
	else
	{
		error.innerHTML="";
		document.getElementById('data').disabled=false;
		document.getElementById('export').disabled=true;
	}
}

function date2Valid()
{

	var d2 = document.getElementById('date2').value;
	var error = document.getElementById('dateE2');

	if (d2==="") {
		error.innerHTML=" *Ending date empty";
		document.getElementById('data').disabled=true;
		document.getElementById('export').disabled=true;
	}
	else
	{
		error.innerHTML="";
		document.getElementById('data').disabled=false;
		document.getElementById('export').disabled=false;
	}
}