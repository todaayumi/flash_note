<?php

require_once('config.php');

$dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
$sql = "select * from posts ORDER BY id DESC";
$stmt = $dbh->query($sql);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>index</title>
	<meta name="viewport" content="width=device-width" initial-scale=1.0>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container mt-3">
		<h2 class="justify-content-between"><p class="d-inline-block">ノート一覧</p> <a href="form.php">+</a></h2>
		<ul class="list-group">
			<?php foreach($stmt as $row) : ?>
			<li class="list-group-item">
				<form action="note.php" method="get">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					<input type="submit" value="<?php echo $row['title']; ?>" style="border:none;">
				</form>
			</li>
		<?php endforeach; ?>
	</ul>
	</div>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>