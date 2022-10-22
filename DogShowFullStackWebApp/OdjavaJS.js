$(document).ready(function(){
    
    $("#korisnik_logout").click(function(){
      
        $(function(){
            $.ajax({
            url: 'Registracija.php',
            method: "post",
            data:{odjava_php:"true"},
            dataType: "text",
            success: function(data)
            {
                //Success
                //console.log(data);
                location.reload();
            }

		    });
	      });  
  });
});