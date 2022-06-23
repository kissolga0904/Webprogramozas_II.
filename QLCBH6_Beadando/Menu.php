<?php

require_once "mydbms.php";
$dbname="beadando";
$con=connect("root","",$dbname);

$query="select authority from users where uname='".$_SESSION['user']."'";
$res=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
list($aut)=mysqli_fetch_row($res);


if($aut=="admin")
    $query="select name,link from menu";
else if($aut == "VIP")
    $query="select name,link from menu where id not in (5,6)";
else 
    $query="select name, link from  menu where id in(1,2,3)";
    

$result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));



echo "<table class=menutable border=\"1px\" style=\"background-color:rgb(158,98,158)\">";
while(list($menutitle,$link)=mysqli_fetch_row($result))
{
	echo "<tr><td><a class=menu href=index.php?d=".$link.">".$menutitle."</a></td></tr>";
}
echo "</table>";
mysqli_close($con);

?>