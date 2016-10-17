<?php

require_once 'Note.php';
require_once 'FileNoteRepository.php';

$noteRepo = new \agolash\p2\FileNoteRepository();

?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirmDeletion']) && !empty($_POST['id'])): ?>
  <?php
$noteId = isset($_POST['id']) ? $_POST['id'] : '';
$note = $noteRepo->getNoteById($noteId);
  ?>
  <!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="app.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <title>Confirm Deltetion</title>
  </head>
  <body>
    <div class="container-fluid app-font">
      <h1>Are you sure you want to delete this note :  "<?php print $note->getSubjectLine(); ?>" ?</h1>
      <div class="button-layout">
              <form action="delete.php" method="POST">
              <input type="hidden" name="noteId" value="<?php print $noteId; ?>">
              <button  class="button-layout" type="submit" value="Yes">Yes</button>
              </form>
        </div>
        <div class="button-layout">
              <a href="index.php"><button>Cancel</button></a>
        </div>

  </div>
  </body>
  </html>
<?php endif; ?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>
<?php
$noteRepo->deleteNote($_POST['noteId']);
 ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Delete Note</title>
    </head>
    <body>
      <div class="container-fluid app-font">
        <h1>Note Deleted</h1>
        <p><a href="index.php">Back to Note List</a></p>
    </div>
    </body>
    </html>
  <?php endif; ?>

  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['id']) && empty($_POST['noteId'])): ?>

    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    </head>
    <body>
      <div class="container-fluid app-font">
          <h1>No Note Selected for deletion</h1>
          <p><a href="index.php">Back to Note List</a></p>
      </div>
    </body>
    </html>
<?php endif; ?>
