<?php
require "DataBase_Informations_About.php";
//header('Content-type:application/json;charset=utf-8');

if(isset($_POST["ime_php"]) && isset($_POST["prezime_php"]) && isset($_POST["email_php"]) && isset($_POST["sifra_php"]) && isset($_POST["ime_psa_php"]) && isset($_POST["rasa_psa_php"]))
{
    $ime = Validate_input($_POST["ime_php"]);
    $prezime = Validate_input($_POST["prezime_php"]);
    $email = Validate_input($_POST["email_php"]);
    $pass = Validate_input($_POST["sifra_php"]);
    $ime_psa = Validate_input($_POST["ime_psa_php"]);
    $rasa_psa = Validate_input($_POST["rasa_psa_php"]);
    
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspesna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    $ime = $conn->real_escape_string($_POST["ime_php"]);
    $prezime = $conn->real_escape_string($_POST["prezime_php"]);
    $email = $conn->real_escape_string($_POST["email_php"]);
    $pass = $conn->real_escape_string($_POST["sifra_php"]);
    $ime_psa = $conn->real_escape_string($_POST["ime_psa_php"]);
    $rasa_psa = $conn->real_escape_string($_POST["rasa_psa_php"]);
    
    $sql_r = "SELECT {$korisnik_email} FROM {$table_korisnici} WHERE {$korisnik_email} = '{$email}'";
    
    $result = $conn->query($sql_r);

    if ($result->num_rows > 0) {
      // output data of each row
      echo "GRESKA - Email postoji!";
    } else {
    
    $sql = "INSERT INTO {$table_korisnici} ({$korisnik_ime}, {$korisnik_prezime}, {$korisnik_email}, {$korisnik_password}, {$korisnik_vrsta})
    VALUES ('{$ime}', '{$prezime}', '{$email}', '{$pass}', 'KORISNIK')";
    
    if ($conn->query($sql) === TRUE) {
        
        $last_id = mysqli_insert_id($conn);
        
        $sql_1 = "INSERT INTO {$table_psi} ({$pas_ime}, {$pas_rasa}, {$pas_ocena}, {$pas_korisnik_id})
        VALUES ('{$ime_psa}', '{$rasa_psa}', 'NEMA', '{$last_id}')";

        if ($conn->query($sql_1) === TRUE) {
            
            $last_id_pas = mysqli_insert_id($conn);
            
            if(session_status() == PHP_SESSION_NONE){
                //session has not started
                session_start();
            }
            else if(session_id() == ''){
                //session has not started
                session_start();
            }
            
            if(!isset($_SESSION["korisnik_id"]))
                $_SESSION["korisnik_id"] = strval($last_id);
            if(!isset($_SESSION["korisnik_ime"]))
                $_SESSION["korisnik_ime"] = strval($ime);
            if(!isset($_SESSION["korisnik_prezime"]))
                $_SESSION["korisnik_prezime"] = strval($prezime);
            if(!isset($_SESSION["korisnik_email"]))
                $_SESSION["korisnik_email"] = strval($email);
            if(!isset($_SESSION["korisnik_password"]))
                $_SESSION["korisnik_password"] = strval($pass);
            if(!isset($_SESSION["pas_ime"]))
                $_SESSION["pas_ime"] = strval($ime_psa);
            if(!isset($_SESSION["pas_rasa"]))
                $_SESSION["pas_rasa"] = strval($rasa_psa);
            if(!isset($_SESSION["pas_ocena"]))
                $_SESSION["pas_ocena"] = strval("NEMA");
            if(!isset($_SESSION["pas_korisnik_id"]))
                $_SESSION["pas_korisnik_id"] = strval($last_id);
            if(!isset($_SESSION["korisnik_vrsta"]))
                $_SESSION["korisnik_vrsta"] = strval("KORISNIK");
            if(!isset($_SESSION["pas_id"]))
                $_SESSION["pas_id"] = strval($last_id_pas);
            
          echo "Potvrda!";
        } else {
          echo "Greska: " . $sql_1 . "<br>" . $conn->error;
        }

        
    } else {
      echo "Greska: " . $sql . "<br>" . $conn->error;
    }
          
    }
    
    
    $conn->close();
}


