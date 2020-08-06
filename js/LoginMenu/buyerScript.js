function verifyExistance(text, handler)
{
	var pos = text.indexOf(handler);
	return pos;
}

function verifyChar(name)
{
	var alphabetBox = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','.','-','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var	nameArray = name.split('');
	var	temp = 0;
		for (var i = 0; i < nameArray.length; i++) {
			for (var j = 0; j < alphabetBox.length; j++) {
				if (nameArray[i] == alphabetBox[j]) {
					if((i==0) && (alphabetBox[j]==" "||alphabetBox[j]=="."||alphabetBox[j]=="-"))
					{
						temp=temp;
					}
					else
					{
						if(nameArray[i]==" ")
						{
							if(nameArray[i+1]==" "||nameArray[i-1]==" "||nameArray[i+1]=="."||nameArray[i+1]=="-")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else if(nameArray[i]==".")
						{
							if(nameArray[i+1]=="-"||nameArray[i+1]==".")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else if(nameArray[i]=="-")
						{
							if(nameArray[i+1]=="-"||nameArray[i+1]==".")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else
							temp+=1;
					}
				}
				else
					temp=temp;
			}
		}
		//var n = verifyChar(name);
		if(temp==name.length)
		{
			var s = name.split(' ');
			//msg.innerHTML = n;
			if(s.length<2)
			{
				return false; 
			}
			else if(s.length>=2)
			{
				if(name.charAt(name.indexOf(' ')+1)=="")
				{
					return false; 
				}
				else
					return true;
			}
			else if(name.length==n)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			return false;
		}
}

function verifyAddress(name)
{
	var alphabetBox = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','.','-',',','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var	nameArray = name.split('');
	var	temp = 0;
		for (var i = 0; i < nameArray.length; i++) {
			for (var j = 0; j < alphabetBox.length; j++) {
				if (nameArray[i] == alphabetBox[j]) {
					if((i==0) && (alphabetBox[j]==" "||alphabetBox[j]=="."||alphabetBox[j]=="-"||alphabetBox[j]==","))
					{
						temp=temp;
					}
					else
					{
						if(nameArray[i]==" ")
						{
							if(nameArray[i+1]==" "||nameArray[i-1]==" "||nameArray[i+1]=="."||nameArray[i+1]=="-"||nameArray[i+1]==",")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else if(nameArray[i]==".")
						{
							if(nameArray[i+1]=="-"||nameArray[i+1]==".")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else if(nameArray[i]=="-")
						{
							if(nameArray[i+1]=="-"||nameArray[i+1]==".")
							{
								temp=temp;
							}
							else
								temp+=1;
						}
						else
							temp+=1;
					}
				}
				else
					temp=temp;
			}
		}
		//var n = verifyChar(name);
		if(temp==name.length)
		{
			var s = name.split(' ');
			//msg.innerHTML = n;
			if(s.length<2)
			{
				return false; 
			}
			else if(s.length>=2)
			{
				if(name.charAt(name.indexOf(' ')+1)=="")
				{
					return false; 
				}
				else
					return true;
			}
			else if(name.length==n)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			return false;
		}
}

function verifyEmail(email)
{
	var pos = verifyExistance(email,'@');
	if(email.charAt(0)==" "||email.charAt(0)=="@")
	{
		return false;
	}
	else
	{
		if(pos == -1)
		{
			return false;
		}
		else
		{
			var array = email.split('@');
			var dotPos = verifyExistance(array[1],'.');

			if(array[1].charAt(0)==" "||array[1].charAt(0)==".")
			{
				return false;
			}
			else
			{
				if(dotPos == -1)
				{
					return false;
				}
				else
				{
					var array2 = array[1].split('.');
					//array[1].charAt(array[1].indexOf('.')+1)==" "||array[1].charAt(array[1].indexOf('.')+1)==""||array[1].charAt(array[1].indexOf('.')-1)==" "
					if(array2[1]!="com")
					{
						return false;
					}
					else
						return true;
				}
			}
		}
	}
}


function verifyContact(contact)
{
	var numberBox = ['0','1','2','3','4','5','6','7','8','9'];
	var	unameArray = contact.split('');
	var	temp = 0;
		for (var i = 0; i < unameArray.length; i++) {
			for (var j = 0; j < numberBox.length; j++) 
			{
				if(unameArray[i]==numberBox[j])
				{
					temp+=1
				}
				else
					temp=temp;
			}
		}
		if(contact.charAt(0)=="")
		{
			return false;
		}
		else
		{
			if(contact.charAt(0)!="0"||contact.charAt(1)!="1")
			{
				return false;
			}
			else
			{
				if(contact.length!=11)
				{
					return false;
				}
				else
				{
					if(contact.length==temp)
					{
						return true;
					}
					else
						return false;
				}
			}
		}
}

function passCheck(pass,cpass)
{
  	if(pass.length<8)
	{
		return 1;
	}
	else
	{
		if(pass!=cpass)
		{
			return 2;
		}
		else
			return 3;
	}
}

function smartphone()
{	var x = document.getElementById('smartphone').textContent;
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../php/buyerSubCat2.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('sub_list').innerHTML=this.responseText;
	    }
	  };
}
function computer()
{
	var x = document.getElementById('computer').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../php/buyerSubCat2.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('ComCat').innerHTML=this.responseText;
	    }
	  };
}
function camera()
{
	var x = document.getElementById('camera').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../php/buyerSubCat2.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('CamCat').innerHTML=this.responseText;
	    }
	  };
}
function lifestyle()
{
	var x = document.getElementById('lifestyle').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../php/buyerSubCat2.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('LifeCat').innerHTML=this.responseText;
	    }
	  };
}

