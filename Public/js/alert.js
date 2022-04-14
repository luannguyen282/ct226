function updateInfo(){
	result = confirm("Bạn cần cập nhật đầy đủ thông tin trong hồ sơ để có thể bắt đầu trao đổi tài liệu!\nCập nhật ngay?");
        if (result == true) {
            window.location="../Public/info.php";
        }
}

function cart(num){
    document.getElementById('cart'+num).click();
}

function addToCart(num){
    $.ajax({
              type : 'GET', //Sử dụng kiểu gửi dữ liệu POST
              url : '../Form/add-to-cart.php', //gửi dữ liệu sang trang data.php
              data : {matailieu:num}, //dữ liệu sẽ được gửi
              success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
                           alert("Đánh dấu thành công!");
                        }
              });

}

function dec() {
    if(confirm('Bạn có chắc muốn huỷ trao đổi?')) document.getElementById('decline').click();
}

function fdecline() {
    var decline=document.getElementById('decline').value;
    var madonhang=document.getElementById('madonhang').value;
    $.ajax({
        type : 'GET',
        url : '../Form/order-process.php',
        data : {decline:decline,madonhang:madonhang}, 
        success : function()  
            { 
                location.reload();
            }
    });
}
function faccept() {
   var accept=document.getElementById('accept').value;
    var madonhang=document.getElementById('madonhang').value;
    $.ajax({
        type : 'GET',
        url : '../Form/order-process.php',
        data : {accept:accept,madonhang:madonhang}, 
        success : function()  
            { 
                location.reload();
            }
    });       
}

function fexchange() {
    if(confirm('Bạn có chắc muốn yêu cầu trao đổi?\nKhi yêu cầu được người đăng chấp nhận, bạn và người đăng sẽ được cung cấp thông tin liên hệ của nhau!')) document.getElementById('exchange').click();
}