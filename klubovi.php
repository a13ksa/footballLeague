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
    $sql_query="DELETE FROM klubovi WHERE idKluba=".$_GET['delete_id'];
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
        window.location.href='kluboviedit.php?edit_id='+id; }
    function delete_id(id) {
    if(confirm('Da li sigurno zelite da obrisete podatak ?'))
        window.location.href='klubovi.php?delete_id='+id; }
    </script>
</head>
<body>

<center>
    <div id="body">
        <div id="content">
            <table align="center">
            <tr>
                <th colspan="6"><a href="kluboviadd.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Naziv</th>
                <th>Grad</th>
                <th>Drzava</th>
                <th>Godina osnivanja</th>
                <th colspan="2">Operacija</th>
            </tr>
            <?php
            $sql_query="SELECT * FROM klubovi";
            $result_set=mysqli_query($con,$sql_query);
            while($row=mysqli_fetch_row($result_set)) { ?>
            <tr>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><a href="javascript:edit_id('<?php echo $row[0]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
                <td><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
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