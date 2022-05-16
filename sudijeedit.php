<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id'])) {
    $sql_query="SELECT * FROM sudije WHERE idSudije=".$_GET['edit_id'];
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_assoc($result_set);
}
if(isset($_POST['btn-update'])) {
    // variables for input data
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $drzavljanstvo = $_POST['drzavljanstvo'];
    $datumRodjenja = $_POST['datumRodjenja'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE sudije SET ime='$ime',prezime='$prezime',drzavljanstvo='$drzavljanstvo',datumRodjenja='$datumRodjenja' WHERE idSudije=".$_GET['edit_id'];
    // sql query for update data into database
 
    // sql query execution function
    if(mysqli_query($con,$sql_query)) {
    ?>
    <script>
        alert('Promena je uspesno sacuvana!');
        window.location.href='sudije.php';
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
            <th align="center" colspan="5"><p>Promenite podatke</p></th>
        </tr>
        <tr>
            <td><input type="text" name="ime" placeholder="Ime" value="<?php echo $fetched_row['ime']; ?>" required /></td>
            <td><input type="text" name="prezime" placeholder="Prezime" value="<?php echo $fetched_row['prezime']; ?>" required /></td>
            <td><input type="text" name="drzavljanstvo" placeholder="Drzavljanstvo" value="<?php echo $fetched_row['drzavljanstvo']; ?>" required /></td>
            <td><input type="date" name="datumRodjenja" placeholder="Datum rodjenja" value="<?php echo $fetched_row['datumRodjenja']; ?>" required /></td>
            <th><button type="submit" name="btn-update"><strong>PROMENI</strong></button></th>
        </tr>
        <tr>
            <th align="center" colspan="5"><a href="sudije.php">Povratak na glavnu stranicu</a></th>
        </tr>
        </table>
        </form>
    </div>
</div>

</center>
</body>
</html>