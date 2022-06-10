<!doctype html>

<html lang="de">

    <head>

        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta content="Bootstrap V4.6.0 Template für IMS Frauenfeld" name="description">
        <meta content="Jean-Pierre Mouret" name="author">

        <!-- Title -->
        <title>Videothek</title>

        <!-- Bootstrap CSS by CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link href="css/bootstrap-custom.css" rel="stylesheet">

        <!-- Favicons created with realfavicongenerator.net -->
        <link href="favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
        <!-- <link href="favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png"> -->
        <link href="favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
        <link href="favicons/site.webmanifest" rel="manifest">
        <link color="#5bbad5" href="favicons/safari-pinned-tab.svg" rel="mask-icon">
        <link href="favicons/favicon.ico" rel="shortcut icon">
        <meta content="#2d89ef" name="msapplication-TileColor">
        <meta content="favicons/browserconfig.xml" name="msapplication-config">
        <meta content="#ffffff" name="theme-color">

    </head>

    <body>

        <div class="container">
            <h1>Kunden</h1>
            <hr>
            <nav>
                <ul>
                    <li><a href="index.php">Kunden</a></li>
                    <li><a href="news.asp">Videos</a></li>
                    <li><a href="contact.asp">Ausleihen</a></li>
                </ul>
            </nav>
            <?php
            error_reporting(0);
            ?>
            <form name="selbst" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <table>
                    <tr>
                        <td>

                            <label>Wählen Sie die entsprechende Masseinheit ein um die Strecke/Distanz zu berechnen.</label>
                            <br>
                            <select class="form-control" name="masseinheit" id="masseinheit" required>
                                <option value="Meter">Meter</option>
                                <option value="Werst">Werst</option>
                                <option value="Furlong">Furlong</option>
                                <option value="Kellicam">Kellicam</option>
                                <option value="Tlaquahuitl">Tlaquahuitl</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <label for="streckeString">Strecke:</label>
                            <input type="number" min="0" step="0.001" class="form-control" id="strecke" name="strecke" value="" required> 
                        </td>
                    </tr>

                </table>
                <br>
                <input type="submit" class="btn btn-primary" value="Berechnen" name="buttonGET"/>
                <br>
                <br>
                <table>   
                    <th>Ausgabe:</th>
                    <tr>
                        <td>
                            <br>
                            <?php

                            function nachMeterBerechnen() {
                                $masseinheit = $_GET['masseinheit'];
                                if (!empty($_GET['strecke'])) {
                                    switch ($masseinheit):
                                        case "Meter":
                                            $meter = $_GET['strecke'];
                                            break;
                                        case "Werst":
                                            $meter = $_GET['strecke'] * 1066.8;
                                            break;
                                        case "Furlong":
                                            $meter = $_GET['strecke'] * 201.168;
                                            break;
                                        case "Kellicam":
                                            $meter = $_GET['strecke'] * 2000;
                                            break;
                                        case "Tlaquahuitl":
                                            $meter = $_GET['strecke'] * 2.5;
                                            break;
                                    endswitch;
                                }
                                return $meter;
                            }

                            function vonMeterInFurlong($meter) {
                                $furlong = $meter / 201.168;
                                return $furlong;
                            }

                            function vonMeterInKellicam($meter) {
                                $kellicam = $meter / 2000;
                                return $kellicam;
                            }

                            function vonMeterInWerst($meter) {
                                $werst = $meter / 1066.8;
                                return $werst;
                            }

                            function vonMeterInTlaquahuitl($meter) {
                                $tlaquahuitl = $meter / 2.5;
                                return $tlaquahuitl;
                            }

                            if (!empty($_GET['strecke'])) {
                                $meter = nachMeterBerechnen();
                                $werst = vonMeterInWerst($meter);
                                $furlong = vonMeterInFurlong($meter);
                                $kellicam = vonMeterInKellicam($meter);
                                $tlaquahuitl = vonMeterInTlaquahuitl($meter);

                                echo "Meter: " . $meter;
                                echo "<br>";
                                echo "Werst: " . $werst;
                                echo "<br>";
                                echo "Tlaquahuitl: " . $tlaquahuitl;
                                echo "<br>";
                                echo "Kellicam: " . $kellicam;
                                echo "<br>";
                                echo "Furlong: " . $furlong;
                            }
                            ?>  
                        </td>
                    </tr>    
                </table>
            </form>
            <br>
            <form name="Home" action="index.php" method="GET">
                <input type="submit" class="btn btn-primary" value="Zurücksetzen" />
            </form>
        </div>

        <!-- Custom file -->
        <script src="js/myscripts.js"></script>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>


        <!-- Icons from ionic -->
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    </body>

</html>
