<?php
require_once "config.php";
error_reporting(0);

if (isset($_GET['kunNummer'])) {
    //Kunde Anzeigen
    $kunNummer = $_GET['kunNummer'];
    //Abfrage nach Kundennummer
    $sql = "SELECT * FROM TKunden k, TOrtschaftenCH o WHERE kunNummer=" . $kunNummer . " AND k.OrtONRP = o.OrtONRP";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $kunAnrede = $row['KunAnrede'];
            $kunVorname = $row['KunVorname'];
            $kunNachname = $row['KunNachname'];
            $kunStrasse = $row['KunStrasse'];
            $kunHausnummer = $row['KunHausnummer'];
            $kunEmail = $row['KunEMail'];
            $kunGebDatum = $row['KunGebDatum'];
            $kunTelefon = $row['KunTelefon'];
            $ortONRP = $row['OrtONRP'];
            $ortName = $row['OrtName'];
            $ortPLZ = $row['OrtPLZ'];
        }
    }
} else if (isset($_POST['kunInsert'])) {
    // Kunde Anlegen
    //OrtONRP    
    $sql = "select OrtONRP from TOrtschaftenCH where OrtPLZ = " . $_POST['plz'] . " and OrtName = '" . $_POST['ort'] ."'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $ortONRP = $row['OrtONRP'];
        }
        $sql = "INSERT INTO TKunden (KunAnrede, KunVorname, KunNachname, KunStrasse, KunHausnummer, KunEMail, KunGebDatum, KunTelefon, OrtONRP)
                      VALUES ('" . $_POST['anrede'] . "','" . $_POST['vn'] . "','" . $_POST['nn'] . "','" . $_POST['str'] . "','" . $_POST['nr'] . "','" . $_POST['eM'] . "'," . $_POST['datum'] . ",'" . $_POST['tele'] . "'," . $ortONRP . ")";

        if ($link->query($sql) === TRUE) {
            $last_id = $link->insert_id;
            echo $last_id;
            header('Location: ' . $_SERVER['PHP_SELF'] . '?kunNummer=' . $last_id);
        }
    }else{
        echo "Ihre Postleitzahl stimmt nicht mit dem Ort überrein.";
    }
    

} else if (isset($_POST['kunUpdate'])) {
    //Kunde Update
    // OrtONRP    
    $sql = "select OrtONRP from TOrtschaftenCH where OrtPLZ = " . $_POST['plz'] . " and OrtName = '" . $_POST['ort'] ."'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $ortONRP = $row['OrtONRP'];
        }
        $sql = "UPDATE TKunden SET KunAnrede='" . $_POST['anrede'] . "',KunVorname='" . $_POST['vn'] . "',KunNachname='" . $_POST['nn'] . "',KunStrasse='" . $_POST['str'] . "',KunHausnummer='" . $_POST['nr'] . "',KunEMail='" . $_POST['eM'] . "',KunGebDatum='" . $_POST['datum'] . "',KunTelefon='" . $_POST['tele'] . "',OrtONRP='" . $ortONRP . "' WHERE KunNummer=" . $_POST['id'] ."";
        if ($link->query($sql) === TRUE) {
            header('Location: ' . $_SERVER['PHP_SELF'] . '?kunNummer=' . $_POST['id']);
        }
    }else{
        echo "Ihre Postleitzahl stimmt nicht mit dem Ort überrein.";
    }

} else if (isset($_GET['kunLoeschen'])) {
    echo "loeaschen";
    header('Location: ' . $_SERVER['PHP_SELF'] . '?kunLeer=');
     $sql = "DELETE FROM TKunden WHERE KunNummer=" . $_GET['kunLoeschen'] . ";";
    mysqli_query($link, $sql);

} else if (isset($_POST['kunEdit'])){
    $kunNummer = $_POST['id'];
    $kunAnrede = $_POST['anrede'];
    $kunVorname = $_POST['vn'];
    $kunNachname = $_POST['nn'];
    $kunStrasse = $_POST['str'];
    $kunHausnummer = $_POST['nr'];
    $kunEmail = $_POST['eM'];
    $kunGebDatum = $_POST['datum'];
    $kunTelefon = $_POST['tele'];
    $ortName = $_POST['ort'];
    $ortPLZ = $_POST['plz'];

} else if (isset($_GET['kunAdd'])){
    $kunNummer = "";
    $kunAnrede = "";
    $kunVorname = "";
    $kunNachname = "";
    $kunStrasse = "";
    $kunHausnummer = "";
    $kunEmail = "";
    $kunGebDatum = "";
    $kunTelefon = "";
    $ortONRP = "";
    $ortName = "";
    $ortPLZ = "";

} else if (isset($_GET['kunLeer'])){
    // Leer
    $kunNummer = "";
    $kunAnrede = "";
    $kunVorname = "";
    $kunNachname = "";
    $kunStrasse = "";
    $kunHausnummer = "";
    $kunEmail = "";
    $kunGebDatum = "";
    $kunTelefon = "";
    $ortONRP = "";
    $ortName = "";
    $ortPLZ = "";
}else{
    header('Location: ' . $_SERVER['PHP_SELF'] . '?kunLeer=');
}

