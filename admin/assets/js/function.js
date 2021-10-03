//function descr_game
$(document).ready(function () {
      $("#descr_game").validate({
        submitHandler: function (e) {
          $('button[id="descr_game"]').prop('disabled', true).html("ĐANG LƯU...");
          $.post("/admin/assets/ajax/systems/descr_game.php", $('#descr_game').serialize(), function(data) {
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
                $('button[id="descr_game"]').prop('disabled', false).html("LƯU");
          }, "json");
              return false;
          }
        
      });
      });

//function form_create
$(document).ready(function () {
      $("#form_create").validate({
        rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    price: {
                        required: true,
                        minlength: 4
                    }
                },
                messages: {
                    username: '<small style="color:red;">Vui lòng điền tài khoản</small>',
                    password: '<small style="color:red;">Vui lòng điền mật khẩu</small>',
                    price: '<small style="color:red;">Vui lòng điền giá</small>'
                }  
      });
      });

//function create_random
$(document).ready(function () {
      $("#create_random").validate({
        submitHandler: function (e) {
          $('button[type="submit"]').prop('disabled', true).html("ĐANG ĐĂNG...");
          $.post("/admin/assets/ajax/systems/create_random.php", $('#create_random').serialize(), function(data) {
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
              if(data.status == 'success'){
                window.location.href = "/admin/random";
              }else{
                $('button[type="submit"]').prop('disabled', false).html("ĐĂNG");
              }
          }, "json");
              return false;
          }
        
      });
      });
//js add_more random
$(document).ready(function(){
        var fieldHTML = '<div class="row"><div class="col-sm-5 col-xs-5"><div class="form-group"><label>Tên đăng nhập:</label><input type="text" class="form-control border-input" name="username[]" placeholder="Tên đăng nhập"></div></div><div class="col-sm-5 col-xs-5"><div class="form-group"><label>Mật khẩu:</label><input type="text" class="form-control border-input" name="password[]" placeholder="Mật khẩu"></div></div><br/><button class="form-group col-sm-2 col-xs-2 btn btn-danger remove_button active" title="Xóa dòng"><i class="fa fa-trash" style="font-size: 150%;"></i></button></div>';
        var x = 1;
        $('.add_button').click(function(){
            x++; // Tăng biến couter
            $('.random').append(fieldHTML);
            $('.count_rd').html(x);
          return false;
        });
        $(document).on('click', '.remove_button', function(e){ 
            e.preventDefault();
            $(this).parent('.row').remove();
            x--;
            $('.count_rd').html(x);
        });
    });

//function setting_general
$(document).ready(function () {
      $("#setting_general").validate({
          submitHandler: function (e) {
          $('button[id="setting_general"]').html("ĐANG LƯU...");
          $.post("/admin/assets/ajax/settings/general.php", $('#setting_general').serialize(), function(data) {
              $('button[id="setting_general"]').html("LƯU");
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
              setTimeout(function () {
                    window.location.href = data.link;}, 2000);
          }, "json");
              return false;
          }
      });
      });
      
//function card_create_edit
$(document).ready(function () {
      $("#card_create_edit").validate({
                rules: {
                    id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    ck: {
                        required: true                    }
                },
                messages: {
                    id: '<small style="color:red;">Vui lòng nhập ID !</small>',
                    name: '<small style="color:red;">Vui lòng nhập loại thẻ !</small>',
                    ck: '<small style="color:red;">Vui lòng nhập chiết khấu !</small>'
                },
          submitHandler: function (e) {
          $('button[type="submit"]').prop('disabled', true);
          $('.loading').show();
          $.post("/admin/assets/ajax/systems/card_create_edit.php", $('#card_create_edit').serialize(), function(data) {
              $('.loading').hide();
              $('button[type="submit"]').prop('disabled', false);
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
                if(data.link){
                    setTimeout(function () {window.location.href = data.link;}, 2000);}
          }, "json");
              return false;
          }
      });
      });
      
//function edit_member
$(document).ready(function () {
      $("#edit_member").validate({
          submitHandler: function (e) {
          $('button[type="submit"]').html("ĐANG LƯU...");
          $.post("/admin/assets/ajax/pages/edit_member.php", $('#edit_member').serialize(), function(data) {
              $('button[type="submit"]').html("LƯU");
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
              setTimeout(function () {
                    window.location.href = "/admin/member";}, 3000);
          }, "json");
              return false;
          }
      });
      });

//function uptime_del_acc      
function uptime_delacc(id,note,type) {
            	swal(
            	{
            	  title: note+" #"+id,
            	  text: "Bạn có chắc chắn "+note+" tài khoản này ?",
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Có",
            	  cancelButtonText: "Không",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/uptime_delacc.php", { id: id , type : type }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
                    
            	  }, "json");
            	}
            	);
            }

