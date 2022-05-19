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
                <th align="center" colspan="3"><p>Fudbaleri mladji od 21 godine u klubu</p></th>
            </tr>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum rodjenja</th>
            </tr>
            <?php
            $sql_query="SELECT ime, prezime, datumRodjenja 
                        FROM `igraci` 
                        WHERE idKluba = 1 AND datumRodjenja > (now() - INTERVAL 21 YEAR);";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="3"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>