function checkout()
{
	var MainTotal = document.getElementById('mainTotal').textContent;
	var x = document.getElementsByName('payment');
	
	for(var i = 0; i < x.length; i++){
		var text="Select a Payment Method";
	    if(x[i].checked){
	        text=x[i].value;
	        break;
	    }
}
	  if(text=="Select a Payment Method")
	  {
	  		document.getElementById('methodType').innerHTML="Select a Payment Method";
	  }
	  else
	  {
	  		if(text=="Cash On Delivery")
	  		{
	  			if(confirm("Your Product Will Be Reached On The Given Address. Please Pay When You Get Your Product"))
	  			{
	  				var xhttp = new XMLHttpRequest();
					 xhttp.open("POST", "../php/buyerMakeOrder.php", true);
					  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					  xhttp.send('total='+MainTotal);
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status==200) {
					      //alert(this.responseText);
					      window.location = "Profile/buyerOrder.php";
					    }
					  };
	  			}
	  		}
	  		else if(text=="bKash")
	  		{
	  			if(confirm("Please make your bKash Payment on 01XXXXXXXXX first To Get Your Product Delivered On The Given Address"))
	  			{
	  				var xhttp = new XMLHttpRequest();
					 xhttp.open("POST", "../php/buyerMakeOrder.php", true);
					  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					  xhttp.send('total='+MainTotal);
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status==200) {
					      //alert(this.responseText);
					      window.location = "Profile/buyerOrder.php";
					    }
					  };
	  			}
	  		}
	  }
}

function deleteCart(x)
{
	var mot=x.split('|');
	var del = mot[0];
	var qty = mot[1];
	var name = mot[2];
	if(confirm("Are You Sure?"))
	  			{
	  				var xhttp = new XMLHttpRequest();
					 xhttp.open("POST", "../php/buyerDeleteCart.php", true);
					  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					  xhttp.send('delete='+del+'&Qty='+qty+'&Name='+name);
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status==200) {
					      //alert(this.responseText);
					      window.location = "cart.php";
					    }
					  };
	  			}	
}

function gotoLogin(login)
{
	/*var Uname = document.getElementById('uname').value;
	var Upass = document.getElementById('upass').value;*/
	//alert(Uname+Upass+login);
	var json = {
			'uname': document.getElementById('uname').value,
			'upass': document.getElementById('upass').value,
			'btn': login
		};
	if(json.uname==""||json.upass=="")
	{
		  alert('Please Provide All Profile Information');
	}
	else
	{
		var data = JSON.stringify(json);
		var xhttp = new XMLHttpRequest();
		 xhttp.open("POST", "../php/buyerLoginCheck.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  //xhttp.send('uname='+Uname+'&upass='+Upass+'&btn='+login);
		  xhttp.send('cred='+data);
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status==200) {
		      
		      if(this.responseText=="Done")
		      {
		      		alert('Login Successful');
		      		window.location = "../index.php";
		      }
		      else if(this.responseText=="Failed")
		      {
		      		alert('Login Failed');
		      		window.location = "buyerLogin.php"
		      }
		      //;
		    }
		  };
	}
}

