<?php

session_start();
if (isset($_SESSION['user'])) {
    $con = mysqli_connect('localhost', "root", "", "beadando", 3306);
    if (!isset($con)) {
        die("Hiba" . mysqli_error($con));
    }
    $id = $_GET['id'];
    $query = "DELETE FROM autotulajdonsagok WHERE id=" . $id;
    mysqli_query($con, $query) or die("Nem sikerült " . $query);
    header('Location: Formlist.php?d=');

    mysqli_close($con);
}
?>