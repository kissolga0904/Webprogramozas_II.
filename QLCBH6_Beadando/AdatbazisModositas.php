<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="TulStyle.css">
        <title>Tulajdonságok</title>
    </head>
    <body>
        <div class="navbar">
            <a href="Formlist.php?d=" target="_self">Vissza az adatbázishoz</a>
            <a href="index.php" target="_self">Vissza a saját profilhoz</a>           
        </div>


<?php
session_start();

if (isset($_SESSION['user'])) {
    $con = mysqli_connect('localhost', "root", "", "beadando", 3306);
    if (!isset($con)) {
        die("Hiba" . mysqli_error($con));
    }

    $query = "select authority from users where uname='" . $_SESSION['user'] . "'";
    $res = mysqli_query($con, $query) or die("Hiba: " . mysqli_error($con));
    list($aut) = mysqli_fetch_row($res);

    if ($aut == "admin")
        $query = "select name,link from menu";
    else if ($aut == "VIP")
        $query = "select name,link from menu where id not in(5,6)";
    else if ($aut == "users")
        $query = "select name,link from menu where id in(1,2,3)";

    $result = mysqli_query($con, $query) or die("Hiba: " . mysqli_error($con));
   

    $id = $_GET['id'];
    $query = "select * from autotulajdonsagok where id = " . $id;
    $result = mysqli_query($con, $query) or die("Nem sikerült " . $query);
    list($id, $rendszam, $tipus, $szin, $gyartasiev, $tulajdonosneve) = mysqli_fetch_row($result);

    echo "<link rel=\"stylesheet\" href=\"Style.css\">";
    echo "<div class=\"content\">";
    echo "<h1>Az adatok módosítása:</h1>";
    echo "<form action=\"\" method=\"post\">";
    echo "<table width=\"500px\">";

    echo "<tr><td><strong>Név: </strong></td><td><input type=\"text\" name=\"tulajdonosneve\" pattern=\"[A-Z]*+[aáeéiíoóöőuúüű]*+[AÁEÉIÍOÓÖŐUÚÜŰ]*+[a-z]*\" placeholder=\"" . $tulajdonosneve . "\"></td></tr>";

    echo "<tr><td><strong>Rendszám: </strong></td><td><input type=\"text\" name=\"rendszam\" pattern=\"[A-Z]{3}-[0-9]{3}\" placeholder=\"" . $rendszam . "\"></td></tr>";

    echo "<tr><td><strong>Típus: </strong></td><td><input type=\"text\" name=\"tipus\" placeholder=\"" . $tipus . "\"></td></tr><tr>";

    echo "</tr><tr><td><strong>Szín: </strong></td><td><input type=\"text\" name=\"szin\" placeholder=\"" . $szin . "\"></td></</tr>";

    echo "</tr><tr><td><strong>Gyártási év: </strong></td><td><input type=\"date\" name=\"gyartasiev\" placeholder=\"" . $gyartasiev . "\"></td></</tr>";


    echo "</table>";
    echo "<input type=\"submit\" value=\"Módosít\" name=\"modositva\" />";
    echo "</form></div>";

    if (isset($_POST['modositva'])) {
        
        if ($_POST['rendszam'] != "") {
            $rendszam = $_POST['rendszam'];
        }
        if ($_POST['tipus'] != "") {
            $tipus = $_POST['tipus'];
        }
        if ($_POST['szin'] != "") {
            $szin = $_POST['szin'];
        }
        if ($_POST['gyartasiev'] != "") {
            $gyartasiev = $_POST['gyartasiev'];
        }
        if ($_POST['tulajdonosneve'] != "") {
            $tulajdonosneve = $_POST['tulajdonosneve'];
        }
        header('Location: index.php?d=4');
    }

    $query2 = "UPDATE autotulajdonsagok SET rendszam='" . $rendszam . "', tipus='" . $tipus . "', szin='" . $szin . "', gyartasiev='" . $gyartasiev . "', tulajdonosneve='" . $tulajdonosneve . "' where id=" . $id . ";";
    mysqli_query($con, $query2) or die("Nem sikerült " . $query2);
    mysqli_close($con);
}
?>
 </body>
</html>