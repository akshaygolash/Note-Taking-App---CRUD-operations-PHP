<?php

require_once 'Note.php';
require_once 'FileNoteRepository.php';

$noteRepo = new \agolash\p2\FileNoteRepository();

?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

    <?php

    // Came from show page based on id parameter
    $note = $noteRepo->getNoteById($_POST['id']);
     ?>
    <link rel="stylesheet" href="app.css">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <div class="container-fluid">
       <div class="col-md-6 show-layout app-font">
         <h1>Edit Note</h1>
            <form method="post" action="edit.php">
                <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">
                <p><strong>Subject Line: </strong> <input type="text" name="subjectLine" value="<?php print $note->getSubjectLine(); ?>"></p><br>
                <p><strong>Note Body:  </strong><textarea type="text" name="noteBody"><?php print $note->getNoteBody(); ?></textarea></p><br>
                <p><strong>Author Name: </strong> <input type="text" name="authorName" value="<?php print $note->getAuthorName(); ?>"></p><br>
                <input type="submit" value="Save Note">
            </form>
          </div>
        </div>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>

    <?php
    // Process edit form
    //Shortend Post variable names if set
    $noteSubject = isset($_POST['subjectLine']) ? trim(htmlspecialchars($_POST['subjectLine'])) : '';
    $noteBody = isset($_POST['noteBody']) ? trim(htmlspecialchars($_POST['noteBody'])) : '';
    $noteAuthor = isset($_POST['authorName']) ? trim(htmlspecialchars($_POST['authorName'])) : '';
    $noteChrCount=0;
    date_default_timezone_set("America/Chicago");
    $dateUpdated= date('l F d, Y, g:i:s a');

    //Validate form fields
    $formIsValid = true;
    $subjectLineErr = '';
    $authotNameErr = '';
    if (empty($noteSubject)){
        $formIsValid = false;
        $subjectLineErr = '<span style="color: #f00;">Subject line is required!</span>';
    }
    if (empty($noteAuthor)){
        $formIsValid = false;
        $authotNameErr = '<span style="color: #f00;">Author name is required!</span>';
    }
    ?>
    <?php if ($formIsValid): ?>
        <?php
        //Process valid data and save note update
        $aNote = $noteRepo->getNoteById($_POST['noteId']);
        $aNote->setSubjectLine($noteSubject);
        $aNote->setNoteBody($noteBody);
        $aNote->setAuthorName($noteAuthor);
        $noteChrCount=Strlen($noteBody);
        $aNote->setNoteChrCount($noteChrCount);
        $aNote->setDateUpdated($dateUpdated);
        $noteRepo->saveNote($aNote);
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="app.css">
        		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <title>Update Note</title>
        </head>
        <body>
          <div class="container-fluid app-font">
            <h1>Note Updated</h1>
            <p><a href="index.php">Back to Note List</a></p>
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
            <title>Update Note</title>
        </head>
        <body>
          <div class="container-fluid">
            <div class="col-md-6 show-layout app-font">
              <h1>Edit Note</h1>
              <form method="post" action="edit.php">
                <input type="hidden" name="noteId" value="<?php print $_POST['noteId']; ?>">
                <p><strong>Subject Line: </strong><input type="text" name="subjectLine" value="<?php print $noteSubject; ?>"></p><?php print $subjectLineErr; ?><br>
                <p><strong>Note Body: </strong><textarea type="text" name="noteBody"><?php print $noteBody; ?></textarea></p><br>
                <p><strong>Author Name: </strong><input type="text" name="authorName" value="<?php print $noteAuthor; ?>"></p><?php print $authotNameErr; ?><br>
                <input type="submit" value="Save Note">
              </form>
            </div>
          </div>
        </body>
        </html>
    <?php endif; ?>

<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    </head>
    <body>
      <div class="container-fluid">
      <h1 class="app-font">No Note Selected for Editing</h1>
      <p class="app-font"><a href="index.php">Back to Note List</a></p>
      </div>
    </body>
    </html>
<?php endif;?>
