<?php 
    $user = "root";
    $pass = "";
    $host="localhost";
    $db_db = "wp";
    $code = "";

    if (isset($_POST["connect"])) {
        try {
            $cone = new PDO("mysql:host=$host;dbname=$db_db", $user,$pass);
            $cone -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $code = "Database Connected succesefully";
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

        <button type="submit" name="connect">connect</button>
        <p><?php echo $code; ?></p>

    </form>
</body>
</html>