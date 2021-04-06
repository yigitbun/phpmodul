<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $dbHost = 'localhost';
  $dbName = 'library';
  $dbUser = 'root';
  $dbPassword = 'root';
  $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

  // new book creation
  if (isset($_POST['new_book_submit'])) {
    $newBookTitle = filter_var($_POST['new_book_title'], FILTER_SANITIZE_STRING);
    $newBookDescription = filter_var($_POST['new_book_description'], FILTER_SANITIZE_STRING);
    $newBookPublishingYear = filter_var($_POST['new_book_publishing_year'], FILTER_SANITIZE_NUMBER_INT);
    $newBookPublisher = filter_var($_POST['new_book_publisher'], FILTER_SANITIZE_NUMBER_INT);
    $newBookAcceptance = (isset($_POST['new_book_acceptance'])) ? true : false;

    if ($newBookAcceptance) {
      $publisherDBQuery = "SELECT id FROM publisher WHERE id = $newBookPublisher";
      $result = $conn->query($publisherDBQuery);

      if ($result->num_rows == 1) {
        $result->free();

        $newBookQuery = "INSERT INTO books(title, description, publishing_year, publisher_id) VALUES ('$newBookTitle', '$newBookDescription', '$newBookPublishingYear', '$newBookPublisher')";
        if ($conn->query($newBookQuery) == true) {
          echo 'Neues Buch: '.$newBookTitle.' wurde erfolgreich angelegt.';
        }
      }
    }
  }

  // new book creation
  if (isset($_POST['update_book_submit'])) {
    $updateBookId = filter_var($_POST['update_book_id'], FILTER_SANITIZE_NUMBER_INT);
    $updateBookTitle = filter_var($_POST['update_book_title'], FILTER_SANITIZE_STRING);
    $updateBookDescription = filter_var($_POST['update_book_description'], FILTER_SANITIZE_STRING);
    $updateBookPublishingYear = filter_var($_POST['update_book_publishing_year'], FILTER_SANITIZE_NUMBER_INT);
    $updateBookPublisher = filter_var($_POST['update_book_publisher'], FILTER_SANITIZE_NUMBER_INT);
    $updateBookAcceptance = (isset($_POST['update_book_acceptance'])) ? true : false;

    if ($updateBookAcceptance) {
      $publisherDBQuery = "SELECT id FROM publisher WHERE id = $updateBookPublisher";
      $result = $conn->query($publisherDBQuery);

      if ($result->num_rows == 1) {
        $result->free();

        $updateBookQuery = "UPDATE books SET title = '$updateBookTitle', description = '$updateBookDescription', publishing_year = '$updateBookPublishingYear', publisher_id = '$updateBookPublisher' WHERE id = '$updateBookId'";
        if ($conn->query($updateBookQuery) == true) {

          echo 'Das Buch: '.$updateBookTitle.' wurde erfolgreich bearbeitet.';
        }
      }
    }
  }

  if (isset($_POST['delete'])) {
    if (isset($_POST['book_id'])) {
      $bookId = filter_var($_POST['book_id'], FILTER_SANITIZE_NUMBER_INT);
      $bookDBQuery = "SELECT id FROM books WHERE id = $bookId";
      $result = $conn->query($bookDBQuery);

      if ($result->num_rows == 1) {
        $result->free();

        $deleteBookQuery = "DELETE FROM books WHERE id = $bookId";
        if ($conn->query($deleteBookQuery) == true) {
          echo 'Das Buch wurde erfolgreich gelöscht.';
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bücher</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<body>
  <main class="py-5">
    <div class="container mb-5">
      <header class="mb-5">
        <h1>Unsere Bibliothek</h1>
      <p>Das hier ist unsere öffentliche Bibliothek. Unten haben wir dir eine Übersicht aller unserer Bücher aufgebaut.</p>
      <a href="#unsere-buecher" class="btn btn-primary">Zu den Büchern</a>
      </header>
      <form class="border p-4 mb-4" method="POST">
        <h2>Neues Buch anlegen</h2>
        <p>Mit dem untenstehenden Formular kannst du ein neues Buch zu unserer Bibliothek hinzufügen.</p>
        <div class="mb-4">
          <label for="new_book_title" class="form-label">Buchtitel</label>
          <input type="text" class="form-control" id="new_book_title" name="new_book_title" aria-describedby="new_book_title_help" required>
        </div>
        <div class="mb-4">
          <label for="new_book_description" class="form-label">Kurzbeschreibung</label>
          <textarea class="form-control" name="new_book_description" placeholder="Gebe hier eine kurze Beschreibung des Buches ein (max. 150 Zeichen)." id="new_book_description" required></textarea>
        </div>
        <div class="mb-4">
          <label for="new_book_publishing_year" class="form-label">Jahr der Veröffentlichung</label>
          <input type="number" class="form-control" id="new_book_publishing_year" name="new_book_publishing_year" aria-describedby="new_book_title_help" required>
        </div>
        <div class="mb-4">
          <label for="new_book_publisher" class="form-label">Verlag</label>
          <select class="form-select" id="new_book_publisher" name="new_book_publisher" aria-label="Verlagsauswahl für das neue Buch" required>
<?php
  $publisherQuery = 'SELECT id, title FROM publisher';
  $result = $conn->query($publisherQuery);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
    }
  }
  $result->free();
?>
          </select>
        </div>
        <div class="mb-4 form-check">
          <input type="checkbox" class="form-check-input" id="new_book_acceptance" name="new_book_acceptance" required>
          <label class="form-check-label" for="new_book_acceptance">Die in diesem Formular eingegebene Daten werden verwendet, um ein neues Buch in unserer Datenbank anzulegen. Die Daten sind durch Absenden des Formular für die Öffentlichkeit einsehbar.</label>
        </div>
        <button type="submit" class="btn btn-primary" name="new_book_submit">Neues Buch erstellen</button>
      </form>

      <form class="border p-4 mb-4" method="POST">
        <h2>Vorhandenes Buch bearbeiten</h2>
        <p>Mit dem untenstehenden Formular kannst du ein vorhandenes Buch bearbeiten.</p>
        <select class="form-select" id="update_book_id" name="update_book_id" required>
<?php
  $allBookIds = 'SELECT id, title FROM books';
  $result = $conn->query($allBookIds);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
    }
  }
  $result->free();
