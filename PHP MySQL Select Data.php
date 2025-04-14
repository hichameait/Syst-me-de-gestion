<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db_db = "wp";
        $code = "";

        try {
            $connec = new PDO("mysql:host=$host;dbname=$db_db", $user, $pass);
            $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $connec->prepare("SELECT * FROM acc ORDER BY id DESC");
            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            echo "<table> <tr> <th>ID</th> <th>Firstname</th> <th>lastname</th> <th>email</th> </tr>";

            foreach ($sql->fetchAll() as $value) {
                echo "
                <tr>
                    <td>{$value['id']}</td>
                    <td>{$value['firstname']}</td>
                    <td>{$value['lastname']}</td>
                    <td>{$value['email']}</td>
                </tr>";

            };
            echo "</table>";
            $code = "DATA INSERTED SUCCESEFULLY";

        } catch (PDOException $er) {
            $code = "DATA ERROR : {$er->getMessage()}";
        }
    
    ?>
</body>
</html>