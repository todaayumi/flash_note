<?php

require_once('config.php');

$created = date( "Y/m/d H:i:s" );
$modified = date( "Y/m/d H:i:s" );

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
$statement = $dbh->prepare("insert into posts (title, body, created, modified) values (:title, :body, :created, :modified)");
$statement->bindParam(":title", $_POST['title']);
$statement->bindParam(":body", $_POST['body']);
$statement->bindParam(":created", $created);
$statement->bindParam(":modified", $modified);
$statement->execute();

header('Location: http://localhost/flash_note/index.php');
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>box</title>
	<meta name="viewport" content="width=device-width" initial-scale=1.0>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="post" action="" name="post" class="form-group my-3">
			<input type="text" name="title" placeholder="タイトル" class="form-control mb-2">
			<textarea name="body" class="form-control mb-2" rows="25"></textarea>
			<input class="btn btn-primary" type="submit" value="確定">
		</form>
		<a href="index.php">戻る</a>
	</div>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>

