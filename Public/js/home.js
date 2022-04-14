function page(str){
	currentpage=Number(document.getElementById('current-page').value);
	maxpage=Number(document.getElementById('max-page').value);
	if(str=="<" && currentpage!=1) {
		document.getElementById('page').value=currentpage-1;
		document.getElementById('page').click();
	}
	if(str=="<<" && currentpage!=1) {
		document.getElementById('page').value=1;
		document.getElementById('page').click();
	}
	if(str==">" && currentpage!=maxpage) {
		document.getElementById('page').value=maxpage;
		document.getElementById('page').click();
	}
	if(str==">>" && currentpage!=maxpage) {
		document.getElementById('page').value=maxpage;
		document.getElementById('page').click();
	}

}

