<script>
page= 1;
id_products = "";
username = "";
</script>
<div class="content">
    <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Tìm kiếm dữ liệu</h4>
                </div>    
                <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" id="id_products" class="form-control border-input" placeholder="Mã số nick">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                        <input type="text" id="username" class="form-control border-input" placeholder="Username">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                        </span>
                        </div>
                    </div>    
                
                </div>    
                </div>
                </div>
                </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lịch sử mua tài khoản</h4>
                                <p class="category">Tất cả giao dịch mua nick của thành viên</p>
                            </div>
                            <div class="content">
                                <div style="display: block;" class="list"></div>
                            </div>
                        </div>
                    </div>
<?php
$buy_today = $db->fetch_row("SELECT SUM(price) FROM history_buy WHERE `id_products` != '0' AND date >= DATE_ADD(CURDATE(), INTERVAL 0 DAY)"); // giao dịch hôm nay
$buy_month = $db->fetch_row("SELECT SUM(price) FROM history_buy WHERE `id_products` != '0' AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)"); // giao dịch tháng này
$buy_all = $db->fetch_row("SELECT SUM(price) FROM history_buy WHERE `id_products` != '0'"); // all giao dịch

?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                                <h4 class="title">Thống kê chi tiết</h4>
                        </div>
                            <div class="content">
                                <p>Tổng số tiền đã bán hôm nay: <b class="text-danger"><?php echo number_format($buy_today, 0, '.', '.'); ?><sup>đ</sup></b></p>
                                <p>Tổng số tiền đã bán tháng này: <b class="text-danger"><?php echo number_format($buy_month, 0, '.', '.'); ?><sup>đ</sup></b></p>
                                <p>Tổng số tiền đã bán: <b class="text-danger"><?php echo number_format($buy_all, 0, '.', '.'); ?><sup>đ</sup></b></p>
                            </div>
                           
                    </div>
                </div>


                </div>

            </div>
        </div>
<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/pages/buy.php", { page : page , id_products : id_products , username : username })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                id_products = $("#id_products").val();
                username = $("#username").val();
                load_list();                                              
            }
load_list();
</script>