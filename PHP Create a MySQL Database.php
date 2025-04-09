<?php 
    $user = "root";
    $pass = "";
    $host="localhost";
    $db_db = "wp";
    $code = "";

    if (isset($_POST["create"])) {
        try {
            $cone = new PDO("mysql:host=$host", $user,$pass);
            $cone -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mysql = "CREATE DATABASE {$db_db}";
            $cone->exec($mysql);
            $code = "Database Created succesefully";
        } catch (PDOException $er) {
            $code = "Error : {$er->getMessage()}";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <button type="submit" name="create">Create Database</button>
        <p><?php echo $code; ?></p>

    </form>
</body>
</html>