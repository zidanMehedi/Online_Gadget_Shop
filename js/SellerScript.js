



function login_show()
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "view/SellerLogin.php", true);
	xhttp.send();
	document.title='Product Details';
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('data').innerHTML = this.responseText;
	    }
	  };
}


function product_details()
{
	window.location='SellerHome.php#product';
	if (window.location.hash=="#product") {
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "SellerProductDetails.php", true);
		xhttp.send();
	  	xhttp.onreadystatechange = function() {
		window.title='Product Details';
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>Product Details";


	    }
	    
	  };
	}
	else
	{
		alert("Don't Play with me");
	}
	


}



function logout()
{
	window.location='../php/SellerLogout.php';
}


function home()
{
	window.location='SellerHome.php';
	//document.getElementById('path').innerHTML = "==>/";
}


function profile()
{
	window.location='SellerHome.php#profile';
	if (window.location.hash=="#profile") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerProfile.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(View Profile)";
	    }
	  };
	}
	

}


function profileSettings()
{
	window.location='SellerHome.php#infoSettings';
	if (window.location.hash=="#infoSettings") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerProfileEdit.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Settings)==>(Profile Update)";
	    }
	  };
	}
	

}



function profileOption()
{
	window.location='SellerHome.php#option';
	if (window.location.hash=="#option") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerSettingOption.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Settings)";
	    }
	  };
	}
	

}

function chnagePassword()
{
	window.location='SellerHome.php#changepassword';
	if (window.location.hash=="#changepassword") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerPasswordChange.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Settings)==>(Change Password)";
	    }
	  };
	}
}

function search_product()
{
	var re = document.getElementById('pdata');
	var dta = document.getElementById('src').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerSearchProduct.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	 xhttp.send("search="+dta);
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	re.innerHTML = this.responseText;
	    }
	  };

}

function product_search_view()
{
	window.location='SellerHome.php#productSearch';
	if (window.location.hash=="#productSearch") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerProductSearch.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Product)==>(Product Search)";
	    }
	  };
	}
}


function product_option()
{
	window.location='SellerHome.php#productOption';
	if (window.location.hash=="#productOption") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerProductOption.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Product)";
	    }
	  };
	}
}

function customer_details()
{
	window.location='SellerHome.php#customerDetails';
	if (window.location.hash=="#customerDetails") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerCustomerDetails.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Customer Details)";
	    }
	  };
	}
}

function getSubCat()
{
	var name = document.getElementById('cat').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerGetSubCat.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("cat="+name);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("sub").innerHTML = this.responseText;
    }};
}

function product_add()
{
	window.location='SellerHome.php#productAdd';
	if (window.location.hash=="#productAdd") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerProductAdd.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Product)==>(Add Product)";
	    }
	  };
	}
}

function category_add()
{
	window.location='SellerHome.php#catrgoryAdd';
	if (window.location.hash=="#catrgoryAdd") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerCategoryAdd.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Product)==>(Add Category)";
	    }
	  };
	}
}

function subcategory_add()
{
	window.location='SellerHome.php#subcategoryAdd';
	if (window.location.hash=="#subcategoryAdd") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerSubCategoryAdd.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Product)==>(Add Sub-Category)";
	    }
	  };
	}
}

function product_update(value)
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "SellerProductUpdate.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("edit="+value);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("product").innerHTML = this.responseText;
    }};
}

function deleteProduct(id){

	var conf = confirm("Are you sure to delete?");
	if(conf == true){
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../php/SellerDeleteProduct.php", true);
		xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  		xhttp.send("del="+id);
  		xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		 alert(this.responseText);
    	}};
	}
}

function orders()
{
	window.location='SellerHome.php#orders';
	if (window.location.hash=="#orders") {
		window.title = "Orders";
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerOrder.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Orders)";
	    }
	  };
	}
}


function report()
{
	window.location='SellerHome.php#report';
	if (window.location.hash=="#report") {
		var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "SellerReportGen.php", true);
	xhttp.send();
	
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     	document.getElementById('product').innerHTML = this.responseText;
	     	document.getElementById('path').innerHTML = "==>(Report)";
	    }
	  };
	}
}



function approve(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerOrderApprove.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("appID="+id);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("product").innerHTML = this.responseText;
    	
    }};
}

function deliver(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerOrderDeliv.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("appID="+id);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("product").innerHTML = this.responseText;
    	
    }};
}

function reject(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerOrderReject.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("appID="+id);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("product").innerHTML = this.responseText;
    	
    }};
}

function get()
{
	var d1 = document.getElementById('date1').value;
	var d2 = document.getElementById('date2').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../php/SellerReport.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("d1="+d1+"&d2="+d2);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("report").innerHTML = this.responseText;
    	
    }};

}


 function downloadReport(){

	var pdf = document.getElementById('report').innerHTML;
	
	var style = "<style>";
    style = style + "table {width: 100%;font: 17px Calibri;}";
    style = style + "table, th, td {border: solid 1px ; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";

	var win = window.open('', 'Sales Report', 'height=700,width=700');

    win.document.write('<html><head>');
    win.document.write('<title>Sales Report</title>');   
    win.document.write(style);          
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(pdf);         
    win.document.write('</body></html>');

    win.document.close(); 	

    win.print();
}
