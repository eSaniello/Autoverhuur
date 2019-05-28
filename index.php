<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="lib/materialize/css/materialize.min.css" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Materialize stepper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.0.1/dist/css/mstepper.min.css">
</head>

<body class="red lighten-5">
    <div class="container">
        <div class="row">
            <nav class="waves-effect">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center"><i class="material-icons">directions_car</i>RS Auto
                        Verhuur</a>
                    <!-- <ul class="right hide-on-med-and-down">
                    <li class="waves-effect"><a href="#"><i class="material-icons">search</i></a></li>
                    <li><a href="#"><i class="material-icons">view_module</i></a></li>
                    <li><a href="#"><i class="material-icons">refresh</i></a></li>
                    <li><a href="#"><i class="material-icons">more_vert</i></a></li>
                </ul> -->
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active waves-effect" href="#dashboard">Dashboard</a></li>
                    <li class="tab col s3"><a class="waves-effect" href="#verhuur">Verhuur</a></li>
                    <li class="tab col s3"><a class="waves-effect" href="#registratie">Registratie</a></li>
                    <li class="tab col s3"><a class="waves-effect" href="#tarieven">Tarieven</a></li>
                </ul>

            </div>
            <div id="dashboard" class="col s12">
            <div class="row"></div>
                <button class="pulse btn waves-effect blue" onclick ="navTabs('verhuur')">Verhuur een auto!</button>

                <blockquote>
                    <p class="flow-text">Uitgeleende voertuigen</p>
                </blockquote>

                <div style="height: 25em; overflow:auto;">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Voertuig</th>
                                <th>Uitgeleend door</th>
                                <th>Uitleen Datum</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
                                include "./src/database/dbh.php";
                                $uitleenTableQuery = mysqli_query($connection,"SELECT auto.merk, klant.naam, verhuur.uitgeef_datum FROM verhuur INNER JOIN auto ON verhuur.auto_id=auto.auto_id INNER JOIN klant ON verhuur.klant_id=klant.klant_id"); 

                                while($row = mysqli_fetch_array($uitleenTableQuery))
                                {
                                    echo "<tr>";
                                    echo "<td>". $row['merk'] ."</td>";
                                    echo "<td>". $row['naam'] ."</td>";
                                    echo "<td>". $row['uitgeef_datum'] ."</td>";
                                    echo "</tr>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>

                <br>

                <blockquote>
                    <p class="flow-text">Geregistreerde voertuigen</p>
                </blockquote>

                <div style="height: 25em; overflow:auto;">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Merk</th>
                                <th>Kenteken nr.</th>
                                <th>Chassis nr.</th>
                                <th>Bouwjaar</th>
                                <th>KM stand</th>
                                <th>Categorie</th>
                                <th>Uitgeleend</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
                                include "./src/database/dbh.php";
                                $autoTableQuery = mysqli_query($connection,"SELECT * FROM auto ORDER BY merk ASC"); 

                                while($row = mysqli_fetch_array($autoTableQuery))
                                {
                                    echo "<tr>";
                                    echo "<td>". $row['merk'] ."</td>";
                                    echo "<td>". $row['kenteken_nummer'] ."</td>";
                                    echo "<td>". $row['chassis_nummer'] ."</td>";
                                    echo "<td>". $row['bouwjaar'] ."</td>";
                                    echo "<td>". $row['km_stand'] ."</td>";
                                    echo "<td>". $row['categorie'] ."</td>";
                                    echo "<td>". $row['uitgeleend'] ."</td>";
                                    echo "<td> <a class='waves-effect' href='./src/update_auto.php?id=". $row['auto_id'] ."'> <i class='small material-icons' style='color: #26a69a;'>edit</i> </a> </td>";
                                    echo "<td> <a class='waves-effect' href='./src/delete_auto.php?id=". $row['auto_id'] ."'> <i class='small material-icons' style='color: #e53935;'>delete</i> </a> </td>";
                                    echo "</tr>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>

                <blockquote>
                    <p class="flow-text">Geregistreerde Klanten</p>
                </blockquote>

                <div style="height: 25em; overflow:auto;">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Klant</th>
                                <th>Adres</th>
                                <th>Mobiel nr.</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
                                include "./src/database/dbh.php";
                                $klantTableQuery = mysqli_query($connection,"SELECT * FROM klant ORDER BY naam ASC"); 

                                while($row = mysqli_fetch_array($klantTableQuery))
                                {
                                    echo "<tr>";
                                    echo "<td>". $row['naam'] ."</td>";
                                    echo "<td>". $row['adres'] ."</td>";
                                    echo "<td>". $row['mobiel'] ."</td>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div id="verhuur" class="col s12">
                <blockquote>
                    <p class="flow-text">Verhuur een nieuwe voertuig</p>
                </blockquote>
                
                <h4 class="red-text darken-1">Attentie!</h4>
                <p class="red-text darken-1 flow-text">
                    Registratie van een nieuwe klant dient eerst te gebeuren voordat u verder gaat met verhuren.
                    Indien het een bestaande klant is kunt u verder gaan.
                </p>
                <button class="btn-small waves-effect" onclick ="navTabs('registratie')">Registreer een nieuwe klant</button>
                
                <ul class="stepper linear" style="min-height:820px">
                    <li class="step active">
                        <div class="step-title waves-effect">Auto</div>
                        <div class="step-content">
                            <!-- Your step content goes here (like inputs or so) -->

                            
                            <!-- Dropdown -->
                            <div class="input-field col s5">
                                <select id="auto_dropdown">
                                    <optgroup label="P1">
                                        <?php 
                                            $autoP1 = mysqli_query($connection,"SELECT * FROM auto WHERE uitgeleend=false AND categorie='P1'"); 

                                            while($row = mysqli_fetch_array($autoP1))
                                            {
                                                echo "<option value=". $row['auto_id'] . ">" . $row['merk'] . "</option>";
                                            }
                                        ?>
                                    </optgroup>
                                    <optgroup label="P2">
                                        <?php 
                                            $autoP2 = mysqli_query($connection,"SELECT * FROM auto WHERE uitgeleend=false AND categorie='P2'"); 

                                            while($row = mysqli_fetch_array($autoP2))
                                            {
                                                echo "<option value=". $row['auto_id'] . ">" . $row['merk'] . "</option>";
                                            }
                                        ?>
                                    </optgroup>
                                    <optgroup label="P3">
                                        <?php 
                                            $autoP3 = mysqli_query($connection,"SELECT * FROM auto WHERE uitgeleend=false AND categorie='P3'"); 

                                            while($row = mysqli_fetch_array($autoP3))
                                            {
                                                echo "<option value=". $row['auto_id'] . ">" . $row['merk'] . "</option>";
                                            }
                                        ?>
                                    </optgroup>
                                    <optgroup label="P4">
                                        <?php 
                                            $autoP4 = mysqli_query($connection,"SELECT * FROM auto WHERE uitgeleend=false AND categorie='P4'"); 

                                            while($row = mysqli_fetch_array($autoP4))
                                            {
                                                echo "<option value=". $row['auto_id'] . ">" . $row['merk'] . "</option>";
                                            }
                                        ?>
                                    </optgroup>
                                </select>
                                <label>Selecteer een auto.</label>
                            </div>

                            <div class="step-actions">
                                <!-- Here goes your actions buttons -->
                                <button class="waves-effect btn next-step blue">Doorgaan</button>
                            </div>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-title waves-effect">Klant</div>
                        <div class="step-content">
                            <!-- Your step content goes here (like inputs or so) -->
                            
                            
                            <!-- Dropdown -->
                            <div class="input-field col s5">
                                <select id="klant_dropdown">
                                    <?php 
                                        $klantDropdown = mysqli_query($connection,"SELECT * FROM klant ORDER BY naam ASC"); 

                                        while($row = mysqli_fetch_array($klantDropdown))
                                        {
                                            echo "<option value=". $row['klant_id'] . ">" . $row['naam'] . "</option>";
                                        }
                                    ?>
                                </select>
                                <label>Selecteer een klant.</label>
                            </div>

                            <div class="step-actions">
                                <!-- Here goes your actions buttons -->
                                <button class="waves-effect btn next-step blue">Doorgaan</button>
                                <button class="waves-effect btn-flat previous-step">Terug</button>
                            </div>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-title waves-effect">Overeenkomst</div>
                        <div class="step-content">
                            <!-- Your step content goes here (like inputs or so) -->
                            
                            <p class="flow-text">Overeenkomst gegenereerd.</p>
                            <a class="btn waves-effect" href="./src/overeenkomst.php" target="_blank">Overeenkomst weergeven.</a>

                            <div class="step-actions">
                                <!-- Here goes your actions buttons -->
                                <button onclick="verhuur()" class="waves-effect btn blue">Verhuur!</button>
                                <button class="waves-effect btn-flat previous-step">Terug</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div id="registratie" class="col s12">
                <blockquote>
                    <p class="flow-text">Registreer een nieuwe klant</p>
                </blockquote>

                <form class="col s12" action="src/klant.php" method="POST">
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="naam" type="text" class="validate" name="naam" required>
                            <label for="naam">Naam</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">place</i>
                            <input id="adres" type="text" class="validate" name="adres" required>
                            <label for="adres">Adres</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">phone_iphone</i>
                            <input id="mobiel" type="number" class="validate" name="mobiel" required>
                            <label for="mobiel">Mobiel/Telefoon</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect col s10" type="submit" name="registreer_klant">Registreer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>

                <div class="row"></div>

                <blockquote>
                    <p class="flow-text">Registreer een nieuwe voertuig</p>
                </blockquote>

                <form class="col s12" action="src/auto.php" method="POST">
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">directions_car</i>
                            <input id="merk" type="text" class="validate" name="merk" required>
                            <label for="merk">Merk</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">tab</i>
                            <input id="Kenteken_nr" type="text" class="validate" name="kenteken_nummer" required>
                            <label for="Kenteken_nr">Kenteken nr.</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">toys</i>
                            <input id="chassis_nr" type="text" class="validate" name="chassis_nummer" required>
                            <label for="chassis_nr">Chassis nr.</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">date_range</i>
                            <input id="bouwjaar" type="number" class="validate" name="bouwjaar" required>
                            <label for="bouwjaar">Bouwjaar</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">bookmark_border</i>
                            <input id="km_stand" type="number" class="validate" name="km_stand" required>
                            <label for="km_stand">KM Stand</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">category</i>
                            <select name="categorie" required>
                                <option value="P1">P1</option>
                                <option value="P2" selected>P2</option>
                                <option value="P3">P3</option>
                                <option value="P4">P4</option>
                            </select>
                            <label for="categorie">Categorie</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect col s10" type="submit" name="registreer_auto">Registreer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>

            </div>

            <div id="tarieven" class="col s12">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Tarief per KM (SRD)</th>
                            <th>Borg (SRD)</th>
                            <th>Boete (SRD)</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                            include "./src/database/dbh.php";
                            $tariefTableQuery = mysqli_query($connection,"SELECT * FROM tarief"); 

                            while($row = mysqli_fetch_array($tariefTableQuery))
                            {
                                echo "<tr>";
                                echo "<td>". $row['categorie'] ."</td>";
                                echo "<td>". $row['tarief'] ."</td>";
                                echo "<td>". $row['borg'] ."</td>";
                                echo "<td>". $row['boete'] ."</td>";
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
    <!--Materialize stepper JS -->
    <script src="https://unpkg.com/materialize-stepper@latest/dist/js/mstepper.min.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        M.AutoInit();

        let el = document.querySelector('.tabs');
        let instance = M.Tabs.init(el);
        instance.select('dashboard');

        function navTabs(id){
            instance.select(id);
        }

        var stepper = document.querySelector('.stepper');
        var stepperInstace = new MStepper(stepper, {
            // options
            firstActive: 0, // this is the default
            autoFocusInput: false,
            showFeedbackPreloader: true,
            stepTitleNavigation: false,
        });

        // function registreerAuto(){
        //     // AJAX Code To Submit Form.
        //     $.ajax({
        //         type: "POST",
        //         url: "./src/auto_ajax.php",
        //         data: $("#auto_form").serialize(),
        //         dataType: "text",
        //         cache: true,
        //         success: () => {

        //     }
        // });
        // }

        function verhuur(){
            let auto = document.getElementById("auto_dropdown").value;
            let klant = document.getElementById("klant_dropdown").value;

            let data = "klant_id="+klant+"&auto_id="+auto;

            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "./src/verhuur.php",
                data: data,
                dataType: "text",
                cache: true,
                success: () => {
                    location.reload(true);
                }
            });
        }
    </script>
</body>

</html>