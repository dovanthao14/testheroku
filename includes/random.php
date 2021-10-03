<?php
$type = type_random(GET('type'))['name'] != '' ? (int)GET('type') : 1;
?>
<script>page = 1;type = <?=$type;?>;</script>
<div class="c-layout-page">
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col-sm-12">
            <div class="alert alert-info" role="alert">
                <h2 class="alert-heading">Random <?=type_random($type)['name'].' '.type_random($type)['price']*0.001.'K';?></h2>
                <b><?=type_random($type)['content'];?></b>
            </div>
        </div>
    </div>
        <center><img id="loading" src="/assets/images/dna-spin-spiral-preloader.gif" style="display:none;"></center>
        <div style="display: block;" class="list"></div>
    
    </div>
</div> 
<script src="/assets/js/luauytin/fitler_random.js"></script>

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
                   <?=type_random($type)['content'];?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
        <script>
            var noticeModal = <?=type_random($type)['content'] == '' ? 0:0;?>;
            $(document).ready(function(){
                if (noticeModal != 0) {
                    $('#noticeModal').modal('show');}
            });
        </script> 