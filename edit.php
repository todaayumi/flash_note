<?php
require_once('config.php');

$id = $_GET['id'];

$dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
$sql = 'select * from posts where id =' . $id;
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['body']) || isset($_POST['title'])){
	$title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "UPDATE posts SET title = ?, body = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $title);
    $stmt->bindValue(2, $body);
    $stmt->bindValue(3, $id);
    $stmt->execute();

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
	<div class="container mt-3">
		<form method="post" action="" name="post" class="form-group">
			<input type="text" name="title" placeholder="タイトル" value="<?php if(!empty($result['title'])) echo $result['title']; ?>" class="form-control mb-2">
			<textarea name="body" rows="25" class="form-control mb-2"><?php if(!empty($result['body'])) echo $result['body']; ?></textarea>
			<input class="btn btn-primary mb-3 mx-auto" type="submit" value="確定">
		</form>
		<a href="index.php">戻る</a>
	</div>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
