<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="lib/materialize/css/materialize.min.css" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                    <li class="tab col s4"><a class="active waves-effect" href="#dashboard">Dashboard</a></li>
                    <li class="tab col s4"><a class="waves-effect" href="#verhuur">Verhuur</a></li>
                    <li class="tab col s4"><a class="waves-effect" href="#klanten">Klanten</a></li>
                </ul>

            </div>
            <div id="dashboard" class="col s12">
                <button class="btn waves-effect blue" onclick = "hah()">Verhuur een auto!</button>

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
                                <th>Tarief per KM</th>
                                <th>Categorie</th>
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
                                echo "<td>". $row['tarief_per_km'] ."</td>";
                                echo "<td>". $row['categorie'] ."</td>";
                                echo "</tr>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>

                <br>

                <blockquote>
                    <p class="flow-text">Geregistreerde klanten</p>
                </blockquote>
                
                <div style="height: 25em; overflow:auto;">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Adres</th>
                                <th>Mobiel/Telefoon</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
                                $klantTableQuery = mysqli_query($connection,"SELECT * FROM klant ORDER BY naam ASC"); 

                                while($row = mysqli_fetch_array($klantTableQuery))
                                {
                                echo "<tr>";
                                echo "<td>". $row['naam'] ."</td>";
                                echo "<td>". $row['adres'] ."</td>";
                                echo "<td>". $row['mobiel'] ."</td>";
                                echo "</tr>";
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
            </div>

            <div id="klanten" class="col s12">
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
                            <i class="material-icons prefix">attach_money</i>
                            <input id="tarief_per_km" type="number" class="validate" name="tarief_per_km" required>
                            <label for="tarief_per_km">Tarief per KM</label>
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
        </div>
    </div>


    <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

    <script type="text/javascript">
        M.AutoInit();

        let el = document.querySelector('.tabs');
        let instance = M.Tabs.init(el);
        instance.select('dashboard');

        function hah(){
            instance.select('verhuur');
        }
    </script>
</body>

</html>