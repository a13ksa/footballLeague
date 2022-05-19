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
                <th align="center" colspan="3"><p>Upit koji ispisuje fudbalske klubove i njihove trenere</p></th>
            </tr>
            <tr>
                <th>Klub</th>
                <th>Ime</th>
                <th>Prezime</th>
            </tr>
            <?php
            $sql_query="SELECT naziv, ime, prezime
                        FROM `klubovi` INNER JOIN treneri
                        USING (idKluba)
                        GROUP BY idKluba";
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