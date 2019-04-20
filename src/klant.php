<?php
    include "database/dbh.php";

    if(isset($_POST["registreer_klant"])){
        $naam = mysqli_real_escape_string($connection, $_POST["naam"]);
        $adres = mysqli_real_escape_string($connection, $_POST["adres"]);
        $mobiel = mysqli_real_escape_string($connection, $_POST["mobiel"]);

        $sql = "INSERT INTO klant(
            naam,
            adres,
            mobiel
        )
        VALUES(
            '$naam',
            '$adres',
            '$mobiel'
        )";

        $query = mysqli_query($connection, $sql);
        header("Location: ../index.php?klant_registratie_compleet");
    }
    else{
        echo "Error";
    }
?>