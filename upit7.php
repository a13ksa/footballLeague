<?php
include_once 'dbconfig.php';
?>
<html>
<head>
    <title>CRUD Operacije</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<center>
    <div id="body">
        <div id="content">
            <table align="center">
            <tr >
                <th align="center" colspan="6"><p>Utakmice na kojima je postignuto vise golova od proseka</p></th>
            </tr>
            <tr>
                <th>Domacin</th>
                <th>Golovi domaci</th>
                <th>Golovi gosti</th>
                <th>Gost</th>
                <th>Ukupno golova</th>
            </tr>
            <?php
            $sql_query="SELECT k1.naziv, goloviDomaci, goloviGosti, k2.naziv, goloviDomaci + goloviGosti AS ukupnoGolova
                        FROM `utakmice` LEFT JOIN klubovi k1 ON idTima1 = k1.idKluba
                                        LEFT JOIN klubovi k2 ON idTima2 = k2.idKluba 
                        WHERE (goloviDomaci + goloviGosti) > (SELECT AVG(goloviDomaci + goloviGosti) FROM utakmice)
            ";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="6"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>