<?php

require_once 'FileNoteRepository.php';
require_once 'Note.php';

$noteRepo = new \agolash\p2\FileNoteRepository();

//Shortend Get variable names if set
$noteId = isset($_GET['id']) ? $_GET['id'] : '';

$note = $noteRepo->getNoteById($noteId);

?>

<?php if ($note): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Show Note <?php print $note->getSubjectLine(); ?></title>
</head>
<body>
  <div class="container-fluid">
    <div class="col-md-4 show-layout app-font">
    <h2>Note details: </h2>
    <p><strong>Subject Line: </strong><?php print $note->getSubjectLine();?></p>
    <p><strong>Note Body: </strong><?php print $note->getNoteBody();?></p>
    <p><strong>Author Name: </strong><?php print $note->getAuthorName();?></p>
    <p><strong>Character Count: </strong><?php print $note->getNoteChrCount();?></p>
    <p><strong>Date created: </strong><?php print $note->getDateCreated();?></p>
    <p><strong>Date updated: </strong><?php print $note->getDateUpdated();?></p>
    <p>

        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php print $note->getId();?>">
            <input type="submit" value="Edit Note">
        </form>
    </p>
    <p>
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?php print $note->getId();?>">
            <input type="hidden" name="confirmDeletion" value="sendToConfirmation">
            <input type="submit" value="Delete Note">
        </form>
    </p>
  </div>
  </div>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>No Note To Show</title>
</head>
<body>
<h1 class="app-font">No Note Found</h1>
  <a class="app-font"href="index.php">Back to Note List</a>
</body>
</html>
<?php endif; ?>