//function status_card      
function status_card(id,status,note) {
            	swal(
            	{
            	  title: "#"+id,
            	  text: "Nội dung xử lý: "+note,
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Tiếp tục",
            	  cancelButtonText: "Quay lại",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/status_card.php", { id: id , status : status }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
            	  }, "json");
            	}
            	);
            }

//function status_dff
function status_dff(id,status,note) {
            	swal(
            	{
            	  title: "#"+id,
            	  text: "Nội dung xử lý: "+note,
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Tiếp tục",
            	  cancelButtonText: "Quay lại",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/status_dff.php", { id: id , status : status }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
            	  }, "json");
            	}
            	);
            }

//function del_img      
function del_img(name,url) {
            	swal(
            	{
            	  title: "Xóa ảnh ID: "+name,
            	  text: "Bạn có chắc chắn xóa ảnh này ?",
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Có",
            	  cancelButtonText: "Không",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/del_img.php", { url : url }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    setTimeout(function () {
                    window.location.href = "";}, 2000);
                    
            	  }, "json");
            	}
            	);
            }

//function del_random      
function del_random(id) {
            	swal(
            	{
            	  title: "Xóa ID: #"+id,
            	  text: "Bạn có chắc chắn xóa nick này ?",
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Có",
            	  cancelButtonText: "Không",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/del_random.php", { id : id }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
                    
            	  }, "json");
            	}
            	);
            }

//function del_img_champ_skin      
function del_img_champ_skin(type,id,file,name) {
            	swal(
            	{
            	  title: name,
            	  text: "Bạn có chắc chắn xóa ảnh này ?",
            	  type: "warning",
            	  showCancelButton: true,
            	  confirmButtonColor: "#DD6B55",
            	  confirmButtonText: "Có",
            	  cancelButtonText: "Không",
            	  closeOnConfirm: true
            	}, function () {
            	  $.post("/admin/assets/ajax/systems/del_img_champ_skin.php", { type : type , id : id , file : file }, function (data) {
            	    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    setTimeout(function () {
                    window.location.href = "";}, 2000);
                    
            	  }, "json");
            	}
            	);
            }
// reset top nạp
function reset_top() {
              swal(
              {
                title: "Reset top nạp thẻ",
                text: "Bạn có chắc chắn xóa dữ liệu top nạp thẻ ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: true
              }, function () {
                $.post("/admin/assets/ajax/systems/reset_top_recharge.php", function (data) {
                  $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                }, "json");
              }
              );
            }
function del_card(id,type,name) {
              swal(
              {
                title: "Thẻ "+name+" #"+id,
                text: "Bạn có chắc chắn xóa thẻ này ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: true
              }, function () {
                $.post("/admin/assets/ajax/systems/card_create_edit.php",{ id : id , type : type }, function (data) {
                    $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
                
                }, "json");
              }
              );
            }


//function form_edit_wheel
$(document).ready(function () {
      $("#form_edit_wheel").validate({
          submitHandler: function (e) {
          $('button[type="submit"]').html("ĐANG LƯU...");
          $.post("/admin/assets/ajax/wheel/edit.php", $('#form_edit_wheel').serialize(), function(data) {
              $('button[type="submit"]').html("CẬP NHẬT");
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
              setTimeout(function () {
                    if(data.status == "success") window.location.href = "/admin/wheel";}, 3000);
          }, "json");
              return false;
          }
      });
      });
//function ratio_wheel
$(document).ready(function () {
      $("#ratio_wheel").validate({
          submitHandler: function (e) {
          $('button[type="submit"]').html("ĐANG LƯU...");
          $.post("/admin/assets/ajax/wheel/ratio.php", $('#ratio_wheel').serialize(), function(data) {
              $('button[type="submit"]').html("LƯU");
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
              setTimeout(function () {
                    window.location.href = "/admin/wheel";}, 3000);
          }, "json");
              return false;
          }
      });
      });
//function add_wheel
$(document).ready(function () {
      $("#add_wheel").validate({
          submitHandler: function (e) {
          $('button[id="add_wheel_submit"]').html("Đang thêm...");
          $.post("/admin/assets/ajax/wheel/add_del.php", $('#add_wheel').serialize(), function(data) {
              $('button[id="add_wheel_submit"]').html("Thêm tài khoản");
              $.notify({
                message: data.msg},{
                type: data.status,
                timer: 4000 }
                );
                if(data.status == "success"){
                  document.getElementById("add_wheel").reset();
                  load_list();
                }
          }, "json");
              return false;
          }
      });
      });
//function del_wheel      
function del_wheel(id) {
              swal(
              {
                title: "Xóa ID: #"+id,
                text: "Bạn có chắc chắn xóa nick này ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: true
              }, function () {
                $.post("/admin/assets/ajax/wheel/add_del.php", { type : 1 , id : id }, function (data) {
                  $.notify({
                    message: data.msg},{
                    type: data.status,
                    timer: 4000 });
                    if(data.status == "success"){
                        load_list();}
                    
                }, "json");
              }
              );
            }