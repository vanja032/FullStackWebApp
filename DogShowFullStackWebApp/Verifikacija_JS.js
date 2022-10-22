$(document).ready(function(){
    var ime_check=false;
    var prez_check=false;
    var email_check=false;
    var sifra_check=false;
    var ime_psa_check=false;
    var rasa_psa_check=false;
    
    var email_identity = [""];
    
    var email_login_check = false;
    var password_login_check = false;
    
    $("#registracija_login_bt").prop('disabled', true);
    $("#prijava_login_bt").prop('disabled', true);
    
    
  $("#ime_input_signup").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\-=\[\]{};':"\\|,<>\/?~]/;
      var ime = $("#ime_input_signup").val();
      if(ime.length < 20 && ime.length > 0 && !format.test(ime))
      {    
          $("#ime_input_signup").css("border-color", "#bde66c");
          ime_check=true;
      }
      else
      {
           $("#ime_input_signup").css("border-color", "#e36868");   
          ime_check=false;  
      }
      checkButton();
  });
    
    $("#prez_input_signup").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\-=\[\]{};':"\\|,<>\/?~]/;
      var prezime = $("#prez_input_signup").val();
      if(prezime.length < 30 && prezime.length > 0 && !format.test(prezime))
      {    
          $("#prez_input_signup").css("border-color", "#bde66c");
          prez_check=true;
      }
      else
      {
           $("#prez_input_signup").css("border-color", "#e36868");   
          prez_check=false;  
      }
      checkButton();
  });
    
    
    $("#email_input_signup").bind("keyup keydown keypress", function(){
      var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var email = $("#email_input_signup").val();
      if(email.length > 0 && format.test(email) && email_identity.indexOf(email) === -1)
      {    
          $("#email_input_signup").css("border-color", "#bde66c");
          email_check=true;
          $("#sign_up_error").css("display", "none");
      }
      else
      {
           $("#email_input_signup").css("border-color", "#e36868");   
          email_check=false; 
          if(email_identity.indexOf(email) !== -1)
          {
                $("#sign_up_error").text("GRESKA - Email postoji!");
                $("#sign_up_error").css("display", "block");  
          }
          else
              $("#sign_up_error").css("display", "none");
      }
      checkButton();
  });
    
    
    $("#pass_input_signup").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\=\[\]{};':"\\|<>\/?~]/;
      var sifra = $("#pass_input_signup").val();
      if(sifra.length < 20 && sifra.length >= 8 && !format.test(sifra))
      {    
          $("#pass_input_signup").css("border-color", "#bde66c");
          sifra_check=true;
      }
      else
      {
           $("#pass_input_signup").css("border-color", "#e36868");   
          sifra_check=false;  
      }
      checkButton();
  });
    
    
    
    $("#ime_psa_input_signup").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\-=\[\]{};':"\\|,<>\/?~]/;
      var ime_psa = $("#ime_psa_input_signup").val();
      if(ime_psa.length < 20 && ime_psa.length > 0 && !format.test(ime_psa))
      {    
          $("#ime_psa_input_signup").css("border-color", "#bde66c");
          ime_psa_check=true;
      }
      else
      {
           $("#ime_psa_input_signup").css("border-color", "#e36868");   
          ime_psa_check=false;  
      }
      checkButton();
  });
    
    
    
    $("#rasa_psa_input_signup").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\-=\[\]{};':"\\|,<>\/?~]/;
      var rasa_psa = $("#rasa_psa_input_signup").val();
      if(rasa_psa.length < 20 && rasa_psa.length > 0 && !format.test(rasa_psa))
      {    
          $("#rasa_psa_input_signup").css("border-color", "#bde66c");
          rasa_psa_check=true;
      }
      else
      {
           $("#rasa_psa_input_signup").css("border-color", "#e36868");   
          rasa_psa_check=false;  
      }
      checkButton();
  });
    
    
  $("#registracija_login_bt").click(function(){
      if(ime_check && prez_check && email_check && sifra_check && ime_psa_check && rasa_psa_check)
      {
          var ime = $("#ime_input_signup").val();
          var prezime = $("#prez_input_signup").val();
          var email = $("#email_input_signup").val();
          var sifra = $("#pass_input_signup").val();
          var ime_psa = $("#ime_psa_input_signup").val();
          var rasa_psa = $("#rasa_psa_input_signup").val();
          
          $(function(){
            $.ajax({
            url: 'Registracija.php',
            method: "post",
            data:{ime_php:ime, prezime_php:prezime, email_php:email, sifra_php:sifra, ime_psa_php:ime_psa, rasa_psa_php:rasa_psa},
            dataType: "text",
            success: function(data)
            {
                //Success
                //console.log(data);
                if(data == "Potvrda!")
                {
                  $("#ime_input_signup").val("");
                  $("#prez_input_signup").val("");
                  $("#email_input_signup").val("");
                  $("#pass_input_signup").val("");
                  $("#ime_psa_input_signup").val("");
                  $("#rasa_psa_input_signup").val("");
                    $("#sign_up_error").css("display", "none");
                    $("#sign_up_error").text("");
                  window.location.replace("index.php");
                }
                else if(data == "GRESKA - Email postoji!")
                {
                    email_check=false;
                 $("#email_input_signup").css("border-color", "#e36868");
                    email_identity.push(email);
                    checkButton();
                    $("#sign_up_error").text("GREŠKA - Email postoji!");
                    $("#sign_up_error").css("display", "block");
                }
                else
                {
                    console.log(data);
                }
            }

		    });
	      });  
      }
  });
    
    
    
    
    
    
    
     $("#email_input_login").bind("keyup keydown keypress", function(){
      var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var email = $("#email_input_login").val();
      if(email.length > 0 && format.test(email))
      {    
          $("#email_input_login").css("border-color", "#bde66c");
          email_login_check=true;
          
      }
      else
      {
           $("#email_input_login").css("border-color", "#e36868");   
          email_login_check=false;  
      }
         
     $("#sign_up_error").text("");
     $("#sign_up_error").css("display", "none");
     
         checkButton_LogIn();
  });
    
    
    $("#pass_input_login").bind("keyup keydown keypress", function(){
      var format = /[`!@#$%^&*()+\=\[\]{};':"\\|<>\/?~]/;
      var sifra = $("#pass_input_login").val();
      if(sifra.length < 20 && sifra.length >= 8 && !format.test(sifra))
      {    
          $("#pass_input_login").css("border-color", "#bde66c");
          password_login_check=true;
      }
      else
      {
           $("#pass_input_login").css("border-color", "#e36868");   
          password_login_check=false;  
      }
        
    $("#sign_up_error").text("");
    $("#sign_up_error").css("display", "none");
        
      checkButton_LogIn();
  });
    
    
    
    

    $("#prijava_login_bt").click(function(){
      if(email_login_check && password_login_check)
      {
          var email = $("#email_input_login").val();
          var sifra = $("#pass_input_login").val();
          
          $(function(){
            $.ajax({
            url: 'Registracija.php',
            method: "post",
            data:{email_login_php:email, sifra_login_php:sifra},
            dataType: "text",
            success: function(data)
            {
                //Success
                console.log(data);
                if(data == "Potvrda!")
                {
                  $("#email_input_login").val("");
                  $("#pass_input_login").val(""); 
                    
                    $("#sign_up_error").text("");
                    $("#sign_up_error").css("display", "none");
                    
                  window.location.replace("index.php");
                }
                else if(data == "GRESKA - Ovakvi podaci ne postoje!")
                {
                    $("#email_input_login").val("");
                    $("#pass_input_login").val("");
                    
                    $("#email_input_login").css("border-color", "#e36868");   
                    email_login_check=false; 
                    $("#pass_input_login").css("border-color", "#e36868");   
                    password_login_check=false; 
                    checkButton_LogIn();
                    
                    $("#sign_up_error").text("GREŠKA - Ovakvi podaci ne postoje!");
                    $("#sign_up_error").css("display", "block");
                }
                else
                {
                    console.log(data);
                }
            }

		    });
	      });  
      }
  });
    
    
    
    
    
  function checkButton(){
        if(ime_check && prez_check && email_check && sifra_check && ime_psa_check && rasa_psa_check)
        {   
          $("#registracija_login_bt").css("color", "#bde66c"); 
         
          $("#registracija_login_bt").css("border-color", "#bde66c");
            $("#registracija_login_bt").prop('disabled', false);
        }
        else
        {
           $("#registracija_login_bt").css("color", "#e36868");
           
           $("#registracija_login_bt").css("border-color", "#e36868"); $("#registracija_login_bt").prop('disabled', true);
        }
    }
    
    
    
    function checkButton_LogIn(){
        if(email_login_check && password_login_check)
        {   
          $("#prijava_login_bt").css("color", "#bde66c"); 
         
          $("#prijava_login_bt").css("border-color", "#bde66c");
            $("#prijava_login_bt").prop('disabled', false);
        }
        else
        {
           $("#prijava_login_bt").css("color", "#e36868");
           
           $("#prijava_login_bt").css("border-color", "#e36868"); $("#prijava_login_bt").prop('disabled', true);
        }
    }
});