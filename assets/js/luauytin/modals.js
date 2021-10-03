//login
$(document).ready(function() {
    $(".login-luauytin").validate({
        submitHandler: function(e) {
            document.getElementById("submit").disabled = true;
            $('button[id="submit"]').html("Đang đăng nhập...");
            $.post("/assets/ajax/client/login.php", $('.login-luauytin').serialize(), function(data) {
                document.getElementById("submit").disabled = false;
                $('button[id="submit"]').html("Đăng nhập");
                if (data.status == "success") {
                    $('.msg').html('<span style="color:green;">' + data.msg + '</span>');
                    setTimeout(function(){window.location = '';}, 1000);
                } else {
                    $('.msg').html(data.msg);
                }
            }, "json");
            return false;
        }
    });
});

//register
$(document).ready(function() {
    $(".register-luauytin").validate({
        submitHandler: function(e) {
            document.getElementById("submit").disabled = true;
            $('button[id="submit"]').html("Đang đăng ký...");
            $.post("/assets/ajax/client/register.php", $('.register-luauytin').serialize(), function(data) {
                document.getElementById("submit").disabled = false;
                $('button[id="submit"]').html("Đăng ký");
                if (data.status == "success") {
                    $('.msg').html('<span style="color:green;">' + data.msg + '</span>');
                    setTimeout(function(){window.location = '/';}, 1000);
                } else {
                    $('.msg').html(data.msg);
                }
            }, "json");
            return false;
        }
    });
});

//forgot
$(document).ready(function() {
    $(".forgot-luauytin").validate({
        submitHandler: function(e) {
            document.getElementById("submit").disabled = true;
            $('.loading').show();
            $.post("/assets/ajax/client/forgot.php", $('.forgot-luauytin').serialize(), function(data) {
                document.getElementById("submit").disabled = false;
                $('.loading').hide();
                if (data.status == "success") {
                    $('.msg').html('<span style="color:green;">' + data.msg + '</span>');
                    if(data.code){
                        $('button[id="submit"]').html('Cập nhật mật khẩu <i class="fa fa-spinner fa-spin loading" style="display: none;"></i>');
                        $('.forgot').html(data.code);}
                } else {
                    $('.msg').html(data.msg);}
                if(data.link){
                        setTimeout(function(){window.location = data.link;}, 1000);}
            }, "json");
            return false;
        }
    });
});

//change info
$(document).ready(function() {
    $(".change_info").validate({
        rules: {
            oldinfo: {
                required: true
            },
            newinfo: {
                required: true
            },
            renewinfo: {
                required: true
            }
        },
        messages: {
            oldinfo: '<small style="color:red;">Vui lòng điền thông tin !</small>',
            newinfo: '<small style="color:red;">Vui lòng điền thông tin !</small>',
            renewinfo: '<small style="color:red;">Vui lòng điền thông tin !</small>'
        },
        submitHandler: function(e) {
            document.getElementById("submit").disabled = true;
            $('.loading').show();
            $.post("/assets/ajax/client/change_info.php", $('.change_info').serialize(), function(data) {
                document.getElementById("submit").disabled = false;
                $('.loading').hide();
                if (data.status == "success") {
                    $('.msg').html('<span style="color:green;">' + data.msg + '</span>');
                    setTimeout(function(){window.location = '/user/profile.html';}, 1000);
                } else {
                    $('.msg').html(data.msg);
                }
            }, "json");
            return false;
        }
    });
});

//recharge
$(document).ready(function() {
    $("#recharge").validate({
        rules: {
            card_type_id: {
                required: true
            },
            price_guest: {
                required: true
            },
            seri: {
                required: true,
                minlength: 6
            },
            pin: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            card_type_id: '<small style="color:red;">Vui lòng chọn nhà mạng</small>',
            price_guest: '<small style="color:red;">Vui lòng chọn mệnh giá</small>',
            seri: '<small style="color:red;">Vui lòng nhập serial</small>',
            pin: '<small style="color:red;">Vui lòng nhập mã thẻ</small>'
        },
        submitHandler: function(e) {
            $('p[id="msg"]').html('');
            document.getElementById("recharge_submit").disabled = true;
            $('button[id="recharge_submit"]').html("ĐANG NẠP...");
            $.post("/assets/ajax/site/card.php", $('#recharge').serialize(), function(data) {
                document.getElementById("recharge_submit").disabled = false;
                $('button[id="recharge_submit"]').html("NẠP THẺ");
                if (data.status == "success") {
                    load_page();
                    $('p[id="msg"]').html('<span style="color:green;">' + data.msg + '</span>');
                } else {
                    $('p[id="msg"]').html('<span style="color:red;">' + data.msg + '</span>');
                }
            }, "json");
            return false;
        }
    });
});

//buy random
function buy_account_random(id) {
    document.getElementById("purchase").disabled = true;
    $('button[id="purchase"]').html("Đang xử lý...");
    $.post("/assets/ajax/site/check_buy_random.php", {
        id: id
    }, function(data) {
        $('button[id="purchase"]').html("Thanh toán");
        if (data.status == "success") {
            $('label[id="msg"]').html('<span style="color:green;">Giao dịch thành công !</span>').show();
            $('button[id="purchase"]').hide();
            $('.luauytin').html(data.msg);
        } else {
            $('label[id="msg"]').html(data.msg).show();
            document.getElementById("purchase").disabled = false;
        }

    }, "json");

}

//buy account
function buy_account(id) {
    document.getElementById("purchase").disabled = true;
    $('button[id="purchase"]').html("Đang xử lý...");
    $.post("/assets/ajax/site/check_buy.php", {
        id: id
    }, function(data) {
        $('button[id="purchase"]').html("Thanh toán");
        if (data.status == "success") {
            $('label[id="msg"]').html('<span style="color:green;">Giao dịch thành công !</span>').show();
            $('button[id="purchase"]').hide();
            $('.luauytin').html(data.msg);
        } else {
            $('label[id="msg"]').html(data.msg).show();
            document.getElementById("purchase").disabled = false;
        }

    }, "json");

}

//rut_kc_ff_luauytin
$(document).ready(function() {
    $("#rut_kc_ff_luauytin").validate({
        rules: {
            soluong: {
                required: true
            },
            id_ingame: {
                required: true
            }
        },
        messages: {
            soluong: '<small style="color:red;">Vui lòng chọn gói kim cương</small>',
            id_ingame: '<small style="color:red;">Vui lòng nhập ID Ingame</small>'
        },
        submitHandler: function(e) {
            $('p[id="msg"]').html('');
            document.getElementById("recharge_submit").disabled = true;
            $('button[id="recharge_submit"]').html("ĐANG XỬ LÝ...");
            $.post("/assets/ajax/site/rut_kc_ff.php", $('#rut_kc_ff_luauytin').serialize(), function(data) {
                document.getElementById("recharge_submit").disabled = false;
                $('button[id="recharge_submit"]').html("GỬI YÊU CẦU");
                if (data.status == "success") {
                    load_page();
                    $('p[id="msg"]').html('<span style="color:green;">' + data.msg + '</span>');
                } else {
                    $('p[id="msg"]').html('<span style="color:red;">' + data.msg + '</span>');
                }
            }, "json");
            return false;
        }
    });
});
