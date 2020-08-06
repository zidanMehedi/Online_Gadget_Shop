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


function smartphone()
{	var x = document.getElementById('smartphone').textContent;
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../../php/buyerSubCat4.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat4.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat4.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat4.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('LifeCat').innerHTML=this.responseText;
	    }
	  };
}

function updateInfo(value)
{
	var Newname = document.getElementById('newName').value;
	var Newemail = document.getElementById('newEmail').value;
	var Newcon = document.getElementById('newCon').value;
	if(verifyChar(Newname)==false)
	{
		alert('Invalid Name');
	}
	else if(verifyEmail(Newemail)==false)
	{
		alert('Invalid Email');
	}
	else if(verifyContact(Newcon)==false)
	{
		alert('Invalid Contact');
	}
	//alert(Newname+Newemail+Newcon);
	 else
	 {
	 	var xhttp = new XMLHttpRequest();
		 xhttp.open("POST", "../../php/buyerCheckUpdate.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send('newName='+Newname+'&newEmail='+Newemail+'&newCon='+Newcon+'&btn='+value);
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status==200) {
		      //document.getElementById('LifeCat').innerHTML=this.responseText;
		      if(this.responseText=='0')
		      {
		      	alert('Update Failed');
		      }
		      else if(this.responseText=='1')
		      {
		      	alert('Update Successful');
		      	window.location='../../php/buyerLogoutCheck.php';

		      }
		    }
		  };
	 }
}
