<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id'])) {
    $sql_query="SELECT * FROM klubovi WHERE idKluba=".$_GET['edit_id'];
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_assoc($result_set);
}
if(isset($_POST['btn-update'])) {
    // variables for input data
    $naziv = $_POST['naziv'];
    $grad = $_POST['grad'];
    $drzava = $_POST['drzava'];
    $godinaOsnivanja = $_POST['godinaOsnivanja'];
    $koef = $_POST['koef'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE klubovi SET naziv='$naziv',grad='$grad',drzava='$drzava',godinaOsnivanja='$godinaOsnivanja',koef='$koef' WHERE idKluba=".$_GET['edit_id'];
    // sql query for update data into database
 
    // sql query execution function
    if(mysqli_query($con,$sql_query)) {
    ?>
    <script>
        alert('Promena je uspesno sacuvana!');
        window.location.href='klubovi.php';
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
            <th align="center" colspan="6"><p>Promenite podatke</p></th>
        </tr>
        <tr>
            <td><input type="text" name="naziv" placeholder="Naziv" value="<?php echo $fetched_row['naziv']; ?>" required /></td>
            <td><input type="text" name="grad" placeholder="Grad" value="<?php echo $fetched_row['grad']; ?>" required /></td>
            <td><input type="text" name="drzava" placeholder="Drzava" value="<?php echo $fetched_row['drzava']; ?>" required /></td>
            <td><input type="number" name="godinaOsnivanja" placeholder="Godina osnivanja" value="<?php echo $fetched_row['godinaOsnivanja']; ?>" required /></td>
            <td><input type="number" name="koef" placeholder="koef" value="<?php echo $fetched_row['koef']; ?>" required /></td>
            <th><button type="submit" name="btn-update"><strong>PROMENI</strong></button></th>
        </tr>
        <tr>
            <th align="center" colspan="6"><a href="klubovi.php">Povratak na glavnu stranicu</a></th>
        </tr>
        </table>
        </form>
    </div>
</div>

</center>
</body>
</html>