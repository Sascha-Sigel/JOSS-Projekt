<?php
require_once "config.php";
    $sql = "SELECT * FROM TKunden";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            print_r($row);
            echo "<br>";
        }
    }
?>
<!doctype html>

<html lang="de">

<head>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Bootstrap V4.6.0 Template f�r IMS Frauenfeld" name="description">
    <meta content="Jean-Pierre Mouret" name="author">

    <!-- Title -->
    <title>Videothek</title>

    <!-- Bootstrap CSS by CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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

    <script type="text/javascript" src="database.js"></script>

</head>

<body>

    <div class="container">
        <h1>Kunden</h1>
        <hr>
        <nav>
            <ul>
                <li><a class="active" href="index.php">Kunden</a></li>
                <li><a href="videos.php">Videos</a></li>
                <li><a href="ausleihen.php">Ausleihen</a></li>
            </ul>
        </nav>
        <br>
        <div class="datatable">
            <?php
            $arr = array(0 => "Jeannine", 1 => "Ziegler");
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                    </tr>
                </thead>
                <?php
                //https://tubemint.com/php-foreach-loop-in-html-table-working/
                ?>
            </table>

        </div>
        <?php
        error_reporting(0);
        ?>
        <div class="vl"></div>
        <div class="kunde">
            <table>
                <tr>
                    <td>
                        <label for="anrede">Anrede</label>
                    </td>
                    <td>
                        <select name="anrede" id="anrede" required>
                            <option value="Frau">Frau</option>
                            <option value="Herr">Herr</option>
                            <option value=""></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="vn">Vorname</label>

                    </td>
                    <td>
                        <input type="text" class="form-control" id="vn" name="vn" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nn">Nachname</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="nn" name="nn" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="str">Strasse</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="str" name="str" value="" required>
                    </td>
                    <td>
                        <label for="nr">HausNr.</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="nr" name="nr" value="" required>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="ort">Ort</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="ort" name="ort" value="" required>
                    </td>
                    <td>
                        <label for="plz">PLZ</label>
                    </td>
                    <td>
                        <input type="number" class="form-control" id="plz" name="plz" value="" required>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="eM">E-Mail</label>
                    </td>
                    <td>
                        <input type="email" class="form-control" id="eM" name="eM" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="datum">Geburtsdatum</label>
                    </td>
                    <td>
                        <input type="date" class="form-control" id="datum" name="datum" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tele">Telefon</label>
                    </td>
                    <td>
                        <input type="phone" class="form-control" id="tele" name="tele" value="" required>
                    </td>
                </tr>
            </table>
            <button onclick="selectAll()">Click me</button>
            <div id='test'>
            </div>

        </div>
        <br>
        <hr>
    </div>

    </div>

    <!-- Custom file -->
    <script src="js/myscripts.js"></script>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- Icons from ionic -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>

</html>