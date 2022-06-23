<?php
if(!isset($_GET["d"]))
{
    $_GET["d"]=0;
    
}
switch($_GET["d"])
{
	case 1:include "Profil.php"; break;
	case 2:include "Formlist.php"; break;
	default: include "Profil.php"; break;
}
?>

