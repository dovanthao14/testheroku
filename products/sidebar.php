<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
?>
<div class="c-layout-sidebar-menu c-theme ">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12 m-t-15">
                    <div class="c-content-title-3 c-title-md c-theme-border">
                        <h3 class="c-left c-font-uppercase">Tùy chọn</h3>
                        <div class="c-line c-dot c-dot-left "></div>
                    </div>
                    <div class="c-content-ver-nav m-b-20">
                        <ul class="c-menu c-arrow-dot c-square c-theme">
                            <li><a class="<?php echo $active == "profile" ? 'active':'';?>" href="/user/profile.html">Thông tin tài khoản</a></li>
                            <li><a class="<?php echo $active == "recharge" ? 'active':'';?>" href="/user/recharge.html">Nạp thẻ cào</a></li>
                            <li><a class="<?php echo $active == "buy" ? 'active':'';?>" href="/history/buy.html">Tài khoản đã mua</a></li>
                            <li><a class="<?php echo $active == "rut-kc" ? 'active':'';?>" href="/user/rut-kim-cuong.html">Rút kim cương</a></li>
                        </ul>
                    </div>
                </div>
            </div>
</div>