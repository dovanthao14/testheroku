<script>
page= 1;
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
                            <input type="text" id="id" class="form-control border-input" placeholder="Mã số nick">
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
                                <h4 class="title">Lịch sử mua random</h4>
                                <p class="category">Tất cả giao dịch của thành viên</p>
                            </div>
                            <div class="content">
                                <div style="display: block;" class="list"></div>
                            </div>
                        </div>
                    </div>
<?php
$random = $db->fetch_row("SELECT COUNT(*) FROM acc_random WHERE status = '1'");

?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                                <h4 class="title">Thống kê chi tiết</h4>
                        </div>
                            <div class="content">
                                <p>Tổng số giao dịch: <b class="text-danger"><?php echo number_format($random, 0, '.', '.'); ?></b></p>
                            </div>
                           
                    </div>
                </div>


                </div>

            </div>
        </div>
<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/pages/random_lq.php", { page : page , username : username , id: id})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                username = $("#username").val();
                id = $("#id").val();
                load_list();                                              
            }
load_list();
</script>