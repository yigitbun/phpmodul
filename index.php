<?php require_once('templates/header.php'); ?>

<?php
$host = "localhost";
$username = "byigit";
$password = "hamm";
$database = "byigit";

// MySQLi(object-oriented)
// $conn = new mysqli($host, $username, $password);

// if ($conn->connect_error) {
//     die("Verbindung fehlgeschlagen : " . $conn->connect_error);
// } else {
//     echo 'Erfolgreich verbunden';
// }



// MySQLi(Prozedual)
// $conn = mysqli_connect($host, $username, $password);

// if (!$conn) {
//     die("Verbindung fehlgeschlagen : " . mysqli_connect_error());
// } else {
//     echo 'Erfolgreich verbunden';
// }
// 



// PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo 'Erfolgreich verbunden';
} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen";
}


?>

<div class="container">
    <h1 class="text-center display-1">Users</h1>
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Alter</th>
            <th>Position</th>
            <th>Aktiv</th>
            <th>Role_ID</th>
        </tr>
        <?php

        $sql = 'SELECT * FROM user_repository ORDER BY ID';
        foreach ($conn->query($sql) as $row) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['FORENAME'] . "</td>";
            echo "<td>" . $row['SURNAME'] . "</td>";
            echo "<td>" . $row['AGE'] . "</td>";
            echo "<td>" . $row['POSITION'] . "</td>";
            echo "<td>" . $row['ACTIVE'] . "</td>";
            echo "<td>" . $row['ROLE_ID'] . "</td>";
            echo "</tr>";
            echo "<br>";
        }


        ?>


    </table>
</div>
<br>
<br>
<br>
<br>
<div class="container" style="background-color:lightskyblue;">
    <?php
    $isTrue = True;

    if ($isTrue) {
        echo "die Bedienung ist wahr";
    }

    echo '<br>';
    var_dump($isTrue);
    ?>
</div>


<?php require_once('templates/footer.php'); ?>