<!DOCTYPE html>
<html>
<head>
    <?php
    if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
    }
    else if(session_id() == ''){
        //session has not started
        session_start();
    }
    
    if(isset($_SESSION["korisnik_id"]) || isset($_SESSION["korisnik_ime"]) || isset($_SESSION["korisnik_prezime"]) || isset($_SESSION["korisnik_email"]) || isset($_SESSION["korisnik_password"]) || isset($_SESSION["pas_ime"]) || isset($_SESSION["pas_rasa"]) || isset($_SESSION["pas_ocena"]) || isset($_SESSION["pas_korisnik_id"]) || isset($_SESSION["korisnik_vrsta"]) || isset($_SESSION["pas_id"]))
        header("Location: index.php");
    
    
    if(isset($_SESSION["korisnik_vrsta"]) && $_SESSION["korisnik_vrsta"] == "KORISNIK")
            echo "<style>
            #meni_3{display: block;}
            #meni_5{display: none;}
            #meni_6{display: none;}
            </style>";
        else if(isset($_SESSION["korisnik_vrsta"]) && ($_SESSION["korisnik_vrsta"] == "ADMINISTRATOR" || $_SESSION["korisnik_vrsta"] == "KOORDINATOR"))
        {
            echo "<style>
            #meni_3{display: block;}
            #meni_5{display: block;}
            #meni_6{display: none;}
            </style>";
        }
        else if(isset($_SESSION["korisnik_vrsta"]) && $_SESSION["korisnik_vrsta"] == "SUDIJA")
        {
            echo "<style>
            #meni_3{display: block;}
            #meni_5{display: none;}
            #meni_6{display: block;}
            </style>";
        }
        else
            echo "<style>
            #meni_3{display: none;}
            #meni_5{display: none;}
            #meni_6{display: none;}
            </style>";
    
    ?>
    <title>Izložba pasa - Registrujte se</title>
    <link rel="shortcut icon" href="Favico_PNG.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Funkcionalnost.js"></script>
    <script src="Verifikacija_JS.js"></script>
    <style>
        #korisnik_vrsta{
            display: none;
        }
        #korisnik_crta{
            display: none;
        }
        #korisnik_register{
            display: none;
        }
        #korisnik_login{
            margin-right: 2vw;
        }
    </style>
</head>
<body>
    <div id="stranica">
        <!--<div id="black_mask"></div>-->
        
        <div id="zaglavlje">
            <img src="Logo_SVG.svg" id="glavni_logo">
            <span id="korisnik_vrsta">Registracija</span>
            <a href="signup.php"><span id="korisnik_register" class="login">Registruj se</span></a>
            <span id="korisnik_crta">/</span>
            <a href="login.php"><span id="korisnik_login" class="login">Ulogujte se</span></a>
        </div>
        
        <div id="hr_1"></div>
        
        <div id="meni_glavni">
            <a href="kontakt.php"><span id="meni_4" class="meni">Kontakt</span></a>
            <a href="profil.php"><span id="meni_3" class="meni">Profil</span></a>
            <a href="pregled.php"><span id="meni_5" class="meni">Pregled</span></a>
            <a href="ocenjivanje.php"><span id="meni_6" class="meni">Ocenjivanje</span></a>
            <a href="izlozba.php"><span id="meni_2" class="meni">Izložba</span></a>
            <a href="index.php"><span id="meni_1" class="meni">Početna</span></a>
        </div>
        
        <div id="hr_2"></div>
        
        <div id="forma_1">
            <span class="forma_1_text">Registracija</span><br>
            <input type="text" id="ime_input_signup" placeholder="Ime" class="inputs_signup"><br>
            <input type="text" id="prez_input_signup" placeholder="Prezime" class="inputs_signup"><br>
            <input type="text" id="email_input_signup" placeholder="E-mail" class="inputs_signup"><br>
            <input type="password" id="pass_input_signup" placeholder="Sifra" class="inputs_signup"><br>
            <input type="text" id="ime_psa_input_signup" placeholder="Ime psa" class="inputs_signup"><br>
            <input type="text" id="rasa_psa_input_signup" placeholder="Rasa psa" class="inputs_signup"><br>
            <span class="forma_1_text" id="sign_up_error"></span><br><br>
            <button id="registracija_login_bt">Registrujte se</button>
        </div>
        
        <div id="futer">
            <span>&copy 2020 PopovicDesign. All rights reserved</span>
        </div>
    </div>
</body>
</html>