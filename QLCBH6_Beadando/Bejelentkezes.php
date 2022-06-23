<?php
            require 'mydbms.php';
            if(isset($_POST["send"])){
                $dbname="beadando";
                $con=connect("root","", $dbname);
                
		$query="select uname,passwd from users where uname='".$_POST['username']."'";
		$result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
                
                list($username,$passwd)=mysqli_fetch_row($result);
		if($passwd==md5($_POST['passwd']))
		{
                    session_start();
                    $_SESSION["user"]=$username;
                            
                    $cookie_name = $username;
                    $a=getenv("REMOTE_ADDR"); 
                    $cookie_value = $a;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    
                    echo '<meta http-equiv="refresh" content="0; URL=index.php">';                  
                } 
                else{	
                    echo "<br/>Hibás jelszó vagy felhasználónév";	
                    echo "<br/><a href=Bejelentkezes.html>Vissza a bejelentkezéshez</a>";
		}
		
                mysqli_close($con);
        
            }
                
        ?>