?>
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
    <title>Google Icons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <div class="container">
        <h1>Kunden</h1>
        <nav>
            <ul>
                <li><a class="active" href="index.php">Kunden</a></li>
                <li><a class="not-active" href="videos.php">Videos</a></li>
                <li><a class="not-active" href="ausleihen.php">Ausleihen</a></li>
            </ul>
            <div class="hl1"></div>
        </nav>
        <br>
        <div class="fix">
        <div class="datatable">
            <script src="https://kit.fontawesome.com/9b1654f543.js" crossorigin="anonymous"></script>
            <table>

                <thead>
                    <tr>
                        <th>Nachname</th>
                        <th>Vorname</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM TKunden ORDER BY KunNachname ASC;";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "  <tr>
                                        <td><a href='" . $_SERVER['PHP_SELF'] . '?kunNummer=' . $row['KunNummer'] . "'>" . $row['KunNachname'] . "</a></td>
                                        <td><a href='" . $_SERVER['PHP_SELF'] . '?kunNummer=' . $row['KunNummer'] . "'>" . $row['KunVorname'] . "</a></td>
                                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        <div class="vl">
            <div class="icon">
                <table>
                    <tr>
                        <td>
                            <br>
                            <div>
                                <a href="<?php echo $_SERVER['PHP_SELF'] . '?kunAdd=' ?>" class="btn"><i class="fa-solid fa-user-plus fa-2xl" style="margin: 5px;"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <br>
                                <button class="btn" type="submit" name="kunEdit" form="kundeForm"><i class="fa-solid fa-user-pen fa-2xl" style="margin: 5px;"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <br>
                                <a href="<?php echo $_SERVER['PHP_SELF'] . '?kunLoeschen=' . $kunNummer ?>" class="btn"><i class="fa-solid fa-user-large-slash fa-2xl" style="margin: 5px;"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <a href="<?php echo $_SERVER['PHP_SELF'] . '?kunLeer=' ?>" class="btn"><i class="material-icons" style="font-size:32px; margin-top: 20px; margin-left: 10px;">not_interested</i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <br>
                                <?php
                                if(isset($_GET['kunAdd'])){
                                    echo "<button class='btn' type='submit'  name='kunInsert' form='kundeForm'><i class='material-icons' style='font-size:40px; margin-left: 5px;'>done</i></button>";
                                }else if(isset($_POST['kunEdit'])){
                                    echo "<button class='btn' type='submit'  name='kunUpdate' form='kundeForm'><i class='material-icons' style='font-size:40px; margin-left: 5px;'>done</i></button>";
                                }
                                ?>
                                
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="kunde">
            <form id="kundeForm" action="index.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label for="anrede">Anrede</label>
                        </td>
                        <td>
                            <select name="anrede" id="anrede">
                                <option value="" <?php if($kunAnrede == ""){echo "selected";}else if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "disabled";} ?>></option>
                                <option value="Frau" <?php if($kunAnrede == "Frau"){echo "selected";}else if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "disabled";} ?>>Frau</option>
                                <option value="Herr" <?php if($kunAnrede == "Herr"){echo "selected";}else if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "disabled";} ?>>Herr</option>
                            </select>

                            <input type="hidden" id="anrede" name="id" value="<?php echo $kunNummer ?>">
                        </td>
                         <td>
                            <label for="id">Kundennr.</label>
                        </td>
                        <td>
                            <label for="id"><?php echo $kunNummer ?></label>
                            <input type="hidden" id="id" name="id" value="<?php echo $kunNummer ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="vn">Vorname</label>

                        </td>
                        <td>
                            <input type="text" class="form-control" id="vn" name="vn" value="<?php echo $kunVorname ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nn">Nachname</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="nn" name="nn" value="<?php echo $kunNachname ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="str">Strasse</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="str" name="str" value="<?php echo $kunStrasse ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                        <td>
                            <label for="nr">HausNr.</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="nr" name="nr" value="<?php echo $kunHausnummer ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="ort">Ort</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="ort" name="ort" value="<?php echo $ortName ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                        <td>
                            <label for="plz">PLZ</label>
                        </td>
                        <td>
                            <input type="number" min="1000" max="9658" class="form-control" id="plz" name="plz" value="<?php echo $ortPLZ ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="eM">E-Mail</label>
                        </td>
                        <td>
                            <input type="email" class="form-control" id="eM" name="eM" value="<?php echo $kunEmail ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="datum">Geburtsdatum</label>
                        </td>
                        <td>
                            <input type="date" class="form-control" id="datum" name="datum" value="<?php echo $kunGebDatum ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tele">Telefon</label>
                        </td>
                        <td>
                            <input type="tel" class="form-control" id="tele" name="tele" pattern="^(?:0|\(?\+41\)?\s?|0041\s?)(21|22|24|26|27|31|32|33|34|41|43|44|51|52|55|56|58|61|62|71|74|76|77|78|79|81|91)(?:[\.\-\s]?\d\d\d)(?:[\.\-\s]?\d\d){2}$" value="<?php echo $kunTelefon ?>" required <?php if(!(isset($_POST['kunEdit']) || isset($_GET['kunAdd']))){echo "readonly";} ?>>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="hl2"></div>
            <br>
            <?php
                if (isset($_GET["kunNummer"])) {
                echo "
                    <div class='videos'>
                        <table>
                            <thead>
                                <tr>
                                    <th>Video Name</th>
                                    <th>Videonummer</th>
                                    <th>Ausleihdatum</th>
                                    <th>Rückgabedatum</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            ";
                                    $sql = "select v.VidTitel, v.VidNummer, a.AusVon, a.AusBis from TKunden k, TVideos v, TAusleihen a where k.KunNummer = a.KunNummer and a.VidNummer = v.VidNummer and k.KunNummer = " . $_GET["kunNummer"] . ";";
                                    $result = $link->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "  <tr>
                                                    <td>" . $row["VidTitel"] . "</td>
                                                    <td>" . $row["VidNummer"] . "</td>
                                                    <td>" . $row["AusVon"] . "</td>
                                                    <td>" . $row["AusBis"] . "</td>
                                                </tr>";
                                        }
                                    }
                                }
                            echo "
                            </tbody>
                        </table>
                    </div>
                "; ?>
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