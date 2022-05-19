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
                <th align="center" colspan="2"><p>Koliko ima fudbalera po klubovima</p></th>
            </tr>
            <tr>
                <th>Klub</th>
                <th>Broj fudbalera</th>
            </tr>
            <?php
            $sql_query="SELECT naziv, COUNT(*)
                        FROM `klubovi` INNER JOIN igraci
                        USING (idKluba)
                        GROUP BY idKluba";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="2"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>