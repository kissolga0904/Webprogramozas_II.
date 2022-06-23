<?php
	session_start();
	header("Content-type: image/jpeg");
	$kep=imagecreatetruecolor(150,40);
	$feher=imagecolorallocate($kep,255,255,255);
	$fekete=imagecolorallocate($kep,0,0,0);
	$szurke=imagecolorallocate($kep,125,125,125);
	$karakterek="abcdefhjkmnpqrstuxy345789";

	$szoveg="";
		
	for($i=0;$i<6;$i++){
            $pos = rand(0, strlen($karakterek));
            $szoveg.=$karakterek[$pos];
	}
	
	$_SESSION["captcha"] = $szoveg;
	
	imagefill($kep,0,0,$feher);
	imagettftext($kep,20,0,12,32,$feher,"c:/windows/fonts/arial.ttf",$szoveg);
	imagettftext($kep,20,0,9,30,$fekete,"c:/windows/fonts/arial.ttf",$szoveg);

	imagejpeg($kep);
	imagedestroy($kep);
?> 