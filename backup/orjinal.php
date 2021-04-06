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

        <form method="GET">
            <div class="mb-3">
                <label for="firstname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Nachname</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Geburtsdatum</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

            <div class="mb-3">
                <label for="specialty" class="form-label"></label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select Menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email-Adresse</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Wir werden Ihre E-Mail niemals an Dritte weitergeben.</div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefonnummer</label>
                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                <div id="phoneHelp" class="form-text">Wir werden Ihre Nummer niemals an Dritte weitergeben.</div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button class=" btn btn-primary" type="submit" name="submit">Button</button>
            </div>
        </form>


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