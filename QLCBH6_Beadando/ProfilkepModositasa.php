<?php
session_start();
require_once "mydbms.php";
$dbname="beadando";
$con=connect("root","",$dbname);

    $query="select email from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($profilimg)=mysqli_fetch_row($result); 
    if(isset($_POST["send"])){
        
        $query="UPDATE users SET img = '". $_SESSION['profilkep']."' where uname='".$_SESSION["user"]."'";
        $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
        if($result){
            echo 'Sikeres módosítás!<br/>3 másodpercen belül visszairányítjuk az oldalra';
        }
         else{
            echo 'Helytelenül adta meg a jelenlegi email címét! Próbálja újra! '
            . '<br/>3 másodpercen belül visszairányítjuk az oldalra';
        }
        
        /*
        if($email==$_POST["old_email"]){
            $query="UPDATE users SET email = '".$_POST['new_email']."' where uname='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            if($result){
                echo 'Sikeres módosítás!<br/>3 másodpercen belül visszairányítjuk az oldalra';
            }
        }
        else{
            echo 'Helytelenül adta meg a jelenlegi email címét! Próbálja újra! '
            . '<br/>3 másodpercen belül visszairányítjuk az oldalra';
        }
         * 
         */
        echo '<meta http-equiv="refresh" content="3; URL=index.php">'; 
    }
    mysqli_close($con);

?>
