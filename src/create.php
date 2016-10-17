<?php
require_once 'Note.php';
require_once 'FileNoteRepository.php';

//Shortend Post variable names if set
$noteSubject = isset($_POST['subjectLine']) ? trim(htmlspecialchars($_POST['subjectLine'])) : '';
$noteBody = isset($_POST['noteBody']) ? trim(htmlspecialchars($_POST['noteBody'])) : '';
$noteAuthor = isset($_POST['authorName']) ? trim(htmlspecialchars($_POST['authorName'])) : '';
$noteChrCount=0;
date_default_timezone_set("America/Chicago");
$dateCreated= date('l F d, Y, g:i:s a');

//Validate form fields
$formIsValid = true;
$subjectLineErr = '';
$authotNameErr = '';
if (empty($noteSubject)){
    $formIsValid = false;
    $subjectLineErr = '<span style="color: #f00;">Subject Line is required!</span>';
}
if (empty($noteAuthor)){
    $formIsValid = false;
    $authotNameErr = '<span style="color: #f00;">Author name is required!</span>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Add a new note</title>
</head>
<body>
  <div class="container-fluid">
    <div class="col-md-6 show-layout app-font">
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <?php if ($formIsValid): ?>
            <?php
            $noteRepo = new \agolash\p2\FileNoteRepository();
            $note = new \agolash\p2\Note();
            $note->setSubjectLine($noteSubject);
            $note->setNoteBody($noteBody);
            $note->setAuthorName($noteAuthor);
            $noteChrCount=Strlen($noteBody);
            $note->setNoteChrCount($noteChrCount);
            $note->setDateCreated($dateCreated);
            $noteRepo->saveNote($note);
            ?>
            <h1>New note Created</h1>
            <p><strong>Subject Line: </strong> <?php print $noteSubject; ?></p>
            <p><strong>Note Body: </strong> <?php print $noteBody; ?></p>
            <p><strong>Author Name: </strong> <?php print $noteAuthor; ?></p>
            <p><strong>Created On: </strong> <?php print $dateCreated; ?></p>
            <p><strong>Character Count: </strong> <?php print $noteChrCount; ?></p>
            <p><a href="index.php">Show All Notes</a></p>
        <?php else: ?>
            <h1>Create New Note</h1>
            <form method="post" action="create.php">
              <p><strong>Subject Line: </strong><input type="text" name="subjectLine" value="<?php print $noteSubject; ?>"></p><?php print $subjectLineErr; ?><br>
              <p><strong>Note Body : </strong><textarea type="text" name="noteBody"><?php print $noteBody; ?></textarea></p><br>
              <p><strong>Author Name: </strong><input type="text" name="authorName" value="<?php print $noteAuthor; ?>"></p><?php print $authotNameErr; ?><br>
              <input type="submit" value="Save Note">
            </form>
        <?php endif; ?>
    <?php else: ?>
    <h1>Create New Note</h1>
        <form method="post" action="create.php">
            <p><strong>Subject Line: </strong><input type="text" name="subjectLine" placeholder="Enter Subject line"></p><br>
            <p><strong>Note Body : </strong><textarea type="text" name="noteBody" placeholder="Enter note body"></textarea></p><br>
            <p><strong>Author Name: </strong><input type="text" name="authorName" placeholder="Enter authot name"></p><br>
            <input type="submit" value="Save Note">
        </form>
        <br>
    <?php endif; ?>
    </div>
  </div>
</body>
</html>
