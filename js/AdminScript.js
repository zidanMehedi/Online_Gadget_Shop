function letterValid(name)
{
	var letter = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','.','-','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','(',')','0','1','2','3','4','5','6','7','8','9'];
	var	splitName = name.split('');
	var	flag = 0;
		for (var i = 0; i < splitName.length; i++) {
			for (var j = 0; j < letter.length; j++) {
				if (splitName[i] == letter[j]) {
					if((i==0) && (letter[j]==" "||letter[j]=="."||letter[j]=="-"))
					{
						flag=flag;
					}
					else
					{
						if(splitName[i]==" ")
						{
							if(splitName[i+1]==" "||splitName[i-1]==" "||splitName[i+1]=="."||splitName[i+1]=="-")
							{
								flag=flag;
							}
							else
								flag+=1;
						}
						else if(splitName[i]==".")
						{
							if(splitName[i+1]=="-"||splitName[i+1]==".")
							{
								flag=flag;
							}
							else
								flag+=1;
						}
						else if(splitName[i]=="-")
						{
							if(splitName[i+1]=="-"||splitName[i+1]==".")
							{
								flag=flag;
							}
							else
								flag+=1;
						}
						else
							flag+=1;
					}
				}
				else
					flag=flag;
			}
		}
		if(flag==name.length)
		{
			var s = name.split(' ');
			if(s.length<2)
			{
				return true; 
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

function validateName() {

	var ername = document.getElementById('erpname');
	var name = document.getElementById('valpname').value;
	
	if (name == "") 
	{
		ername.innerHTML = "Product name can not be empty.";
	}
	else {
		if(letterValid(name))
		{
			ername.innerHTML = "";
		}
		else
		{
			ername.innerHTML = "Product name is not Valid.";
		}
	}
	
}


function getSubCategory(){

	var name = document.getElementById('cat').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGetSubCategory.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("key="+name);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("sub").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
  	
}

function validateCategory(){
	var category = document.getElementById('cat').value;
	var errcat = document.getElementById('ercat');
	
		if(category == "")
		{
			errcat.innerHTML = "Select product category";
		}
		else{
			errcat.innerHTML = "";
		}
}

function validateQuantity(){
	var quantity = document.getElementById('pquan').value;
	var errquan = document.getElementById('erquan');
	
		if(quantity == "")
		{
			errquan.innerHTML = "Product quantity can not be empty";
		}
		else{
			errquan.innerHTML = "";
		}
}

function validateBuyingPrice(){
	var buyprice = document.getElementById('pbuy').value;
	var errbuy = document.getElementById('erbuy');
	
		if(buyprice == "")
		{
			errbuy.innerHTML = "Buying price can not be empty";
		}
		else{
			errbuy.innerHTML = "";
		}
}

function validateSellingPrice(){
	var sellprice = document.getElementById('psel').value;
	var errsell = document.getElementById('ersel');
	
		if(sellprice == "")
		{
			errsell.innerHTML = "Selling price can not be empty";
		}
		else{
			errsell.innerHTML = "";
		}
}

function validateIncomedate(){
	var date = document.getElementById('pin').value;
	var errin = document.getElementById('erin');
	
		if(date == "")
		{
			errin.innerHTML = "Incoming date can not be empty";
		}
		else{
			errin.innerHTML = "";
		}
}

function validateDescription(){
	var description = document.getElementById('pdes').value;
	var errdes = document.getElementById('erdes');
	
		if(description == "")
		{
			errdes.innerHTML = "Description can not be empty";
		}
		else if (description.indexOf('.') == -1) 
		{
			errdes.innerHTML = "Description is not valid";
		}	
		else{
			errdes.innerHTML = "";
		}
}

function validateActivity(){
	var activity = document.getElementById('pact').value;
	var erract = document.getElementById('eract');
	
		if(activity == "")
		{
			erract.innerHTML = "Select product activity";
		}
		else{
			erract.innerHTML = "";
		}
}

function getProductBySearch(){
	var search = document.getElementById('key').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGetSearchProduct.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("skey="+search);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("select").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
}

function DeleteProduct(deleteid){

	var conf = confirm("Are you sure to delete?");
	if(conf == true){
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../db/AdminDeleteProduct.php", true);
		xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  		xhttp.send("delid="+deleteid);
  		xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		document.getElementById("select").innerHTML = this.responseText;
    		//alert(this.responseText);
    	}};
	}
}

function validateCategoryName(){
	var category = document.getElementById('cate').value;
	var errcat = document.getElementById('ercatname');
	
		if(category == "")
		{
			errcat.innerHTML = "Category name can not be empty";
		}
		else{
			errcat.innerHTML = "";
		}
}

function validateSubCategoryName(){
	var subcategory = document.getElementById('subcat').value;
	var errsubcat = document.getElementById('ersubcatname');
	
		if(subcategory == "")
		{
			errsubcat.innerHTML = "Sub-Category name can not be empty";
		}
		else{
			errsubcat.innerHTML = "";
		}
}

function validateFName() {

	var erfname = document.getElementById('erfname');
	var fname = document.getElementById('fname').value;
	
	if (fname == "") 
	{
		erfname.innerHTML = "First name can not be empty.";
	}
	else {
		if(letterValid(fname))
		{
			erfname.innerHTML = "";
		}
		else
		{
			erfname.innerHTML = "First name is not Valid.";
		}
	}
}

function validateLName() {

	var erlname = document.getElementById('erlname');
	var lname = document.getElementById('lname').value;
	
	if (lname == "") 
	{
		erlname.innerHTML = "Last name can not be empty.";
	}
	else {
		if(letterValid(lname))
		{
			erlname.innerHTML = "";
		}
		else
		{
			erlname.innerHTML = "Last name is not Valid.";
		}
	}
	
}

function validateUName() {

	var eruname = document.getElementById('eruname');
	var uname = document.getElementById('uname').value;
	
	if (uname == "") 
	{
		eruname.innerHTML = "Username can not be empty.";
	}
	else {
		if(NumberValid(uname))
		{
			eruname.innerHTML = "";
		}
		else
		{
			eruname.innerHTML = "Username is not Valid.";
		}
	}
	
}

function specialCharPresent(a,b)
{
	var c = a.indexOf(b);
	return c;
}

function Email(email)
{
	var c = specialCharPresent(email,'@');
	if(email.charAt(0)==" "||email.charAt(0)=="@" || email.charAt(email.length-1) == '.')
	{
		return false;
	}
	else
	{
		if(c == -1)
		{
			return false;
		}
		else
		{
			var splitEmail_1 = email.split('@');
			var positionOfDot = specialCharPresent(splitEmail_1[1],'.');

			if(splitEmail_1[1].charAt(0)==" "||splitEmail_1[1].charAt(0)==".")
			{
				return false;
			}
			else
			{
				if(positionOfDot == -1)
				{
					return false;
				}
				else
				{
					var splitEmail_2 = splitEmail_1[1].split('.');
					if(splitEmail_2[1]!="com")
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

function validateEmail(){
	var email = document.getElementById('email').value;
	var eremail = document.getElementById('eremail');

	if (email == "") {
		eremail.innerHTML = "Email can not be empty.";
	}
	else {
		if(Email(email))
		{
			eremail.innerHTML = "";
		}
		else
		{
			eremail.innerHTML = "Email can not Valid.";
		}
	}

}

function validateUserType(){
	var utype = document.getElementById('utype').value;
	var erutype = document.getElementById('erutype');
	
		if(utype == "")
		{
			erutype.innerHTML = "User type can not be empty";
		}
		else{
			erutype.innerHTML = "";
		}
}

function validatePassword(){
	var upass = document.getElementById('upass').value;
	var erupass = document.getElementById('erupass');
	
		if(upass == "")
		{
			erupass.innerHTML = "Password can not be empty";
		}
		else{
			erupass.innerHTML = "";
		}
}

function validateCpass(){
	var pass = document.getElementById('upass').value;
	var cpass = document.getElementById('ucpass').value;
	var ercpass = document.getElementById('erucpass');

	if (cpass == "") {
		ercpass.innerHTML = "Confirm Password can not be empty.";
		ercpass.style.color = "red";
	}
	else{
		if (cpass == pass) {
			ercpass.innerHTML = "Password Matched";
			ercpass.style.color = "green";
		}
		else{
			ercpass.innerHTML = "Password is not matched";
			ercpass.style.color = "red";
		}
	}

}

function NumberValid(uid)
{
	var number = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var	splitUid = uid.split('');
	var	flag = 0;
		for (var i = 0; i < splitUid.length; i++) {
			for (var j = 0; j < number.length; j++) 
			{
				if(splitUid[i] == number[j])
				{
					flag += 1;
				}
				else{
					flag = flag;
				}
			}
		}
		if(uid.charAt(0) == "")
		{
			return false;
		}
		else
		{
			if(uid.length==flag)
			{
				return true;
			}
			else{
				return false;
			}
		}
}

function DeleteUser(deleteuid){

	var conf = confirm("Are you sure to delete?");
	if(conf == true){
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../db/AdminDeleteUser.php", true);
		xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  		xhttp.send("userid="+deleteuid);
  		xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		document.getElementById("userdata").innerHTML = this.responseText;
    		//alert(this.responseText);
    	}};
	}
}

function getUserBySearch(){
	var search = document.getElementById('skey').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGetSearchUser.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("shkey="+search);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("userdata").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
}

function getCustomerBySearch(){
	var search = document.getElementById('ckey').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGetSearchCustomer.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("cuskey="+search);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("cusdata").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
}

function PromoValid(name)
{
	var s = name.split(' ');
	if(s.length == 1){
		return true; 
	}
	else{
		return false;
	}
	
}

function validatePromoCode() {

	var erpromo = document.getElementById('erpcode');
	var promo = document.getElementById('pcode').value;
	
	if (promo == "") 
	{
		erpromo.innerHTML = "Promo Code can not be empty.";
	}
	else {
		if(PromoValid(promo))
		{
			erpromo.innerHTML = "";
		}
		else
		{
			erpromo.innerHTML = "Promo Code is not Valid.";
		}
	}
	
}

function DiscountValueValid(discount)
{
	var number = ['0','1','2','3','4','5','6','7','8','9'];
	var	splitDiscount = discount.split('');
	var	flag = 0;
		for (var i = 0; i < splitDiscount.length; i++) {
			for (var j = 0; j < number.length; j++) 
			{
				if(splitDiscount[i] == number[j])
				{
					flag += 1;
				}
				else{
					flag = flag;
				}
			}
		}
		if(discount.charAt(0) == "")
		{
			return false;
		}
		else
		{
			if(discount.length==flag)
			{
				return true;
			}
			else{
				return false;
			}
		}
}

function validateDiscount(){

	var erdis = document.getElementById('erpdis');
	var dis = document.getElementById('pdis').value;
	
	if (dis == "") 
	{
		erpdis.innerHTML = "Discount Value can not be empty.";
	}
	else {
		if(DiscountValueValid(dis))
		{
			erpdis.innerHTML = "";
		}
		else
		{
			erpdis.innerHTML = "Discount Value is not Valid.";
		}
	}
	
}

function validatePromoDate(){
	var date = document.getElementById('prdate').value;
	var erpdate = document.getElementById('erprdate');
	
		if(date == "")
		{
			erprdate.innerHTML = "Validate can not be empty";
		}
		else{
			erprdate.innerHTML = "";
		}
}

function validatePromoStatus(){
	var status = document.getElementById('prstat').value;
	var erstatus = document.getElementById('erprstat');
	
		if(status == "")
		{
			erstatus.innerHTML = "Select product activity";
		}
		else{
			erstatus.innerHTML = "";
		}
}

function validateCID(){

	var ercid = document.getElementById('ercid');
	var cid = document.getElementById('cid').value;
	
	if (cid == "") 
	{
		ercid.innerHTML = "Customer ID can not be empty.";
	}
	else {
		if(DiscountValueValid(cid))
		{
			ercid.innerHTML = "";
		}
		else
		{
			ercid.innerHTML = "Customer ID is not Valid.";
		}
	}
	
}



function DisablePromo(id){

	var conf = confirm("Are you sure to disable?");
	if(conf == true){
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../db/AdminDisablePromo.php", true);
		xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  		xhttp.send("promoid="+id);
  		xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		document.getElementById("promodata").innerHTML = this.responseText;
    		//alert(this.responseText);
    	}};
	}
}

function getPromoBySearch(){
	var search = document.getElementById('pskey').value;

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGetSearchPromo.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("pkey="+search);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("promodata").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
}

function validateOldPassword(){
	var pass = document.getElementById('oldpass').value;
	var erpass = document.getElementById('eroldpass');
	
		if(pass == "")
		{
			erpass.innerHTML = "Old Password can not be empty";
		}
		else{
			erpass.innerHTML = "";
		}
}

function validateNewPassword(){
	var npass = document.getElementById('newpass').value;
	var ernpass = document.getElementById('ernewpass');
	
		if(npass == "")
		{
			ernpass.innerHTML = "New Password can not be empty";
		}
		else{
			ernpass.innerHTML = "";
		}
}

function validateConfirmPass(){
	var pass = document.getElementById('newpass').value;
	var cpass = document.getElementById('conpass').value;
	var ercpass = document.getElementById('erconpass');

	if (cpass == "") {
		ercpass.innerHTML = "Confirm Password can not be empty.";
		ercpass.style.color = "red";
	}
	else{
		if (cpass == pass) {
			ercpass.innerHTML = "Password Matched";
			ercpass.style.color = "green";
		}
		else{
			ercpass.innerHTML = "Password is not matched";
			ercpass.style.color = "red";
		}
	}

}

function generateReport(){

	var start = document.getElementById('sdate').value;
	var end = document.getElementById('edate').value;
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "../db/AdminGenerateReportCheck.php", true);
	xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
  	xhttp.send("stdate="+start+"&endate="+end);
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("reportdata").innerHTML = this.responseText;
    	//alert(this.responseText);
    }};
}

function downloadReport(){

	var pdf = document.getElementById('reportdata').innerHTML;
	
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

