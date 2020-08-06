function indexSmartphone()
{	var x = document.getElementById('smartphone').textContent;
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "php/buyerSubCat.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('sub_list').innerHTML=this.responseText;
	    }
	  };
}
function indexComputer()
{
	var x = document.getElementById('computer').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "php/buyerSubCat.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('ComCat').innerHTML=this.responseText;
	    }
	  };
}
function indexCamera()
{
	var x = document.getElementById('camera').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "php/buyerSubCat.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('CamCat').innerHTML=this.responseText;
	    }
	  };
}
function indexLifestyle()
{
	var x = document.getElementById('lifestyle').textContent;
	
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "php/buyerSubCat.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('LifeCat').innerHTML=this.responseText;
	    }
	  };
}

function search()
{
	var ProName = document.getElementById('search').value;
	if(ProName=="")
	{
		alert('No Product');
	}
	else
	{
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "php/buyerSearch.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('proName='+ProName);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      //window.location = "view/cart.php?subCat="+this.responseText+"";
	      alert(this.responseText);
	    }
	  };
	}
}
