<?php
    require_once "mydbms.php";
    $dbname="beadando";
    $con=connect("root","",$dbname);

    $query="select id,uname,email,img from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($id,$nev,$email,$kep)=mysqli_fetch_row($result);
    {
        echo '<h2>Felhasználó adatai:</h2>';
        echo "<table><tr><td colspan=2><img src=" . $kep . " alt=".$kep." height=250/></td>";
        echo "<tr><td>Név:</td><td>" . $nev . "</td></tr>";
        echo "<tr><td>E-mail:</td><td>" . $email . "</td></tr></table>";                                           
    } 
    
     echo '<form action="" method="post"><input type="file" name="modifypr" value="Profilkép módosítás"></form>';

    if(isset($_POST["modifypr"])){
                

        
        /*
        echo '<br/><form action="ProfilkepModositasa.php" method="post"><input type="file" name="old_image" placeholder="Jelenlegi profilkép">'
        . '<input type="file" name="new_image" placeholder="Új profilkép">'
        . '<input type="submit" name="send" placeholder="Módosít"></form>';             
         */
    } 
    
    echo '<form action="" method="post"><input type="submit" name="modifyem" value="Email módosítás"></form>';

    if(isset($_POST["modifyem"])){
        echo '<br/><form action="EmailModositasa.php" method="post"><input type="email" name="old_email" placeholder="Jelenlegi email">'
        . '<input type="email" name="new_email" placeholder="Új email">'
        . '<input type="submit" name="send" placeholder="Módosít" value="Módosít"></form>';    
    }
    
    echo '<form action="" method="post"><input type="submit" name="modifypw" value="Jelszó módosítás"></form>';

    if(isset($_POST["modifypw"])){
        echo '<br/><form action="JelszoModositasa.php" method="post"><input type="password" name="old_pwd" placeholder="Jelenlegi jelszó">'
        . '<input type="password" name="new_pwd" placeholder="Új jelszó">'
        . '<input type="submit" name="send" placeholder="Módosít" value="Módosít"></form>';    
    }
    mysqli_close($con);
?>
