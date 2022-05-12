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
var noti_status='off';
		var coat_status='off';
		function coat(status){
			if(status==='on'){
				document.getElementById('coat').style='display: block';
				coat_status='on';
			}
			else{
				document.getElementById('coat').style='display: none';
				coat_status='off';
			}
		}
		function noti() {
			if (noti_status==='off') {
				document.getElementById('noti').style='display: block';
				noti_status='on';
				coat('on');
			}
			else{
				document.getElementById('noti').style='display: none';
				noti_status='off';
				coat('off');
			}
		}
		function button_off() {
			if (noti_status!=='off') {
				document.getElementById('noti').style='display: none';
				noti_status='off';
				coat('off');
			}
		}
function report(arg){
	if(arg=='not_valid')
		alert('Để tránh sai sót. Bạn cần truy cập vào 1 tài liệu hoặc người dùng cụ thể để có thể thực hiện tố cáo!');
}
function click_object(arg){
	document.getElementById(arg).click();

}
function readall() {
	$.ajax({
              type : 'GET', 
              url : '../Form/readallnoti.php', 
              data : {submit:'readall'}, 
              success : function(data)  
                        { 
                           
                        }
              });
}