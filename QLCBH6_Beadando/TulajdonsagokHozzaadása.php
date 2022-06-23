<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="TulStyle.css">
        <title>Tulajdonságok</title>
    </head>
    <body>
        <div class="navbar">
            <a href="index.php" target="_self">Vissza a saját profilhoz</a>
            <a href="Bejelentkezes.html" target="_self">Vissza a bejelentkezéshez</a>           
        </div>
        <div class = "header">
            <h1>Az autó tulajdonságait itt adhatja meg! </h1>
        </div>
        
        <div class = "tulajdonsagok">
        <p>A *-gal jelölt mezők kitöltése kötelező! </p>
        <form name="tulurlap" method="post" action="TulHozzaadasa.php" enctype=multipart/form-data>
            <table>
                <tr><td>Tulajdonos neve:*</td><td><input type="text" name="nev" pattern ="[A-Z]*+[aáeéiíoóöőuúüű]*+[AÁEÉIÍOÓÖŐUÚÜŰ]*+[a-z]*" required></td></tr>
                <tr><td>Rendszám:* (angol abc betűi és számok):</td><td><input type="text" name="rendszam" pattern="[A-Z]{3}-[0-9]{3}" required></td></tr>
                <tr><td>Típus:*</td><td><input type="text" name="tipus" required></td></tr>
                <tr><td>Szín:*</td><td><input type="text" name="szin" required /></td></tr>                            
                <tr><td>Gyártási év:*</td><td><input type="date" name="gyartasiev" required></td></tr>
                <tr><td><input type="submit" value="Elküld" name="send"></td></tr>
                <tr><td><input type="reset" value="Töröl" name="delete"></td></tr>
                </table>
        </form>
        </div>
    </body>
</html>
