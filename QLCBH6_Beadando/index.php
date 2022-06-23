<!DOCTYPE html>
<html>
    <head>
        <title>Saját profil</title>
        <meta http-equiv="content-type" content="text/HTML; charset=UTF-8">
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="Style.css">
    </head>
    <body>       
        <?php require "mydbms.php"; ?>        
	<?php
        session_start();
        if (isset($_SESSION['user'])) {
            
            echo '<div class="navbar">';
            echo '<a href="TulajdonsagokHozzaadása.php" target="_self">Tulajdonságok hozzáadása</a>';
            echo '<a href="Formlist.php?d=" target="_self">Adatbázisban tárolt elemek</a>';
            echo '</div>';
            
            echo "<div class=page>";
            echo "<div class=header>";
            include "Header.php";
            echo "</div>";
            echo "<div class=menu>";
            include "Menu.php";
            echo "</div>";
            echo "<div class=tartalom>";
            include "Tartalom.php";
            echo "</div>";
            echo "<footer class=foot>Webprogramozás II. <br/>Kiss Olga<br/>2021</footer>";
            echo "</div>";
        } else {
            echo '<meta http-equiv="refresh" content="0; URL=Bejelentkezes.html">';
        }
        ?>
    </body>
</html>