function gotoReg(Btn)
{
	//var name = document.getElementById('NAME').value;
	var x = document.getElementsByName('gender');
	var text="";
	for(var i = 0; i < x.length; i++){
	    if(x[i].checked){
	        text=x[i].value;
	        break;
	    }
	}
	var json = {
		'Name': document.getElementById('NAME').value,
		'Email':document.getElementById('EMAIL').value,
		'Dob':document.getElementById('DOB').value,
		'Address':document.getElementById('address').value,
		'Con':document.getElementById('CON').value,
		'Gender':text,
		'Uname':document.getElementById('UNAME').value,
		'Pass':document.getElementById('PASS').value,
		'ConPass':document.getElementById('CONPASS').value,
		'btn':Btn
	};
	if(verifyChar(json.Name)==false)
	{
		document.getElementById('nameMsg').innerHTML="Invalid Name";
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}
	else if(verifyEmail(json.Email)==false)
	{
		document.getElementById('emailMsg').innerHTML="Invalid Email";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}
	else if(json.Gender=="")
	{
		alert('No Gender Selected');
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}
	else if(json.Dob=='')
	{
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="Invalid Date";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}
	if(verifyContact(json.Con)==false)
	{
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="Invalid Contact";
	}
	else if(verifyExistance(json.Uname," ")!=-1)
	{
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="Invalid Username";
		document.getElementById('conMsg').innerHTML="";
	}
	else if(passCheck(json.Pass,json.ConPass)==1)
	{
		alert('Password Length Must Be At Least 8');
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";

	}
	else if(passCheck(json.Pass,json.ConPass)==2)
	{
		alert('Password Did Not Matched');
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}
	else if(verifyAddress(json.Address)==false)
	{
		document.getElementById('emailMsg').innerHTML="";
		document.getElementById('nameMsg').innerHTML="";
		document.getElementById('dobMsg').innerHTML="";
		document.getElementById('addressMsg').innerHTML="Invalid Address";
		document.getElementById('unameMsg').innerHTML="";
		document.getElementById('conMsg').innerHTML="";
	}

	else{
		var data=JSON.stringify(json);
		var xhttp = new XMLHttpRequest();
		 xhttp.open("POST", "../php/buyerRegCheck.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  //xhttp.send('uname='+Uname+'&upass='+Upass+'&btn='+login);
		  xhttp.send('cred='+data);
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status==200) {
		      //alert(this.responseText);
		     if(this.responseText=="Done")
		      {
		      		window.location = "../index.php";
		      }
		      else if(this.responseText=="Failed")
		      {
		      		window.location = "buyerReg.php"
		      }
		    }
		  };
	}
}

function verifyCoupon()
{
	var Coupon = document.getElementById('coupon');
	//alert(Coupon);
	if(Coupon.value!="")
	{
		var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../php/buyerGetCoupon.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('cpn='+Coupon.value);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      //alert(this.responseText);
	      //window.location = "cart.php";
	     if(this.responseText=='Invalid')
	     {
	     	alert('Invalid Code');
	     }
	     else if(this.responseText=='used')
	     {
	     	alert('You have already used the code once');
	     }
	     else if(this.responseText=='date')
	     {
	     		alert('Code Is Not Available Now');
	     }
	     else
	     {
	     	 var obj = JSON.parse(this.responseText);
		      var amount = document.getElementById('mainTotal').textContent;
 				document.getElementById('discount').innerHTML=((obj.amount/100)*amount);
 				document.getElementById('mainTotal').innerHTML=((amount-(obj.amount/100)*amount));
 				document.getElementById('coupon').value="";
	     }
	      //alert(this.responseText);
	    }
	  };

	}
	else if(Coupon.value=="")
	{
		alert('Empty Code');
	}
}