<?php
require "DataBase_Informations_About.php";
//header('Content-type:application/json;charset=utf-8');

if(isset($_POST["administrator_read_php"]))
{
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspešna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    
    //header('Content-type:application/json;charset=utf-8');
    $sql = "SELECT DISTINCT {$table_korisnici}.{$korisnik_id} AS KID, 
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
    WHERE {$table_psi}.{$pas_korisnik_id} = {$table_korisnici}.{$korisnik_id} GROUP BY {$table_korisnici}.{$korisnik_id}";
    
    $result = $conn->query($sql);

    $podaci = "";
    
    if ($result->num_rows > 0) {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "Potvrda!";
      // output data of each row
        $ind=0;
      while($row = $result->fetch_assoc()) {
          
            if($ind == 0)
            {$podaci=$podaci."<span class='extra_space_pregled' alt='".$row["KID"]."'>&nbsp;&nbsp;</span><img src='Icon_Clear_Text_Field_PNG.png' class='clear_field_pregled' alt='".$row["KID"]."' onclick='Remove_Data_Administrator_Pregled(".$row["KID"].");'><span class='extra_space_pregled' alt='".$row["KID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pregled_spans' alt='".$row["KID"]."'><b>Ime:&nbsp;&nbsp;</b>".$row["KIme"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row["KPrez"]." <br><b>E-mail:&nbsp;&nbsp;</b>".$row["KEmail"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row["KVr"]." <br><br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;".$row["POcena"]." </span>";
            }
          else
          {
              $podaci=$podaci."<span class='extra_space_pregled' alt='".$row["KID"]."'> <br><br><hr><br>&nbsp;&nbsp;</span><img src='Icon_Clear_Text_Field_PNG.png' class='clear_field_pregled' alt='".$row["KID"]."' onclick='Remove_Data_Administrator_Pregled(".$row["KID"].");'><span class='extra_space_pregled' alt='".$row["KID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pregled_spans' alt='".$row["KID"]."'><b>Ime:&nbsp;&nbsp;</b>".$row["KIme"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row["KPrez"]." <br><b>E-mail:&nbsp;&nbsp;</b>".$row["KEmail"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row["KVr"]." <br><br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;".$row["POcena"]."</span>";
          }
          $ind++;
          
      }
    }
        
        
        
        
        
        $sql1 = "SELECT DISTINCT {$table_korisnici}.{$korisnik_id} AS KID2, 
    {$table_korisnici}.{$korisnik_ime} AS KIme2, 
    {$table_korisnici}.{$korisnik_prezime} AS KPrez2,
    {$table_korisnici}.{$korisnik_email} AS KEmail2,
    {$table_korisnici}.{$korisnik_password} AS KPass2,
    {$table_korisnici}.{$korisnik_vrsta} AS KVr2
    FROM {$table_korisnici},{$table_psi}
    WHERE {$table_korisnici}.{$korisnik_id} NOT IN(SELECT DISTINCT {$table_psi}.{$pas_korisnik_id} AS PKID_03
    FROM {$table_psi}) GROUP BY {$table_korisnici}.{$korisnik_id}";
    
    $result2 = $conn->query($sql1);

    
    if ($result2->num_rows > 0) {
        //header('Content-type:application/json;charset=utf-8');
        //$podaci = "Potvrda!";
      // output data of each row
        //$ind=0;
      while($row1 = $result2->fetch_assoc()) {
          
            /*if($ind == 0)
            {$podaci=$podaci."<span class='extra_space_pregled' alt='".$row["KID"]."'>&nbsp;&nbsp;</span><img src='Icon_Clear_Text_Field_PNG.png' class='clear_field_pregled' alt='".$row["KID"]."' onclick='Remove_Data_Administrator_Pregled(".$row["KID"].");'><span class='extra_space_pregled' alt='".$row["KID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pregled_spans' alt='".$row["KID"]."'><b>Ime:&nbsp;&nbsp;</b>".$row["KIme"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row["KPrez"]." <br><b>E-mail:&nbsp;&nbsp;</b>".$row["KEmail"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row["KVr"]." <br><br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;".$row["POcena"]." </span>";
            }
          else
          {*/
              $podaci=$podaci."<span class='extra_space_pregled' alt='".$row1["KID2"]."'> <br><br><hr><br>&nbsp;&nbsp;</span><img src='Icon_Clear_Text_Field_PNG.png' class='clear_field_pregled' alt='".$row1["KID2"]."' onclick='Remove_Data_Administrator_Pregled(".$row1["KID2"].");'><span class='extra_space_pregled' alt='".$row1["KID2"]."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pregled_spans' alt='".$row1["KID2"]."'><b>Ime:&nbsp;&nbsp;</b>".$row1["KIme2"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row1["KPrez2"]." <br><b>E-mail:&nbsp;&nbsp;</b>".$row1["KEmail2"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row1["KVr2"]." <br><br><b>Nije prijavljen na izložbu<br>Nema psa</b></span>";
          /*}
          $ind++;*/
          
      }
        
        
        
        //header('Content-type:application/json;charset=utf-8');
        echo $podaci;
        
    } else {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "GRESKA - Podaci ne postoje!";
      echo $podaci;
    }
    
    $conn->close();

}





if(isset($_POST["administrator_remove_php"]) && isset($_POST["remove_indeks_php"]))
{
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspešna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    $_POST["remove_indeks_php"] = $conn->real_escape_string(Validate_input($_POST["remove_indeks_php"]));
    
    // sql to delete a record
    //header('Content-type:application/json;charset=utf-8');
    $sql = "DELETE FROM {$table_korisnici} WHERE {$korisnik_id} = '{$_POST["remove_indeks_php"]}'";

    if ($conn->query($sql) === TRUE) {
      
        // sql to delete a record
        $sql = "DELETE FROM {$table_psi} WHERE {$pas_korisnik_id} = '{$_POST["remove_indeks_php"]}'";
        //header('Content-type:application/json;charset=utf-8');
        if ($conn->query($sql) === TRUE) {
          echo "Potvrda!";
        } else {
          echo "Greška prilikom brisanja podataka: " . $conn->error;
        }
        
    } else {
        //header('Content-type:application/json;charset=utf-8');
      echo "Greška prilikom brisanja podataka: " . $conn->error;
    }
    
    $conn->close();

}










if(isset($_POST["koordinator_read_php"]))
{
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspešna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    
    //header('Content-type:application/json;charset=utf-8');
    $sql = "SELECT DISTINCT {$table_korisnici}.{$korisnik_id} AS KID, 
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
    WHERE {$table_psi}.{$pas_korisnik_id} = {$table_korisnici}.{$korisnik_id}";
    
    $result = $conn->query($sql);

    $podaci = "";
    
    if ($result->num_rows > 0) {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "Potvrda!";
      // output data of each row
        $ind=0;
      while($row = $result->fetch_assoc()) {
          
            if($ind == 0)
            {$podaci=$podaci."<span class='pregled_spans' alt='".$row["KID"]."'><b>Ime:&nbsp;&nbsp;</b>".$row["KIme"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row["KPrez"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row["KVr"]." <br><br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;".$row["POcena"]." </span>";
            }
          else
          {
              $podaci=$podaci."<br><br><hr><br><span class='pregled_spans' alt='".$row["KID"]."'><b>Ime:&nbsp;&nbsp;</b>".$row["KIme"]." <br><b>Prezime:</b>&nbsp;&nbsp;".$row["KPrez"]." <br><b>Vrsta korisnika:&nbsp;&nbsp;</b>".$row["KVr"]." <br><br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;".$row["POcena"]."</span>";
          }
          $ind++;
          
      }
        //header('Content-type:application/json;charset=utf-8');
        echo $podaci;
        
    } else {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "GRESKA - Podaci ne postoje!";
      echo $podaci;
    }
    
    $conn->close();

}










if(isset($_POST["ocenjivanje_read_php"]))
{
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspešna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    
    //header('Content-type:application/json;charset=utf-8');
    $sql = "SELECT DISTINCT {$table_psi}.{$pas_id} AS PID,
    {$table_psi}.{$pas_ime} AS PIme,
    {$table_psi}.{$pas_rasa} AS PRasa,
    {$table_psi}.{$pas_ocena} AS POcena,
    {$table_psi}.{$pas_korisnik_id} AS PKID
    FROM {$table_psi}";
    
    $result = $conn->query($sql);

    $podaci = "";
    
    if ($result->num_rows > 0) {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "Potvrda!";
      // output data of each row
        $ind=0;
      while($row = $result->fetch_assoc()) {
          
            if($ind == 0)
            {$podaci=$podaci."<span class='pregled_spans' alt='".$row["PID"]."'><b>Šifra psa:</b>&nbsp;&nbsp;".$row["PID"]." - #".$row["PKID"]." <br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;<span alt='ocena_promena_".$row["PID"]."' class='ocena_promena_class'>".$row["POcena"]."</span> <br><br>
            <input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_1_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(1,".$row["PID"].");'>&nbsp;1&nbsp;&nbsp;
            <input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_2_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(2,".$row["PID"].");'>&nbsp;2&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_3_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(3,".$row["PID"].");'>&nbsp;3&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_4_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(4,".$row["PID"].");'>&nbsp;4&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_5_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(5,".$row["PID"].");'>&nbsp;5&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_6_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(6,".$row["PID"].");'>&nbsp;6&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_7_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(7,".$row["PID"].");'>&nbsp;7&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_8_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(8,".$row["PID"].");'>&nbsp;8&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_9_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(9,".$row["PID"].");'>&nbsp;9&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_10_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(10,".$row["PID"].");'>&nbsp;10&nbsp;&nbsp;</span>";
             
             if($row["POcena"] == '1')
                 $podaci=$podaci."<script>$('#rb_ocena_1_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '2')
                 $podaci=$podaci."<script>$('#rb_ocena_2_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '3')
                 $podaci=$podaci."<script>$('#rb_ocena_3_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '4')
                 $podaci=$podaci."<script>$('#rb_ocena_4_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '5')
                 $podaci=$podaci."<script>$('#rb_ocena_5_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '6')
                 $podaci=$podaci."<script>$('#rb_ocena_6_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '7')
                 $podaci=$podaci."<script>$('#rb_ocena_7_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '8')
                 $podaci=$podaci."<script>$('#rb_ocena_8_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '9')
                 $podaci=$podaci."<script>$('#rb_ocena_9_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '10')
                 $podaci=$podaci."<script>$('#rb_ocena_10_'+".$row["PID"].").prop('checked',true);
                 </script>";
                 
            }
          else
          {
              $podaci=$podaci."<br><br><hr><br><span class='pregled_spans' alt='".$row["PID"]."'><b>Šifra psa:</b>&nbsp;&nbsp;".$row["PID"]." - #".$row["PKID"]." <br><b>Ime psa:</b>&nbsp;&nbsp;".$row["PIme"]." <br><b>Rasa psa:</b>&nbsp;&nbsp;".$row["PRasa"]." <br><b>Ocena:</b>&nbsp;&nbsp;<span alt='ocena_promena_".$row["PID"]."' class='ocena_promena_class'>".$row["POcena"]."</span> <br><br>
            <input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_1_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(1,".$row["PID"].");'>&nbsp;1&nbsp;&nbsp;
            <input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_2_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(2,".$row["PID"].");'>&nbsp;2&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_3_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(3,".$row["PID"].");'>&nbsp;3&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_4_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(4,".$row["PID"].");'>&nbsp;4&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_5_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(5,".$row["PID"].");'>&nbsp;5&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_6_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(6,".$row["PID"].");'>&nbsp;6&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_7_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(7,".$row["PID"].");'>&nbsp;7&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_8_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(8,".$row["PID"].");'>&nbsp;8&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_9_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(9,".$row["PID"].");'>&nbsp;9&nbsp;&nbsp;<input type='radio' class='radio_ocena' name='radio_ocena_".$row["PID"]."' id='rb_ocena_10_".$row["PID"]."' onchange='Change_Data_Ocenjivanje_Pregled(10,".$row["PID"].");'>&nbsp;10&nbsp;&nbsp;</span>";
              
              if($row["POcena"] == '1')
                 $podaci=$podaci."<script>$('#rb_ocena_1_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '2')
                 $podaci=$podaci."<script>$('#rb_ocena_2_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '3')
                 $podaci=$podaci."<script>$('#rb_ocena_3_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '4')
                 $podaci=$podaci."<script>$('#rb_ocena_4_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '5')
                 $podaci=$podaci."<script>$('#rb_ocena_5_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '6')
                 $podaci=$podaci."<script>$('#rb_ocena_6_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '7')
                 $podaci=$podaci."<script>$('#rb_ocena_7_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '8')
                 $podaci=$podaci."<script>$('#rb_ocena_8_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '9')
                 $podaci=$podaci."<script>$('#rb_ocena_9_'+".$row["PID"].").prop('checked',true);
                 </script>";
             else if($row["POcena"] == '10')
                 $podaci=$podaci."<script>$('#rb_ocena_10_'+".$row["PID"].").prop('checked',true);
                 </script>";
              
          }
          $ind++;
          
      }
        //header('Content-type:application/json;charset=utf-8');
        echo $podaci;
        
    } else {
        //header('Content-type:application/json;charset=utf-8');
        $podaci = "GRESKA - Podaci ne postoje!";
      echo $podaci;
    }
    
    $conn->close();

}






if(isset($_POST["ocenjivanje_potvrda_php"]) && isset($_POST["ocenjivanje_vrednost_php"]) && isset($_POST["ocenjivanje_id_php"]))
{
    
    
    // Create connection
    $conn = new mysqli($server_name, $database_username, $database_password, $databse_name);
    // Check connection
    if ($conn->connect_error) {
      die("Neuspešna konekcija: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    $_POST["ocenjivanje_vrednost_php"] = $conn->real_escape_string(Validate_input($_POST["ocenjivanje_vrednost_php"]));
    
    $_POST["ocenjivanje_id_php"] = $conn->real_escape_string(Validate_input($_POST["ocenjivanje_id_php"]));
    
    // sql to delete a record
    //header('Content-type:application/json;charset=utf-8');
    
    $sql = "UPDATE {$table_psi} SET {$pas_ocena}='{$_POST['ocenjivanje_vrednost_php']}' WHERE {$pas_id}='{$_POST["ocenjivanje_id_php"]}'";

    if ($conn->query($sql) === TRUE) {
      
        // sql potvrda
        
        echo "Potvrda!";
        
    } else {
        //header('Content-type:application/json;charset=utf-8');
      echo "Greška prilikom izmene podataka: " . $conn->error;
    }
    
    $conn->close();


}









?>