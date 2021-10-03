 function load_account(){
                $(".list").show();
                $("#loading").show();
                $.post("/assets/ajax/site/random_account_list.php", { page : page , type : type})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $("#loading").hide();
                    $(".list").show();   
                }); 
            }
load_account();