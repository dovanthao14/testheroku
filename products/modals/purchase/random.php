<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$id = (int)GET('id');
$sql_acc_random = "SELECT * FROM `acc_random` WHERE `status` = '0' AND `id` = '{$id}'";

//check id product
if($db->num_rows($sql_acc_random) > 0):
$acc_random= $db->fetch_assoc($sql_acc_random, 1);?>
<form method="POST" id="buy_account">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Thử vận may</h4>
    </div>
    <div class="modal-body">
        <div class="c-content-tab-4 c-opt-3" role="tabpanel">
            <ul class="nav nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a>
                </li>
                <li role="presentation">
                    <a href="#info_account" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="payment">
                    <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                        <li class="c-font-dark">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th colspan="2">Thông tin tài khoản #<?=$id;?></th>
                                    </tr>
                                </tbody>
                                <tbody class="luauytin">
                                    <tr>
                                        <td>Loại:</td>
                                        <th><?=type_random($acc_random['type'])['name'];?></th>
                                    </tr>
                                    <tr>
                                        <td>Giá tiền:</td>
                                        <th class="text-info"><?=number_format(type_random($acc_random['type'])['price']);?>đ</th>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="info_account">
                    <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                        <li class="c-font-dark">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th colspan="2"><?=type_random($acc_random['type'])['content'];?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <label id="msg" class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 6px 0;font-weight: bold;">
            <?php if(!is_client()):?>    
                Bạn phải đăng nhập mới có thể mua tài khoản tự động.
            <?php endif;?>
            </label>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="modal-footer">
    <?php if(!is_client()):?>
        <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/user/login">Đăng nhập</a>
    <?php else:?>
        <button id="purchase" type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" onclick="buy_account_random(<?=$acc_random['id'];?>);">Thanh Toán</button>
    <?php endif;?>
        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
    </div>
</form>
<?php else:?>
<div class="loader" style="text-align: center;color: red;font-weight: bold;margin: 18px;">Tài khoản không tồn tại hoặc đã bán !</div>
<?php endif;?>
<script src="/assets/js/luauytin/modals.js" type="text/javascript"></script>