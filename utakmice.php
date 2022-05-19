<?php
include_once 'dbconfig.php';

if($con==true)
{
    echo "Uspesno uspostavljena konekcija ka bazi";
}
else
{
    mysql_close($con);
    echo "greska";
}

if(isset($_GET['delete_id']))
{
    $sql_query="DELETE FROM utakmice WHERE idUtakmice=".$_GET['delete_id'];
    mysqli_query($con,$sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}
?>

<html>
<head>
    <title>CRUD Operacije</title>
    <link rel="stylesheet" href="style.css"/>
    <script>
    function edit_id(id) {
    if(confirm('Sigurni ste da zelite promenu podataka ?'))
        window.location.href='utakmiceedit.php?edit_id='+id; }
    function delete_id(id) {
    if(confirm('Da li sigurno zelite da obrisete podatak ?'))
        window.location.href='utakmice.php?delete_id='+id; }
    </script>
</head>
<body>

<center>
    <div id="body">
        <div id="content">
            <table align="center">
            <tr>
                <th colspan="9"><a href="utakmiceadd.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Vreme</th>
                <th>Domacin</th>
                <th><div class="shortRow"></div></th>
                <th><div class="shortRow"></div></th>
                <th>Gost</th>
                <th>id Sudije</th>
                <th>Sezona</th>
                <th colspan="2">Operacija</th>
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
                <td><a href="javascript:edit_id('<?php echo $row[0]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
                <td><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="9"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>