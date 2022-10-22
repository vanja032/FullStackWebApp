<!DOCTYPE html>
<html>
<head>
    <title>Izložba pasa - Kontakt</title>
    <link rel="shortcut icon" href="Favico_PNG.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Funkcionalnost.js"></script>
    <script src="OdjavaJS.js"></script>
    <style>
        #meni_4{
            font-weight: bold;
            border-bottom: 0.4vw dotted white;
            color: white;
            padding-bottom: 0.2vw;
        }
    </style>
</head>
<body>
    
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
            echo "<style>
            #korisnik_register{display: none;}
            #korisnik_crta{display: none;}
            #korisnik_login{display: none;}
            #korisnik_logout{display: block;}
            </style>";
        else
            echo "<style>
            #korisnik_register{display: block;}
            #korisnik_crta{display: block;}
            #korisnik_login{display: block;}
            #korisnik_logout{display: none;}
            </style>";
    
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
    
    <div id="stranica_1">
        <!--<div id="black_mask"></div>-->
        
        <div id="cover_img_1">
        <div id="zaglavlje_1">
            <img src="Logo_SVG.svg" id="glavni_logo">
            <span id="korisnik_vrsta"><?php
            if(session_status() == PHP_SESSION_NONE){
                //session has not started
                session_start();
            }
            else if(session_id() == ''){
                //session has not started
                session_start();
            }
            
            if(isset($_SESSION["korisnik_vrsta"]) && isset($_SESSION["korisnik_ime"]) && isset($_SESSION["korisnik_prezime"]))
                echo $_SESSION["korisnik_ime"]." ".$_SESSION["korisnik_prezime"]." - ".$_SESSION["korisnik_vrsta"];
            else
                echo "Niste ulogovani";
            ?></span>
            <a href="signup.php"><span id="korisnik_register" class="login">Registruj se</span></a>
            <span id="korisnik_crta">/</span>
            <a href="login.php"><span id="korisnik_login" class="login">Ulogujte se</span></a>
            <span id="korisnik_logout" class="login">Odjavite se</span>
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
            
        <div id="hr_2_2"></div>
        </div>
        
        <div id="izlozba_text" style="text-align: center;">
        <span><br><b>Lokacija</b><br>Kinološki savez Republike Srbije<br>
        Bukovička 1, 11000 Beograd<br>
            <br><b>Email</b><br>
        kinoloskisrbije@gmail.com<br>
            <br><b>Telefoni</b><br>
            +381 11 39 33 777 - Prijave legla, izrada rodovnika, odgajivačnice<br>
            +381 11 39 33 555 - Eksportni rodovnici, šampionske povelje<br>
            +381 11 39 33 888 - Odnosi sa inostranstvom i kinološkim društvima<br>
            <br><b>Fax</b><br>
            +381 11 30 99 373</span><br>
        </div>
        <div id="futer_1">
            <span>&copy 2020 PopovicDesign. All rights reserved</span>
        </div>
    </div>
</body>
</html>