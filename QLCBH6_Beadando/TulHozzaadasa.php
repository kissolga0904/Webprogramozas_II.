<?php
    if(isset($_POST["send"]))  
    {
        require "mydbms.php";
                        
        $dbname="beadando";
        $con=connect("root","", $dbname);
        
        //var_dump($_POST);
        
        $query="insert into autotulajdonsagok(rendszam,tipus,szin,gyartasiev,tulajdonosneve) values ('".$_POST['rendszam']."','"
                .$_POST['tipus']."','".$_POST['szin']."','".$_POST['gyartasiev']."','".$_POST['nev']."')";
        
	$result=mysqli_query($con,$query);
       //itt még kell csinálni, de nem tudom mit!!! 
       // var_dump($result);  
        if (!$result){
            if(mysqli_errno($con)==1062) echo "Ezzel az e-mail címmel vagy felhasználónévvel már regisztráltak";
            else echo mysqli_errno($con)."Hiba: ".mysqli_error($con);
	}
        
        else{
            echo 'Sikeres hozzáadás!'
            . '<br/>3 másodpercen belül visszairányítjuk az oldalra';
            echo '<meta http-equiv="refresh" content="3; URL=index.php">'; 
        }
        
	mysqli_close($con);
            
    }
    
 
?>


