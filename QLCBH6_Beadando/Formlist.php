<!DOCTYPE <html>
<head>
    <title>Adatbázis</title>
    <meta http-equiv="content-type" content="text/HTML; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>


    <div class="navbar">
        <a href="TulajdonsagokHozzaadása.php" target="_self">Tulajdonságok hozzáadása</a>
        <form method="post">
            <input class="kereses" type="submit" name="elküld" value="Elküld">
            <input class="kereses" type="text" name="kereses" placeholder="Rendszám keresés">
        </form>
    </div>


    <?php
    require_once "mydbms.php";
    $dbname = "beadando";
    $con = connect("root", "", $dbname);

    if (isset($_POST["elküld"])) {
        $keresettRendszam = $_POST["kereses"];
        $query = "SELECT tulajdonosneve, rendszam FROM `autotulajdonsagok` WHERE rendszam like '%$keresettRendszam%'";
        $result = mysqli_query($con, $query) or die("Hiba: " . mysqli_error($con));

        list($tulajdonosneve, $rendszam) = mysqli_fetch_row($result);

        if ($rendszam) {
            ?>
            <br><br><br>
            <table>
                <tr>
                    <th>Rendszám</th>
                    <th>Tulajdonos neve</th>
                </tr>
                <tr>
                    <td><?php echo $rendszam; ?></td>
                    <td><?php echo $tulajdonosneve; ?></td>
                </tr>

            </table>
            <?php
        } else {
            echo "A rendszám nem létezik";
        }
    }


    if (!isset($_GET['order']))
        $order = 0;
    else
        $order = $_GET['order'];

    if ($order == 0)
        $orderstring = " order by id";
    else
        $orderstring = " order by rendszam";

    $limit = 4;
    $page = isset($_GET['page']) ? abs((int) $_GET['page']) : 1;

    $query = "select count(*) from autotulajdonsagok";

    $res = mysqli_query($con, $query) or die("Nem sikerült" . $query);
    $list = mysqli_fetch_row($res);
    $c = array_shift($list);

    $maxpage = ceil($c / $limit);

    if ($page <= 0) {
        $page = 1;
    } else if ($page >= $maxpage) {
        $page = $maxpage;
    }

    $offset = ($page - 1) * $limit;
    $query = "select * from autotulajdonsagok";
    $query .= $orderstring;
    $query .= " limit $offset,$limit";

    $result = mysqli_query($con, $query) or die("Nem sikerült " . $query);

    while (list($id, $rendszam, $tipus, $szin, $gyartasiev, $tulajdonosneve) = mysqli_fetch_row($result)) {

        echo "<div style='width:200px; height:200px; text-align:center; border:1pt solid white; float:left; margin:5px;'>";
        echo "<p>Név:" . $tulajdonosneve . "</p>";
        echo "<p>Rendszám: " . $rendszam . "</p>";
        echo "<p>Típus: " . $tipus . "</p>";
        echo "<p>Szín: " . $szin . "</p>";
        echo "<p>Gyártási év: " . $gyartasiev . "</p>";
        ?>
        <a href="AdatbazisModositas.php?id= <?php echo "'" . $id . "'"; ?> ">Módosít</a>
        <a href="AdatbazisTorles.php?id= <?php echo "'" . $id . "'"; ?> ">Töröl</a>
        <?php
        echo '</div>';
    }

    echo '<hr style="clear:both;">';

    $linklimit = 4;
    $linklimit2 = $linklimit / 2;
    $linkoffset = ($page > $linklimit2) ? $page - $linklimit2 : 0;
    $linkend = $linkoffset + $linklimit;

    if ($maxpage - $linklimit2 < $page) {
        $linkoffset = $maxpage - $linklimit;
        if ($linkoffset < 0) {
            $linkoffset = 0;
        }
        $linkend = $maxpage;
    }

    if ($page > 1) {
        echo "<a href='Formlist.php?d=" . $_GET['d'] . "&order=" . $order . "&page=1'>_Első__ </a>";
        echo "<a href='Formlist.php?d=" . $_GET['d'] . "&order=" . $order . "&page=" . ($page - 1) . "'>Előző_</a>";
    }


    for ($i = 1 + $linkoffset; $i <= $linkend and $i <= $maxpage; $i++) {
        $style = ($i == $page) ? "color: black;" : "color: blue;";
        echo "<a href='Formlist.php?d=" . $_GET['d'] . "&order=" . $order . "&page=$i' style='$style'>[$i. oldal]</a>";
    }

    if ($page < $maxpage) {
        echo "<a href='Formlist.php?d=" . $_GET['d'] . "&order=" . $order . "&page=" . ($page + 1) . "'>_Következő__</a>";
        echo "<a href='Formlist.php?d=" . $_GET['d'] . "&order=" . $order . "&page=" . $maxpage . "'>Utolsó</a>";
    }


    mysqli_close($con);
    ?>


</body>
</html>