if(isset($_POST["odjava_php"]) && $_POST["odjava_php"] == "true")
{
    if(session_status() == PHP_SESSION_NONE){
                //session has not started
                session_start();
            }
            else if(session_id() == ''){
                //session has not started
                session_start();
            }
    
    unset($_SESSION["korisnik_id"]);
    unset($_SESSION["pas_id"]);
    unset($_SESSION["korisnik_ime"]);
    unset($_SESSION["korisnik_prezime"]); unset($_SESSION["korisnik_email"]); unset($_SESSION["korisnik_password"]); unset($_SESSION["pas_ime"]); unset($_SESSION["pas_rasa"]); unset($_SESSION["pas_ocena"]); unset($_SESSION["pas_korisnik_id"]); unset($_SESSION["korisnik_vrsta"]);
    
    session_unset();
    session_destroy();
    
    echo "Odjava...";
}









if(isset($_POST["email_login_php"]) && isset($_POST["sifra_login_php"]))
{
    $email = Validate_input($_POST["email_login_php"]);
    $pass = Validate_input($_POST["sifra_login_php"]);
    
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspesna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    $email = $conn->real_escape_string($_POST["email_login_php"]);
    $pass = $conn->real_escape_string($_POST["sifra_login_php"]);
    
    
    $sql = "SELECT {$table_korisnici}.{$korisnik_id} AS KID, 
    {$table_korisnici}.{$korisnik_ime} AS KIme, 
    {$table_korisnici}.{$korisnik_prezime} AS KPrez,
    {$table_korisnici}.{$korisnik_email} AS KEmail,
    {$table_korisnici}.{$korisnik_password} AS KPass,
    {$table_korisnici}.{$korisnik_vrsta} AS KVr,
    {$table_psi}.{$pas_id} AS PID,
    {$table_psi}.{$pas_ime} AS PIme,
    {$table_psi}.{$pas_rasa} AS PRasa,
    {$table_psi}.{$pas_ocena} AS POcena,
    {$table_psi}.{$pas_korisnik_id} AS PKID
    FROM {$table_korisnici},{$table_psi}
    WHERE {$table_korisnici}.{$korisnik_email} = '{$email}' AND {$table_korisnici}.{$korisnik_password} = '{$pass}'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          
            if(session_status() == PHP_SESSION_NONE){
                //session has not started
                session_start();
            }
            else if(session_id() == ''){
                //session has not started
                session_start();
            }
            
            if(!isset($_SESSION["korisnik_id"]))
                $_SESSION["korisnik_id"] = strval($row["KID"]);
            if(!isset($_SESSION["korisnik_ime"]))
                $_SESSION["korisnik_ime"] = strval($row["KIme"]);
            if(!isset($_SESSION["korisnik_prezime"]))
                $_SESSION["korisnik_prezime"] = strval($row["KPrez"]);
            if(!isset($_SESSION["korisnik_email"]))
                $_SESSION["korisnik_email"] = strval($row["KEmail"]);
            if(!isset($_SESSION["korisnik_password"]))
                $_SESSION["korisnik_password"] = strval($row["KPass"]);
            if(!isset($_SESSION["pas_id"]))
                $_SESSION["pas_id"] = strval($row["PID"]);
            if(!isset($_SESSION["pas_ime"]))
                $_SESSION["pas_ime"] = strval($row["PIme"]);
            if(!isset($_SESSION["pas_rasa"]))
                $_SESSION["pas_rasa"] = strval($row["PRasa"]);
            if(!isset($_SESSION["pas_ocena"]))
                $_SESSION["pas_ocena"] = strval($row["POcena"]);
            if(!isset($_SESSION["pas_korisnik_id"]))
                $_SESSION["pas_korisnik_id"] = strval($row["PKID"]);
            if(!isset($_SESSION["korisnik_vrsta"]))
                $_SESSION["korisnik_vrsta"] = strval($row["KVr"]);
          
      }
        echo "Potvrda!";
        
    } else {
      echo "GRESKA - Ovakvi podaci ne postoje!";
    }
    
    $conn->close();
    
}





?>