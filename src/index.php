<?php

require_once 'FileNoteRepository.php';
require_once 'Note.php';

$noteRepo = new \agolash\p2\FileNoteRepository();

$noteList = $noteRepo->getAllNotes();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Note List</title>
		<link rel="stylesheet" href="app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container-fluid">
		<h1 class="app-font">Note Taking Application</h1>
				<a href="create.php"><button type="button" class="btn btn-primary app-font"><span class="glyphicon glyphicon-plus"></span> Add New Note</button></a>
				<h3 class="app-font" >All Notes</h3>
			<table class="table table-bordered app-font">
	    <tr>
	        <th>Subject Line</th>
	        <th>Number of characters in the note</th>
					<th>Date Created</th>
					<th>Date Edited</th>
	    </tr>
	    <?php
	    foreach($noteList as $note) {
	        print '<tr>';
	        print '<td><a href="show.php?id=' . $note->getId() . '">'. $note->getSubjectLine() .'</a></td>';
				  print '<td>' . $note->getNoteChrCount() . '</td>';
					print '<td>' . $note->getDateCreated() . '</td>';
					print '<td>' . $note->getDateUpdated() . '</td>';
	        print '</tr>';
	    }
	    ?>
	</table>
</div>
</body>
</html>
