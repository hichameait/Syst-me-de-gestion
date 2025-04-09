<?php 
    $user = "root";
    $pass = "";
    $host="localhost";
    $db_db = "wp";
    $code = "";

    if (isset($_POST["send"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $fname2 = $_POST["fname2"];
        $lname2 = $_POST["lname2"];
        $email2 = $_POST["email2"];

        try {
            $cone = new PDO("mysql:host=$host;dbname=$db_db", $user,$pass);
            $cone -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO acc (firstname, lastname, email) VALUES ('$fname','$lname','$email'),('$fname2','$lname2','$email2')";
            $cone->exec($sql);
            $code = "Multy Data inserted succesefully";
            $last_id = $cone->lastInsertId();

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
        <label for="firstname">
            First Name : <input type="text" name="fname">
        </label>
        <br>
        <label for="lastname">
            Last Name : <input type="text" name="lname">
        </label>
        <br>
        <label for="email">
           email : <input type="email" name="email">
        </label>
        <br>
        <label for="firstname2">
            First Name 2 : <input type="text" name="fname2">
        </label>
        <br>
        <label for="lastname2">
            Last Name 2: <input type="text" name="lname2">
        </label>
        <br>
        <label for="email2">
           email 2 : <input type="email" name="email2">
        </label>
        <br>
        <button type="submit" name="send">INSERT</button>
        <p><?php echo $code; ?></p>
    </form>
</body>
</html>