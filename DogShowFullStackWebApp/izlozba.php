<!DOCTYPE html>
<html>
<head>
    <title>Izložba pasa - O izložbi</title>
    <link rel="shortcut icon" href="Favico_PNG.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Funkcionalnost.js"></script>
    <script src="OdjavaJS.js"></script>
    <style>
        #meni_2{
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
        
        <div id="izlozba_text">
        <span>Kinološki savez Republike Srbije osnovan je 1925. godine sa ciljem da promoviše kinologiju, edukuje odgajivače, promoviše savestan uzgoj i vodi brigu o održavanju autohtonih srpskih pasmina. KSS jetakođe stalni član Međunarodne kinološke federacije, FCI-a. U ostvarivanju svojih zadataka, KSS sarađuje sa Lovačkim savezom Srbije, Ministarstvom unutrašnjih poslova, Vojskom Republike Srbije, Veterinarskim fakultetom i drugim organizacijama od značaja za razvoj kinologije u Srbiji. Najviši organ upravljanja je Skupština koju sačinjavaju delegati članica Kinološkog saveza Republike Srbije.</span><br><br>
            <span>Nacionalni Kinološki Savez, usklađivajući se sa važećim propisima i u skladu sa ustavnim promenama i promenom u nazivu države, menja ime organizacijeu Kinološki savez Republike Srbije. <br>Sedište saveza se nalazi u Beogradu.</span><br><br>
            <span>Danas je Kinološki savez Republike Srbije jedna moderna, evropska kinološka organizacija,  koja nikada do sada nije imala agilnije i aktivnije ljude u saveznim i lokalnim kinološkim organizacijama. Kinološki savez Republike Srbije se sastoji od 205 kinoloških društava sa teritorije Republike Srbije.</span><br><br>
            <span>KSS posebnu pažnju posvećuje autohtonim rasama pasa: Srpski gonič, Srpski trobojni gonič, iŠarplaninac, gde se kroz niz beneficija, edukacijom odgajivača i sudija, i drugim vidovima pomoći nastoji da se poboljša i unapredi uzgoj i njihova prezentacija.</span><br><br>
            <span>Pored ovog tehničkog dela posla koji se u njemu obavlja, KSS je i mesto gde se kinolozi okupljaju, druže,razmenjuju informacije koje dolaze iz Međunarodne kinoloske federacije FCI.</span><br>
        </div>
        <div id="futer_1">
            <span>&copy 2020 PopovicDesign. All rights reserved</span>
        </div>
    </div>
</body>
</html>