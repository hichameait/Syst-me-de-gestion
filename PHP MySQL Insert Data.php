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

        try {
            $cone = new PDO("mysql:host=$host;dbname=$db_db", $user,$pass);
            $cone -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO acc (firstname, lastname, email) VALUES ('$fname','$lname','$email')";
            $cone->exec($sql);
            $code = "Data inserted succesefully";

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
        <label for="lastname">
            Last Name : <input type="text" name="lname">
        </label>
        <label for="email">
           email : <input type="email" name="email">
        </label>
        <button type="submit" name="send">INSERT</button>
        <p><?php echo $code; ?></p>
    </form>
</body>
</html>