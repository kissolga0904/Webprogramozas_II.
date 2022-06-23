<?php
    if(isset($_POST["send"]))  
    {
        require "mydbms.php";
        
        $filename = trim($_FILES['profileimg']['name']);

        $filename = rand().$filename;
        
        $beirando="img/".$_POST["username"]."/".$filename;
        
        
        $dbname="beadando";
        $con=connect("root","", $dbname);
        
        $query="insert into users(uname,email,passwd,img,authority) values ('".$_POST['username']."','"
                .$_POST['email']."', md5('".$_POST['passwd']."'),'".$beirando."','users')";
        
	$result=mysqli_query($con,$query);
       
        if (!$result){
            if(mysqli_errno($con)==1062) echo "Ezzel az e-mail címmel vagy felhasználónévvel már regisztráltak";
            else echo mysqli_errno($con)."Hiba: ".mysqli_error($con);
	}
        
	else{
            mkdir("img/".$_POST["username"]);
            move_uploaded_file ($_FILES['profileimg']['tmp_name'],"img/".$_POST["username"]."/".$filename);
            echo "Sikeres regisztráció"
            .'<br/>3 másodpercen belül visszairányítjuk a bejelentkezéshez!';
	}
        echo '<meta http-equiv="refresh" content="3; URL=index.php">'; 
	mysqli_close($con);
            
    }  
 
?>

