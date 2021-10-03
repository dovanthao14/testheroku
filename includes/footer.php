<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
?>
    <div class="c-content-box c-size-md c-bg-white hidden-xs hidden-sm">
    <div class="container" style="text-align: center;">
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Đối tác thanh toán</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="2" data-slide-speed="5000" data-rtl="false">
                <?php
                    $arr_info = glob($root."/assets/images/img_card/card-*");
                    if($arr_info){
                        foreach ($arr_info as $inf) {
                        $img = str_replace($root,"",$inf);?>
                    <div class="item">
                        <a alt="banner">
                            <img src="<?=$img;?>">
                        </a>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    </div>
<!-- END: PAGE CONTENT -->
</div>
</div>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- END: PAGE CONTAINER -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="c-container c-first">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Về <span class="c-theme-font"><?=$settings['domain'];?></span></h3>
                            <div class="c-line-left hide"></div>
                            <p class="c-text">
                                Chuyên mua bán nick các game... an toàn. Tin cậy nhanh chóng. Giao dịch tự động 24/24</p>
                        </div>
                        <ul class="c-links">
                            <li><a href="/intro.html">Giới thiệu</a></li>
                            <li><a href="/terms.html">Điều Khoản Sử Dụng</a></li>
                            <li><a href="/su-uy-tin.html">Sự Uy Tín Của Chúng Tôi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="c-container c-last">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Chúng tôi ở đây</h3>
                            <div class="c-line-left hide"></div>
                            <p>Chúng tôi làm việc một cách chuyên nghiệp, uy tín, nhanh chóng và luôn đặt quyền lợi của bạn lên hàng đầu</p>
                        </div>
                        <ul class="c-socials">
                            <li><a href="<?=$settings['fanpage'];?>" target="_blank"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="<?=$settings['youtube'];?>" target="_blank"><i class="icon-social-youtube"></i></a></li>
                        </ul>
                        <ul class="c-address">
                            <li><i class="icon-call-end c-theme-font"></i> <a href="tel:<?=$settings['phone_admin'];?>" class="c-font-regular"><?=$settings['phone_admin'];?></a> (8h-22h)</li>
                            <li><i class="icon-envelope c-theme-font"></i> <a href="mailto:<?=$settings['email_admin'];?>" class="c-font-regular"><?=$settings['email_admin'];?></a></li>
                            <li><i class="icon-clock c-theme-font"></i><span class="c-font-regular">8h-11h30 & 13h30-22h</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="<?=$settings['fanpage'];?>" data-tabs="timeline" data-height="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$settings['fanpage'];?>" class="fb-xfbml-parse-ignore"><a href="<?=$settings['fanpage'];?>">hop Liên Quân</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-postfooter" style="margin-top: -70px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey">2017 - 2018 &copy; <?=$settings['domain'];?> <span class="c-font-grey-3">Desgined by <a href="https://xtech.vn" class="active">XTECH</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<script src="/assets/frontend/theme/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/demos/default/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="/assets/frontend/theme/assets/global/plugins/magnific/magnific.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/smooth-scroll/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/js-cookie/js.cookie.js" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="/assets/frontend/theme/assets/base/js/components.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/base/js/app.js" type="text/javascript"></script>
<script src="/assets/frontend/plugins/bootbox.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html('<div class="loader" style="text-align: center"><img src="/assets/images/loader.gif" style="width: 50px;height: 50px;"></div>');
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        App.init(); // init core
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(".menu-main-mobile a").click(function() {

        if( $(this).closest("li").hasClass("c-open")){
            $(this).closest("li").removeClass("c-open");
        }
        else{
            $(this).closest("li").addClass("c-open");
        }
    });

</script>
<!-- END: THEME SCRIPTS -->
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/assets/frontend/theme/assets/plugins/moment.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/daterangepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/demos/default/js/scripts/pages/datepicker.js" type="text/javascript"></script>
<script src="/assets/frontend/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js" type="text/javascript"></script>
<script src="/assets/frontend/js/common.js" type="text/javascript"></script>
<!-- END: LAYOUT/BASE/BOTTOM -->

<!-- Histats.com  START (hidden counter) -->
<img  src="//sstatic1.histats.com/0.gif?4149195&101" style="display:none;">
<!-- Histats.com  END  -->
<!-- Load Facebook SDK for JavaScript -->
<style>
    .fb-livechat,
    .fb-widget {
        display: none
    }
    
    .ctrlq.fb-button,
    .ctrlq.fb-close {
        position: fixed;
        right: 24px;
        cursor: pointer
    }
    
    .ctrlq.fb-button {
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 10px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
    }
    
    .ctrlq.fb-button:focus,
    .ctrlq.fb-button:hover {
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
    }
    
    .fb-widget {
        background: #fff;
        z-index: 1000;
        position: fixed;
        width: 360px;
        height: 435px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        right: 24px;
        border-radius: 6px;
        -o-border-radius: 6px;
        -webkit-border-radius: 6px;
        box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }
    
    .fb-credit {
        text-align: center;
        margin-top: 8px
    }
    
    .fb-credit a {
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0;
        font-weight: 400
    }
    
    .ctrlq.fb-overlay {
        z-index: 0;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition: opacity .4s, visibility .4s;
        transition: opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .05);
        display: none
    }
    
    .ctrlq.fb-close {
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px
    }
    
    .ctrlq.fb-close::after {
        content: "X";
        font-family: sans-serif
    }
    
    .bubble {
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px;
        left: -5px;
        border-radius: 50%;
    }
    
    .bubble-msg {
        width: 120px;
        left: -140px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
    }
</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/<?=end(explode("/", $settings['fanpage']));?>" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div>
        <div class="fb-credit"> <a href="https://fb.com/luauytin" target="_blank">Powered by LuaUyTin</a> </div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/<?=end(explode("/", $settings['fanpage']));?>" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ ?</div>
    </a>
</div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script>
    $(document).ready(function() {
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        }
        var t = {
            delay: 125,
            overlay: $(".fb-overlay"),
            widget: $(".fb-widget"),
            button: $(".fb-button")
        };
        setTimeout(function() {
            $("div.fb-livechat").fadeIn()
        }, 8 * t.delay);
        if (!detectmob()) {
            $(".ctrlq").on("click", function(e) {
                e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, 2 * t.delay, function() {
                    $(this).hide("slow"), t.button.show()
                })) : t.button.fadeOut("medium", function() {
                    t.widget.stop().show().animate({
                        bottom: "30px",
                        opacity: 1
                    }, 2 * t.delay), t.overlay.fadeIn(t.delay)
                })
            })
        }
    });
</script>

</body>
</html>