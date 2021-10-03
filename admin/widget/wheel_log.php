<script>
page= 1;
id = "";
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
                            <input type="text" id="id" class="form-control border-input" placeholder="ID Giao Dịch">
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
                                <h4 class="title">Lịch sử quay số</h4>
                                <p class="category">Tất cả giao dịch của thành viên</p>
                            </div>
                            <div class="content">
                                <div style="display: block;" class="list"></div>
                            </div>
                        </div>
                    </div>
<?php
$buy_all = $db->fetch_row("SELECT COUNT(id) FROM history_wheel"); // all giao dịch
?>
                <div class="col-md-12">
                    <div class="card">
                            <div class="content">
                                <p>Số lượt quay: <b class="text-danger"><?php echo number_format($buy_all, 0, '.', '.'); ?></b></p>
                            </div>
                           
                    </div>
                </div>


                </div>

            </div>
        </div>
<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/wheel/log.php", { page : page , id : id , username : username })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                id = $("#id").val();
                username = $("#username").val();
                load_list();                                              
            }
load_list();
</script>