
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
    <h1 class="text-center display-1">Rechner</h1>
    <form id="form" method="GET" action="">
        <input type="text" name="number1" value=""><br><br>
        <input type="text" name="number2" value=""><br><br>

        <input type="submit" name="add" value="Addieren" ><br><br>
        <input type="submit" name="sub" value="Subtraktion" ><br><br>
        <input type="submit" name="mul" value="Multiplieren " ><br><br>
        <input type="submit" name="div" value="Dividieren" ><br><br>


        <!-- <div class="mb-3">
            <label for="nummer1" class="form-label">Nummer 1</label>
            <input type="submit" class="form-control" id="nummer1" name="nummer1" aria-describedby="erstenummer">
        </div> -->


    </form>
    <?php

    if (isset($_GET['number1']) && isset($_GET['number2'])) {

        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];

        $add = $number1 + $number2;
        $sub = $number1 - $number2;
        $mul = $number1 * $number2;
        $div = $number1 / $number2;

        echo "Das Ergebnis Lautet: ";

        if (isset($_GET['add'])) {
            echo "<br>" . $add;
        } elseif (isset($_GET['sub'])) {
            echo "<br>" . $sub;
        } elseif (isset($_GET['mul'])) {
            echo "<br>" . $mul;
        } elseif (isset($_GET['div'])) {
            echo "<br>" . $div;
        }
    } else {
        echo 'Bitte geben Sie eine Nummer ein';
    }
    ?>
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