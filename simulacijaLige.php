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
                <th align="center" colspan="7"><p>Tablica</p></th>
            </tr>
            <tr>
                <th><div class="shortRow">RB</div></th>
                <th>Naziv</th>
                <th><div class="shortRow">OU</div></th>
                <th><div class="shortRow">P</div></th>
                <th><div class="shortRow">N</div></th>
                <th><div class="shortRow">I</div></th>
                <th><div class="shortRow">B</div></th>
            </tr>
            <?php
            $sql_query="SELECT    *, (3 * Pobede + 1 * Nereseno) AS Bodovi  
                        FROM 
                            (SELECT    k.naziv, COUNT(*) AS odigraneUtakmice,   
                                            SUM(CASE 
                                                        WHEN u.idTima1 = k.idKluba AND u.goloviDomaci > u.goloviGosti THEN 1  
                                                        WHEN u.idTima2 = k.idKluba AND u.goloviDomaci < u.goloviGosti THEN 1  
                                                        ELSE 0  
                                                    END) AS Pobede,  
                                            SUM(CASE 
                                                        WHEN u.goloviDomaci = u.goloviGosti THEN 1  
                                                        ELSE 0  
                                                    END) AS Nereseno,
                                            SUM(CASE 
                                                        WHEN u.idTima1 = k.idKluba AND u.goloviDomaci < u.goloviGosti THEN 1  
                                                        WHEN u.idTima2 = k.idKluba AND u.goloviDomaci > u.goloviGosti THEN 1  
                                                        ELSE 0  
                                                    END) AS Izgubljene
                            FROM        utakmice as u  
                            JOIN        klubovi as k ON u.idTima1 = k.idKluba OR u.idTima2 = k.idKluba  
                            GROUP BY    k.naziv) AS a 
                            ORDER BY Bodovi DESC";
            $result_set=mysqli_query($con,$sql_query);
            $redniBroj = 0;
            while($row=mysqli_fetch_row($result_set)) { $redniBroj++; ?>
            <tr>
                <th><?php echo $redniBroj?></th>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="7"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
<center>
    <div id="body">
        <div id="content">
            <table align="center">
            <tr>
                <th>Vreme</th>
                <th>Domacin</th>
                <th><div class="shortRow"></div></th>
                <th><div class="shortRow"></div></th>
                <th>Gost</th>
                <th>id Sudije</th>
                <th>Sezona</th>
            </tr>
            <?php
            $sql_query="SELECT idUtakmice, vreme, k1.naziv, goloviDomaci, goloviGosti, k2.naziv, idSudije, sezona
                        FROM `utakmice` LEFT JOIN klubovi k1 ON idTima1 = k1.idKluba
                                        LEFT JOIN klubovi k2 ON idTima2 = k2.idKluba";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><div class="shortRow"><?php echo $row[3]; ?></div></td>
                <td><div class="shortRow"><?php echo $row[4]; ?></div></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="8"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>