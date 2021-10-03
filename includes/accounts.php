<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$game = type_game(GET('accounts')) ? GET('accounts'):'free-fire';
//Lấy content game
    $sql_descr_game = "SELECT * FROM `descr_game` WHERE `type` = '{$game}' LIMIT 1";
    $descr_game = $db->fetch_assoc($sql_descr_game, 1);
?>

<script>
var page = 1;
var type_account = '<?=$game;?>';
var group = price = rank = champs = skins = champs_count = skins_count = '';
</script>
<div class="c-layout-page">
<div class="container">
    <div class="row" style="margin-top: 15px;<?=$db->num_rows($sql_descr_game) ? '':'display: none;';?>">
        <div class="col-sm-12">
            <div class="alert alert-info" role="alert">
                <h2 class="alert-heading"><?=type_game($descr_game['type']);?></h2>
                <?=bbcode($descr_game['content']);?>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 15px;">
            <div class="m-l-10 m-r-10">
                <div class="form-inline m-b-10">
                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon" for="group">Sắp xếp</span>
                            <select class="form-control c-square c-theme" id="group" name="group" >
                                <option value="0">Mặc định</option>
                                <option value="1">Tài khoản mới thêm</option>
                                <option value="2">Giá giảm dần</option>
                                <option value="3">Giá tăng dần</option>
                            <?php if($game == 'lien-quan'):?>    
                                <option value="4">Số tướng giảm dần</option>
                                <option value="5">Số tướng tăng dần</option>
                                <option value="6">Số trang phục giảm dần</option>
                                <option value="7">Số trang phục tăng dần</option>
                            <?php endif;?>
                                <option value="8">Rank từ cao đến thấp</option>
                                <option value="9">Rank từ thấp dến cao</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon" for="price">Giá tiền</span>
                            <select class="form-control c-square c-theme tooltips" id="price" name="price">
                                <option value="0">Tất cả</option>
                                <option value="1">Dưới 50K</option>
                                <option value="2">Từ 50K - 200K</option>
                                <option value="3">Từ 200K - 500K</option>
                                <option value="4">Từ 500K - 1 Triệu</option>
                                <option value="5">Từ 1 triệu trở lên</option>
                            </select>
                        </div>
                    </div>
                <?php if($game == 'lien-quan'):?>
                    <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon" for="rank">Rank</span>
                            <select class="form-control c-square c-theme" id="rank" name="rank">
                                <option value="0">Không cần rank</option>
                                <option  value="2">Đồng V</option>
                                <option  value="3">Đồng IV</option>
                                <option  value="4">Đồng III</option>
                                <option  value="5">Đồng II</option>
                                <option  value="6">Đồng I</option>
                                <option  value="7">Bạc V</option>
                                <option  value="8">Bạc IV</option>
                                <option  value="9">Bạc III</option>
                                <option  value="10">Bạc II</option>
                                <option  value="11">Bạc I</option>
                                <option  value="12">Vàng V</option>
                                <option  value="13">Vàng IV</option>
                                <option  value="14">Vàng III</option>
                                <option  value="15">Vàng II</option>
                                <option  value="16">Vàng I</option>
                                <option  value="17">Bạch Kim V</option>
                                <option  value="18">Bạch Kim IV</option>
                                <option  value="19">Bạch Kim III</option>
                                <option  value="20">Bạch Kim II</option>
                                <option  value="21">Bạch Kim I</option>
                                <option  value="22">Kim Cương V</option>
                                <option  value="23">Kim Cương IV</option>
                                <option  value="24">Kim Cương III</option>
                                <option  value="25">Kim Cương II</option>
                                <option  value="26">Kim Cương I</option>
                                <option  value="27">Cao Thủ</option>
                                <option  value="28">Thách Đấu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon" id="basic-addon1">Số tướng</span>
                            <input type="number" class="form-control c-square c-theme tooltips" title="" placeholder="Nhập số tướng tối thiểu" id="champs_count" name="champs_count" value="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon" id="basic-addon1">Số trang phục</span>
                            <input type="number" class="form-control c-square c-theme tooltips" title="" placeholder="Nhập số trang phục tối thiểu" id="skins_count" name="skins_count" value="">
                        </div>
                    </div>
                <?php endif;?>
                    <div class="col-md-3 col-sm-4 p-5 no-radius">
                        <button type="submit" class="btn c-square c-theme c-btn-green" name="submit" onclick="fitler();"><i class="fa fa-search"></i> Tìm kiếm</button>
                        <a class="btn c-square m-l-0 btn-danger clear_fitler" onclick="clear_fitler();" style="display: none;"><i class="fa fa-close"></i> Xóa lọc</a>
                    </div>
                </div>
            </div>
        </div>
        <center><img id="loading" src="/assets/images/dna-spin-spiral-preloader.gif" style="display:none;"></center>
        <div style="display: block;" class="list"></div>
    
    </div>
</div> 
<script src="/assets/js/luauytin/fitler.js"></script>

    <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                </div>

                <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                   <?=bbcode($descr_game['content']);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
        <script>
            var noticeModal = <?=$descr_game['content'] == '' ? 0:1;?>;
            $(document).ready(function(){
                if (noticeModal != 0) {
                    $('#noticeModal').modal('show');}
            });
        </script> 