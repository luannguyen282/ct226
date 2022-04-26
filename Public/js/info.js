
function sharing() {
	document.getElementById('sharing').style="display: block;";
	document.getElementById('shared').style="display: none;";
	document.getElementById('exchanging').style="display: none;";
	document.getElementById('lock').style="display: none;";
	document.getElementById('li1').style="background: #FFAE00;";
	document.getElementById('li2').style="background: #3A454B;";
	document.getElementById('li3').style="background: #3A454B;";
	document.getElementById('li4').style="background: #3A454B;";
}
function shared() {
	document.getElementById('shared').style="display: block;";
	document.getElementById('sharing').style="display: none;";
	document.getElementById('exchanging').style="display: none;";
	document.getElementById('lock').style="display: none;";
	document.getElementById('li2').style="background: #FFAE00;";
	document.getElementById('li1').style="background: #3A454B;";
	document.getElementById('li3').style="background: #3A454B;";
	document.getElementById('li4').style="background: #3A454B;";
}
function exchanging() {
	document.getElementById('sharing').style="display: none;";
	document.getElementById('shared').style="display: none;";
	document.getElementById('exchanging').style="display: block;";
	document.getElementById('lock').style="display: none;";
	document.getElementById('li3').style="background: #FFAE00;";
	document.getElementById('li2').style="background: #3A454B;";
	document.getElementById('li1').style="background: #3A454B;";
	document.getElementById('li4').style="background: #3A454B;";
}
function lock() {
	document.getElementById('sharing').style="display: none;";
	document.getElementById('shared').style="display: none;";
	document.getElementById('exchanging').style="display: none;";
	document.getElementById('lock').style="display: block;";
	document.getElementById('li4').style="background: #FFAE00;";
	document.getElementById('li2').style="background: #3A454B;";
	document.getElementById('li3').style="background: #3A454B;";
	document.getElementById('li1').style="background: #3A454B;";
}
function editInfo() {
	document.getElementById('seller-1').style='display: none';
	document.getElementById('seller-2').style='display: block';
}
function editInfoC() {
	document.getElementById('seller-2').style='display: none';
	document.getElementById('seller-1').style='display: block';
}
function changeAvatar(){
	document.getElementById('avatar').click();
}

function addPro(){
	document.getElementById('add-new-1').style="display: none;";
	document.getElementById('add-new-2').style="display: block;";
}

function addProC(){
	document.getElementById('add-new-2').style="display: none;";
	document.getElementById('add-new-1').style="display: block;";
}
function radio1(){
	document.getElementById('new-pro-price').style="display:none";
}
function radio2(){
	document.getElementById('new-pro-price').style="display:block";
}
function eradio1(){
	document.getElementById('edit-pro-price').style="display:none";
}
function eradio2(){
	document.getElementById('edit-pro-price').style="display:block";
}
function addProPhoto(num){
	document.getElementById('pp'+num).click();
}

function editPro(num){
	document.getElementById('product-d'+num).style="display: none;";
	document.getElementById('product-dE'+num).style="display: block;";
}

function editProC(num){
	document.getElementById('product-dE'+num).style="display: none;";
	document.getElementById('product-d'+num).style="display: block;";

}
function editProa(num){
	document.getElementById('product-a'+num).style="display: none;";
	document.getElementById('product-aE'+num).style="display: block;";
}

function editProaC(num){
	document.getElementById('product-aE'+num).style="display: none;";
	document.getElementById('product-a'+num).style="display: block;";

}
var sumpagea=0, currentpagea=1;
var sumpageb=0, currentpageb=1;
var sumpagec=0, currentpagec=1;
var sumpaged=0, currentpaged=1;

function page(str, t){
	if (t=='a') {sumpage=sumpagea; currentpage=currentpagea;}
	if (t=='b') {sumpage=sumpageb; currentpage=currentpageb;}
	if (t=='c') {sumpage=sumpagec; currentpage=currentpagec;}
	if (t=='d') {sumpage=sumpaged; currentpage=currentpaged;}
	var i;
	
	if (t=='a') {
		var maxpage = Math.round(sumpage/2);
		//Xử lí nút last page
		if (str=="last") {
			for (i = sumpage; i >= 1; i--) {
				if (sumpage%2==0) {
					if (i>=sumpage-1) {
						document.getElementById('product-'+t+i).style="display: block;";
					}else{
						document.getElementById('product-'+t+i).style="display: none;";
					}
				}else{
					if (i==sumpage) {
						document.getElementById('product-'+t+i).style="display: block;";
					}else{
						document.getElementById('product-'+t+i).style="display: none;";
					}
				}
			}
			currentpage=maxpage;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút pre
		if (str=="pre" && currentpage!=1) {
			for(i = 1; i <= sumpage; i++){
				if ((i <= (currentpage-1)*2) && (i > (currentpage-1)*2-2)) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage--;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút next
		if (str=="next" && currentpage!=maxpage) {
			for(i = 1; i <= sumpage; i++){
				if ((i <= (currentpage+1)*2) && (i > (currentpage+1)*2-2)) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage++;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút first page
		if (str=="first" && currentpage!=1) {
			for(i = 1; i <= sumpage; i++){
				if (i<=2) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage=1;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	}else{
		if (sumpage%3==0) {
			var maxpage=sumpage/3;
		}else{
			var maxpage=(sumpage-sumpage%3)/3 + 1;
		}
		//Xử lí nút last page
		if (str=="last") {
			for (i = 1; i <= sumpage; i++) {
				if (i>(maxpage-1)*3) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage=maxpage;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút pre
		if (str=="pre" && currentpage!=1) {
			for(i = 1; i <= sumpage; i++){
				if ((i <= (currentpage-1)*3) && (i > (currentpage-1)*3-3)) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage--;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút next
		if (str=="next" && currentpage!=maxpage) {
			for(i = 1; i <= sumpage; i++){
				if ((i <= (currentpage+1)*3) && (i > (currentpage+1)*3-3)) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage++;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	//Xử lí nút first page
		if (str=="first" && currentpage!=1) {
			for(i = 1; i <= sumpage; i++){
				if (i<=3) {
					document.getElementById('product-'+t+i).style="display: block;";
				}else{
					document.getElementById('product-'+t+i).style="display: none;";
				}
			}
			currentpage=1;
			document.getElementById('pagenum'+t).value=currentpage;
		}
	}
	if (t=='a') currentpagea=currentpage;
	if (t=='b') currentpageb=currentpage;
	if (t=='c') currentpagec=currentpage;
	if (t=='d') currentpaged=currentpage;

}