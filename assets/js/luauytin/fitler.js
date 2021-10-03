           function load_account(){
                $(".list").show();
                $("#loading").show();
                $.post("/assets/ajax/site/account_list.php", { page : page , group : group , price : price , rank : rank , champs_count : champs_count , skins_count : skins_count, type_account : type_account })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $("#loading").hide();
                    $(".list").show();   
                }); 
            }
            function fitler(){
                champs_count = $("#champs_count").val();
                skins_count = $("#skins_count").val();
                group = $("#group option:selected").val();
                price = $("#price option:selected").val();
                rank = $("#rank option:selected").val();
                $(".clear_fitler").show();
                load_account();                                              
            }
            function clear_fitler(){
                page = 1;
                champs_count = skins_count = group = price = rank = '';
                $("#champs_count").val('');
                $("#skins_count").val('');
                $("#group").val(0);
                $("#price").val(0);
                $("#rank").val(0);
                $(".clear_fitler").hide();
                load_account();                                              
            }
load_account();