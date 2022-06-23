<?php
session_start();
require_once "mydbms.php";
$dbname="beadando";
$con=connect("root","",$dbname);

    $query="select passwd from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($passwd)=mysqli_fetch_row($result); 
    if(isset($_POST["send"])){
        if($passwd==md5($_POST["old_pwd"])){
            $query="UPDATE users SET passwd=md5('".$_POST['new_pwd']."') where uname='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            if($result){
                echo 'Sikeres módosítás!<br/>3 másodpercen belül visszairányítjuk az oldalra';
            }
        }
        else{
            echo 'Helytelenül adta meg a jelenlegi jelszót! Próbálja újra! '
            . '<br/>3 másodpercen belül visszairányítjuk az oldalra';
        }
        echo '<meta http-equiv="refresh" content="3; URL=index.php">'; 
    }
    mysqli_close($con);

?>
