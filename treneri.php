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
    $sql_query="DELETE FROM treneri WHERE idTrenera=".$_GET['delete_id'];
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
        window.location.href='treneriedit.php?edit_id='+id; }
    function delete_id(id) {
    if(confirm('Da li sigurno zelite da obrisete podatak ?'))
        window.location.href='treneri.php?delete_id='+id; }
    </script>
</head>
<body>

<center>
    <div id="body">
        <div id="content">
            <table align="center">
            <tr>
                <th colspan="7"><a href="treneriadd.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Drzavljanstvo</th>
                <th>Datum rodjenja</th>
                <th>Klub</th>
                <th colspan="2">Operacija</th>
            </tr>
            <?php
            $sql_query="SELECT * FROM treneri INNER JOIN klubovi USING(idKluba)";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><a href="javascript:edit_id('<?php echo $row[1]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
                <td><a href="javascript:delete_id('<?php echo $row[1]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
            </tr> <?php } ?>
            <tr>
                <th colspan="7"><a href="index.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
        </div>
    </div>
</center>
</body>
</html>