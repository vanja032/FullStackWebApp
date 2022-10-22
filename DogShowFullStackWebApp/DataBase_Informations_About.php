<?php
$server_name="localhost";
$databse_name="izlozba_pasa_baza";
$database_username="root";
$database_password="";


$table_korisnici="korisnici_baza";
$table_psi="psi_baza";




$korisnik_id="id";
$korisnik_ime="ime";
$korisnik_prezime="prezime";
$korisnik_email="email";
$korisnik_password="sifra";
/*
$korisnik_ime_psa="";
$korisnik_rasa_psa="";
*/
$korisnik_vrsta="vrsta_korisnika";




$pas_id="id";
$pas_ime="ime_psa";
$pas_rasa="rasa_psa";
$pas_ocena="ocena_psa";
$pas_korisnik_id="korisnik_id";





function Validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>