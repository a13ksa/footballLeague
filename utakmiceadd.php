<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save'])) {
    // promenljive za unos podataka
    $vreme = $_POST['vreme'];
    $idTima1 = $_POST['idTima1'];
    $idTima2 = $_POST['idTima2'];
    $goloviDomaci = $_POST['goloviDomaci'];
    $goloviGosti = $_POST['goloviGosti'];
    $idSudije = $_POST['idSudije'];
    $sezona = $_POST['sezona'];

    // sql query for inserting data into database
    $sql_query = "INSERT INTO utakmice(vreme,idTima1,idTima2,goloviDomaci,goloviGosti,idSudije,sezona) VALUES('$vreme','$idTima1','$idTima2','$goloviDomaci','$goloviGosti','$idSudije','$sezona')";

    //izvrsavanje upita
    if(mysqli_query($con,$sql_query)) { ?>
    <script>
        alert('Podatak je sacuvan ');
        window.location.href='utakmice.php';
    </script>
    <?php }
    else { ?>
    <script>
        alert('Greska! Podatak nije dodat! ');
    </script>
    <?php }
    // sql query execution function
}
?>
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
                <th align="center" colspan="8"><p>Unesite podatke</p></th>
            </tr>
            <tr>
                <td><input type="datetime" name="vreme" placeholder="vreme" required /></td>
                <td><input type="number" name="idTima1" placeholder="idTima1" required /></td>
                <td><input type="number" name="idTima2" placeholder="idTima2" required /></td>
                <td><input type="number" name="goloviDomaci" placeholder="goloviDomaci" required /></td>
                <td><input type="number" name="goloviGosti" placeholder="goloviGosti" required /></td>
                <td><input type="number" name="idSudije" placeholder="idSudije" required /></td>
                <td><input type="number" name="sezona" placeholder="sezona" required /></td>
                <th><button type="submit" name="btn-save"><strong>Sacuvaj</strong></button></th>
            </tr>
            <tr >
                <th align="center" colspan="8"><a href="utakmice.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
            </form>
        </div>
    </div>
</center>
</body>
</html>