function content(num){
	for(var i=1; i<=3; i++){
		if (i==num) {
			document.getElementById('content-'+i).style="display: block";
			document.getElementById('c'+i).style="background: #FFAE00;";
		}
		else{
			document.getElementById('content-'+i).style="display: none";
			document.getElementById('c'+i).style="background: #3A454B;";
		}
	}
}
