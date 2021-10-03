<script>
page= 1;
username = "";
seri = "";
pin = "";
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="username" class="form-control border-input" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="seri" class="form-control border-input" placeholder="Serial">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input type="text" id="pin" class="form-control border-input" placeholder="Mã thẻ">
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
                                <h4 class="title">Lịch sử nạp thẻ</h4>
                                <p class="category">Tất cả giao dịch nạp thẻ của thành viên</p>
                            </div>
                            <div class="content">
                                <div style="display: block;" class="list"></div>
                            </div>
                        </div>
                    </div>
<?php
$card_today = $db->fetch_row("SELECT SUM(count_card) FROM history_card WHERE status = '1' AND date >= DATE_ADD(CURDATE(), INTERVAL 0 DAY)"); // giao dịch hôm nay
$card_month = $db->fetch_row("SELECT SUM(count_card) FROM history_card WHERE status = '1' AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)"); // giao dịch tháng này
$card_all = $db->fetch_row("SELECT SUM(count_card) FROM history_card WHERE status = '1'"); // all giao dịch

?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                                <h4 class="title">Thống kê chi tiết</h4>
                        </div>
                            <div class="content">
                                <p>Tổng số tiền đã nạp hôm nay: <b class="text-danger"><?php echo number_format($card_today, 0, '.', '.'); ?><sup>đ</sup></b></p>
                                <p>Tổng số tiền đã nạp tháng này: <b class="text-danger"><?php echo number_format($card_month, 0, '.', '.'); ?><sup>đ</sup></b></p>
                                <p>Tổng số tiền đã nạp: <b class="text-danger"><?php echo number_format($card_all, 0, '.', '.'); ?><sup>đ</sup></b></p>
                            </div>
                           
                    </div>
                </div>


                </div>

            </div>
        </div>
<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/pages/topup.php", { page : page , username : username , seri : seri , pin : pin })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                username = $("#username").val();
                seri = $("#seri").val();
                pin = $("#pin").val();
                load_list();                                              
            }
load_list();
</script>