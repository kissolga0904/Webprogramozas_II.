<?php

$cookie_name=$_SESSION["user"];
$try=$_COOKIE[$cookie_name];
$db=0;
		
foreach($_COOKIE as &$cookie){
    if ($try == $cookie) {
        $db++;
    }
}

$color="orange";
if($db>1){
    $color="red";
}
echo "<header>
    <div style='width:50%; margin:auto;'>
            <h1 style='color:white;'>Ön sikeresen bejelentkezett!</h1>
            <h2 style='color:black;'>Itt találhatja az adatait, amivel felregisztrált.</h2></div>";
            echo "<div style='width:25%; margin:auto; padding-bottom:2px;'>";
            echo "<p style='color:".$color."; font-size:24; margin:10px;'>Felhasználó: ".$_SESSION['user']."</p>";
            echo "<form action=Kijelentkezes.php method=post><input type=submit name=logout value=Kijelentkezés></form></div>"; 
		
		
echo "</header>";
?>