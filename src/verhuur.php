<?php
    include "database/dbh.php";

    $klant_id = mysqli_real_escape_string($connection, $_POST["klant_id"]);
    $auto_id = mysqli_real_escape_string($connection, $_POST["auto_id"]);

    $autoQuery = mysqli_query($connection, "SELECT * FROM auto WHERE auto_id='$auto_id'");
    $klantQuery = mysqli_query($connection, "SELECT * FROM klant WHERE klant_id='$klant_id'");
    
    $row_auto = mysqli_fetch_array($autoQuery);
    
    $oud_km_stand = $row_auto['km_stand'];
    $categorie = $row_auto['categorie'];
    
    $tariefQuery = mysqli_query($connection, "SELECT * FROM tarief WHERE categorie='$categorie'");
    $row_tarief = mysqli_fetch_array($tariefQuery);

    $tarief = $row_tarief['tarief'];
    $borg = $row_tarief['borg'];
    $uitgeef_datum = date("Y-m-d H:i:s");

    $sql = "INSERT INTO verhuur(
        klant_id,
        auto_id,
        oud_km_stand,
        tarief,
        borg,
        categorie,
        uitgeef_datum
    )
    VALUES(
        '$klant_id',
        '$auto_id',
        '$oud_km_stand',
        '$tarief',
        '$borg',
        '$categorie',
        '$uitgeef_datum'
    )";

    $query = mysqli_query($connection, $sql);

    $updateAutoStatus = mysqli_query($connection, "UPDATE auto SET uitgeleend=true WHERE auto_id='$auto_id'");

    header("Location: ../index.php?verhuur_compleet");
?>