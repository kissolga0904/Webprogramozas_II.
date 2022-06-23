<!DOCTYPE html>
<?php
session_start();
 
  //űrlap feldolgozása:
  if (isset($_POST["send"])){
    if (strtolower($_POST["captcha_code"]) !== strtolower($_SESSION["captcha"])){
      echo "Hibás biztonsági kód!";
    }else{
      echo "Helyes biztonsági kód!";
    }
    echo "<br><a href=\"Regisztracio.php\">Vissza</a>";
    exit;
  }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="RegisztracióStyle.css">
        <title>Regisztráció</title>
    </head>
    <body>
        <div class="navbar">
            <a href="Bejelentkezes.html" target="_self">Vissza a bejelentkezéshez</a>
        </div>
        <div class = "header">
            <h1>Regisztrációs űrlap</h1>
        </div>
        
        <div class = "regisztracio">
        <p>A *-gal jelölt mezők kitöltése kötelező! </p>
        <form name="regurlap" method="post" action="Regisztracio.php" enctype=multipart/form-data>
            <table>
                <tr><td>Profilkép:*</td><td><input type="file" name="profileimg" required></td></tr>
                <tr><td>Felhasználónév* (angol abc betűi és számok):</td><td><input type="text" name="username" pattern="[A-Z a-z 0-9]*" required></td></tr>
                <tr><td>E-mail:*</td><td><input type="email" name="email" required></td></tr>
                <tr><td>Jelszó:* (betűt és számokat tartalmazhat)</td>
                <td><input type="password" name="passwd" pattern="[A-Z a-z 0-9]*" required /></td></tr>               
                <tr>
                <th colspan="3">CAPTCHA kód (kérem írja be a képen látható kódot a megfelelő mezőbe!) </th>
                </tr>
                <tr>
                <td>Biztonsági kód:</td>
                <td><img src="captcha.php" alt="Biztonsági kód" title="Biztonsági kód"></td>
                <td><input type="text" name="captcha_code" value="" maxlength="6"></td>
                </tr>
                <tr>
                <td colspan="3" style="text-align:center;">
                <input type="submit" name="send" value="Adatok küldése">
                </td>
                </tr>
                <!--<tr><td><input type="submit" value="Elküld" name="send"></td></tr>-->
                <tr><td><input type="reset" value="Töröl" name="delete"></td></tr>
                </table>
        </form>
        </div>
    </body>
</html>


