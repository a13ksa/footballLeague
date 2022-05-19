<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id'])) {
    $sql_query="SELECT *
                FROM `utakmice`
                WHERE idUtakmice=".$_GET['edit_id'];
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_assoc($result_set);
}
if(isset($_POST['btn-update'])) {
    // variables for input data
    $vreme = $_POST['vreme'];
    $idTima1 = $_POST['idTima1'];
    $idTima2 = $_POST['idTima2'];
    $goloviDomaci = $_POST['goloviDomaci'];
    $goloviGosti = $_POST['goloviGosti'];
    $idSudije = $_POST['idSudije'];
    $sezona = $_POST['sezona'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE utakmice 
                  SET vreme='$vreme',idTima1='$idTima1',idTima2='$idTima2',goloviDomaci='$goloviDomaci',goloviGosti='$goloviGosti',idSudije='$idSudije',sezona='$sezona' 
                  WHERE idUtakmice=".$_GET['edit_id'];
    // sql query for update data into database
 
    // sql query execution function
    if(mysqli_query($con,$sql_query)) {
    ?>
    <script>
        alert('Promena je uspesno sacuvana!');
        window.location.href='utakmice.php';
    </script>
    <?php
    } else {
    ?>
    <script>
        alert('Greska! Podatak nije dodat!');
    </script>
    <?php }
 // sql query execution function
} ?>
<html>
<head>
    <title>CRUD Operacije</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<center>
<div id="body">
    <div id="content">
        <form method="post">
        <table align="center">
        <tr >
            <th align="center" colspan="9"><p>Promenite podatke</p></th>
        </tr>
        <tr>
            <td><input type="datetime" name="vreme" placeholder="vreme" value="<?php echo $fetched_row['vreme']; ?>" required /></td>
            <td><input type="number" name="idTima1" placeholder="idTima1" value="<?php echo $fetched_row['idTima1']; ?>" required /></td>
            <td><input type="number" name="idTima2" placeholder="idTima2" value="<?php echo $fetched_row['idTima2']; ?>" required /></td>
            <td><input type="number" name="goloviDomaci" placeholder="goloviDomaci" value="<?php echo $fetched_row['goloviDomaci']; ?>" required /></td>
            <td><input type="number" name="goloviGosti" placeholder="goloviGosti" value="<?php echo $fetched_row['goloviGosti']; ?>" required /></td>
            <td><input type="number" name="goloviGosti" placeholder="goloviGosti" value="<?php echo $fetched_row['goloviGosti']; ?>" required /></td>
            <td><input type="number" name="idSudije" placeholder="idSudije" value="<?php echo $fetched_row['idSudije']; ?>" required /></td>
            <td><input type="number" name="sezona" placeholder="sezona" value="<?php echo $fetched_row['sezona']; ?>" required /></td>
            <th><button type="submit" name="btn-update"><strong>PROMENI</strong></button></th>
        </tr>
        <tr>
            <th align="center" colspan="9"><a href="utakmice.php">Povratak na glavnu stranicu</a></th>
        </tr>
        </table>
        </form>
    </div>
</div>

</center>
</body>
</html>