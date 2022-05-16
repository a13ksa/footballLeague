<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save'])) {
    // promenljive za unos podataka
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $drzavljanstvo = $_POST['drzavljanstvo'];
    $datumRodjenja = $_POST['datumRodjenja'];
    $idKluba = $_POST['idKluba'];

    // sql query for inserting data into database
    $sql_query = "INSERT INTO treneri(ime,prezime,drzavljanstvo,datumRodjenja, idKluba) VALUES('$ime','$prezime','$drzavljanstvo','$datumRodjenja','$idKluba')";

    //izvrsavanje upita
    if(mysqli_query($con,$sql_query)) { ?>
    <script>
        alert('Podatak je sacuvan ');
        window.location.href='treneri.php';
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
                <th align="center" colspan="6"><p>Unesite podatke</p></th>
            </tr>
            <tr>
                <td><input type="text" name="ime" placeholder="Ime" required /></td>
                <td><input type="text" name="prezime" placeholder="Prezime" required /></td>
                <td><input type="text" name="drzavljanstvo" placeholder="Drzavljanstvo" required /></td>
                <td><input type="date" name="datumRodjenja" placeholder="Datum rodjenja" required /></td>
                <td><input type="number" name="idKluba" placeholder="idKluba" required /></td>
                <th><button type="submit" name="btn-save"><strong>Sacuvaj</strong></button></th>
            </tr>
            <tr >
                <th align="center" colspan="6"><a href="treneri.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
            </form>
        </div>
    </div>
</center>
</body>
</html>