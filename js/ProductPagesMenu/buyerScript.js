function smartphone()
{	var x = document.getElementById('smartphone').textContent;
	 var xhttp = new XMLHttpRequest();
	 xhttp.open("POST", "../../php/buyerSubCat3.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat3.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat3.php", true);
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
	 xhttp.open("POST", "../../php/buyerSubCat3.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send('subCat='+x);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status==200) {
	      document.getElementById('LifeCat').innerHTML=this.responseText;
	    }
	  };
}

function gotoProduct(x)
{
	var Productname = document.getElementById('productname').textContent;
	var Productprice = document.getElementById('productprice').textContent;
	var ProductQty = document.getElementById('qty').value;
	//alert(ProductQty);

	if(parseInt(x)<=0)
	{
		alert('Product Sold Out!');
	}
	else
	{
				if(parseInt(x)<parseInt(ProductQty))
			{
				/*alert(x);
				alert(ProductQty);*/
				console.log(typeof x);
				console.log(typeof ProductQty);
				alert('Desired Quantity is Not Available');
			}
			else
			{
				var xhttp = new XMLHttpRequest();
				 xhttp.open("POST", "../../php/getProduct.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send('ProName='+Productname+'&ProPrice='+Productprice+'&ProQty='+ProductQty+'&avQ='+x);

				  xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status==200) {
				    	//alert(this.responseText);
				    window.location = "../cart.php";

				    }
				    //alert(this.responseText);
				  };
			}
	} 
}
