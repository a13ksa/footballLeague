<html>
<head>
    <title>CRUD Operacije</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="row">
        <div class="box"></div>
    </div>
    <div class="row">
        <div class="box"></div>
        <div class="box"></div>
    </div>
    <div class="row">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div> 
        <div class="box"></div>
    </div>
    <div class="row">
        <?php
        $sql_query="SELECT * 
                    FROM klubovi 
                    ORDER BY RAND() 
                    LIMIT 16";
        $result_set=mysqli_query($con,$sql_query);
        while($row=mysqli_fetch_assoc($result_set)) { ?>
        <div class="box"></div>
        <?php } ?>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>
</body>
</html>