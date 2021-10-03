<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm thẻ nạp mới</b></h4> </h4>
                            </div>
                            <div class="content">                                
                            <form id="card_create_edit" enctype ="multipart/form-data" method="POST">
                            <input type="hidden" name="type" value="1">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Mã ID:</label>
                                <input type="number" class="form-control border-input" id="id" name="id" placeholder="ID thẻ">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="name">Loại thẻ:</label>
                                <input type="text" class="form-control border-input" id="name" name="name" placeholder="Loại thẻ">
                              </div></div>
                              <div class="col-sm-4">
                              <div class="form-group">
                                <label for="ck">Chiết khấu (%):</label>
                               <input type="number" class="form-control border-input" id="ck" name="ck" placeholder="Chiết khấu">
                              </div></div>
                            </div>
                            <div class="row">
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="auto">Nạp Auto:</label>
                                <select class="form-control border-input" name="auto">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                 </select>
                              </div></div>    
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select class="form-control border-input" name="status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Bảo trì</option>
                                 </select>
                              </div></div>                    
                            </div>
                            <div class="footer"><hr/>
                              <button type="submit" class="btn btn-default">THÊM THẺ <i class="fa fa-spinner fa-spin loading" style="display: none;"></i></button>
                            </div>
                            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>