<?php 
    $user = "root";
    $pass = "";
    $host = "localhost";
    $db_db = "wp";
    $code = "";

    if (isset($_POST["send"])) {
        try {
            $conne = new PDO("mysql:host=$host;dbname=$db_db", $user, $pass);
            $conne -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pre = $conne->prepare("INSERT INTO acc (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");

            $pre->bindParam(':firstname', $firstname);
            $pre->bindParam(':lastname', $lastname);
            $pre->bindParam(':email', $email);

            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            $email = $_POST["email"];

            $pre->execute();

            $code = "DATA inserted succesefully :)";

        } catch (PDOException $er) {
            $code = "DATA inserted failed {$er->getMessage()}";
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
        <label for="fname">
            First Name : <input type="text" name="fname">
        </label>
        <label for="lname">
            Last Name : <input type="text" name="lname">
        </label>
        <label for="email">
            Email : <input type="email" name="email">
        </label>

        <button type="submit" name="send">INSERT</button>

        <p><?php echo $code; ?></p>
    </form>
</body>
</html>