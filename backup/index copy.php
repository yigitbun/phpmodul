<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">

    <title>Aufgabe</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Produkt</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="viewrecords.php">Beispiel seite</a>
                    </div>
                </div>
            </div>
        </nav>

        <h1 class="text-center">Produkt Form</h1>



        <form id="form" method="GET" action="">
            <input type="text" name="number1" value=""><br><br>
            <input type="text" name="number2" value=""><br><br>

            <input type="submit" name="add" value="Addieren" style="background:lightgrey;width:100px;height:30px"><br><br>
            <input type="submit" name="sub" value="Subtraktion" style="background:lightgrey;width:100px;height:30px"><br><br>
            <input type="submit" name="mul" value="Multiplieren " style="background:lightgrey;width:100px;height:30px"><br><br>
            <input type="submit" name="div" value="Dividieren" style="background:lightgrey;width:100px;height:30px"><br><br>
        </form>
        <?php
        if (isset($_GET['number1']) && isset($_GET['add']) && isset($_GET['number2'])) {
            $number1 = $_GET['number1'];
            $number2 = $_GET['number2'];

            $add = $number1 + $number2;

            echo "Das Ergebnis Lautet";
            echo "<br>" . $add;
        } elseif (isset($_GET['number1']) && isset($_GET['sub']) && isset($_GET['number2'])) {
            $number1 = $_GET['number1'];
            $number2 = $_GET['number2'];

            $sub = $number1 - $number2;
            echo "Das Ergebnis Lautet";
            echo "<br>" . $sub;
        } elseif (isset($_GET['number1']) && isset($_GET['mul']) && isset($_GET['number2'])) {
            $number1 = $_GET['number1'];
            $number2 = $_GET['number2'];

            $mul = $number1 * $number2;

            echo "Das Ergebnis Lautet";
            echo "<br>" . $mul;
        } elseif (isset($_GET['number1']) && isset($_GET['div']) && isset($_GET['number2'])) {
            $number1 = $_GET['number1'];
            $number2 = $_GET['number2'];

            $div = $number1 / $number2;

            echo "Das Ergebnis Lautet";
            echo "<br>" . $div;
        }
        ?>


        <div id="footer">
            <?php echo 'Copyright ' . date('Y'); ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#dob").datepicker();
            });
        </script> -->
</body>

</html>