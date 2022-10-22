$(document).ready(function(){
    $("#naslov_pocetna").css("margin-top",($("#stranica").height()-$("#zaglavlje").height())/2 + "px");
        $("#futer span").css("margin-left", ($(document).width()-$("#futer span").width())/2 + "px");
    $("#futer_1 span").css("margin-left", ($(document).width()-$("#futer_1 span").width())/2 + "px");
    
    setInterval(function(){
        var positionTP = $("#meni_glavni").offset().top - $(window).scrollTop();
        
        if(positionTP < 0)
        {
            $("#meni_glavni").css("position", "fixed");
            $("#meni_glavni").css("top", 0);
            /*//*/$("#izlozba_text").css("margin-top", "5vw");
            $("#meni_glavni").css("background-color", "rgba(68,60,71,0.7)");
            //$("#meni_glavni").css("background-image", "url('double-exposure-5384486_1920.jpg')");
            $("#hr_2").css("display", "block");
            $("#hr_2_2").css("display", "block");
            
            $("#izlozba_text_profil").css("margin-top", "5vw");
            $("#izlozba_text_pregled").css("margin-top", "5vw");
        }
        else if($("#meni_glavni").offset().top <= $(document).width()/100*3.65)
        {
            $("#meni_glavni").css("position", "relative");
            $("#meni_glavni").css("background-color", "rgba(1,1,1,0)");
            //$("#meni_glavni").css("background-image", "none");
            $("#hr_2").css("display", "none");
            /*//*/$("#izlozba_text").css("margin-top", "0");
            $("#hr_2_2").css("display", "none");
            
            $("#izlozba_text_profil").css("margin-top", "0");
            $("#izlozba_text_pregled").css("margin-top", "0");
        }
        
        $("#naslov_pocetna").css("margin-top", $("#zaglavlje").height()/2-$("#naslov_pocetna").height()/2 + "px");
        $("#naslov_pocetna_dobrodosli").css("margin-top", $("#zaglavlje").height()/2-$("#naslov_pocetna_dobrodosli").height()/2 + "px");
        
        $("#profilna_slika").css("margin-top", $("#zaglavlje").height()/2-$("#profilna_slika").height()/2 + "px");
        
        $("#futer span").css("margin-left", ($(document).width()-$("#futer span").width())/2 + "px");
        
        $("#futer_1 span").css("margin-left", ($(document).width()-$("#futer_1 span").width())/2 + "px");
        
        if($(document).height() > $("#stranica").height())
            $("#stranica").height($(document).height()*1.05  + "px");
        
        if($(document).height() > $("#stranica_1").height())
            $("#stranica_1").height($(document).height()*1.05 + "px");
        
        $("body, html").css("opacity", 1);
    }, 10);
});




function Read_Data_Administrator_Pregled()
{
    $(function(){
        $.ajax({
        url: 'DataBase_Read_Data.php',
        method: "post",
        data:{administrator_read_php:"true"},
        dataType: "text",
        success: function(data)
        {
            //Success
            //console.log(data);
            var data_info = data.split('!')[0];
            var data_show = data.split('!')[1];
            if(data_info == "Potvrda")
            {
                 $("#izlozba_text_pregled").html("<b><span style='font-size: 2vw; display: block; width: calc(72.2vw - 22px); text-align:center;'>PREGLED KORISNIKA</span></b><br><br>" + data_show);
                //console.log(data_show);
            }
            else if(data_info == "GRESKA - Podaci ne postoje")
            {
                $("#izlozba_text_pregled").html("GREŠKA - Podaci ne postoje!");
            }
            else
            {
                console.log(data_info);
            }
        }

        });
      });
}



function Remove_Data_Administrator_Pregled(indeks)
{
    $(function(){
        $.ajax({
        url: 'DataBase_Read_Data.php',
        method: "post",
        data:{administrator_remove_php:"true", remove_indeks_php:indeks},
        dataType: "text",
        success: function(data)
        {
            //Success
            //console.log(data);
            if(data == "Potvrda!")
            {
                $(".clear_field_pregled").each(function(){
                    if($(this).attr("alt") == indeks)
                        $(this).remove();
                });
                $(".pregled_spans").each(function(){
                    if($(this).attr("alt") == indeks)
                        $(this).remove();
                });
                $(".extra_space_pregled").each(function(){
                    if($(this).attr("alt") == indeks)
                        $(this).remove();
                });
            }
            else
            {
                console.log(data);
            }
        }

        });
      });
}





function Read_Data_Koordinator_Pregled()
{
    $(function(){
        $.ajax({
        url: 'DataBase_Read_Data.php',
        method: "post",
        data:{koordinator_read_php:"true"},
        dataType: "text",
        success: function(data)
        {
            //Success
            //console.log(data);
            var data_info = data.split('!')[0];
            var data_show = data.split('!')[1];
            if(data_info == "Potvrda")
            {
                $("#izlozba_text_pregled").html("<b><span style='font-size: 2vw; display: block; width: calc(72.2vw - 22px); text-align:center;'>PREGLED IZLOŽBE</span></b><br><br>" + data_show);
                //console.log(data_show);
            }
            else if(data_info == "GRESKA - Podaci ne postoje")
            {
                $("#izlozba_text_pregled").html("GREŠKA - Podaci ne postoje!");
            }
            else
            {
                console.log(data_info);
            }
        }

        });
      });
}





function Read_Data_Ocenjivanje_Pregled()
{
    $(function(){
        $.ajax({
        url: 'DataBase_Read_Data.php',
        method: "post",
        data:{ocenjivanje_read_php:"true"},
        dataType: "text",
        success: function(data)
        {
            //Success
            //console.log(data);
            var data_info = data.split('!')[0];
            var data_show = data.split('!')[1];
            if(data_info == "Potvrda")
            {
                 $("#izlozba_text_pregled").html("<b><span style='font-size: 2vw; display: block; width: calc(72.2vw - 22px); text-align:center;'>PREGLED UČESNIKA</span></b><br><br>" + data_show);
                //console.log(data_show);
                //
                //$("input[type='radio']").each();
            }
            else if(data_info == "GRESKA - Podaci ne postoje")
            {
                $("#izlozba_text_pregled").html("GREŠKA - Podaci ne postoje!");
            }
            else
            {
                console.log(data_info);
            }
        }

        });
      });
}




function Change_Data_Ocenjivanje_Pregled(vrednost, ID)
{
    if($("#rb_ocena_"+vrednost+"_"+ID).is(':checked'))
    {
        $(function(){
            $.ajax({
            url: 'DataBase_Read_Data.php',
            method: "post",
            data:{ocenjivanje_potvrda_php:"true", ocenjivanje_vrednost_php:vrednost,
                 ocenjivanje_id_php:ID},
            dataType: "text",
            success: function(data)
            {
                //Success
                //console.log(data);
                if(data == "Potvrda!")
                {
                    $(".ocena_promena_class").each(function(){
                       if($(this).attr("alt") == ("ocena_promena_"+ID).toString())
                            $(this).text(vrednost);
                    });
                }
                else
                {
                    console.log(data);
                }
            }

            });
          });
    }
}

