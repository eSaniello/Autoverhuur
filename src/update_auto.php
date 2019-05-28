<?php

include "database/dbh.php";

if(isset($_GET["id"])){
    $auto_id = $_GET['id'];
    
    $autoQuery = mysqli_query($connection,"SELECT * FROM auto WHERE auto_id='$auto_id'"); 

    $row = mysqli_fetch_array($autoQuery);

    $km_stand = $row['km_stand'];
    $uitgeleend = $row['uitgeleend'];
}
elseif(isset($_POST["update_auto"])){
    $auto_id1 = $_GET['id'];
    $km_stand1 = mysqli_real_escape_string($connection, $_POST["km_stand"]);
    $uitgeleend1 = mysqli_real_escape_string($connection, $_POST["uitgeleend"]);

    mysqli_query($connection, "UPDATE auto SET km_stand='$km_stand1', uitgeleend='$uitgeleend1' WHERE auto_id='$auto_id1'");
    header("Location: ../index.php?bewerking_compleet");
    
}
else{
    echo "OOPS SOMETHING WENT WRONG :(";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Auto</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../lib/materialize/css/materialize.min.css" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Materialize stepper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.0.1/dist/css/mstepper.min.css">
</head>
<body class="red lighten-5">
    <div class="container">
        <div class="row">

            <blockquote>
                <p class="flow-text">Voertuig Bijwerken</p>
            </blockquote>

            <form class="col s12" action="update_auto.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">bookmark_border</i>
                        <input id="km_stand" type="number" class="validate" name="km_stand" value="<?php echo $km_stand; ?>" required>
                        <label for="km_stand">KM Stand</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">directions_car</i>
                        <select id="uitgeleend" name="uitgeleend">
                            <option value="1">Ja</option>
                            <option value="0">Nee</option>
                        </select>
                        <label for="uitgeleend">Uitgeleend</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect col s6 white black-text" type="button" onclick="window.history.back()">Terug
                        <i class="material-icons right">keyboard_backspace</i>
                    </button>

                    <button class="btn waves-effect col s6 blue" type="submit" name="update_auto">Bijwerken
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

        </div>
    </div>
    
    <script type="text/javascript" src="../lib/materialize/js/materialize.min.js"></script>
    <!--Materialize stepper JS -->
    <script src="https://unpkg.com/materialize-stepper@latest/dist/js/mstepper.min.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>

    <script>
        M.AutoInit();
    </script>
</body>
</html>