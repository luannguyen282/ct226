function sharing() {
	document.getElementById('sharing').style="display: block;";
	document.getElementById('shared').style="display: none;";
	document.getElementById('li1').style="background: #FFAE00;";
	document.getElementById('li2').style="background: #3A454B;";
}
function shared() {
	document.getElementById('shared').style="display: block;";
	document.getElementById('sharing').style="display: none;";
	document.getElementById('li2').style="background: #FFAE00;";
	document.getElementById('li1').style="background: #3A454B;";
}
var sumpagea=0, currentpagea=1;
var sumpageb=0, currentpageb=1;

function page(str, t){
	if (t=='a') {sumpage=sumpagea; currentpage=currentpagea;}
	if (t=='b') {sumpage=sumpageb; currentpage=currentpageb;}

	var i;
	
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
	if (t=='a') currentpagea=currentpage;
	if (t=='b') currentpageb=currentpage;

}