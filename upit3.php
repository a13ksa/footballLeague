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
            <tr>
                <th align="center" colspan="4"><p>Sve utakmice koje je igrao dati tim</p> </th>
                <form action="upit3.php" method="POST">
                    <th><input type="number" name="idKluba" placeholder="idKluba" required /></th>
                    <th><button type="submit" name="btn-save"><strong>Sacuvaj</strong></button></th>
                </form>
            </tr>
            <tr>
                <th>Vreme</th>
                <th>Domacin</th>
                <th>Golovi domaci</th>
                <th>Golovi gosti</th>
                <th>Gost</th>
                <th>id Sudije</th>
            </tr>
            <?php
            if(isset($_POST['btn-save'])){
                $idKluba = $_POST['idKluba'];
                $sql_query="SELECT vreme, k1.naziv, goloviDomaci, goloviGosti, k2.naziv, idSudije
                            FROM `utakmice` LEFT JOIN klubovi k1 ON idTima1 = k1.idKluba
                                            LEFT JOIN klubovi k2 ON idTima2 = k2.idKluba 
                            WHERE idTima1 = $idKluba OR idTima2 = $idKluba";
                $result_set=mysqli_query($con,$sql_query);
                while($row=mysqli_fetch_row($result_set)) { ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                </tr> <?php } }?>
            <tr>
                <th colspan="6"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>