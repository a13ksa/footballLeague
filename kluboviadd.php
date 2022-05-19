<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save'])) {
    // promenljive za unos podataka
    $naziv = $_POST['naziv'];
    $grad = $_POST['grad'];
    $drzava = $_POST['drzava'];
    $godinaOsnivanja = $_POST['godinaOsnivanja'];
    $koef = $_POST['koef'];

    // sql query for inserting data into database
    $sql_query = "INSERT INTO klubovi(naziv,grad,drzava,godinaOsnivanja,koef) VALUES('$naziv','$grad','$drzava','$godinaOsnivanja','$koef')";

    //izvrsavanje upita
    if(mysqli_query($con,$sql_query)) { ?>
    <script>
        alert('Podatak je sacuvan ');
        window.location.href='klubovi.php';
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
                <td><input type="text" name="naziv" placeholder="Naziv" required /></td>
                <td><input type="text" name="grad" placeholder="Grad" required /></td>
                <td><input type="text" name="drzava" placeholder="Drzava" required /></td>
                <td><input type="number" name="godinaOsnivanja" placeholder="Godina osnivanja" required /></td>
                <td><input type="number" name="koef" placeholder="koef" required /></td>
                <th><button type="submit" name="btn-save"><strong>Sacuvaj</strong></button></th>
            </tr>
            <tr >
                <th align="center" colspan="6"><a href="klubovi.php">Povratak na glavnu stranicu</a></th>
            </tr>
            </table>
            </form>
        </div>
    </div>
</center>
</body>
</html>