?>
          </select>
        <div class="mb-4">
          <label for="update_book_title" class="form-label">Buchtitel</label>
          <input type="text" class="form-control" id="update_book_title" name="update_book_title" required>
        </div>
        <div class="mb-4">
          <label for="update_book_description" class="form-label">Kurzbeschreibung</label>
          <textarea class="form-control" name="update_book_description" placeholder="Gebe hier eine kurze Beschreibung des Buches ein (max. 150 Zeichen)." id="update_book_description" required></textarea>
        </div>
        <div class="mb-4">
          <label for="update_book_publishing_year" class="form-label">Jahr der Veröffentlichung</label>
          <input type="number" class="form-control" id="update_book_publishing_year" name="update_book_publishing_year" aria-describedby="update_book_title_help" required>
        </div>
        <div class="mb-4">
          <label for="update_book_publisher" class="form-label">Verlag</label>
          <select class="form-select" id="update_book_publisher" name="update_book_publisher" aria-label="Verlagsauswahl für das neue Buch" required>
<?php
  $publisherQuery = 'SELECT id, title FROM publisher';
  $result = $conn->query($publisherQuery);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
    }
  }
  $result->free();
?>
          </select>
        </div>
        <div class="mb-4 form-check">
          <input type="checkbox" class="form-check-input" id="update_book_acceptance" name="update_book_acceptance" required>
          <label class="form-check-label" for="update_book_acceptance">Die in diesem Formular eingegebene Daten werden verwendet, um ein neues Buch in unserer Datenbank anzulegen. Die Daten sind durch Absenden des Formular für die Öffentlichkeit einsehbar.</label>
        </div>
        <button type="submit" class="btn btn-primary" name="update_book_submit">Buch aktualisieren</button>
      </form>

    </div>
    <div id="unsere-buecher" class="container">
      <h2 class="mb-4">Unsere Bücher</h2>
      <div class="row">
<?php
  $allBooksQuery = 'SELECT b.id as bookId, b.title, description, b.publishing_year, b.publisher_id, p.title as publisherTitle FROM books b, publisher p WHERE b.publisher_id = p.id';
  $result = $conn->query($allBooksQuery);

  if ($result->num_rows > 0) :
    while ($row = $result->fetch_assoc()) :
?>
        <div class="col-sm-6 col-lg-3">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title"><?=$row['title']?></h5>
              <p class="card-text"><?=$row['description']?></p>
              <p class="card-text"><?=$row['publishing_year']?></p>
              <p class="card-text"><?=$row['publisherTitle']?></p>
              <form action="" method="POST">
                <input type="hidden" name="book_id" value="<?=$row['bookId']?>">
                <div class="row">
                  <div class="col-12">
                    <!-- <input type="submit" name="update" class="btn btn-outline-primary" value="Bearbeiten"> -->
                  </div>
                  <div class="col-12 mt-2">
                    <input type="submit" name="delete" class="btn btn-outline-danger" value="Löschen">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
<?php
    endwhile;
  endif;
  $result->free();
?>
      </div>
    </div>
  </main>
</body>
</html>