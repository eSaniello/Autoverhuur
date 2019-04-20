<?php
    include "database/dbh.php";

    if(isset($_POST["registreer_auto"])){
        $merk = mysqli_real_escape_string($connection, $_POST["merk"]);
        $kenteken_nr = mysqli_real_escape_string($connection, $_POST["kenteken_nummer"]);
        $chassis_nr = mysqli_real_escape_string($connection, $_POST["chassis_nummer"]);
        $bouwjaar = mysqli_real_escape_string($connection, $_POST["bouwjaar"]);
        $km_stand = mysqli_real_escape_string($connection, $_POST["km_stand"]);
        $tarief_per_km = mysqli_real_escape_string($connection, $_POST["tarief_per_km"]);
        $categorie = mysqli_real_escape_string($connection, $_POST["categorie"]);

        $sql = "INSERT INTO auto(
            merk,
            kenteken_nummer,
            chassis_nummer,
            bouwjaar,
            km_stand,
            tarief_per_km,
            categorie
        )
        VALUES(
            '$merk',
            '$kenteken_nr',
            '$chassis_nr',
            '$bouwjaar',
            '$km_stand',
            '$tarief_per_km',
            '$categorie'
        )";

        $query = mysqli_query($connection, $sql);
        header("Location: ../index.php?auto_registratie_compleet");
    }
    else{
        echo "Error";
    }
?>